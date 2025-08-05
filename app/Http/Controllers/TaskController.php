<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
// use App\Providers\TagPolicy;



class TaskController extends Controller
{

    public function showTasks($status)
    {
        // Fetch tasks with the given status
        $tasks = DB::table('task')->select('id', 'task_name', 'status')->where('status', $status)->get();

        // Pass the tasks to the view
        return view('index', compact('tasks'));
    }
    public function getTaskDetails($taskId)
    {
        $task = Task::findOrFail($taskId);
        return response()->json([
            'task_name' => $task->task_name,
            'user_id' => $task->user_id,
        ]);
    }
    
    // public function updateTask( $taskId)
    // {
    //     $task = Task::findOrFail($taskId);
    //     $task->user_id = $request->assigned_user_id;
    //     $task->save();
    
    //     return response()->json(['success' => true]);
    // }
    

    public function updateTaskStatus($taskId, $status)
    {
        // Find the task by ID and update the status
        DB::table('task')->where('id', $taskId)->update(['status' => $status]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Task status updated successfully.');
    }
    public function updateTask(Request $request)
    {
        // Log::info($request->all());

        // Validate the input
        $request->validate([
            'task_name' => 'required|string|exists:task,task_name',
            'duration' => 'required|string|max:255',
        ]);

        // Find the task by task_name
        $task = Task::where('task_name', $request->task_name)->first();

        if ($task) {
            // Update the duration
            $task->duration = $request->duration;
            $task->status = 2; // Hardcode status_id to 2
            $task->save(); // Save the updated model
        } else {
            // Log an error if no matching task is found
            Log::error('No task found with name: ' . $request->task_name);
            return redirect()->back()->with('error', 'Task not found.');
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Task duration updated successfully.');
    }


    // public function updateTask(Request $request)
    // {
    //     Log::info($request->all());

    //     // Validate the input
    //     $request->validate([
    //         'task_name' => 'required|string|exists:task,task_name',
    //         'duration' => 'required|string|max:255',
    //     ]);

    //     // Find the task by task_name
    //     $task = Task::where('task_name', $request->task_name)->first();

    //     if ($task) {
    //         // Update the duration
    //         $task->duration = $request->duration;
    //         $task->status = 2; // Hardcode status_id to 2
    //         $task->save(); // Save the updated model
    //     } else {
    //         // Log an error if no matching task is found
    //         Log::error('No task found with name: ' . $request->task_name);
    //         return redirect()->back()->with('error', 'Task not found.');
    //     }

    //     // Redirect back with success message
    //     return redirect()->back()->with('success', 'Task duration updated successfully.');
    // }
    // public function updateTask(Request $request)
    // {
    //     // Log::info($request->all());

    //     // Validate the input
    //     $request->validate([
    //         'task_name' => 'required|string|exists:task,task_name',
    //         'duration' => 'required|string|max:255',
    //     ]);

    //     // Find the task by task_name
    //     $task = Task::where('task_name', $request->task_name)->first();

    //     if ($task) {
    //         // Update the duration
    //         $task->duration = $request->duration;
    //         $task->status = 2; // Hardcode status_id to 2
    //         $task->save(); // Save the updated model
    //     } else {
    //         // Log an error if no matching task is found
    //         Log::error('No task found with name: ' . $request->task_name);
    //         return redirect()->back()->with('error', 'Task not found.');
    //     }

    //     // Redirect back with success message
    //     return redirect()->back()->with('success', 'Task duration updated successfully.');
    // }
    public function updates_task(Request $request)
    {
        $request->validate([
            'duration' => 'required|string|max:255',
            'task_id' => 'required|exists:tasks,id',
        ]);
        Log::info( $request);
        try {
            $taskId = $request->input('task_id');
            $task = Task::findOrFail($taskId);
            $task->duration = $request->input('duration');
            $task->update();

            // Log successful update
            Log::info('Task updated successfully.', ['task_id' => $taskId, 'duration' => $task->duration]);

            // return redirect()->back()->with('success', 'Task updated successfully!');
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error('Failed to update task.', [
                'error' => $e->getMessage(),
                'task_id' => $request->input('task_id')
            ]);

            // return redirect()->back()->with('error', 'Failed to update task: ' . $e->getMessage());
        }
    }

    public function saveTask(Request $request)
    {
        try {
            // Validate the incoming request data
            $validated = $request->validate([
                'task_name' => 'required|string|max:255',
                'user_id' => 'required|exists:user,id',  // Correct the table and column name for user validation
                'editTaskNameid' => 'required|exists:task,id',
            ]);
    
            // Find the task by ID and update it
            $task = Task::findOrFail($validated['editTaskNameid']);
            $task->task_name = $validated['task_name'];
            $task->user_id = $validated['user_id'];  // Use the correct user_id
            $task->save();
    
            return response()->json(['success' => true]);
    
        } catch (\Exception $e) {
            // Return error response if any exception occurs
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
    public function showUpdateForm($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
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
    

}