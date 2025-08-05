<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\ENEntity;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Task;
use App\Models\Role;
use App\Models\Project;
use Carbon\CarbonPeriod;
use App\Models\ProcessStep;
use App\Models\Queries;


class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('active', 0)->get(); 
		return view('laravel.project.show_project', compact('projects'));
    }
    public function details()
    { 
        $projects = DB::table('project')
        ->leftJoin('task', 'project.id', '=', 'task.project_id') // Use LEFT JOIN to include projects without tasks
        ->leftJoin('user', 'task.user_id', '=', 'user.id') // Use LEFT JOIN to include tasks without a user
        ->select(
            'project.project_name',
            'project.project_code',
            'task.task_name',
            'user.username' // Fetch the username from the users table (nullable if no user is assigned)
        )
        ->orderBy('project.project_name') // Order by project name
        ->get();
    
    return view('laravel.project.shows_project', compact('projects'));
    
    }

    public function deactivate($id)
    {
        try {
            $project = Project::findOrFail($id); // Find the project by ID
            $project->active = 1; // Set the active field to 1
            $project->save(); // Save the changes
    
            return response()->json([
                'success' => true,
                'message' => 'Project deactivated successfully!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to deactivate the project.',
            ], 500);
        }
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'project_name' => 'required|string|max:255',
 
    ]);

    try {
        $project = Project::findOrFail($id);
        $project->project_name = $request->project_name;
       
        $project->update();

        return response()->json([
            'success' => true,
            'message' => 'Project updated successfully!',
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to update the project.',
        ], 500);
    }
}

    public function getLatestProjectCode()
{
    // Fetch the latest project code from the database
    $latestProject = DB::table('project')
        ->orderBy('id', 'desc') // Assuming `id` is the primary key
        ->value('project_code'); // Fetch only the `project_code` column

    // Extract the numeric part from the code (e.g., NR24100 -> 100)
    $latestNumber = $latestProject ? (int) substr($latestProject, 4) : 100;

    // Return the next incremented number
    return response()->json(['nextProjectCode' => 'NR24' . ($latestNumber + 1)]);
}
    public function showproject($id)
    {
       $projectname= Project::where('id', $id)
                    ->select('project_name','id')
                    ->get();
        $taskdetails = DB::table('project as po')
            ->join('task as ta', 'ta.project_id', '=', 'po.id') 
            ->leftJoin('user as user', 'user.id', '=', 'ta.user_id') 
            ->select('po.project_name', 'ta.id', 'ta.task_name', 'user.username')
            ->where('po.id', $id) 
            ->get();
            $userdetails = User::all();

        Log::info($taskdetails);
        return view('laravel.project.details', compact('taskdetails','projectname','userdetails'));
    }
    public function viewproject($id)
    {
       $projectname= Project::where('id', $id)
                    ->select('project_name','id')
                    ->get();
		$taskdetails = DB::table('project as po')
			->leftjoin('task as ta', 'ta.project_id', '=', 'po.id') 
			->leftJoin('user as user', 'user.id', '=', 'ta.user_id') 
			->select('po.project_name', 'ta.id','ta.status', 'ta.task_name', 'user.username')
			->where('po.id', $id) 
            ->where('ta.active',0)
			->get();
			$userdetails = User::all();

		Log::info($taskdetails);
        return view('laravel.project.view_project', compact('taskdetails','projectname','userdetails'));
    }


	public function updateproject($id)
{
    // Fetch task names
    $tasknames = Task::where('id', $id)->get();

    // Fetch assigned user
    $assignuser = DB::table('task as ta')
        ->join('user as user', 'user.id', '=', 'ta.user_id')
        ->select('user.username', 'user.id as user_id') // Include user_id
        ->where('ta.id', $id)
        ->first();

    // Fetch project name
    $projectname = DB::table('task as ta')
        ->join('project as po', 'po.id', '=', 'ta.project_id')
        ->where('ta.id', $id)
        ->get();

    // Fetch task details
    $taskdetails = DB::table('task as ta')
        ->join('project as po', 'po.id', '=', 'ta.project_id')
        ->join('user as user', 'user.id', '=', 'ta.user_id')
        ->where('ta.id', $id)
        ->get();

    // Fetch all user details
    $userdetails = User::all();

    // Extract the user ID (if available)
    $user_id = $assignuser->user_id ?? null;

    // Pass all required data to the view
    return view('laravel.project.update_project', compact('taskdetails', 'tasknames', 'userdetails', 'projectname', 'assignuser', 'user_id'));
}


	public function updateuserproject($id)
    {
       // Fetch task names
    $tasknames = Task::where('id', $id)->get();

    // Fetch assigned user
    $assignuser = DB::table('task as ta')
        ->join('user as user', 'user.id', '=', 'ta.user_id')
        ->select('user.username', 'user.id as user_id') // Include user_id
        ->where('ta.id', $id)
        ->first();

    // Fetch project name
    $projectname = DB::table('task as ta')
        ->join('project as po', 'po.id', '=', 'ta.project_id')
        ->where('ta.id', $id)
        ->get();

    // Fetch task details
    $taskdetails = DB::table('task as ta')
        ->join('project as po', 'po.id', '=', 'ta.project_id')
        ->join('user as user', 'user.id', '=', 'ta.user_id')
        ->where('ta.id', $id)
        ->get();

    // Fetch all user details
    $userdetails = User::all();

    // Extract the user ID (if available)
    $user_id = $assignuser->user_id ?? null;

    // Pass all required data to the view
    return view('laravel.project.update_user_project', compact('taskdetails', 'tasknames', 'userdetails', 'projectname', 'assignuser', 'user_id'));
      
    }

// 	public function assignTaskToUser(Request $request)
// {
//     $taskId = $request->input('taskId');
//     $assignedUserId = $request->input('assignedUserId');

//     $task = Task::find($taskId);
//     if ($task) {
//         $task->assigned_user_id = $assignedUserId;
//         $task->save();

//         return response()->json(['success' => true]);
//     }

//     return response()->json(['success' => false, 'message' => 'Task not found']);
// }

public function detail()
{
    $today = Carbon::today(); // Carbon instance for today's date
    $currentMonth = $today->format('Y-m'); // Format to 'YYYY-MM'

    // Fetch all users
    $allUsers = DB::table('user')
        ->select('id', 'username') // Ensure 'id' is fetched
        ->get();

    // Fetch attendance data for today's date
    $attendance = DB::table('attendance')
        ->leftJoin('leave', 'leave.id', '=', 'attendance.leave_id')
        ->leftJoin('user', 'attendance.user_id', '=', 'user.id')
        ->select(
            'user.id as user_id', // Alias to differentiate
            'user.username',
            'attendance.leave_id',
            'attendance.leave_date'
        )
        ->where(function ($query) use ($today) {
            $query->where('attendance.leave_date', '=', $today->toDateString()) // Convert Carbon to string
                ->orWhereNull('attendance.leave_date');
        })
        ->get();
        $groupedProjects = $attendance->groupBy('project_name');
    // Calculate leave and present counts for the current month
    $userStats = DB::table('attendance')
        ->select(
            'user_id',
            DB::raw("SUM(CASE WHEN leave_id = 0 THEN 1 ELSE 0 END) as present_count"),
            DB::raw("SUM(CASE WHEN leave_id = 1 THEN 1 ELSE 0 END) as absent_count"),
            DB::raw('COUNT(*) as total_days')
        )
        ->where('leave_date', 'LIKE', "{$currentMonth}%") 
        ->groupBy('user_id')
        ->get()
        ->keyBy('user_id'); // Group data by user_id for easy access


        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
       
        $holidays = [
          
        ];
        
        $startDate = Carbon::create($currentYear, $currentMonth,1);
        $endDate = $startDate->copy()->endOfMonth();
        
        Log::info($startDate);
        Log::info($endDate);

        $sundayCount =1;
        foreach (CarbonPeriod::create($startDate, $endDate) as $date) {
            if ($date->isSunday()) {
                $sundayCount++;
            }
        }
        Log::info($sundayCount);
       
        $workingDays = -1;
        foreach (CarbonPeriod::create($startDate, $endDate) as $date) {
            if (!$date->isSunday() && !in_array($date->toDateString(), $holidays)) {
                $workingDays++;
            }
        }
        
        
    Log::info($workingDays);
    // Pass data to the view
    return view('laravel.project.user_project', compact('allUsers', 'attendance', 'userStats','groupedProjects','workingDays'));
}

public function updateTaskAction(Request $request)
{
    $taskId = $request->input('task_id');
    $task = Task::find($taskId);
    
    if ($task) {
        // Update the action column to 1
        $task->active = 1;
        $task->save();
        
        return response()->json(['success' => true, 'message' => 'Task action updated successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Task not found']);
}

public function assigntasktouser(Request $request)
{
    try {
        Log::info($request);

        $taskId = $request->taskid;
        $taskName = $request->taskName;
        $assignedToUserId = $request->assignedToUserId;
        $projectName = $request->project_name;

        Log::info("Task ID: " . $taskId);
        Log::info("Assigned to User ID: " . $assignedToUserId);
        Log::info("Project Name: " . $projectName);

        // Get project ID
        $projectId = DB::table('task')
            ->where('task_name', $taskName)
            ->value('project_id');

        if (!$projectId) {
            return response()->json(['success' => false, 'message' => 'Project not found.'], 404);
        }

        Log::info("Project ID: " . $projectId);

        // Get task ID
        $taskRecord = DB::table('task')
            ->where('task_name', $taskName)
            ->select('id')
            ->first();

        if (!$taskRecord || !isset($taskRecord->id)) {
            return response()->json(['success' => false, 'message' => 'Task not found.'], 404);
        }

        $taskId = $taskRecord->id;
        Log::info("Task ID from DB: " . $taskId);

        // Update task
        $taskToUpdate = Task::find($taskId); // Use Eloquent to fetch the task

        if ($taskToUpdate) {
            $taskToUpdate->project_id = $projectId;
            $taskToUpdate->user_id = $assignedToUserId;
            $taskToUpdate->status = 1;
            $taskToUpdate->save(); // Use save() for Eloquent updates
        } else {
            return response()->json(['success' => false, 'message' => 'Task not found for update.'], 404);
        }

        return response()->json(['success' => true], 200);
    } catch (Exception $e) {
        Log::error("Error in assigning task: " . $e->getMessage());
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}


public function assigntasktousers(Request $request)
{
    try {
        // Log::info($request);
        $taskId = $request->taskid;
        $assignedToUserId = $request->assignedToUserId;
        $project_name = $request->project_name;
        Log::info($taskId);
        Log::info($assignedToUserId . " assignedToUserId");
        Log::info($project_name);
        // Get project ID
        $project = DB::table('project')
            ->where('project_name', $project_name)
            ->select('id')
            ->first();
            // Log::info($project."projectIdprojectId");
       
        // $project = Project::where('project_name', $project_name)->get(); 
        $projectId = $project->id;
        if (!$project) {
            return response()->json(['success' => false, 'message' => 'Project not found.'], 404);
        }
        Log::info($projectId."projectIdprojectId");
        // Get task ID
        // $task = DB::table('task as ta')
        //     ->join('project as po', 'po.id', '=', 'ta.project_id')
        //     ->where('ta.task_name', $task_name)
        //     ->select('ta.id as task_id')
        //     ->first();
           
        if (!$taskId) {
            return response()->json(['success' => false, 'message' => 'Task not found.'], 404);
        }

        // $taskId = $task->task_id;

        // Update task
        $taskToUpdate = Task::where('id', $taskId)->first();

        if ($taskToUpdate) {
            $taskToUpdate->project_id = $projectId;
            $taskToUpdate->user_id = $assignedToUserId;
            $taskToUpdate->status = 1;
            $taskToUpdate->update();
        }

        return response()->json(['success' => true], 200);
    } catch (Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()], 200);
    }
}
	
// 	public function createTask()
// {
//     $userdetails = User::all(); // Fetch all users from the database
//     return view('your_view', compact('userdetails')); // Pass users to the view
// }

public function addtasks(Request $request)
{
    Log::info($request);
    try {
        

        $project_id = $request->project_id;
        $assignedToUserId = $request->user_name;
        $taskName = $request->task_name;
		// Log::info($task_name);


        $taskStatus = new Task();
        $taskStatus->task_name = $taskName;
        $taskStatus->project_id = $project_id;
        $taskStatus->status = 0;
        $taskStatus->user_id = $assignedToUserId;
        $taskStatus->created_at = Carbon::now();
        $taskStatus->save();

		$project = Project::where('id', $project_id)->first(); // Assuming Project model manages projects
        if ($project) {
            $project->task_count = $project->task_count + 1; // Increment task_count
            $project->save(); // Save the updated project
        }
        
        
        


        return response()->json(['success' => true, 'message' => 'Task added successfully!']);
    } catch (\Exception $e) {
        Log::error('Error adding task: ' . $e->getMessage());
        return response()->json(['success' => false, 'message' => 'Failed to add task. Please try again.'], 500);
    }
}
public function storeProjectWithTasks(Request $request)
{
	Log::info( $request);
    try {
        // // Validate the request
        // $request->validate([
        //     'project_name' => 'required|string|max:255',
        //     'task_count' => 'required|integer|min:1',
        //     'task_names' => 'required|array|min:1',
        //     'task_names.*' => 'required|string|max:255',
        // ]);

        // Create the project
        $project = new Project();
        $project->project_name = $request->project_name;
        $project->task_count = $request->task_count;
        $project->project_code = $request->project_code;
        $project->created_at = now();
		$project->status = 0;
        $project->save();
		Log::info( $project);

        // Create tasks for the project
        foreach ($request->task_names as $task_name) {
            $task = new Task();
            $task->task_name = $task_name;
            $task->project_id = $project->id;
            $task->status = 0; // Default status
            $task->duration = 0;
            $task->created_at = now();
            $task->save();
			Log::info( $task);
        }

        return response()->json(['success' => true, 'message' => 'Project and tasks added successfully!']);
    } catch (\Exception $e) {
        Log::error('Error adding project and tasks: ' . $e->getMessage());
        return response()->json(['success' => false, 'message' => 'Failed to add project and tasks. Please try again.'], 500);
    }
}

    
}
