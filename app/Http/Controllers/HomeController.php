<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Location; 
use App\Models\ModelStatusDetails;
use App\Models\ModelQCRemark;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\WorkOrder;
use App\Models\Company;
use App\Models\WorkOrderStatus;
use App\Models\WorkOrderRemarks;
use App\Models\WorkDuration;
use App\Models\DatapreparationFile;
use App\Models\FdFile;
use App\Models\Qc;
use App\Models\DrawingFile;
use File;
use App\Models\RemarksQc;
use App\Models\Attendance;
use App\Models\Project;


class HomeController extends Controller
{


    // public function showPage()
    // {
    //     $userCount = Attendance::count(); 
    //     $projectCount = Project::count();
    //     Log::info($userCount);
    //     Log::info($projectCount);
    //     // dd(compact('userCount', 'projectCount')); // Debug output
    //     return view('home', compact('userCount', 'projectCount'));
    // }
    
    public function showPage_user()
    {
        // $userCount = Attendance::count(); 
        // $projectCount = Project::count();
        // Log::info($userCount);
        // Log::info($projectCount);
        // dd(compact('userCount', 'projectCount')); // Debug output
        return view('home_user', compact('userCount', 'projectCount'));
    }
    // public function index_attendance()
    // {
    //     $userId = auth()->user()->id;
    //     $currentTime = Carbon::now('Asia/Kolkata');
    //     $locations = Location::orderBy('id')->get();

    //     $attendance = Attendance::where('user_id', $userId)
    //     ->where('checkin', '>=', $currentTime->subHours(24)) // Attendance in the last 24 hours
    //     ->first();
        
    //     $buttonDisabled = $attendance && empty($attendance->checkout);

    //     // return view('laravel.workorder.create',compact('processStepList','workAreaList'));

    //     return view('home_attendance', compact('buttonDisabled','locations'));
    // }
    public function index_attendance()
    {
        $userId = auth()->user()->id;
        $currentTime = Carbon::now('Asia/Kolkata');
        $locations = Location::orderBy('id')->get();

        $attendance = Attendance::where('user_id', $userId)
        ->where('checkin', '>=', $currentTime->subHours(24)) // Attendance in the last 24 hours
        ->first();
        
        $buttonDisabled = $attendance && empty($attendance->checkout);

        // return view('laravel.workorder.create',compact('processStepList','workAreaList'));

        return view('home_attendance', compact('buttonDisabled','locations','attendance'));
    }



public function attendanceStore($locationId)
    {
        $userId = auth()->user()->id;
        $currentDate = Carbon::today(); // Get today's date

        // Check if the user has already checked in today
        $attendance = Attendance::where('user_id', $userId)
            ->where('location_id', $locationId)
            ->whereDate('checkin', $currentDate) // Match today's date
            ->where('checkout', '') // Check if checkout is not set
            ->first();

        if ($attendance) {
            // If attendance record exists, update the checkout time
            $attendance->checkout = Carbon::now('Asia/Kolkata');
            $attendance->save();

            return back()->with('success', trans('Checkout Successfully'));
        } else {
            // If no attendance record exists, create a new check-in record
            $attendance = new Attendance();
            $attendance->checkin = Carbon::now('Asia/Kolkata');
            $attendance->checkout = ''; // Empty string for the checkout field
            $attendance->leave_id = 0;
            $attendance->user_id = $userId;
            $attendance->location_id = $locationId;
            $attendance->save();

            return back()->with('success', trans('Checkin Successfully'));
        }
    }

    public function attendanceUpdate($locationId)
    {
        $userId = auth()->user()->id;
        $currentDate =Carbon::now(); // Get today's date
        Log::info("fffff".$currentDate->toDateString());
        // Check if the user has already checked in and out today
        $existingAttendance = Attendance::where('user_id', $userId)
            ->where('location_id', $locationId)
            ->whereDate('checkin', $currentDate) // Check today's date
            ->first();
    
        if ($existingAttendance) {
            if ($existingAttendance->checkout) {
                // If the user has already checked out, don't allow further check-ins
                return back()->with('error', trans('You have already checked in and checked out today.'));
            } else {
                // If attendance record exists and checkout is not set, update the checkout time
                $existingAttendance->checkout = \Carbon\Carbon::now('Asia/Kolkata');
                $existingAttendance->save();
    
                return back()->with('success', trans('Checkout Successfully'));
            }
        } else {
            // If no attendance record exists, allow a new check-in
            $attendance = new Attendance();
            $attendance->checkin = \Carbon\Carbon::now('Asia/Kolkata');
            $attendance->checkout = ''; // Empty string for the checkout field
            $attendance->leave_id = 0;
            $attendance->user_id = $userId;
            $attendance->location_id = $locationId;
            $attendance->leave_date=$currentDate->toDateString();
            $attendance->save();
    
            return back()->with('success', trans('Checkin Successfully'));
        }
    }

    public function showPage(Request $request)

    {
        $user = auth()->User();
        if($user->role_id==1){

        $userCount= user::count();


            // Get today's date
        $today = now()->format('Y-m-d');

        $presentCount = Attendance::whereDate('checkin', $today)
        ->whereNotNull('checkin') // Check-in exists
        ->count();

    // Fetch the absent users (total users - present users)
    $absentCount = $userCount - $presentCount;


            
        // Fetch the count of projects (you can modify this as needed)
        
        $totalProjects = Project::count();
        $currentCount = Project::where('status', '0')->count();
        $completedCount = Project::where('status', '1')->count();
        
        // Log the project count for debugging
    // Log::info('total project: ' . $projectCount);
        
        // Return the view with the necessary data
        return view('home', compact('totalProjects', 'userCount','currentCount','completedCount','presentCount','absentCount'));
    
    }
        else{
            $user = auth()->user();

            $defaultuserId = $user->id;
    
            $roles = DB::table('user')
                    ->where('username', $user)
                    ->select('role_id')
                    ->first();
    
            $company = DB::table('user')
                    ->where('username', $user)
                    ->first();
    
            return view('home_user', compact('company','roles'));
    //   return view('home_user', compact(''));
    }
    }
  
  
    public function saveDuration(Request $request)
    {
        try {
            // Validate input fields
            // $request->validate([
            //     'proj_name' => 'required|string|exists:project,proj_name', // Validate proj_name exists in the database
            //     'duration'  => 'required|string|max:255', // Validate duration
            // ]);
    
            // Find the project by proj_name
            $project = Task::where('proj_name', $request->proj_name)->first();

    
            // Check if the project exists
            if ($project) {
                $project->duration = $request->duration;
                $project->save();
                return response()->json(['success' => true, 'message' => 'Duration updated successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Project not found']);
            }
    
            // Update the project duration
            $project->duration = $request->duration;
            $project->save();
    
            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Duration updated successfully.',
                'project_id' => $project->id,
            ]);
        } catch (\Exception $e) {
            // Log error to the Laravel log file
            Log::error('Error saving duration: ' . $e->getMessage());
    
            // Return error response
            return response()->json(['success' => false, 'message' => 'An error occurred while saving duration.']);
        }
    }
    public function index_project()
    {
        // Fetch all projects along with associated task names
        $projects = DB::table('project')
            ->join('task', 'project.id', '=', 'task.project_id')
            ->select('project.project_name', 'task.task_name','task.status')
            ->orderBy('project.project_name') // Order by project name
            ->where('task.user_id', auth()->id())
            ->get();
    
        // Return the data to the view
        return view('home_project', compact('projects'));
    }
    
    public function index(Request $request)
    {
        $user = auth()->user();

        $defaultuserId = $user->id;

        $roles = DB::table('user')
                ->where('username', $user)
                ->select('role_id')
                ->first();

        $company = DB::table('user')
                ->where('username', $user)
                ->first();

        return view('home_user', compact('company','roles'));
    }

    
   

    public function viewOrder($id)
    {
       $workOrders = WorkOrder::where('id', '=', $id)->first();
       return view('vieworder', compact('workOrders'));
    }
    
    public function assignToPreproduction($id)
    {
       $companies= Company::latest()->get(); 
       $workOrder = WorkOrder::where('id', $id)->first();
       
       return view('laravel.workorder.assigntopreproduction', compact('workOrder','companies'));
    }
    
    public function index_PreProduction()
    {
        $workOrders = DB::table('wo_workorder as wo')
                    ->Join('wo_processstep as ps', 'ps.id', '=', 'wo.processstep_id')
                    ->Join('wo_status as ss', 'ss.code', '=', 'wo.status_code')
                    ->Join('wo_workarea as wa', 'wa.id', '=', 'wo.workarea_id')
                    //->Join('wo_workorder_status as wos', 'wos.workorder_id', '=', 'wo.id')
                    ->where('ps.id',2)
                    ->whereIn('ss.code', [100,101,102,103,112,111,115])
                    ->where('wo.assigned_to_user_id', auth()->user()->id)
                    ->select('wo.id as workorderid', 'wo.name as workordername',
                        'ps.processname as processname', 'ss.description as description','ss.code as status_code',
                        'wa.workarea_name as workarea_name')
                    ->distinct('workorderid')
                    ->orderBy('wo.name')
                    ->get();
        //echo $workOrders;
        return view('home_preproduction', compact('workOrders'));
    }

    
    public function assignToUserPreproduction($id)
    {
        $companies = Company::latest()->get();

        $companyId = DB::table('wo_workorder as wo')
        ->Join('wo_company as wc', 'wc.default_user_id', '=', 'wo.assigned_to_user_id')
        ->where('wo.id',$id)
        ->select('wc.id as company_id')->first()->company_id;
        
        $preproduction = "pre-production";

        $roleId = DB::table('wo_user_role as ur')
            ->join('wo_role as r', 'ur.roleid', '=', 'r.id')
            ->where('r.role_name', $preproduction)
            ->value('ur.roleid');
            
        $userIds = DB::table('wo_user_role')
            ->where('roleid', $roleId)
            ->pluck('userid');

        $userList = User::where('companyid', $companyId)
            ->whereIn('id', $userIds)
            ->get();

        $workOrder = WorkOrder::find($id);

        return view('laravel.workorder.assigntouserpreproduction', compact('userList', 'companies', 'workOrder'));
    }

    public function assignToUserPreproductionPost(Request $request)
    {
        try
        {
            $workOrderId = $request->workOrderId;
            $assignedToUserId = $request->assignedToUserId;
            
            $processId = DB::table('wo_processstep')->where('processname', 'Pre-Production')->first()->id;
            $statusCode = DB::table('wo_status')->where('description', 'Assigned to Pre-production User')->first()->code;
            
            $workOrderStatus = new WorkOrderStatus();
            $workOrderStatus->workorder_id = $workOrderId;
            $workOrderStatus->processstep_id = $processId;
            $workOrderStatus->status_code = $statusCode;
            $workOrderStatus->assigned_by_user_id = auth()->user()->id;
            $workOrderStatus->assigned_to_user_id = $assignedToUserId;
            $workOrderStatus->assigned_at = Carbon::now();
            $workOrderStatus->save();
            
            $workOrder = WorkOrder::where('id', $workOrderId)->first();
            $workOrder->processstep_id = $processId;
            $workOrder->status_code = $statusCode;
            $workOrder->assigned_to_user_id = $assignedToUserId;
            $workOrder->update();
            
            return response()->json(array('success' => true),200);
        }
        catch (Exception $e)
        {
            return response()->json(array('success' => false,'message' => $e->getMessage()),200); 
        }
    }

    public function startPreproductionPost(Request $request)
    {
        try
        {
            $workOrderId = $request->workOrderId;
            
            $processId = DB::table('wo_processstep')->where('processname', 'Pre-Production')->first()->id;
            $statusCode = DB::table('wo_status')->where('description', 'Pre-production in-progress')->first()->code;
            
            $workOrderStatus = new WorkOrderStatus();
            $workOrderStatus->workorder_id = $workOrderId;
            $workOrderStatus->processstep_id = $processId;
            $workOrderStatus->status_code = $statusCode;
            $workOrderStatus->assigned_by_user_id = auth()->user()->id;
            $workOrderStatus->assigned_to_user_id = auth()->user()->id;
            $workOrderStatus->assigned_at = Carbon::now();
            $workOrderStatus->save();
            
            $workOrder = WorkOrder::where('id', $workOrderId)->first();
            $workOrder->processstep_id = $processId;
            $workOrder->status_code = $statusCode;
            $workOrder->assigned_to_user_id = auth()->user()->id;
            $workOrder->update();
            
            return response()->json(array('success' => true),200);
        }
        catch (Exception $e)
        {
            return response()->json(array('success' => false,'message' => $e->getMessage()),200); 
        }
    }
	
	public function startMapcreationPost(Request $request)
    {
        try
        {
            $workOrderId = $request->workOrderId;
            
            $processId = DB::table('wo_processstep')->where('processname', 'Map Creation')->first()->id;
            $statusCode = DB::table('wo_status')->where('description', 'Map Creation in-progress')->first()->code;
            
            $workOrderStatus = new WorkOrderStatus();
            $workOrderStatus->workorder_id = $workOrderId;
            $workOrderStatus->processstep_id = $processId;
            $workOrderStatus->status_code = $statusCode;
            $workOrderStatus->assigned_by_user_id = auth()->user()->id;
            $workOrderStatus->assigned_to_user_id = auth()->user()->id;
            $workOrderStatus->assigned_at = Carbon::now();
            $workOrderStatus->save();
            
            $workOrder = WorkOrder::where('id', $workOrderId)->first();
            $workOrder->processstep_id = $processId;
            $workOrder->status_code = $statusCode;
            $workOrder->assigned_to_user_id = auth()->user()->id;
            $workOrder->update();
            
            return response()->json(array('success' => true),200);
        }
        catch (Exception $e)
        {
            return response()->json(array('success' => false,'message' => $e->getMessage()),200); 
        }
    }
    
    public function completePreproduction($id)
    {
        
        $workOrder = DB::table('wo_workorder')->where('id', $id)->first();
        $workOrderStatusList = DB::table('wo_workorder_status as wos')
            ->join('wo_workorder as wo', 'wo.id', '=', 'wos.workorder_id')
            ->join('wo_processstep as ps', 'ps.id', '=', 'wos.processstep_id')
            ->join('wo_status as ss', 'ss.code', '=', 'wos.status_code')
            ->join('wo_user as wur', 'wur.id', '=', 'wos.assigned_by_user_id')
            ->join('wo_user as wur1', 'wur1.id', '=', 'wos.assigned_to_user_id')
            ->leftJoin('wo_workarea', 'wo_workarea.id', '=', 'wo.workarea_id')
            ->leftJoin('fd_qc', 'fd_qc.workorder_id', '=', 'wo.id')
            ->where('wo.id', $workOrder->id) // Corrected line
            ->select(
                'wos.id as wosid',
                'wo.id as workorderid',
                'wo.name as workordername',
                'ps.processname as processname',
                'ss.description as description',
                'ss.code as status_code',
                'wos.assigned_at as assigned_at',
                'wur.username as assigned_by',
                'wur1.username as assigned_to',
                'wo_workarea.workarea_name as workarea_name',
                'fd_qc.*',
            )
            ->distinct('wos.id')
            ->get();
        
		$drawings = Qc::where('workorder_id', $workOrder->id)->get();
       return view('laravel.workorder.completepreproduction', compact('workOrder','workOrderStatusList', 'drawings'));
    }
    
    public function completePreproductionPost(Request $request)
    {
       $workOrderId = $request->workOrderId;
       $workDuration = $request->workDuration;
       $processId = DB::table('wo_processstep')->where('processname', 'Pre-Production')->first()->id;
       $statusCode = DB::table('wo_status')->where('description', 'Pre-production completed')->first()->code;
        $workOrderStatus = new WorkOrderStatus();
        $workOrderStatus->workorder_id = $workOrderId;
        $workOrderStatus->processstep_id = $processId;
        $workOrderStatus->status_code = $statusCode;
        $workOrderStatus->assigned_by_user_id = auth()->user()->id;
        $workOrderStatus->assigned_to_user_id = auth()->user()->id;
        $workOrderStatus->assigned_at = Carbon::now();
        $workOrderStatus->save();

        $workOrder = WorkOrder::where('id', $workOrderId)->first();
        $workOrder->processstep_id = $processId;
        $workOrder->status_code = $statusCode;
        $workOrder->assigned_to_user_id = auth()->user()->id;
        $workOrder->update();

        $workDurationObj = new WorkDuration();
        $workDurationObj->workorder_id = $workOrderId;
        $workDurationObj->processstep_id = $processId;
        $workDurationObj->status_code = $statusCode;
        $workDurationObj->duration = $workDuration;
        $workDurationObj->updated_by = auth()->user()->id;
        $workDurationObj->updated_at = Carbon::now();
        $workDurationObj->save();
       
       return response()->json(array('success' => true),200);
    }
    
    public function reassignPreproduction($id)
    {
        $companies= Company::latest()->get();   
        
        $user = auth()->user();
        $userId = $user->id;

        $companyId = DB::table('wo_user')
        ->where('id', $userId)
        ->pluck('companyid');     
       
        // $companyId = DB::table('wo_workorder_status as wos')
        //     ->Join('wo_company as wc', 'wc.default_user_id', '=', 'wos.assigned_to_user_id')
        //     ->where('wos.workorder_id',$id)
        //     ->select('wc.id as company_id')->first()->company_id;

           $preproduction = "pre-production";

           $roleId = DB::table('wo_user_role as ur')
            ->join('wo_role as r', 'ur.roleid', '=', 'r.id')
            ->where('r.role_name', $preproduction)
             ->value('ur.roleid');
        
            $userIds = DB::table('wo_user_role')
                  ->where('roleid', $roleId)
                  ->pluck('userid');
          $userList = User::where('companyid', $companyId)
              ->whereIn('id', $userIds)
              ->get();
      
          $roles = Role::all();
        
        $workOrder = DB::table('wo_workorder')->where('id',$id)->first();
       
        return view('laravel.workorder.reassigntouserpreproduction', compact('userList','workOrder'));
    }

    public function store(Request $request)
    {
        $workorder = new WorkOrder();
		
		$workorder->name = $request->input('name');
		$workorder->processstep_id = $request->input('process');
		$workorder->status_id = 1;
		$workorder->workarea_id = 1;
		$workorder->planned_startdate = $request->input('startdate');
		$workorder->planned_enddate = $request->input('enddate');
		//$workorder->bimmodelreference_id = 0;
		$workorder->created_date = Carbon::now();
		$workorder->created_user = auth()->user()->id;
		$workorder->flag = 0;
	   
	    $workorder->save();
		
	    return back()->with('success', trans('words.workordersavedsuccessfully'));
    }

    public function reassignPreproductionPost(Request $request)
    {
        try
        {
            $workOrderId = $request->workOrderId;
            $assignedtouserid = $request->userId;
            $remarks = $request->remarks;
            
            $processId = DB::table('wo_processstep')->where('processname', 'Pre-Production')->first()->id;
            $statusCode = DB::table('wo_status')->where('description', 'Assigned to Pre-production User')->first()->code;
            
            $workOrderStatus = new WorkOrderStatus();
            $workOrderStatus->workorder_id = $workOrderId;
            $workOrderStatus->processstep_id = $processId;
            $workOrderStatus->status_code = $statusCode;
            $workOrderStatus->assigned_by_user_id = auth()->user()->id;
            $workOrderStatus->assigned_to_user_id = $assignedtouserid;
            $workOrderStatus->assigned_at = Carbon::now();
            $workOrderStatus->save();
            
            $workOrder = WorkOrder::where('id', $workOrderId)->first();
            $workOrder->processstep_id = $processId;
            $workOrder->status_code = $statusCode;
            $workOrder->assigned_to_user_id = $assignedtouserid;
            $workOrder->update();
            
            $WorkOrderRemarks = new WorkOrderRemarks();
            $WorkOrderRemarks->workorder_id = $workOrderId;
            $WorkOrderRemarks->workorder_status_id = $workOrderStatus->id;
            $WorkOrderRemarks->processstep_id = $processId;
            $WorkOrderRemarks->status_code = $statusCode;
            $WorkOrderRemarks->remarks = $remarks;
            $WorkOrderRemarks->assigned_by = auth()->user()->id;
            $WorkOrderRemarks->assigned_at = Carbon::now();
            $WorkOrderRemarks->save();
            
            return response()->json(array('success' => true),200);
        }
        catch (Exception $e)
        {
            return response()->json(array('success' => false,'message' => $e->getMessage()),200); 
        }
    }
    
    public function index_MapCreation()
    {
		$searchTerm = $request->input('searchTerm');

        $workOrdersQuery = DB::table('wo_workorder as wo')
                    ->Join('wo_processstep as ps', 'ps.id', '=', 'wo.processstep_id')
                    ->Join('wo_status as ss', 'ss.code', '=', 'wo.status_code')
                    ->Join('wo_workarea as wa', 'wa.id', '=', 'wo.workarea_id')
                    ->whereIn('status_code', [300, 301, 302, 303,312,311])
                    ->select('wo.id as workorderid', 'wo.name as workordername',
                        'ps.processname as processname', 'ss.description as description',
                        'wa.workarea_name as workarea_name')
                    ->get();
		if ($searchTerm) {
			$workOrdersQuery->where('wo.name', 'like', '%' . $searchTerm . '%');
		}

		$workOrders = $workOrdersQuery->get();

        return view('home_mapcreation', compact('workOrders'));
    }
	
	public function getDownload(Request $request) {
        $filePath = $request->query('filePath');
		
        if (file_exists($filePath)) {
            return response()->download($filePath);
        }else {
            return response()->json(['error' => 'File not found'], 404);
        }
    }

    public function assignqc($id)
    {
        $companyname="Hemminger Data";

        $companies= Company::where('company_name', $companyname)
        ->select('*')
        ->first();
        $workOrder = DB::table('wo_workorder')->where('id',$id)->first();
       
       return view('laravel.workorder.qc', compact('workOrder','companies'));
    }

    public function assignToQCPost(Request $request)
    {
        try
        {
            $workOrderId = $request->workOrderId;
            $assignedToUserId = $request->assignedToUserId;
            
            $processId = DB::table('wo_processstep')->where('processname', 'Pre-Production')->first()->id;
            $statusCode = DB::table('wo_status')->where('description', 'Assigned to Pre-production User')->first()->code;
            
            $workOrderStatus = new WorkOrderStatus();
            $workOrderStatus->workorder_id = $workOrderId;
            $workOrderStatus->processstep_id = $processId;
            $workOrderStatus->status_code = $statusCode;
            $workOrderStatus->assigned_by_user_id = auth()->user()->id;
            $workOrderStatus->assigned_to_user_id = $assignedToUserId;
            $workOrderStatus->assigned_at = Carbon::now();
            $workOrderStatus->save();
            
            $workOrder = WorkOrder::where('id', $workOrderId)->first();
            $workOrder->processstep_id = $processId;
            $workOrder->status_code = $statusCode;
            $workOrder->assigned_to_user_id = $assignedToUserId;
            $workOrder->update();
            
            return response()->json(array('success' => true),200);
        }
        catch (Exception $e)
        {
            return response()->json(array('success' => false,'message' => $e->getMessage()),200); 
        }
    }

    public function approveWorkOrder(Request $request)
    {
        try
        {
            $workOrderId = $request->workOrderId;
            $remarks = $request->input('remarks');
            
            $processId = DB::table('wo_processstep')->where('processname', 'Pre-Production')->first()->id;
            $statusCode = DB::table('wo_status')->where('description', 'Preproduction - QC Approved')->first()->code;
            
            $preStatusCode = DB::table('wo_status')->where('description', 'Preproduction - Assigned to QC')->first()->code;
            
            $preUserId = DB::table('wo_workorder_status')
            ->where('workorder_id', $workOrderId)
            ->where('processstep_id', $processId)
            ->where('status_code', $preStatusCode)
          //  ->where('assigned_to_user_id', auth()->user()->id)
            ->orderBy('id','DESC')
            ->first()->assigned_by_user_id;



            $Remarks= new RemarksQc();
            $Remarks->workorder_id = $workOrderId;
            $Remarks->processstep_id = $processId;
            $Remarks->status_code = $statusCode;;
            $Remarks->remarks = $remarks;
            $Remarks->assigned_by = auth()->user()->id;
            $Remarks->assigned_at = Carbon::now();
            $Remarks->save();           
            
            $workOrderStatus = new WorkOrderStatus();
            $workOrderStatus->workorder_id = $workOrderId;
            $workOrderStatus->processstep_id = $processId;
            $workOrderStatus->status_code = $statusCode;
            $workOrderStatus->assigned_by_user_id = auth()->user()->id;
            $workOrderStatus->assigned_to_user_id = $preUserId;
            $workOrderStatus->assigned_at = Carbon::now();
            $workOrderStatus->save();
            
            $workOrder = WorkOrder::where('id', $workOrderId)->first();
            $workOrder->processstep_id = $processId;
            $workOrder->status_code = $statusCode;
            $workOrder->assigned_to_user_id = $preUserId;
            $workOrder->update();
            
            return response()->json(array('success' => true),200);
        }
        catch (Exception $e)
        {
            return response()->json(array('success' => false,'message' => $e->getMessage()),200); 
        }
        
        
    }
    public function rejectedWorkOrder(Request $request)
    {
        try
        {
            $workOrderId = $request->workOrderId;
            $remarks = $request->input('remarks');
            
            $processId = DB::table('wo_processstep')->where('processname', 'Pre-Production')->first()->id;
            $statusCode = DB::table('wo_status')->where('description', 'Preproduction - QC Rejected')->first()->code;
            
            $preStatusCode = DB::table('wo_status')->where('description', 'Preproduction - Assigned to QC')->first()->code;
            
            $preUserId = DB::table('wo_workorder_status')
                            ->where('workorder_id', $workOrderId)
                            ->where('processstep_id', $processId)
                            ->where('status_code', $preStatusCode)
                          //  ->where('assigned_to_user_id', auth()->user()->id)
                            ->orderBy('id','DESC')
                            ->first()->assigned_by_user_id;



            $Remarks= new RemarksQc();
            $Remarks->workorder_id = $workOrderId;
            $Remarks->processstep_id = $processId;
            $Remarks->status_code = $statusCode;;
            $Remarks->remarks = $remarks;
            $Remarks->assigned_by = auth()->user()->id;
            $Remarks->assigned_at = Carbon::now();
            $Remarks->save();  

            $workOrderStatus = new WorkOrderStatus();
            $workOrderStatus->workorder_id = $workOrderId;
            $workOrderStatus->processstep_id = $processId;
            $workOrderStatus->status_code = $statusCode;
            $workOrderStatus->assigned_by_user_id = auth()->user()->id;
            $workOrderStatus->assigned_to_user_id = $preUserId;
            $workOrderStatus->assigned_at = Carbon::now();
            $workOrderStatus->save();
            
            $workOrder = WorkOrder::where('id', $workOrderId)->first();
            $workOrder->processstep_id = $processId;
            $workOrder->status_code = $statusCode;
            $workOrder->assigned_to_user_id = $preUserId;
            $workOrder->update();
            
            return response()->json(array('success' => true),200);
        }
        catch (Exception $e)
        {
            return response()->json(array('success' => false,'message' => $e->getMessage()),200); 
        }
        
        
    }
    
    public function mapapproveWorkOrder(Request $request)
    {
        try
        {
            $workOrderId = $request->workOrderId;
            $remarks = $request->input('remarks');
            
            $processId = DB::table('wo_processstep')->where('processname', 'Map Creation')->first()->id;
            $statusCode = DB::table('wo_status')->where('description', 'MapCreation - QC Approved')->first()->code;

            // $wo_workorder_status = DB::table('wo_workorder_status')
            // ->where('workorder_id', $workOrderId)
            // ->where('processstep_id', 4)
            // ->where('status_code', 302)
            // ->first()->assigned_by_user_id;

           


            $preStatusCode = DB::table('wo_status')->where('description', 'Map Creation in-progress')->first()->code;
            
            $preUserId = DB::table('wo_workorder_status')
                            ->where('workorder_id', $workOrderId)
                            ->where('processstep_id', $processId)
                            ->where('status_code', $preStatusCode)
                          //  ->where('assigned_to_user_id', auth()->user()->id)
                            ->orderBy('id','DESC')
                            ->first()->assigned_by_user_id;

            $Remarks= new RemarksQc();
            $Remarks->workorder_id = $workOrderId;
            $Remarks->processstep_id = $processId;
            $Remarks->status_code = $statusCode;;
            $Remarks->remarks = $remarks;
            $Remarks->assigned_by = auth()->user()->id;
            $Remarks->assigned_at = Carbon::now();
            $Remarks->save();                

            $workOrderStatus = new WorkOrderStatus();
            $workOrderStatus->workorder_id = $workOrderId;
            $workOrderStatus->processstep_id = $processId;
            $workOrderStatus->status_code = $statusCode;
            $workOrderStatus->assigned_by_user_id = auth()->user()->id;
            $workOrderStatus->assigned_to_user_id = $preUserId;
            $workOrderStatus->assigned_at = Carbon::now();
            $workOrderStatus->save();
            
            $workOrder = WorkOrder::where('id', $workOrderId)->first();
            $workOrder->processstep_id = $processId;
            $workOrder->status_code = $statusCode;
            $workOrder->assigned_to_user_id = $preUserId;
            $workOrder->update();
            
            return response()->json(array('success' => true),200);
        }
        catch (Exception $e)
        {
            return response()->json(array('success' => false,'message' => $e->getMessage()),200); 
        }
    }

    public function maprejectedWorkOrder(Request $request)
    {
        try
        {
            $workOrderId = $request->workOrderId;
            $remarks = $request->input('remarks');
            
            $processId = DB::table('wo_processstep')->where('processname', 'Map Creation')->first()->id;
            $statusCode = DB::table('wo_status')->where('description', 'MapCreation - QC Rejected')->first()->code;
            
            $preStatusCode = DB::table('wo_status')->where('description', 'Map Creation in-progress')->first()->code;
            
            $preUserId = DB::table('wo_workorder_status')
                            ->where('workorder_id', $workOrderId)
                            ->where('processstep_id', $processId)
                            ->where('status_code', $preStatusCode)
                          //  ->where('assigned_to_user_id', auth()->user()->id)
                            ->orderBy('id','DESC')
                            ->first()->assigned_by_user_id;

            $Remarks= new RemarksQc();
            $Remarks->workorder_id = $workOrderId;
            $Remarks->processstep_id = $processId;
            $Remarks->status_code = $statusCode;;
            $Remarks->remarks = $remarks;
            $Remarks->assigned_by = auth()->user()->id;
            $Remarks->assigned_at = Carbon::now();
            $Remarks->save(); 

            $workOrderStatus = new WorkOrderStatus();
            $workOrderStatus->workorder_id = $workOrderId;
            $workOrderStatus->processstep_id = $processId;
            $workOrderStatus->status_code = $statusCode;
            $workOrderStatus->assigned_by_user_id = auth()->user()->id;
            $workOrderStatus->assigned_to_user_id = $preUserId;
            $workOrderStatus->assigned_at = Carbon::now();
            $workOrderStatus->save();
            
            $workOrder = WorkOrder::where('id', $workOrderId)->first();
            $workOrder->processstep_id = $processId;
            $workOrder->status_code = $statusCode;
            $workOrder->assigned_to_user_id = $preUserId;
            $workOrder->update();
            
            return response()->json(array('success' => true),200);
        }
        catch (Exception $e)
        {
            return response()->json(array('success' => false,'message' => $e->getMessage()),200); 
        }  
    }
    public function index_Qcassign()
    {
        $user = auth()->user();
        $defaultuserId = $user->id;
        // Log::info(" default user id".$defaultuserId);
        $company = DB::table('wo_company')
        ->where('default_user_id', $defaultuserId)
        ->first();

        

        $workOrders = DB::table('wo_workorder as wo')
        ->Join('wo_processstep as ps', 'ps.id', '=', 'wo.processstep_id')
        ->Join('wo_status as ss', 'ss.code', '=', 'wo.status_code')
        ->Join('wo_workarea as wa', 'wa.id', '=', 'wo.workarea_id')
        ->Join('wo_workorder_status as wos', 'wos.workorder_id', '=', 'wo.id')

        ->where('ps.id',2)
        ->whereIn('ss.code', [110,113,114])
        ->where('wo.assigned_to_user_id', auth()->user()->id)
        ->select('wo.id as workorderid', 'wo.name as workordername',
            'ps.processname as processname', 'ss.description as description','ss.code as status_code',
            'wa.workarea_name as workarea_name')
        ->distinct('workorderid')
        ->get();


       
        
        return view('home_qc', compact('workOrders','company'));
    }
    
    public function index_MapQcassign()
    {
        $user = auth()->user();
        $defaultuserId = $user->id;
         Log::info(" default user id".$defaultuserId);
        $company = DB::table('wo_company')
        ->where('default_user_id', $defaultuserId)
        ->first();

        

        $workOrders = DB::table('wo_workorder as wo')
        ->Join('wo_processstep as ps', 'ps.id', '=', 'wo.processstep_id')
        ->Join('wo_status as ss', 'ss.code', '=', 'wo.status_code')
        ->Join('wo_workarea as wa', 'wa.id', '=', 'wo.workarea_id')
        ->Join('wo_workorder_status as wos', 'wos.workorder_id', '=', 'wo.id')
        ->whereIn('ss.code', [310,313,314])
        ->where('ps.id',4)
        ->where('wo.assigned_to_user_id', auth()->user()->id)
        ->select('wo.id as workorderid', 'wo.name as workordername',
            'ps.processname as processname', 'ss.description as description','ss.code as status_code',
            'wa.workarea_name as workarea_name')
        ->distinct('workorderid')
        ->get();
        Log::info($workOrders);
        //echo $workOrders;
            return view('home_mapqc', compact('workOrders','company'));
    }
	
    public function downloadFile(Request $request) {
      
        $filePath = $request->query('filePath');
        
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } 
        else {
            return response()->json(['error' => trans('words.filenotfound')], 404);
        }   
    } 
	
	public function get_files_for_survey(Request $request)
    {
		$workOrderId = $request->workOrderId;
				
		$basemap_path = DB::table('fd_drawing') 
						->select('file_path')
						->where('workorder_id', $workOrderId)
						->where('file_type', 3)
						->orderBy('id', 'DESC')
						->first();
						
		$surveymap_path = DB::table('fd_drawing') 
						->select('file_path')
						->where('workorder_id', $workOrderId)
						->where('file_type', 4)
						->orderBy('id', 'DESC')
						->first();
		
        return response()->json(array('success' => true,'basemap_path' => $basemap_path->file_path,'surveymap_path' => $surveymap_path->file_path),200); 
	} 
	
	public function get_last_preproductionfile(Request $request)
    {
		$workOrderId = $request->workOrderId;
		
		$drawing_path = DB::table('fd_qc as qc') 
						->select('file_path')
						->where('qc.workorder_id', $workOrderId)
						->orderBy('id', 'DESC')
						->first();
		
        return response()->json(array('success' => true,'file_path' => $drawing_path->file_path),200); 
	} 
	
    public function index_openqc(Request $request)
    {
		$workOrderId = $request->workOrderId;
		
		$workOrder = DB::table('wo_workorder as wo') 
						->where('wo.id', $workOrderId)
						->first();
		
		$drawing = DB::table('fd_qc as qc') 
						->where('qc.workorder_id', $workOrderId)
						->orderBy('id', 'DESC')
						->first();
		
        return view('Viewqcpre', compact('workOrder', 'drawing'));
	} 
	
	public function index_openmapqc(Request $request)
    {
		$workOrderId = $request->workOrderId;
		
		$workOrder = DB::table('wo_workorder as wo') 
						->where('wo.id', $workOrderId)
						->first();
		
		$drawing = DB::table('fd_qc as qc') 
						->where('qc.workorder_id', $workOrderId)
						->orderBy('id', 'DESC')
						->first();
		
        return view('Viewqcmap', compact('workOrder', 'drawing'));
	} 
    
    public function assignmapqc ($id)
    { 
        $companyname="Hemminger Data";

        $companies= Company::where('company_name', $companyname)
        ->select('*')
        ->first();
        $workOrder = DB::table('wo_workorder')->where('id',$id)->first();
       
       return view('laravel.workorder.mapqc', compact('workOrder','companies'));
    }

    public function index_userqcpre($id)
    {
       $companies= Company::latest()->get(); 

        $companyId = DB::table('wo_workorder as wo')
        ->Join('wo_company as wc', 'wc.default_user_id', '=', 'wo.assigned_to_user_id')
        ->where('wo.id',$id)
        ->select('wc.id as company_id')->first()->company_id;

        $qc = "QC";

        $roleId = DB::table('wo_user_role as ur')
           ->join('wo_role as r', 'ur.roleid', '=', 'r.id')
           ->where('r.role_name', $qc)
           ->value('ur.roleid');

        $userIds = DB::table('wo_user_role')
            ->where('roleid', $roleId)
            ->pluck('userid');
                 
        $userList = User::where('companyid', $companyId)
            ->whereIn('id', $userIds)
            ->get();

        $workOrder = DB::table('wo_workorder')->where('id',$id)->first();

       return view('laravel.workorder.assigntouserqcprecreation', compact('userList','workOrder'));
    }

    public function assignToUserqcpreCreationPost(Request $request)
    {
        try
        {
            $workOrderId = $request->workOrderId;

            $assignedToUserId = $request->assignedToUserId;

            $processId = DB::table('wo_processstep')->where('processname', 'Pre-Production')->first()->id;
            $statusCode = DB::table('wo_status')->where('description', 'Preproduction - QC assign to user')->first()->code;

            $workOrderStatus = new WorkOrderStatus();
            $workOrderStatus->workorder_id = $workOrderId;
            $workOrderStatus->processstep_id = $processId;
            $workOrderStatus->status_code = $statusCode;
            $workOrderStatus->assigned_by_user_id = auth()->user()->id;
            $workOrderStatus->assigned_to_user_id = $assignedToUserId;
            $workOrderStatus->assigned_at = Carbon::now();
            $workOrderStatus->save();

            $workOrder = WorkOrder::where('id', $workOrderId)->first();
            $workOrder->processstep_id = $processId;
            $workOrder->status_code = $statusCode;
            $workOrder->assigned_to_user_id = $assignedToUserId;
            $workOrder->update();

            return response()->json(array('success' => true),200);
        }
        catch (Exception $e)
        {
            return response()->json(array('success' => false,'message' => $e->getMessage()),200);
        }
    }

    public function assignqcmodel($id)
    {
       

        $companyname="Hemminger Data";

        $companies= Company::where('company_name', $companyname)
        ->select('*')
        ->first();

        $workOrder = DB::table('wo_modelarea_status')->where('id',$id)->first();

       
       return view('laravel.modelcreation.modelqc', compact('workOrder','companies'));
    }
    
    public function index_ModelQcassign()
    {
        $user = auth()->user();
        $defaultuserId = $user->id;
    
        // Fetch the company associated with the default user
        $company = DB::table('wo_company')
            ->where('default_user_id', $defaultuserId)
            ->first();
    
        // Fetch all unique work orders with the relevant conditions
        $workOrders = DB::table('wo_modelarea_status as mo')
            ->join('wo_modelarea as moo', 'moo.id', '=', 'mo.modelarea_id')
            ->join('wo_modelarea_workorder as mw', 'mo.modelarea_id', '=', 'mw.modelarea_id')
            ->join('wo_processstep as ps', 'ps.id', '=', 'mo.processstep_id')
            ->join('wo_status as ss', 'ss.code', '=', 'mo.status_code')
            ->where('mo.processstep_id', 5)
            ->where('mo.assigned_to_user_id', $defaultuserId)
            ->whereIn('mo.status_code', [410, 413, 414])
            ->select(
                'moo.name as modelareaname',
                'mo.workorder_id as workorder_id',
                'moo.id as modelarea_id',
                'ps.processname as processname',
                'ss.description as description',
                'ss.code as status_code',
                'mo.processstep_id',
                'mo.status_code',
                'mo.model_workorder_name'
            )
            ->distinct()  // Ensure unique records based on selected columns
            ->get();
    
        // Pass the retrieved data to the view
        return view('home_modelqc', compact('workOrders', 'company'));
    }

    public function index_userqcmodel($id,$workid)
{
   // Log::info($id);
   // Log::info($workid);
    $companies = Company::latest()->get();
   // $companies= Company::latest()->get(); 

        // $companyId = DB::table('wo_workorder as wo')
        // ->Join('wo_company as wc', 'wc.default_user_id', '=', 'wo.assigned_to_user_id')
        // ->where('wo.id',$workid)
        // ->select('wc.id as company_id')->first()->company_id;

        $companyId = DB::table('wo_company as wo')
        
        ->where('wo.default_user_id',auth()->user()->id)
        ->select('wo.id as company_id')->first()->company_id;

    // Retrieve the first relevant work order status
    $workOrder = DB::table('wo_modelarea_status as mo')
        ->where('modelarea_id', $id)
        ->where('workorder_id', $workid)
        ->first();

            //Log::info("modelareaid: " . json_encode($workorder));
    
    if ($workOrder) {
        $workorder_id = $workOrder->workorder_id; 

      
        $companyRecord = DB::table('wo_workorder as wo')
            ->join('wo_company as wc', 'wc.default_user_id', '=', 'wo.assigned_to_user_id')
            ->where('wo.id', $workid)
            ->select('wc.id as company_id')
            ->first();
        
        // if ($companyRecord) {
        //     $companyId = $companyRecord->company_id;  // Access company_id
        // } else {
        //     // Handle case where no company is found
        //     return redirect()->back()->withErrors('No company found for the given work order.');
        // }
    } else {
        // Handle the case where no work order was found
        return redirect()->back()->withErrors('No work order found for the given model area.');
    }
    
    $qc = "QC";
    $roleId = DB::table('wo_user_role as ur')
        ->join('wo_role as r', 'ur.roleid', '=', 'r.id')
        ->where('r.role_name', $qc)
        ->value('ur.roleid');  

    // Fetch users based on company ID and role ID
    $userIds = DB::table('wo_user_role')
        ->where('roleid', $roleId)
        ->pluck('userid');
        $userList = User::where('companyid', $companyId)
        ->whereIn('id', $userIds)
        ->get();
      //  $workOrder = $workorder->model_workorder_name; 
    // $workOrder = DB::table('wo_workorder')
    //     ->where('id', $workorder_id)
    //     ->distinct()  // Ensure unique records
    //     ->first();

    // Pass the user list and work order to the view
    return view('laravel.modelcreation.assigntouserqcmodel', compact('userList', 'workOrder'));
}

    public function assignToUserqcmodelCreationPost(Request $request)
    {
        try
        {
            Log::info($request);
            $modelareaIds = $request->workOrderId;
            $assignedToUserId = $request->assignedToUserId;

            $workOrderId = DB::table('wo_modelarea_status')->where('id', $modelareaIds)->first()->workorder_id;
            $modelareaId = DB::table('wo_modelarea_status')->where('id', $modelareaIds)->first()->modelarea_id;
            $processId = DB::table('wo_processstep')->where('processname', 'Model Creation')->first()->id;
            $statusCode = DB::table('wo_status')->where('description', 'Model Creation - QC assign to user')->first()->code;

            $workOrderStatus = new WorkOrderStatus();
            $workOrderStatus->workorder_id = $workOrderId;
            $workOrderStatus->processstep_id = $processId;
            $workOrderStatus->status_code = $statusCode;
            $workOrderStatus->assigned_by_user_id = auth()->user()->id;
            $workOrderStatus->assigned_to_user_id = $assignedToUserId;
            $workOrderStatus->assigned_at = Carbon::now();
            $workOrderStatus->save();
            
            // $workOrder = WorkOrder::where('id', $workOrderId)->first();
            // $workOrder->processstep_id = $processId;
            // $workOrder->status_code = $statusCode;
            // $workOrder->assigned_to_user_id = $assignedToUserId;
            // $workOrder->update();


            $ModelStatus = ModelStatus::where('id', $modelareaIds)->first();
    
            // Check if ModelStatus is found
            if (!$ModelStatus) {
                return response()->json(['success' => false, 'message' => @trans('words.modelstatusnotfound')], 200);
            }
    
            // Update the ModelStatus
            $ModelStatus->processstep_id = $processId;
            $ModelStatus->status_code = $statusCode;       
            $ModelStatus->workorder_id = $workOrderId;
            $ModelStatus->assigned_by_user_id = auth()->user()->id;
            $ModelStatus->assigned_to_user_id = $assignedToUserId;
    
            // Save the updated record
            $ModelStatus->update();
    
            $ModelStatusdetails =new ModelStatusDetails();
            $ModelStatusdetails->modelarea_id = $modelareaIds;
            $ModelStatusdetails->workorder_id = $workOrderId;
            $ModelStatusdetails->processstep_id = $processId;
            $ModelStatusdetails->status_code = $statusCode;
            $ModelStatusdetails->assigned_by_user_id = auth()->user()->id;
            $ModelStatusdetails->assigned_to_user_id = $assignedToUserId;
    
            // Save the updated record
            $ModelStatusdetails->save();
            return response()->json(['success' => true], 200);
            return response()->json(array('success' => true),200);
        }
        catch (Exception $e)
        {
            return response()->json(array('success' => false,'message' => $e->getMessage()),200); 
        } 
    }

    public function get_last_modelqcfile(Request $request)
    {
      //  $workOrderId = $request->workOrderId;
        $modelareaId = $request->workOrderId;
        $assignedToUserId = $request->assignedToUserId;
        $workOrderId = DB::table('wo_modelarea_status')->where('id', $modelareaId)->first()->workorder_id;
        // Fetch the last two file paths from the database
        $drawing_paths = DB::table('fd_qc as qc')
                            ->select('file_path')
                            ->where('qc.workorder_id', $workOrderId)
                            ->orderBy('id', 'DESC')
                            ->limit(2) 
                            ->get();
    
        // Extract the file paths
        $file_paths = $drawing_paths->pluck('file_path');
    
        return response()->json(array('success' => true, 'file_paths' => $file_paths), 200);
    } 

    public function startModelqcPost(Request $request)
    {
        try
        {
            $modelareaId = $request->workId;

            $workOrderId =$request->workorderid;
            $processId = DB::table('wo_processstep')->where('processname', 'Model Creation')->first()->id;
            $statusCode = DB::table('wo_status')->where('description', 'Model Creation - QC in Progress')->first()->code;
            
            $workOrderStatus = new WorkOrderStatus();
            $workOrderStatus->workorder_id = $workOrderId;
            $workOrderStatus->processstep_id = $processId;
            $workOrderStatus->status_code = $statusCode;
            $workOrderStatus->assigned_by_user_id = auth()->user()->id;
            $workOrderStatus->assigned_to_user_id = auth()->user()->id;
            $workOrderStatus->assigned_at = Carbon::now();
            $workOrderStatus->save();
            
            // $workOrder = WorkOrder::where('id', $workOrderId)->first();
            // $workOrder->processstep_id = $processId;
            // $workOrder->status_code = $statusCode;
            // $workOrder->assigned_to_user_id = auth()->user()->id;
            // $workOrder->update();
            


            $ModelStatus = ModelStatus::where('modelarea_id', $modelareaId)->where('workorder_id', $workOrderId)->first();
    
            // Check if ModelStatus is found
            if (!$ModelStatus) {
                return response()->json(['success' => false, 'message' =>  @trans('words.modelstatusnotfound')], 200);
            }
    
            // Update the ModelStatus
            $ModelStatus->processstep_id = $processId;
            $ModelStatus->status_code = $statusCode; 
            $ModelStatus->assigned_by_user_id = auth()->user()->id;
            $ModelStatus->assigned_to_user_id = auth()->user()->id;
            $ModelStatus->workorder_id = $workOrderId;
            // Save the updated record
            $ModelStatus->update();

            $ModelStatusdetails = new ModelStatusDetails();
            $ModelStatusdetails->modelarea_id = $modelareaId;
            $ModelStatusdetails->processstep_id = $processId;
            $ModelStatusdetails->status_code = $statusCode;
            $ModelStatusdetails->workorder_id = $workOrderId;
            $ModelStatusdetails->assigned_by_user_id = auth()->user()->id;
            $ModelStatusdetails->assigned_to_user_id = auth()->user()->id;
    
            // Save the updated record
            $ModelStatusdetails->save();
            return response()->json(array('success' => true),200);
        }
        catch (Exception $e)
        {
            return response()->json(array('success' => false,'message' => $e->getMessage()),200); 
        }
    }

    public function get_files_for_revits(Request $request)
    {
        Log::info($request);
       // $workOrderId = $request->workOrderId;
        $modelareaId = $request->workOrderId;
        $assignedToUserId = $request->assignedToUserId;
        $workOrderId = DB::table('wo_modelarea_status')->where('id', $modelareaId)->first()->workorder_id;
        $revitmap_path = DB::table('fd_qc') 
                        ->select('file_path')
                        ->where('workorder_id', $workOrderId)
                        ->where('file_type', 9)
                        ->orderBy('id', 'DESC')
                        ->first();
                        
        $ifcmap_path = DB::table('fd_qc') 
                        ->select('file_path')
                        ->where('workorder_id', $workOrderId)
                        ->where('file_type', 10)
                        ->orderBy('id', 'DESC')
                        ->first();
        
        return response()->json(array('success' => true,'revitmap_path' => $revitmap_path->file_path,'ifcmap_path' => $ifcmap_path->file_path),200); 
    }
    public function get_files_for_revit(Request $request)
    {
        Log::info($request);
       // $workOrderId = $request->workOrderId;
        $modelareaId = $request->workOrderId;
        $assignedToUserId = $request->assignedToUserId;
        $workOrderId = DB::table('wo_modelarea_status')->where('modelarea_id', $modelareaId)->first()->workorder_id;
        $revitmap_path = DB::table('fd_qc') 
                        ->select('file_path')
                        ->where('workorder_id', $workOrderId)
                        ->where('file_type', 9)
                        ->orderBy('id', 'DESC')
                        ->first();
                        
        $ifcmap_path = DB::table('fd_qc') 
                        ->select('file_path')
                        ->where('workorder_id', $workOrderId)
                        ->where('file_type', 10)
                        ->orderBy('id', 'DESC')
                        ->first();
        
        return response()->json(array('success' => true,'revitmap_path' => $revitmap_path->file_path,'ifcmap_path' => $ifcmap_path->file_path),200); 
    }

    public function index_openmodelqc(Request $request)
    {
        Log::info($request);
        $modelareaId = $request->workId;

        $assignedToUserId = $request->assignedToUserId;
        $workOrderId = $request->workorderid;
        // $workOrder = DB::table('wo_workorder as wo') 
        //                 ->where('wo.id', $workOrderId)
        //                 ->first();
                $workOrder = DB::table('wo_modelarea_status as wo') 
                        ->where('wo.workorder_id', $workOrderId)
                        ->where('wo.modelarea_id', $modelareaId)
                        ->first();

        $drawing = DB::table('fd_qc as qc') 
                        ->where('qc.workorder_id', $workOrderId)
                        ->orderBy('id', 'DESC')
                        ->first();
        
       
        
        return view('viewqcmodel', compact('workOrder', 'drawing'));
    } 

    public function modelapproveWorkOrder(Request $request)
    {
        try
        {
            $modelareaId = $request->workOrderId;
            $remarks = $request->input('remarks');
            $workOrderId = DB::table('wo_modelarea_status')->where('id', $modelareaId)->first()->workorder_id;
            $processId = DB::table('wo_processstep')->where('processname', 'Model Creation')->first()->id;
            $statusCode = DB::table('wo_status')->where('description', 'Model Creation - QC Approved')->first()->code;
            
            $preStatusCode = DB::table('wo_status')->where('description', 'Model Creation in-progress')->first()->code;
            
            $preUserId = DB::table('wo_workorder_status')
                            ->where('workorder_id', $workOrderId)
                            ->where('processstep_id', $processId)
                            ->where('status_code', 410)
                            //->where('assigned_to_user_id', auth()->user()->id)
                            ->orderBy('id','DESC')
                            ->first()->assigned_by_user_id;


            $Remarks= new RemarksQc();
            $Remarks->workorder_id = $workOrderId;
            $Remarks->processstep_id = $processId;
            $Remarks->status_code = $statusCode;;
            $Remarks->remarks = $remarks;
            $Remarks->assigned_by = auth()->user()->id;
            $Remarks->assigned_at = Carbon::now();
            $Remarks->save();           
            
            $workOrderStatus = new WorkOrderStatus();
            $workOrderStatus->workorder_id = $workOrderId;
            $workOrderStatus->processstep_id = $processId;
            $workOrderStatus->status_code = $statusCode;
            $workOrderStatus->assigned_by_user_id = auth()->user()->id;
            $workOrderStatus->assigned_to_user_id = $preUserId;
            $workOrderStatus->assigned_at = Carbon::now();
            $workOrderStatus->save();
            
            // $workOrder = WorkOrder::where('id', $workOrderId)->first();
            // $workOrder->processstep_id = $processId;
            // $workOrder->status_code = $statusCode;
            // $workOrder->assigned_to_user_id = $preUserId;
            // $workOrder->update();
            

            $Remarks= new ModelQcRemark();
            $Remarks->modelarea_id = $modelareaId;
            $Remarks->processstep_id = $processId;
            $Remarks->status_code = $statusCode;;
            $Remarks->remarks = $remarks;
            $Remarks->assigned_by = auth()->user()->id;
            $Remarks->assigned_at = Carbon::now();
            $Remarks->save();           
            
       
            $ModelStatus = ModelStatus::where('id', $modelareaId)->first();
    
            // Check if ModelStatus is found
            if (!$ModelStatus) {
                return response()->json(['success' => false, 'message' =>  @trans('words.modelstatusnotfound')], 200);
            }
         
            // Update the ModelStatus
            $ModelStatus->processstep_id = $processId;
            $ModelStatus->status_code = $statusCode; // Assuming you want to save the code, not the object
            $ModelStatus->assigned_by_user_id = auth()->user()->id;
            $ModelStatus->assigned_to_user_id =  $preUserId;
    
            // Save the updated record
            $ModelStatus->update();

            $ModelStatusdetails = new ModelStatusDetails();
            $ModelStatusdetails->modelarea_id = $modelareaId;
            $ModelStatusdetails->processstep_id = $processId;
            $ModelStatusdetails->status_code = $statusCode;
            $ModelStatusdetails->assigned_by_user_id = auth()->user()->id;
            $ModelStatusdetails->assigned_to_user_id =  $preUserId;
    
            // Save the updated record
            $ModelStatusdetails->save();
            return response()->json(array('success' => true),200);
        }
        catch (Exception $e)
        {
            return response()->json(array('success' => false,'message' => $e->getMessage()),200); 
        }
        
        
    }

    public function modelrejectedWorkOrder(Request $request)
    {
        try
        {
            Log::info('req approve'.$request);
            $modelareaIds = $request->workOrderId;
            $workOrderId = DB::table('wo_modelarea_status')->where('id', $modelareaIds)->first()->workorder_id;
            $modelareaId = DB::table('wo_modelarea_status')->where('id', $modelareaIds)->first()->modelarea_id;
            $remarks = $request->input('remarks');
            
            $processId = DB::table('wo_processstep')->where('processname', 'Model Creation')->first()->id;
            $statusCode = DB::table('wo_status')->where('description', 'Model Creation - QC Rejected')->first()->code;
            
            $preStatusCode = DB::table('wo_status')->where('description', 'Model Creation in-progress')->first()->code;
            
            $preUserId = DB::table('wo_model_status_details')
                            ->where('workorder_id', $workOrderId)
                            ->where('processstep_id', $processId)
                            ->where('status_code', $preStatusCode)
                           // ->where('assigned_to_user_id', auth()->user()->id)
                            ->orderBy('id','DESC')
                            ->first()->assigned_by_user_id;

            Log::info("Reject workorder in qc".$preUserId );

            $Remarks= new RemarksQc();
            $Remarks->workorder_id = $workOrderId;
            $Remarks->processstep_id = $processId;
            $Remarks->status_code = $statusCode;;
            $Remarks->remarks = $remarks;
            $Remarks->assigned_by = auth()->user()->id;
            $Remarks->assigned_at = Carbon::now();
            $Remarks->save();  

            $workOrderStatus = new WorkOrderStatus();
            $workOrderStatus->workorder_id = $workOrderId;
            $workOrderStatus->processstep_id = $processId;
            $workOrderStatus->status_code = $statusCode;
            $workOrderStatus->assigned_by_user_id = auth()->user()->id;
            $workOrderStatus->assigned_to_user_id = $preUserId;
            $workOrderStatus->assigned_at = Carbon::now();
            $workOrderStatus->save();
            
            // $workOrder = WorkOrder::where('id', $workOrderId)->first();
            // $workOrder->processstep_id = $processId;
            // $workOrder->status_code = $statusCode;
            // $workOrder->assigned_to_user_id = $preUserId;
            // $workOrder->update();

            $Remarks= new ModelQcRemark();
            $Remarks->modelarea_id = $modelareaId;
            $Remarks->processstep_id = $processId;
            $Remarks->status_code = $statusCode;;
            $Remarks->remarks = $remarks;
            $Remarks->assigned_by = auth()->user()->id;
            $Remarks->assigned_at = Carbon::now();
            $Remarks->save();           
            
            Log::info($Remarks);
       
            $ModelStatus = ModelStatus::where('id', $modelareaIds)->first();
    
            // Check if ModelStatus is found
            if (!$ModelStatus) {
                return response()->json(['success' => false, 'message' =>  @trans('words.modelstatusnotfound')], 200);
            }
           // $assigned_to_user_id=28;
            // Update the ModelStatus
            $ModelStatus->processstep_id = $processId;
            $ModelStatus->status_code = $statusCode; 
            $ModelStatus->workorder_id =  $workOrderId;
            $ModelStatus->assigned_by_user_id = auth()->user()->id;
            $ModelStatus->assigned_to_user_id =  $preUserId;
    
            // Save the updated record
            $ModelStatus->update();

            $ModelStatusdetails = new ModelStatusDetails();
            $ModelStatusdetails->modelarea_id = $modelareaIds;
            $ModelStatusdetails->processstep_id = $processId;
            $ModelStatusdetails->status_code = $statusCode;
            $ModelStatusdetails->workorder_id =  $workOrderId;
            $ModelStatusdetails->assigned_by_user_id = auth()->user()->id;
            $ModelStatusdetails->assigned_to_user_id = $preUserId;
    
            // Save the updated record
            $ModelStatusdetails->save();
            
            return response()->json(array('success' => true),200);
        }
        catch (Exception $e)
        {Log::info("poda ");
            return response()->json(array('success' => false,'message' => $e->getMessage()),200); 
        } 
    }

    public function get_last_modelingfile(Request $request)
    {
        $workOrderId = $request->workOrderId;
        
        
        $drawing_path = DB::table('fd_qc as qc') 
                        ->select('file_path')
                        ->where('qc.workorder_id', $workOrderId)
                        ->orderBy('id', 'DESC')
                        ->first();
        
        return response()->json(array('success' => true,'file_path' => $drawing_path->file_path),200); 
    }  

    public function get_last_preqcfile(Request $request)
    {
        $workOrderId = $request->workOrderId;
        
        $drawing_path = DB::table('fd_qc as qc') 
                        ->select('file_path')
                        ->where('qc.workorder_id', $workOrderId)
                        ->orderBy('id', 'DESC')
                        ->first();
        
        return response()->json(array('success' => true,'file_path' => $drawing_path->file_path),200); 
    } 

    public function startPreqcPost(Request $request)
    {
        try
        {
            $workOrderId = $request->workOrderId;
            
            $processId = DB::table('wo_processstep')->where('processname', 'Pre-Production')->first()->id;
            $statusCode = DB::table('wo_status')->where('description', 'Preproduction - QC in Progress')->first()->code;
            
            $workOrderStatus = new WorkOrderStatus();
            $workOrderStatus->workorder_id = $workOrderId;
            $workOrderStatus->processstep_id = $processId;
            $workOrderStatus->status_code = $statusCode;
            $workOrderStatus->assigned_by_user_id = auth()->user()->id;
            $workOrderStatus->assigned_to_user_id = auth()->user()->id;
            $workOrderStatus->assigned_at = Carbon::now();
            $workOrderStatus->save();
            
            $workOrder = WorkOrder::where('id', $workOrderId)->first();
            $workOrder->processstep_id = $processId;
            $workOrder->status_code = $statusCode;
            $workOrder->assigned_to_user_id = auth()->user()->id;
            $workOrder->update();
            
            return response()->json(array('success' => true),200);
        }
        catch (Exception $e)
        {
            return response()->json(array('success' => false,'message' => $e->getMessage()),200); 
        }
    }

    public function startMapqcPost(Request $request)
    {
        try
        {
            $workOrderId = $request->workOrderId;
            
            $processId = DB::table('wo_processstep')->where('processname', 'Map Creation')->first()->id;
            $statusCode = DB::table('wo_status')->where('description', 'MapCreation - QC in Progress')->first()->code;
            
            $workOrderStatus = new WorkOrderStatus();
            $workOrderStatus->workorder_id = $workOrderId;
            $workOrderStatus->processstep_id = $processId;
            $workOrderStatus->status_code = $statusCode;
            $workOrderStatus->assigned_by_user_id = auth()->user()->id;
            $workOrderStatus->assigned_to_user_id = auth()->user()->id;
            $workOrderStatus->assigned_at = Carbon::now();
            $workOrderStatus->save();
            
            $workOrder = WorkOrder::where('id', $workOrderId)->first();
            $workOrder->processstep_id = $processId;
            $workOrder->status_code = $statusCode;
            $workOrder->assigned_to_user_id = auth()->user()->id;
            $workOrder->update();
            
            return response()->json(array('success' => true),200);
        }
        catch (Exception $e)
        {
            return response()->json(array('success' => false,'message' => $e->getMessage()),200); 
        }
    }
    
    public function restartMapcreationPost(Request $request)
    {
        try
        {
            $workOrderId = $request->workOrderId;
            
            $processId = DB::table('wo_processstep')->where('processname', 'Map Creation')->first()->id;
            $statusCode = DB::table('wo_status')->where('description', 'Map Creation - Reassign')->first()->code;
            
            $workOrderStatus = new WorkOrderStatus();
            $workOrderStatus->workorder_id = $workOrderId;
            $workOrderStatus->processstep_id = $processId;
            $workOrderStatus->status_code = $statusCode;
            $workOrderStatus->assigned_by_user_id = auth()->user()->id;
            $workOrderStatus->assigned_to_user_id = auth()->user()->id;
            $workOrderStatus->assigned_at = Carbon::now();
            $workOrderStatus->save();
            
            $workOrder = WorkOrder::where('id', $workOrderId)->first();
            $workOrder->processstep_id = $processId;
            $workOrder->status_code = $statusCode;
            $workOrder->assigned_to_user_id = auth()->user()->id;
            $workOrder->update();
            
            return response()->json(array('success' => true),200);
        }
        catch (Exception $e)
        {
            return response()->json(array('success' => false,'message' => $e->getMessage()),200); 
        }
    }
    

    public function restartPreproductionPost(Request $request)
    {
        try
        {
            $workOrderId = $request->workOrderId;
            
            $processId = DB::table('wo_processstep')->where('processname', 'Pre-Production')->first()->id;
            $statusCode = DB::table('wo_status')->where('description', 'Pre-production Reassign')->first()->code;
            
            $workOrderStatus = new WorkOrderStatus();
            $workOrderStatus->workorder_id = $workOrderId;
            $workOrderStatus->processstep_id = $processId;
            $workOrderStatus->status_code = $statusCode;
            $workOrderStatus->assigned_by_user_id = auth()->user()->id;
            $workOrderStatus->assigned_to_user_id = auth()->user()->id;
            $workOrderStatus->assigned_at = Carbon::now();
            $workOrderStatus->save();
            
            $workOrder = WorkOrder::where('id', $workOrderId)->first();
            $workOrder->processstep_id = $processId;
            $workOrder->status_code = $statusCode;
            $workOrder->assigned_to_user_id = auth()->user()->id;
            $workOrder->update();
            
            return response()->json(array('success' => true),200);
        }
        catch (Exception $e)
        {
            return response()->json(array('success' => false,'message' => $e->getMessage()),200); 
        }
    }

}
