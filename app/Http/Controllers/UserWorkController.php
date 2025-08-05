<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Company;
use App\Models\Role;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserWorkController extends Controller
{
    public function index()
    {
        $companies= Company::latest()->get(); 
        $users = User::all();
        $userroles = UserRole::all();
        $roles = Role::all();
        return view('laravel.userwork.index', 
        [
            'companies' => $companies,
            'users' => $users,
            'userroles' => $userroles,
            'roles' => $roles,
        ]);
    }      
     
    public function create()
    {
        $users = User::all();
        $companies = Company::all();
        $userroles = UserRole::all();
        $roles = Role::all();
        return view('laravel.userwork.index', compact('users'));
    }
    
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role_table', 'user_id', 'role_id');
    }
    
    public function store(Request $request)
    { 
        try
        {
            $user = new User();
            
            $user->username = $request->input('username');
            $user->password = $request->input('password');
            $user->companyid = $request->input('companyid');
            $user->email = $request->input('email');
            $user->creationdate = Carbon::now();
            $user->creationuserid = auth()->user()->id;
            
            $user->save();
            
            if($request->input('default_userid') == 1)
            {
                $company = Company::where('id', $request->input('companyid'))
                    ->first();
                    
                $company->default_user_id = $user->id;
                $company->update();
            }
            
            $roleIdList = json_decode($request->input('roleIdList'));   
            
            foreach ($roleIdList as $roleId) 
            {
                $userRole = new UserRole();
                
                $userRole->userid = $user->id;
                $userRole->roleid = $roleId;
                
                $userRole->save();
            }
            
            return response()->json(array('success' => true, 'message' => trans('words.useraddedsuccessfully')), 200);
        }
        catch (\Exception $e) 
        {          
            // Return a JSON response with an error message
            return response()->json(array('success' => false,'message' =>$e->getMessage()), 200);
        }
    }
    
        
    public function edit($id)
    {
        $users = User::where('id',$id)->first();
        $companies = Company::all();
        return view('laravel.userwork.edit', ['users' => $users, 'companies' => $companies]);
    }
    
    public function update(Request $request, $id)
    {
        // Validate request data
        $attributes = $request->validate([
            'username' => ['required', 'string'],
            'company' => ['required', 'string'],
            'mobile_no' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'roleid' => ['required', 'string'],
            'password' => ['required', 'string', 'min:5'],
        ]);
    
        // Check if the username already exists for a different user
        $existingUser = User::where('username', $attributes['username'])->where('id', '!=', $id)->first();
    
        if ($existingUser) {
            // Username already exists for a different user, return back with error message
            return back()->withErrors(['username' => trans('words.thisusernameisalreadytakenpleasechooseadifferentone')]);
        }
    
        // Update user
        $user = User::findOrFail($id);
        $user->username = $attributes['username'];
        $user->company = $attributes['company'];
        $user->mobile_no = $attributes['mobile_no'];
        $user->password = $attributes['password'];
        $user->roleid = $attributes['roleid'];
        $user->email = $attributes['email'];
        $user->save();
    
        return redirect()->route('users-management')->with('success', trans('words.usersuccessfullyupdated'));
    }
    
    public function edituser($userid,$companyid)
    {       
        $user = DB::table('wo_user')
                ->where('id', $userid)
                ->where('companyid',$companyid)             
                ->select('wo_user.*')
                ->first();

        $company = DB::table('wo_company')
                    ->where('id',$companyid)
                    ->select('wo_company.company_name','wo_company.default_user_id')
                    ->first();

        $userroles = DB::table('wo_user_role as ur')
                ->where('userid', $userid)
                ->join('wo_role as r', 'r.id', '=', 'ur.roleid')
                ->select('ur.roleid as role_id', 'r.role_name as role_name')
                ->get();
                
        $roles = Role::all();
        
        return view('laravel.userwork.edit', 
                ['user' => $user, 
                'userroles' => $userroles, 
                'roles' => $roles,
                'company' => $company,
                ]);
    }

    public function updateDefaultUser(Request $request)
    {   
        $userid = $request->input("userid");
        $companyid = $request->input("companyid");

        $company = Company::where('id', $request->input('companyid'))->first();
                    
        $company->default_user_id = $userid;
        $company->update();

        return response()->json(array('success' => true, 'message' => trans('words.defaultuserupdatesuccessfully')), 200);
    }
    
    public function updateuser(Request $request)
    {   
        $userid = $request->input("userid");
        $companyid = $request->input("companyid");
        
        try
        {
            $user = User::where('id', $userid)
                    ->where('companyid',$companyid)
                    ->first();
                    
            $user->username = $request->input("username");
            
            if($request->input("password") != "")
            {
                $user->password = $request->input('password');
            }
            
            $user->email = $request->input("email");
            
            $user->update();
            
            $company = Company::where('id', $request->input('companyid'))
                    ->first();

			$default = $company -> default_user_id;
			$this_user = $user -> id;
            
            if($request->input('default_userid') == 1)
            {   
                $company->default_user_id = $user->id;
                $company->update();
            }
            else if($default == $this_user)
            { 
				$company->default_user_id = 0;
                $company->update();
            }
            
            $userrole = UserRole::where('userid','=',$userid)
                    ->delete();
            
            $roleIdList = json_decode($request->input('roleIdList'));   
            
            foreach ($roleIdList as $roleId) 
            {
                $userRole = new UserRole();
                
                $userRole->userid = $user->id;
                $userRole->roleid = $roleId;
                
                $userRole->save();
            }
            
            return response()->json(array('success' => true, 'message' => trans('words.userupdatedsuccessfully')), 200);
        } 
        catch (\Exception $e) 
        {
            // Return a JSON response with an error message
            return response()->json(array('success' => false,'message' =>$e->getMessage()), 200);
        }
    }
    
    public function deleteuser(Request $request)
    {   
        $userid = $request->input("userid");
        $companyid = $request->input("companyid");
        
        try
        {
            $user = User::where('id','=',$userid)
                    ->where('companyid','=',$companyid)
                    ->delete();
            
            $userrole = UserRole::where('userid','=',$userid)
                    ->delete();
            
            return response()->json(array('success' => true, 'message' => trans('words.userdeletedsuccessfully')), 200);
        } 
        catch (\Exception $e) 
        {
            // Log the error
            \Log::error($e->getMessage());
            
            // Return a JSON response with an error message
            return response()->json(array('success' => false,'message' =>$e->getMessage()), 200);
           
        }
    }
    
    public function checkdefaultuser(Request $request)
    {
        $default_user = DB::table('wo_user')
                ->where('wo_user.id','=',$request->input("userid"))
                ->Join('wo_company', 'wo_user.companyid', '=', 'wo_company.id')
                ->select('wo_company.default_user_id')
                ->first();
                
        return response()->json(array('success' => true, 'defaultuser' => $default_user), 200);
    }
    
    public function resetdefaultuser(Request $request)
    {
        $company = Company::where('id', $request->input('companyid'))
                    ->first();
                    
        $company->default_user_id = 0;
        $company->update();
        
        return response()->json(array('success' => true), 200);
    }
    
    public function getAllUsers()
    {
        
        $users =  DB::table('wo_user')
                ->Join('wo_company', 'wo_user.companyid', '=', 'wo_company.id')
                ->select('wo_user.id as userid','wo_user.username as username','wo_user.email as email','wo_company.id as companyid', 'wo_company.company_name as company_name')
                ->get();
                    
        foreach($users as $user)
        {
            $user->roles = DB::table('wo_user_role')
                    ->where('userid',$user->userid)
                    ->Join('wo_role', 'wo_user_role.roleid', '=', 'wo_role.id')
                    ->select('wo_role.id', 'wo_role.role_name') 
                    ->get();
        }
        
          echo $users;         
        //return response()->json(array('success' => true,'users' => $users), 200);
    }
    
    public function getUsers(Request $request)
    {
        $companyid =  $request->input('companyid');
        
        $users =  DB::table('wo_user')
                    ->Join('wo_company', 'wo_user.companyid', '=', 'wo_company.id')
                    ->where('wo_company.id', '=', $companyid)
                    ->select('wo_user.id as userid','wo_user.username as username','wo_user.email as email','wo_company.id as companyid', 'wo_company.company_name as company_name') 
                    ->get();
                    
        foreach($users as $user)
        {
            $user->roles = DB::table('wo_user_role')
                    ->where('userid',$user->userid)
                    ->Join('wo_role', 'wo_user_role.roleid', '=', 'wo_role.id')
                    ->select('wo_role.id', 'wo_role.role_name') 
                    ->get();

            $user->isDefaultUser = DB::table('wo_company')->where('default_user_id', $user->userid)->count();
        }
        
        //echo $users;         
        return response()->json(array('success' => true,'users' => $users), 200);
    }

    public function getRoles()
    {
        $roles = DB::table('wo_role')->get();
        
        return response()->json(['success' => true, 'roles' => $roles], 200);
    }
    
    public function addUser($companyid)
    {       
        $companies = DB::table('wo_company')->where('id',$companyid)->first();
        //echo $companies;
        return view('laravel.userwork.adduser', ['companies' => $companies]);
        
    }
    
    public function addUserroles($roleid)
    {       
        $usersroles = DB::table('wo_user_role')->where('id',$roleid)->first();
        //echo $companies;
        return view('laravel.userwork.adduser', ['usersroles' => $usersroles]);
        
    }
    public function addUser_Store(Request $request)
    {       
        $attributes = $request->validate([
            'username' => ['required'],
            'company_name' => ['required'], 
            'roleid' => ['required'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:5'],
        ]);
        
        $companyid = DB::table('wo_company')->where('company_name',$request->companyname)->first();
        $role_id = DB::table('wo_user_role')->where('role_name',$request->role_name)->first();
        $user = new User();
        $user->username =  $attributes['username'];
        $user->companyid = $companyid;
        $user->role_id = $role_id;
        $user->password = $attributes['password'];
        $user->email = $attributes['email'];
        $user->creationdate = Carbon::now();
        $user->creationuserid = auth()->user()->id;
        $user->save();      
        
        return back()->with('success', trans('words.usersavedsuccessfully'));
        
    }
    public function updatePassword(Request $request)    
    {      
        $userid = $request->input("userid");
        $oldPassword = $request->input("oldpassword");
        $newPassword = $request->input("password");
        $confirmPassword = $request->input("confirmpassword");
        
        try
        {
            $user = User::find($userid);
           
            if (!$user) {
                return response()->json(array('success' => false, 'message' => trans('words.usernotfount')), 404);
            }
            
            // Validate old password
            if ($oldPassword && !Hash::check($oldPassword, $user->password)) {
              
                return response()->json(array('success' => false, 'message' => trans('words.oldpasswordisincorrect')), 400);
            }
            
            // Validate new password
            if ($newPassword !== $confirmPassword) {
                
                return response()->json(array('success' => false, 'message' => trans('words.newpasswordsdonotmatch')), 400);
            }
            
            // Update password
            if ($newPassword) {
                $user->password = $newPassword;
            }
            
            $user->save();
            
            return response()->json(array('success' => true, 'message' => trans('words.passwordsupdatesuccessfully')), 200);
        } 
        catch (\Exception $e) 
        {
           // Return a JSON response with an error message
            return response()->json(array('success' => false, 'message' => $e->getMessage()), 500);
        }
    }
    public function getuserroleforid(Request $request)
    {
            $user = auth()->user();
           
            $roles = DB::table('user')
                            ->where('id',$request->userid)
                            ->select('role_id')
                            ->get();
                            
            Log::info($roles."rollllllllllllllllllll");
            return response()->json([
            'success' => true,
            'roles' => $roles,
            
        ], 200 );      
    } 


    public function profileView(){
        $user = Auth::user();
        return view('laravel.userwork.profile', compact('user'));
    }
}