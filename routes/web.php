<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPassword;
use App\Http\Controllers\Auth\ChangePassword;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProjectController;

use App\Http\Controllers\LeaveController;


use App\Http\Controllers\UserWorkController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\UpdateController;
use App\Http\Controllers\TaskController;

/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/



Route::get('/', function () {

	return redirect('/login');

})->middleware('auth');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');

Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');

Route::get('file-upload', [FileUploadController::class,'fileUpload'])->name('file.upload');
Route::post('file-upload', [FileUploadController::class,'fileUploadPost'])->name('file.upload.post');
Route::post('file-upload-survey', [FileUploadController::class,'fileUploadPostSurvey'])->name('file.upload.postsurvey');

Route::get('/surveyupload/{id}', [SurveyController::class, 'index'])->name('surveyupload');
Route::get('/mapcreationupload/{id}', [MapCreationController::class, 'index'])->name('mapcreationupload');
Route::post('/validatepktfile', [ImportController::class, 'validatepktfile'])->name('validatepktfile');

Route::get('/http_req_bauwerk', [ObjectController::class, 'getObjectFieldValues'])->name('http_req_bauwerk');
Route::get('/http_req_object', [ObjectController::class, 'getObjectStructure'])->name('http_req_object');
Route::post('/addobjectfield', [ObjectController::class, 'addObjectField'])->name('addobjectfield');
Route::get('/test1/{name}/{wordorderid}', [ObjectController::class, 'test1'])->name('test1');
Route::get('/getImageList', [ObjectController::class, 'getImageList'])->name('getImageList');
Route::post('/removeobjectfield', [ObjectController::class, 'removeObjectField'])->name('removeobjectfield');
Route::post('file.upload.ObjTemplate', [FileUploadController::class,'fileUploadObjTemplate'])->name('file.upload.ObjTemplate');

Route::get('/object_template_upload', [ObjectController::class, 'object_template_upload'])->name('object_template_upload');
Route::post('/object_template_process_attributes', [FileUploadController::class, 'ProcessObjectTemplateAttributes'])->name('object_template_process_attributes');

Route::get('create_tables', [ObjectController::class, 'createtables'])->name('create_tables');
Route::post('uploadpktdata', [ObjectController::class, 'uploadpktdata'])->name('uploadpktdata');
Route::get('test', [ObjectController::class, 'test'])->name('test');

Route::post('file.upload.workorderIVL', [FileUploadController::class,'fileUploadIVLFile'])->name('file.upload.workorderIVL');
Route::post('file.upload.dwgForSurvey', [FileUploadController::class,'fileUploadDwgForSurvey'])->name('file.upload.dwgForSurvey');
Route::post('file.upload.dwgForMapCreation', [FileUploadController::class,'fileUploadDwgForMapCreation'])->name('file.upload.dwgForMapCreation');

Route::post('file.upload.workorderPKT', [FileUploadController::class,'fileUploadWorkorderPKT'])->name('file.upload.workorderPKT');
Route::post('file.upload.workorderLNE', [FileUploadController::class,'fileUploadWorkorderLNE'])->name('file.upload.workorderLNE');

// Route::get('/localization/{lang?}','LanguageController@index');
Route::get('/localization/{lang?}',[LanguageController::class, 'index'])->name('localization');

Route::group(['middleware' => 'auth'], function () {
    
	// Route::get('/home', [HomeController::class, 'index'])->name('home');
	Route::get('/home_attendance', [HomeController::class, 'index_attendance'])->name('home_attendance');
	
	Route::get('/projectview', [ProjectController::class, 'index'])->name('projectview');
	Route::get('/viewproject/{id}', [ProjectController::class, 'viewproject'])->name('viewproject');
	// Route::get('/updateproject/{id}', [ProjectController::class, 'updateproject'])->name('updateproject');
	Route::post('/assigntasktouser', [ProjectController::class, 'assigntasktouser'])->name('assigntasktouser');
	Route::post('/assigntasktousers', [ProjectController::class, 'assigntasktousers'])->name('assigntasktousers');
	Route::get('/updateuserproject/{id}', [ProjectController::class, 'updateuserproject'])->name('updateuserproject');
	// Route::get('/addtasks', [ProjectController::class, 'addtasks'])->name('addtasks');
// Route::post('/store-task', [ProjectController::class, 'addtasks'])->name('tasks.store');
Route::post('/store-project', [ProjectController::class, 'addtasks'])->name('store-project');
Route::post('/store-task', [ProjectController::class, 'addtasks'])->name('tasks.store');
Route::post('/project.store', [ProjectController::class, 'storeProjectWithTasks'])->name('project.store');
// Route::post('/assign-task-to-user', [ProjectController::class, 'assignTaskToUser']);

Route::get('taskupdate/{id}', [ProjectController::class, 'updateuserproject'])->name('taskupdate');

Route::get('/get_latest_project_code', [ProjectController::class, 'getLatestProjectCode'])->name('get_latest_project_code');;

// ------->ramesh

Route::get('/user_details', [UserController::class, 'user_details'])->name('user_details');
Route::get('/adduser', [UserController::class, 'adduser'])->name('adduser');
// Route::post('/saveuser', [UserController::class, 'saveuser'])->name('saveuser');
// GET route to show user details for editing
Route::post('/saveuser', [UserController::class, 'saveuser'])->name('saveuser');

Route::get('checkid/{id}', [UserController::class, 'checkid'])->name('checkid');
Route::post('/updateuser/{id}', [UserController::class, 'updateUser'])->name('updateuser');

// -------->end

//---->loganathan
Route::get('/attendance_store/{id}', [HomeController::class, 'attendanceStore'])->name('attendance_store');
    Route::post('/checkin', [HomeController::class, 'attendanceStore'])->name('checkin');
    Route::get('/attendance_store/{id}', [HomeController::class, 'attendanceStore'])->name('attendance_store');
    Route::get('/attendance_update/{id}', [HomeController::class, 'attendanceUpdate'])->name('attendance_update');
    Route::post('/checkin', [HomeController::class, 'attendanceStore'])->name('checkin');

Route::get('/home', [HomeController::class, 'showPage'])->name('home');

Route::get('/home_user', [HomeController::class, 'index'])->name('home_user');
//------->end
Route::get('/update',[UpdateController::class,'update'])->middleware('auth');
Route::put('/updates/{id}', [UserController::class, 'updates'])->name('updates');
	// Route::put('/updates_user', [UserController::class, 'updates_user'])->name('updates_user');
	// Route::put('/updates_users', [UserController::class, 'updates_user'])->name('updates_users');
	Route::post('/updates_users', [UserController::class, 'updates_user'])->name('updates_users');

//-krishna
Route::get('/updateproject/{id}', [TaskController::class, 'updateproject'])->name('updateproject');

Route::post('/save-task', [TaskController::class, 'saveTask']);
//
Route::get('/task/details/{taskId}', [TaskController::class, 'getTaskDetails']);
Route::post('/task/update/{taskId}', [TaskController::class, 'updateTask']);
Route::post('/update-task-action', [ProjectController::class, 'updateTaskAction'])->name('update-task-action');
Route::post('/update-user-action', [UserController::class, 'updateuserAction'])->name('update-user-action');
Route::get('/viewuser/{id}', [UserController::class, 'viewUser'])->name('viewuser');

Route::get('/home_Project', [HomeController::class, 'index_project'])->name('home_Project');
Route::post('/save-duration', [HomeController::class, 'saveDuration'])->name('save-duration');

//-->end
//==?santhosh
Route::get('checkuserid/{id}', [UserController::class, 'checkuserid'])->name('checkuserid');
Route::get('/attendance/{date}', [LeaveController::class, 'getAttendanceByDate']);

Route::post('/leave', [LeaveController::class, 'store'])->name('leave.store');
Route::get('/leave', [LeaveController::class, 'index']);

Route::get('/fetch-leaves', [LeaveController::class, 'getLeaves'])->name('fetch-leaves');

Route::post('/task/update', [TaskController::class, 'updateTask'])->name('task.update');

Route::get('/attendance', [LeaveController::class, 'Attendanceindex']);


Route::get('/attendance/{date}', [LeaveController::class, 'getAttendanceByDate']);

Route::post('/delete-leave', [LeaveController::class, 'deleteLeave'])->name('delete.leave');
Route::post('/task/update', [TaskController::class, 'updateTask'])->name('task.update');
//----end





	
	Route::post('/attendance', [WorkOrderController::class, 'store'])->name('attendance.store');
	Route::post('/wo_create-store', [ObjectController::class, 'save_objects'])->name('wo_create-store');
	
   

////krish

    Route::post('/wo_create', [WorkOrderController::class, 'store'])->name('wo_create.store');


	Route::post('/project/deactivate/{id}', action: [ProjectController::class, 'deactivate'])->name('project.deactivate');


/////end

////riyas


Route::put('/project/{id}', [ProjectController::class, 'update'])->name('project.update');


///end
////sharan

Route::get('/projectDetailsPage1', [ProjectController::class, 'detail'])->name('projectDetailsPage1');

	// Route::get('/showproject/{id}', [ProjectController::class, 'showproject'])->name('showproject');
    // Route::get('/shows_Project', [HomeController::class, 'index_project'])->name('shows_Project');


	Route::get('/projectDetailsPage', [ProjectController::class, 'details'])->name('projectDetailsPage');
    Route::get('/attendance_update/{id}', [HomeController::class, 'attendanceUpdate'])->name('attendance_update');
    Route::get('/showproject/{id}', [ProjectController::class, 'showproject'])->name('showproject');
    Route::get('/shows_Project', [HomeController::class, 'index_project'])->name('shows_Project');


////end






	// Route::get('/localization/{lang?}',[LanguageController::class, 'index'])->name('localization');
    // Route::get('/home', [HomeController::class, 'index'])->name('home');
	Route::get('/vieworder/{id}', [HomeController::class, 'viewOrder'])->name('vieworder');
	Route::get('/assignToPreproduction/{id}', [HomeController::class, 'assignToPreproduction'])->name('assignToPreproduction');
	
	Route::get('/home_preproduction', [HomeController::class, 'index_PreProduction'])->name('home_preproduction');
	Route::get('/assignToUserPreproduction/{id}', [HomeController::class, 'assignToUserPreproduction'])->name('assignToUserPreproduction');
	Route::post('/assignToUserPreproductionPost', [HomeController::class, 'assignToUserPreproductionPost'])->name('assignToUserPreproductionPost');
	Route::post('/startPreproductionPost', [HomeController::class, 'startPreproductionPost'])->name('startPreproductionPost');
	Route::get('/completePreproduction/{id}', [HomeController::class, 'completePreproduction'])->name('completePreproduction');
	Route::post('/completePreproductionPost', [HomeController::class, 'completePreproductionPost'])->name('completePreproductionPost');
	Route::get('/reassignPreproduction/{id}', [HomeController::class, 'reassignPreproduction'])->name('reassignPreproduction');
	Route::post('/reassignPreproductionPost', [HomeController::class, 'reassignPreproductionPost'])->name('reassignPreproductionPost');
	Route::get('/download', [HomeController::class, 'getDownload'])->name('download');
	
	Route::get('/home_survey', [SurveyController::class, 'index_Survey'])->name('home_survey');
	Route::get('/assignToSurvey/{id}', [SurveyController::class, 'assignToSurvey'])->name('assignToSurvey');
	Route::post('/assignToSurveyPost', [SurveyController::class, 'assignToSurveyPost'])->name('assignToSurveyPost');
	Route::get('/assignToUserSurvey/{id}', [SurveyController::class, 'assignToUserSurvey'])->name('assignToUserSurvey');
	Route::post('/assignToUserSurveyPost', [SurveyController::class, 'assignToUserSurveyPost'])->name('assignToUserSurveyPost');
	Route::post('/startSurveyPost', [SurveyController::class, 'startSurveyPost'])->name('startSurveyPost');
	Route::post('/querySurveyPost', [SurveyController::class, 'querySurveyPost'])->name('querySurveyPost');

	Route::get('/completeSurvey/{id}', [SurveyController::class, 'completeSurvey'])->name('completeSurvey');
	Route::post('/completeSurveyPost', [SurveyController::class, 'completeSurveyPost'])->name('completeSurveyPost');
	Route::get('/reassignSurvey/{id}', [SurveyController::class, 'reassignSurvey'])->name('reassignSurvey');
	Route::post('/reassignSurveyPost', [SurveyController::class, 'reassignSurveyPost'])->name('reassignSurveyPost');

	Route::get('/home_mapcreation', [MapCreationController::class, 'index_MapCreation'])->name('home_mapcreation');
	Route::get('/assignToMapCreation/{id}', [MapCreationController::class, 'assignToMapCreation'])->name('assignToMapCreation');
	Route::post('/assignToMapCreationPost', [MapCreationController::class, 'assignToMapCreationPost'])->name('assignToMapCreationPost');
	Route::get('/assignToUserMapCreation/{id}', [MapCreationController::class, 'assignToUserMapCreation'])->name('assignToUserMapCreation');
	Route::post('/assignToUserMapCreationPost', [MapCreationController::class, 'assignToUserMapCreationPost'])->name('assignToUserMapCreationPost');
	Route::post('/startMapCreationPost', [MapCreationController::class, 'startMapCreationPost'])->name('startMapCreationPost');
	Route::post('/queryMapCreationPost', [MapCreationController::class, 'queryMapCreationPost'])->name('queryMapCreationPost');

	Route::get('/completemapcreation/{id}', [MapCreationController::class, 'completemapcreation'])->name('completemapcreation');
	Route::post('/completemapcreationPost', [MapCreationController::class, 'completemapcreationPost'])->name('completemapcreationPost');
	Route::get('/reassignMapCreation/{id}', [MapCreationController::class, 'reassignMapCreation'])->name('reassignMapCreation');
	Route::post('/reassignmapcreationPost', [MapCreationController::class, 'reassignMapCreationPost'])->name('reassignmapcreationPost');
    Route::get('/Queryclarificationmap/{id}', [SurveyController::class, 'Queryclarificationmap'])->name('Queryclarificationmap');
    Route::post('/MapQuerySubmit', [SurveyController::class, 'MapQuerySubmit'])->name('MapQuerySubmit');
    // Route::get('/viewmapquery/{id}', [SurveyController::class, 'viewmapquery'])->name('viewmapquery');
    Route::post('/reuploadmap/{id}', [SurveyController::class, 'reuploadmap'])->name('reuploadmap');

	Route::get('/viewworkorder/{id}', [WorkOrderController::class, 'viewWorkOrder'])->name('viewworkorder');

	Route::get('/wo_create', [WorkOrderController::class, 'index'])->name('wo_create');
	Route::post('/wo_create', [WorkOrderController::class, 'store'])->name('wo_create.store');
	Route::post('/wo_create-store', [ObjectController::class, 'save_objects'])->name('wo_create-store');
	
	Route::post('/workorder_create', [WorkOrderController::class, 'workorder_create'])->name('workorder_create');
	Route::post('/check_workordername', [WorkOrderController::class, 'check_WorkOrderName'])->name('check_workordername');

	
	Route::get('/object_table', [ObjectController::class, 'showObject_table'])->name('object_table');
	Route::post('/getobjectstructurename', [ObjectController::class, 'getObjectStructureByName'])->name('getobjectstructurename');
	Route::post('/addobjectfield', [ObjectController::class, 'addObjectField'])->name('addobjectfield');
	Route::get('/editobjectfield/{id}', [ObjectController::class, 'editObjectField'])->name('editobjectfield');
	Route::post('/updateobjectfield', [ObjectController::class, 'updateObjectField'])->name('updateobjectfield');
	Route::post('/check_objectfieldname', [ObjectController::class, 'check_ObjectFieldName'])->name('check_objectfieldname');
	Route::get('/objects', [ObjectController::class, 'objects'])->name('objects');
	Route::get('/create_table/{name}', [ObjectController::class, 'createtable'])->name('create_table');	

	Route::get('/listofvalues', [ListOfValuesController::class, 'index'])->name('listofvalues');
	Route::post('/getfieldvalues', [ListOfValuesController::class, 'getfieldvaluesbygroup'])->name('getfieldvalues');
	Route::post('/check_groupname', [ListOfValuesController::class, 'check_GroupName'])->name('check_groupname');
	Route::post('/addgroup', [ListOfValuesController::class, 'addGroup'])->name('addgroup');
	Route::post('/addfield', [ListOfValuesController::class, 'addField'])->name('addfield');
	Route::post('/removefieldvalue', [ListOfValuesController::class, 'removefieldvaluebyid'])->name('removefieldvalue');

	Route::post("/getcompany",[CompanyController::class,'getCompany'])->name('getcompany');		
	Route::get('/company-management', [CompanyController::class, 'index'])->name('company-management');
    Route::post('/company-management', [CompanyController::class, 'store'])->name('company-management.store');
    Route::get("company/{id}/delete",[CompanyController::class,'delete']);
    Route::get("company/{id}/edit", [CompanyController::class, 'edit'])->name('company.edit');
    Route::put("company/{id}/update", [CompanyController::class, 'update'])->name('company.update');
	Route::post('/check_companyname', [CompanyController::class, 'check_CompanyName'])->name('check_companyname');
	Route::post('/deleteCompany', [CompanyController::class, 'deleteCompany'])->name('deleteCompany');

	Route::post('/deleteuser', [UserWorkController::class, 'deleteuser'])->name('deleteuser');
	Route::get('/edituser/{id}/{companyid}', [UserWorkController::class, 'edituser'])->name('edituser');
	Route::post('/updateuser', [UserWorkController::class, 'updateuser'])->name('updateuser');
	Route::post('/updatedefaultuser', [UserWorkController::class, 'updatedefaultuser'])->name('updatedefaultuser');
	
	Route::post('/checkdefaultuser', [UserWorkController::class, 'checkdefaultuser'])->name('checkdefaultuser');
	Route::post('/resetdefaultuser', [UserWorkController::class, 'resetdefaultuser'])->name('resetdefaultuser');	

	Route::post("/getusers",[UserWorkController::class,'getUsers'])->name('getusers');
	
	Route::get("/getallusers",[UserWorkController::class,'getAllUsers'])->name('getallusers');

	Route::post("/getworkorderhistory",[WorkOrderHistoryController::class,'getUsers'])->name('getworkorderhistory');

	Route::post("/getusers",[UserWorkController::class,'getUsers'])->name('getusers');
	Route::post("/getallusers",[UserWorkController::class,'getAllUsers'])->name('getallusers');

	Route::get('/getRoles', [UserWorkController::class, 'getRoles']);
	Route::get("/adduser/{id}",[UserWorkController::class,'addUser'])->name('adduser');	
	Route::post('/adduser_store', [UserWorkController::class, 'addUser_Store'])->name('adduser_store');		
	Route::get('/users-management', [UserWorkController::class, 'index'])->name('users-management');
    Route::post('/users-management', [UserWorkController::class, 'store'])->name('users-management.store');
    Route::get("users/{id}/delete",[UserWorkController::class,'delete']);
    Route::get("users/{id}/edit", [UserWorkController::class, 'edit'])->name('users.edit');
    Route::put("users/{id}/update", [UserWorkController::class, 'update'])->name('users.update');
	Route::post('/users_create', [UserWorkController::class, 'store'])->name('users_create');

	Route::get('/query', [QueryController::class, 'index'])->name('query');
	Route::post('/query', [QueryController::class, 'store'])->name('query.store');	

	Route::get("adduserview", [UserWorkController::class, 'adduserview'])->name('adduserview');
	Route::post('/getuserroleforid', [UserWorkController::class, 'getuserroleforid'])->name('getuserroleforid');
	Route::get('/listofvalues', [ListOfValuesController::class, 'index'])->name('listofvalues');
	Route::post('/getfieldvalues', [ListOfValuesController::class, 'getfieldvaluesbygroup'])->name('getfieldvalues');
	Route::post('/check_groupname', [ListOfValuesController::class, 'check_GroupName'])->name('check_groupname');
	Route::post('/addgroup', [ListOfValuesController::class, 'addGroup'])->name('addgroup');
	Route::post('/addfield', [ListOfValuesController::class, 'addField'])->name('addfield');
	Route::post('/removefieldvalue', [ListOfValuesController::class, 'removefieldvaluebyid'])->name('removefieldvalue');
	Route::get('/profileView/{id}',[UserWorkController::class, 'profileView'])->name('profileView');
	Route::post('/updatePassword', [UserWorkController::class, 'updatePassword'])->name('updatePassword');

	Route::get('/home_downloadCADApp', [DownloadController::class, 'downloadCADApp'])->name('home_downloadCADApp');
	Route::get('/zipFile', [DownloadController::class, 'zipFile'])->name('zipFile');

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

	//Ramesh
	Route::post('/get_last_preproductionfile', [HomeController::class, 'get_last_preproductionfile'])->name('get_last_preproductionfile');
	Route::post('/get_last_mapcreationfile', [MapCreationController::class, 'get_last_mapcreationfile'])->name('get_last_mapcreationfile');
	Route::post('/get_files_for_survey', [HomeController::class, 'get_files_for_survey'])->name('get_files_for_survey');
	
	Route::get('/download', [HomeController::class, 'getDownload'])->name('download');
    Route::get('/downloadFile', [HomeController::class, 'downloadFile'])->name('downloadFile');
    Route::get('/home_qcassign', [HomeController::class, 'index_Qcassign'])->name('home_qcassign');
	//Route::get('/openqc', [HomeController::class, 'index_openqc'])->name('openqc');
	Route::get('/openqc/{workOrderId}', [HomeController::class, 'index_openqc'])->name('openqc');
    Route::get('/assignqc/{id}', [HomeController::class, 'assignqc'])->name('assignqc');
    Route::get('/assignsurveyqc/{id}', [HomeController::class, 'assignsurveyqc'])->name('assignsurveyqc');
    Route::get('/assignmapqc/{id}', [HomeController::class, 'assignmapqc'])->name('assignmapqc');
  
	Route::post('/assignToQCSurveyPost', [SurveyController::class, 'assignToQCSurveyPost'])->name('assignToQCSurveyPost');
    Route::post('/assignToQCPost', [HomeController::class, 'assignToQCPost'])->name('assignToQCPost');

    Route::post('file.upload.dwgForQC', [FileUploadController::class,'fileUploadDwgForQC'])->name('file.upload.dwgForQC');
    Route::post('/validatepktfile', [ImportController::class, 'validatepktfile'])->name('validatepktfile');
    Route::post('file.upload.workorderPKT', [FileUploadController::class,'fileUploadWorkorderPKT'])->name('file.upload.workorderPKT');

    Route::post('savepktfile', [FileUploadController::class,'savepktfile'])->name('savepktfile');
    Route::post('savelnefile', [FileUploadController::class,'savelnefile'])->name('savelnefile');
    Route::post('file.upload.workorderLNE', [FileUploadController::class,'fileUploadWorkorderLNE'])->name('file.upload.workorderLNE');

    Route::post('/approveWorkOrder', [HomeController::class, 'approveWorkOrder'])->name('approveWorkOrder');
    Route::post('/rejectedWorkOrder', [HomeController::class, 'rejectedWorkOrder'])->name('rejectedWorkOrder');

	Route::get('/checkToSurvey/{id}', [SurveyController::class, 'checkToSurvey'])->name('checkToSurvey');

	Route::get('/checkToSurveyModel/{id}', [SurveyController::class, 'checkToSurveyModel'])->name('checkToSurveyModel');
    Route::get('/viewFiles/{id}', [SurveyController::class, 'viewFiles'])->name('viewFiles');

	Route::get('/home_datapreparation', [DatapreparationController::class, 'index_Datapreparation'])->name('home_datapreparation');
	Route::get('/home_workorderhistory', [WorkOrderHistoryController::class, 'index'])->name('home_workorderhistory');
    Route::get('/assignToDatapreparation/{id}', [DatapreparationController::class, 'assignToDatapreparation'])->name('assignToDatapreparation');
    Route::post('/assignToDatapreparationPost', [DatapreparationController::class, 'assignToDatapreparationPost'])->name('assignToDatapreparationPost');
    Route::get('/assignToUserDatapreparation/{id}', [DatapreparationController::class, 'assignToUserDatapreparation'])->name('assignToUserDatapreparation');
    Route::post('/assignToUserDatapreparationPost', [DatapreparationController::class, 'assignToUserDatapreparationPost'])->name('assignToUserDatapreparationPost');
    Route::post('/startDatapreparationPost', [DatapreparationController::class, 'startDatapreparationPost'])->name('startDatapreparationPost');
    Route::post('/queryDatapreparationPost', [DatapreparationController::class, 'queryDatapreparationPost'])->name('queryDatapreparationPost');
        
    Route::get('/completeDatapreparation/{id}', [DatapreparationController::class, 'completeDatapreparation'])->name('completeDatapreparation');
    Route::post('/completeDatapreparationPost', [DatapreparationController::class, 'completeDatapreparationPost'])->name('completeDatapreparationPost');
    
    Route::post('file.upload.fileUploaddatapreparation', [FileUploadController::class,'fileUploaddatapreparation'])->name('file.upload.fileUploaddatapreparation');
     
	Route::get('/assignmapqc/{id}', [HomeController::class, 'assignmapqc'])->name('assignmapqc');
	Route::post('file.upload.dwgForMapQC', [FileUploadController::class,'fileUploadDwgForMapQC'])->name('file.upload.dwgForMapQC');
	Route::get('/home_mapqcassign', [HomeController::class, 'index_MapQcassign'])->name('home_mapqcassign');
	Route::get('/openmapqc/{workOrderId}', [MapCreationController::class, 'index_openmapqc'])->name('openmapqc');
	
	Route::post('/mapapproveWorkOrder', [HomeController::class, 'mapapproveWorkOrder'])->name('mapapproveWorkOrder');
    Route::post('/maprejectedWorkOrder', [HomeController::class, 'maprejectedWorkOrder'])->name('maprejectedWorkOrder');
	Route::post('/startMapcreationPost', [MapCreationController::class, 'startMapcreationPost'])->name('startMapcreationPost');
	Route::post('/assignToUserqcMapCreationPost', [MapCreationController::class, 'assignToUserqcMapCreationPost'])->name('assignToUserqcMapCreationPost');
	
	Route::post('/assignToUserqcpreCreationPost', [HomeController::class, 'assignToUserqcpreCreationPost'])->name('assignToUserqcpreCreationPost');
    Route::get('/assignuserqcpre/{workOrderId}', [HomeController::class, 'index_userqcpre'])->name('assignuserqcpre');
	Route::get('/assignuserqcmap/{workOrderId}', [MapCreationController::class, 'index_userqcmap'])->name('assignuserqcmap');

	Route::get('/assignToModelCreation/{id}', [ModelCreationController::class, 'assignToModelCreation'])->name('assignToModelCreation');
    Route::post('/assignToModelCreationPost', [ModelCreationController::class, 'assignToModelCreationPost'])->name('assignToModelCreationPost');
    Route::post('file.upload.dwgForModel', [FileUploadController::class,'fileUploadDwgForModel'])->name('file.upload.dwgForModel');
    Route::post('/assignToModelPost', [ModelCreationController::class, 'assignToModelPost'])->name('assignToModelPost');
    Route::get('/home_modelcreation', [ModelCreationController::class, 'index_ModelCreation'])->name('home_modelcreation');
    Route::get('/assignToUserModelCreation/{id}', [ModelCreationController::class, 'assignToUserModelCreation'])->name('assignToUserModelCreation');
    Route::post('/assignToUserModelCreationPost', [ModelCreationController::class, 'assignToUserModelCreationPost'])->name('assignToUserModelCreationPost');
    Route::post('/startModelCreationPost', [ModelCreationController::class, 'startModelCreationPost'])->name('startModelCreationPost');
    Route::get('/assignqcmodel/{id}', [HomeController::class, 'assignqcmodel'])->name('assignqcmodel');
    Route::post('file.upload.dwgForModelQC', [FileUploadController::class,'fileUploadDwgForModelQC'])->name('file.upload.dwgForModelQC');
    Route::get('/home_modelqcassign', [HomeController::class, 'index_ModelQcassign'])->name('home_modelqcassign');
    Route::get('/assignuserqcmodel/{workId}/{workorderid}', [HomeController::class, 'index_userqcmodel'])->name('assignuserqcmodel');    
    Route::post('/assignToUserqcmodelCreationPost', [HomeController::class, 'assignToUserqcmodelCreationPost'])->name('assignToUserqcmodelCreationPost');
    Route::post('/modelapproveWorkOrder', [HomeController::class, 'modelapproveWorkOrder'])->name('modelapproveWorkOrder');
    Route::post('/modelrejectedWorkOrder', [HomeController::class, 'modelrejectedWorkOrder'])->name('modelrejectedWorkOrder');
    Route::post('/get_last_modelingfile', [HomeController::class, 'get_last_modelingfile'])->name('get_last_modelingfile');
    Route::get('/reassignModelCreation/{id}', [ModelCreationController::class, 'reassignModelCreation'])->name('reassignModelCreation');
    Route::post('/reassignModelcreationPost', [ModelCreationController::class, 'reassignModelcreationPost'])->name('reassignModelcreationPost');
    Route::post('/assignToModelQcPost', [ModelCreationController::class, 'assignToModelQcPost'])->name('assignToModelQcPost');
	
	Route::post('/startPreqcPost', [HomeController::class, 'startPreqcPost'])->name('startPreqcPost');
    Route::post('/get_last_preqcfile', [HomeController::class, 'get_last_preqcfile'])->name('get_last_preqcfile');

    Route::post('/startMapqcPost', [HomeController::class, 'startMapqcPost'])->name('startMapqcPost');
	
	Route::post('/restartPreproductionPost', [HomeController::class, 'restartPreproductionPost'])->name('restartPreproductionPost');
    Route::post('/restartMapcreationPost', [HomeController::class, 'restartMapcreationPost'])->name('restartMapcreationPost');

	Route::get('/statusOfDatapreparation/{id}', [DatapreparationController::class, 'statusOfDatapreparation'])->name('statusOfDatapreparation');
	Route::get('/editDatapreparation/{id}', [DatapreparationController::class, 'editDatapreparation'])->name('editDatapreparation');
	Route::post('/updateDatapreparation', [DatapreparationController::class, 'updateDatapreparation'])->name('updateDatapreparation');

	Route::post('/get_last_modelqcfile', [HomeController::class, 'get_last_modelqcfile'])->name('get_last_modelqcfile');
    Route::post('/startModelqcPost', [HomeController::class, 'startModelqcPost'])->name('startModelqcPost');
    Route::get('/openmodelqc/{workId}/{workorderid}', [HomeController::class, 'index_openmodelqc'])->name('openmodelqc');
    Route::post('/get_files_for_revit', [HomeController::class, 'get_files_for_revit'])->name('get_files_for_revit');
    Route::post('/restartModelCreationPost', [ModelCreationController::class, 'restartModelCreationPost'])->name('restartModelCreationPost');

	Route::post("/workflowchange",[WorkOrderHistoryController::class,'workflowchange'])->name('workflowchange');
    Route::get('/home_workflowchange', [WorkOrderHistoryController::class, 'home_workflowchange'])->name('home_workflowchange');
    Route::post('/getWorkOrderDetails', [WorkOrderHistoryController::class, 'getWorkOrderDetails'])->name('getWorkOrderDetails');
    Route::post('/getUsersByCompany', [WorkOrderHistoryController::class, 'getUsersByCompany'])->name('getUsersByCompany');
    Route::post('/getStatusCodesByProcessStep', [WorkOrderHistoryController::class, 'getStatusCodesByProcessStep'])->name('getStatusCodesByProcessStep');
    Route::post('/updateWorkflow', [WorkOrderHistoryController::class, 'updateWorkflow'])->name('updateWorkflow');
	Route::get('/viewrejectmapqc/{id}', [WorkOrderHistoryController::class, 'viewquery'])->name('viewrejectmapqc');
	Route::post('/viewQcRemarksClick', [WorkOrderHistoryController::class, 'viewQcRemarks'])->name('viewQcRemarksClick');
	Route::post('/viewClarificationRemarksClick', [WorkOrderHistoryController::class, 'viewClarificationRemarks'])->name('viewClarificationRemarksClick');
	Route::post('/viewReassignRemarksClick', [WorkOrderHistoryController::class, 'viewReassignRemarks'])->name('viewReassignRemarksClick');
	Route::post('/checkWorkOrderNames', [WorkOrderHistoryController::class, 'checkWorkOrderNames'])->name('checkWorkOrderNames');
	
	Route::get('/home_element', [WorkOrderHistoryController::class, 'elements_management'])->name('home_element');
    Route::post('/deleteEntityDetails', [WorkOrderHistoryController::class, 'deleteEntityDetails'])->name('deleteEntityDetails');


	Route::get('upload', [FileController::class, 'uploadForm'])->name('file.upload.form');
	Route::post('upload', [FileController::class, 'upload'])->name('file.upload');
	

Route::get('upload', [FileController::class, 'uploadForm'])->name('file.upload.form');
Route::post('upload', [FileController::class, 'upload'])->name('file.upload');

Route::get('/home_mapattribute', [MapCreationController::class, 'index_MapAttribute'])->name('home_mapattribute');

Route::get('/home_mapattributemodel/{id}', [MapCreationController::class, 'home_mapattributemodel'])->name('home_mapattributemodel');

//Route::get('/assignToMapAttribute/{id}', [MapCreationController::class, 'assignToMapAttribute'])->name('assignToMapAttribute');

Route::post('file.upload.fileUploadmapattribute', [FileUploadController::class,'fileUploadmapattribute'])->name('file.upload.fileUploadmapattribute');

Route::get('/home_modelareaattribute', [MapCreationController::class, 'index_modelareaattribute'])->name('home_modelareaattribute');

Route::get('/assignToUserModelattribute/{id}', [MapCreationController::class, 'assignToUserModelattribute'])->name('assignToUserModelattribute');

Route::post('/assignToUserModelAttributePost', [MapCreationController::class, 'assignToUserModelAttributePost'])->name('assignToUserModelAttributePost');
Route::post('/startModelareaPost', [MapCreationController::class, 'startModelareaPost'])->name('startModelareaPost');
Route::get('/assignmodelareaattributeqc/{id}', [MapCreationController::class, 'assignmodelareaattributeqc'])->name('assignmodelareaattributeqc');
Route::post('file.upload.dwgForModelareaQC', [FileUploadController::class,'fileUploaddwgForModelareaQC'])->name('file.upload.dwgForModelareaQC');
Route::get('/home_modelareaqcassign', [MapCreationController::class, 'index_ModelareaQcassign'])->name('home_modelareaqcassign');

Route::get('/Userqcmodelarea/{modelareaid}', [MapCreationController::class, 'index_userqcmodelarea'])->name('Userqcmodelarea');
Route::post('/assignToUserqcModelareaPost', [MapCreationController::class, 'assignToUserqcModelareaPost'])->name('assignToUserqcModelareaPost');
	
Route::post('/get_last_modelareaqcfile', [MapCreationController::class, 'get_last_modelareaqcfile'])->name('get_last_modelareaqcfile');

Route::post('/get_last_modelareafile', [MapCreationController::class, 'get_last_modelareafile'])->name('get_last_modelareafile');
Route::post('/startModelareaqcPost', [MapCreationController::class, 'startModelareaqcPost'])->name('startModelareaqcPost');
Route::get('/openModelareaQC/{modelareaid}', [MapCreationController::class, 'index_openModelareaQC'])->name('openModelareaQC');
	
Route::post('/modelareaapproved', [MapCreationController::class, 'modelareaapproved'])->name('modelareaapproved');
Route::post('/modelarearejected', [MapCreationController::class, 'modelarearejected'])->name('modelarearejected');
    
Route::get('/checkToModelArea/{id}', [MapCreationController::class, 'checkToModelArea'])->name('checkToModelArea');
   
Route::get('/completeModelarea/{id}', [MapCreationController::class, 'completeModelarea'])->name('completeModelarea');
	Route::post('/completeModelareaPost', [MapCreationController::class, 'completeModelareaPost'])->name('completeModelareaPost');
	
	Route::post('/completemodelareaPost', [MapCreationController::class, 'completemodelareaPost'])->name('completemodelareaPost');
	
	Route::post('/restartmodelareaPost', [MapCreationController::class, 'restartmodelareaPost'])->name('restartmodelareaPost');
	//Route::post('/home_downloaddata', [DatadownloadController::class, 'home_downloaddata'])->name('home_downloaddata');
	Route::get('/home_downloaddata', [DatadownloadController::class, 'index_downloaddata'])->name('home_downloaddata');
	Route::get('/download-data', [DatadownloadController::class, 'index_downloaddata'])->name('download-data');
	Route::post('/viewQcmodelRemarks', [WorkOrderHistoryController::class, 'viewQcmodelRemarks'])->name('viewQcmodelRemarks');
	Route::post('/viewStatus', [WorkOrderHistoryController::class, 'viewStatus'])->name('viewStatus');


	
	Route::post('/get_files_for_revits', [HomeController::class, 'get_files_for_revits'])->name('get_files_for_revits');

	Route::get('/Queryclarificationmodel/{id}', [SurveyController::class, 'Queryclarificationmodel'])->name('Queryclarificationmodel');

	Route::get('/completemodelcreation/{id}', [ModelCreationController::class, 'completeModelCreation'])->name('completemodelcreation');
	Route::post('/completemodelcreationPost', [ModelCreationController::class, 'completeModelCreationPost'])->name('completemodelcreationPost');
	
	Route::match(['get', 'post'], '/assignToMapAttribute/{model_id}/{workorder_id?}', [MapCreationController::class, 'assignToMapAttribute'])->name('assignToMapAttribute');

	Route::get('/home_downloadFinal', [DownloadController::class, 'downloadFinal'])->name('home_downloadFinal');

	Route::post('/downloadZip', [DownloadController::class, 'downloadZip'])->name('downloadZip');

	Route::get('/home_dispatch', [ModelCreationController::class, 'home_dispatch'])->name('home_dispatch');
	Route::get('/home_dispatch_side', [ModelCreationController::class, 'home_dispatch_side'])->name('home_dispatch_side');
    Route::get('/dispatchmodelarea/{id}', [ModelCreationController::class, 'dispatchmodelarea'])->name('dispatchmodelarea');
    Route::post('file.upload.dwgForModeldispatch', [FileUploadController::class,'dwgForModeldispatch'])->name('file.upload.dwgForModeldispatch');
    Route::post('/uploaddispatchPost', [ModelCreationController::class, 'uploaddispatchPost'])->name('uploaddispatchPost');

});



