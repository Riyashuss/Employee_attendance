<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Models\Userdetails; 
use Carbon\Carbon;
// Import the Hash facade
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function index(User $model)
    {
        //$this->authorize('manage-users', User::class);
		//$users = Users::all();
        return view('laravel.users.index', ['users' => $model->all()]);
    }

    public function create()
    {
        $roles = Role::all();
        return view('laravel.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'firstname' => ['required'],
            'email' => ['required', 'unique:users', 'email'],
            'confirmation' => ['same:email'],
            'password' => ['required', 'min:5'],
            'confirm-password' => ['same:password'],
            'role' => ['required'],
            'image' => ['image'],
            'phone' => ['max:10']
        ]);

        if($request->get('choices-year') || $request->get('choices-month') || $request->get('choices-day'))
        {
            $birthday = $request->get('choices-year').'-'.$request->get('choices-month').'-'.$request->get('choices-day');
        }
        else{
            $birthday = null;
        }

        $user = User::create([
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'password' => $request->get('password'),
            'role_id' => $request->get('role'),
            'email' => $request->get('email'),
            'gender' => $request->get('gender'),
            'location' => $request->get('location'),
            'phone' => $request->get('phone'),
            'language' => $request->get('language'),
            'birthday' => $birthday,
            'skills' => $request->get('skills')
        ]);

        if($request->file('avatar')) {
            $user->update([
                'avatar' => $request->file('avatar')->store('/', 'avatars')
            ]);
        }

        return redirect()->route('user-management')->with('succes', trans('words.usersuccessfullysaved'));
    }

    public function edit($id)
    {
        $this->authorize('manage-users', User::class);
        $user = Userdetails::find($id);
        $roles = Role::all();

        $birthday = $user->birthday;
        if(!empty($birthday))
        {
            $year = Carbon::createFromFormat('Y-m-d', $birthday)->format('Y');
            $day = Carbon::createFromFormat('Y-m-d', $birthday)->format('d');
            $month = Carbon::createFromFormat('Y-m-d', $birthday)->format('m');
            $birthdayArray = array(
                "year" => $year,
                "day" => $day,
                "month" =>$month
              );
        }
        else{
            $birthdayArray = array(
                'year' => 0,
                'day' => 0,
                'month' => 0
              );

        }

        return view ('laravel.userdetails.edited', compact('user', 'roles', 'birthdayArray'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $attributes = request()->validate([
            'firstname' => ['required'],
            'email' => ['required', 'email',  Rule::unique('users')->ignore($user->id)],
            'confirmation' => [],
            'password' => [],
            'confirm-password' => ['same:password'],
            'role' => ['required'],
            'image' => ['image'],
            'phone' => ['max:10']
        ]);

        if($request->get('choices-year') || $request->get('choices-month') || $request->get('choices-day'))
        {
            $birthday = $request->get('choices-year').'-'.$request->get('choices-month').'-'.$request->get('choices-day');
        }
        else{
            $birthday = null;
        }

        $user ->update([
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'password' => $request->get('password'),
            'role_id' => $request->get('role'),
            'email' => $request->get('email'),
            'gender' => $request->get('gender'),
            'location' => $request->get('location'),
            'phone' => $request->get('phone'),
            'language' => $request->get('language'),
            'birthday' => $birthday,
            'skills' => $request->get('skills')
        ]);

        if($request->file('avatar')) {
            $user->update([
                'avatar' => $request->file('avatar')->store('/', 'avatars')
            ]);
        }

        return redirect()->route('user-management')->with('succes', trans('words.usersuccessfullyupdated'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user-management')->with('succes', trans('words.theuserwassuccessfullydeleted'));
    }


//ramesh

    public function user_details(User $model)
    {
        $Userdetails = Userdetails::orderBy('id')->get();
        

        $details = DB::table('user as u')
        ->leftJoin('task as t', 't.user_id', '=', 'u.id')
        ->leftJoin('project as p', 'p.id', '=', 't.project_id')
        ->select('u.username as uname', 'u.mail as mail', 'u.id as id', 'u.dob as dop')
        ->where('u.active', 0)
        ->groupBy('u.id', 'u.username', 'u.mail', 'u.dob')
        ->get();
        
        return view('home_userdetails', compact('details'));
    }

    public function adduser()
    {
        $roles = Role::all();
        return view('laravel.userdetails.create', compact('roles'));
    }


    // public function saveuser(Request $request)
    // {
    //     Log::info($request);
    //     $attributes = request()->validate([
    //         'employeename' => ['required', 'string', 'max:255'],
    //         'joindate' => ['required', 'date'],
    //         'birthday' => ['required', 'date'],
    //         'email' => ['required', 'email', 'unique:user,mail'],
    //         'employee_id' => ['required', 'string', 'max:20'],
    //         'password' => ['required', 'string', 'min:6'],
           
    //         'address' => ['string', 'max:255'],
    //         'bloodgroup' => ['nullable', 'string'],
    //         'phone' => ['nullable', 'regex:/^\+?[0-9]{10,15}$/'],
    //         'gender' => ['nullable', 'in:Male,Female'],
          
    //             'role' => ['required', 'array'],
    //             'role.*' => ['exists:role,id'], // Ensure each role exists
           
    //     ]);

    
    //     $user = Userdetails::create([
    //         'username' => $attributes['employeename'],
    //         'password' => bcrypt($attributes['password']),
    //         'dob' => $attributes['birthday'],
    //         'address' => $attributes['address'],
    //         'bloodgroup' => $attributes['bloodgroup'],            
    //         'mail' => $attributes['email'],
    //         'contact' => $attributes['phone'],
    //         'joiningdate' => $attributes['joindate'],
    //         'emp_id' => $attributes['employee_id'],
            
    //         'gender' => $attributes['gender'],
    //         'active' => 0,

    //     ]);
    //     DB::transaction(function () use ($user, $attributes) {
    //         foreach ($attributes['role'] as $roleId) {
    //             DB::table('user_role')->insert([
    //                 'user_id' => $user->id,
    //                 'role_id' => $roleId,
    //                 'created_at' => now(),
    //                 'updated_at' => now()
    //             ]);
    //         }
    //     });
            
            
    //     return redirect()->route('user_details')->with('success', 'User created successfully!');
    // }
    public function saveuser(Request $request)
{
    Log::info($request->all());

    $attributes = $request->validate([
        'employeename' => ['required', 'string', 'max:255'],
        'joindate' => ['required', 'date'],
        'birthday' => ['required', 'date'],
        'email' => ['required', 'email', 'unique:user,mail'],
        'employee_id' => ['required', 'string', 'max:20'],
        'password' => ['required', 'string', 'min:6'],
        'address' => ['nullable', 'string', 'max:255'],
        'bloodgroup' => ['nullable', 'string'],
        'phone' => ['nullable', 'regex:/^\+?[0-9]{10,15}$/'],
        'gender' => ['nullable', 'in:Male,Female'],
        'role' => ['required', 'array'],
        'role.*' => ['exists:role,id'], // Ensure each role exists
    ]);

    DB::beginTransaction();
    try {
        $user = Userdetails::create([
            'username' => $attributes['employeename'],
            'password' => bcrypt($attributes['password']),
            'dob' => $attributes['birthday'],
            'address' => $attributes['address'],
            'bloodgroup' => $attributes['bloodgroup'],            
            'mail' => $attributes['email'],
            'contact' => $attributes['phone'],
            'joiningdate' => $attributes['joindate'],
            'emp_id' => $attributes['employee_id'],
            'gender' => $attributes['gender'],
            'active' => 0,
        ]);
    
        // Fetch last inserted user ID
        $userId = DB::getPdo()->lastInsertId();
    
        if (!$userId) {
            throw new \Exception("User ID could not be retrieved.");
        }
    
        // Insert roles into user_role table
        foreach ($attributes['role'] as $roleId) {
            DB::table('user_role')->insert([
                'user_id' => $userId,
                'role_id' => $roleId,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    
        DB::commit();
    
        return response()->json([
            'success' => true,
            'message' => 'User created successfully!',
            'user_id' => $userId
        ]);
    
    } catch (\Exception $e) {
        DB::rollback();
        return response()->json([
            'success' => false,
            'message' => 'Something went wrong!',
            'error' => $e->getMessage()
        ]);
    }
}

    
public function checkid($id)
{
    $user = Userdetails::findOrFail($id);
    $roles = Role::all(); 
    $userroles = DB::table('user_role as ur')
                ->where('user_id', $id)
                ->join('role as r', 'r.id', '=', 'ur.role_id')
                ->select('ur.role_id as role_id', 'r.role_name as role_name')
                ->get();
    $assignedRoles = $user->roles->pluck('id')->toArray(); // Fetch the assigned role IDs for the user

    $user->joiningdate = \Carbon\Carbon::parse($user->joiningdate)->format('Y-m-d');
    $user->dop = \Carbon\Carbon::parse($user->dop)->format('Y-m-d');  
    
    return view('laravel.userdetails.edit', compact('user', 'roles', 'assignedRoles','userroles'));
}
    // public function checkid($id)
    // {
    //     $user = Userdetails::findOrFail($id);
    //     $user->joiningdate = \Carbon\Carbon::parse($user->joiningdate)->format('Y-m-d');
    //     $user->dop = \Carbon\Carbon::parse($user->dop)->format('Y-m-d');  
    //     return view('laravel.userdetails.edit', compact('user'));
    // }

    public function viewUser($id)
    {
        $userDetails = User::leftjoin('task', 'user.id', '=', 'task.user_id') // Join users with tasks
            ->leftjoin('project', 'task.project_id', '=', 'project.id') // Join tasks with projects
            ->select(
                'user.username as username', // Fetch username from users table
                'task.task_name as task_name', // Fetch task name from tasks table
                'project.project_name as project_name' // Fetch project name from projects table
            )
            ->where('user.id', $id) // Filter by the user ID
            ->get(); // Fetch all related tasks and projects
    
        if ($userDetails->isEmpty()) {
            // Log::info($userDetails."userDetailsuserDetails");
            // return redirect()->back()->with('error', 'User details not found!');
        }
    
        return view('home_viewdetails', compact('userDetails')); // Pass $userDetails to the view
    }
    public function checkuserid($id)
    {
        $user = Userdetails::findOrFail($id);
        $user->joiningdate = \Carbon\Carbon::parse($user->joiningdate)->format('Y-m-d');
        $user->dop = \Carbon\Carbon::parse($user->dop)->format('Y-m-d');
        return view('laravel.userdetails.detailsshow', compact('user'));
    }
    // public function updateUser(Request $request, $id)
    // {
    //     //Log::info('Request Data: ', $request->all());
    //     try {
    //         // Validate incoming request
    //         // $request->validate([
    //         //     'employeename' => ['required', 'string', 'max:255'],
    //         //     'joindate' => ['required', 'date'],
    //         //     'birthday' => ['required', 'date'],
    //         //     'email' => ['required', 'email', 'unique:user,mail,' . $id],
    //         //     'employee_id' => ['required', 'string', 'max:20'],
    //         //     'password' => ['nullable', 'string', 'min:6'],
    //         //     'role' => ['required', 'integer'],
    //         //     'address' => ['nullable', 'string', 'max:255'],
    //         //     'bloodgroup' => ['nullable', 'string'],
    //         //     'phone' => ['nullable', 'regex:/^\+?[0-9]{10,15}$/'],
    //         //     'gender' => ['nullable', 'in:Male,Female'],
    //         // ]);
    
    //         // $user = Userdetails::find($request->id);  // Ensure you're fetching the user by their ID

    //         if($request->role_id!="admin"){
    //             $roles_id=1;
    //         }
    //         else if($role_id="employee"){
    //             $roles_id=2;
    //         }
    //         Log::info('Updating user: ' .$roles_id);
    //         $user = User::findOrFail($id);
            
    //         $user->username = $request->username;
    //         $user->emp_id = $request->emp_id;
    //         $user->role_id =$roles_id;
    //         $user->joiningdate = $request->joiningdate;
    //         $user->gender = $request->gender;
    //         $user->dob = $request->dob;
    //         $user->mail = $request->mail;
    //         $user->bloodgroup = $request->bloodgroup;
    //         $user->address = $request->address;
    //         $user->contact = $request->contact;
    //         // Hash the password if it's provided
    //         if ($request->filled('password')) {
    //             $user->password = Hash::make($request->password);
    //         }
            
    //         // Log the table name and user data before saving
    //         // Log::info('Saving to table: ' . $user->getTable());
    //         Log::info('User Data:', $user->toArray());
            
    //         // Save the user
    //         if ($user->save()) {
    //             Log::info('User data saved successfully');
    //         } else {
    //             Log::error('Failed to save user data');
    //         }
    
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'User updated successfully.',
    //         ]);
    
    //     } catch (\Illuminate\Validation\ValidationException $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Validation failed.',
    //             'errors' => $e->errors(),
    //         ], 422);
    //     } catch (\Exception $e) {
    //         \Log::error($e);
    
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'An error occurred. Please try again later.',
    //         ], 500);
    //     }

    // }
    public function updates(Request $request, $id)
    {
        Log::info('Updating user poda venna: ' . json_encode($request->all()));
    
        // $request->merge(['role_id' => (int) $request->role_id]);
    
        // $attributes = $request->validate([
        //     'role_id' => 'required|integer',
        // ]);
        if($request->role_id!="admin"){
            $roles_id=1;
        }
        else if($role_id="employee"){
            $roles_id=2;
        }
        Log::info('Updating user: ' .$roles_id);
        $user = Userdetails::findOrFail($id);
        
        $user->username = $request->username;
        $user->emp_id = $request->emp_id;
        $user->role_id =$roles_id;
        $user->joiningdate = $request->joiningdate;
        $user->gender = $request->gender;
        $user->dob = $request->dob;
        $user->mail = $request->mail;
        $user->bloodgroup = $request->bloodgroup;
        $user->address = $request->address;
        $user->contact = $request->contact;
    
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
    
        $user->update();
    
        return redirect()->route('home_user')->with('success', 'User updated successfully!');
    }

//     public function updateUser(Request $request, $id)
// {
   
//     Log::info('Updating user: ' . json_encode($request->all()));
    
    
  
//     $user = User::findOrFail($id);
    
//     $user->username = $request->username;
//     $user->emp_id = $request->emp_id;
//     $user->role_id =2;
//     $user->joiningdate = $request->joiningdate;
//     $user->gender = $request->gender;
//     $user->dob = $request->dob;
//     $user->mail = $request->mail;
//     $user->bloodgroup = $request->bloodgroup;
//     $user->address = $request->address;
//     $user->contact = $request->contact;

//     if ($request->filled('password')) {
//         $user->password = Hash::make($request->password);
//     }

//     $user->update();

  
//     return redirect()->route('home_user')->with('success', 'User updated successfully!');
// }

public function updateUser(Request $request)
{
    Log::info('Updating user: ' . json_encode($request->all()));
    $user->userid = $request->userid;
    // Find the user
    $user = Userdetails::findOrFail($id);

    // Update user details
    $user->username = $request->username;
    $user->emp_id = $request->emp_id;
    $user->joiningdate = $request->joiningdate;
    $user->gender = $request->gender;
    $user->dob = $request->dob;
    $user->mail = $request->mail;
    $user->bloodgroup = $request->bloodgroup;
    $user->address = $request->address;
    $user->contact = $request->contact;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    // Check if 'role_ids' is present and properly formatted
    if ($request->has('role_ids')) {
        $roleIds = explode(',', $request->input('role_ids'));  // Convert comma-separated string to array

        // Debug: Log the role IDs being synced
        Log::info('Role IDs being synced: ' . json_encode($roleIds));

        // Sync the roles to the user
        $user->roles()->sync($roleIds);  // Sync the roles to the user
    }

    // Save the user
    $user->update();

    return response()->json([
        'success' => true,
        'message' => 'User updated successfully!',
    ]);
}
// public function edit($id)
// {
//     $users = Userdetails::where('id',$id)->first();
//     // $companies = Company::all();
//     return view('laravel.userwork.edit', ['users' => $users, 'companies' => $companies]);
// }
public function updates_user(Request $request)
{
    Log::info($request);
    // Log::info('Updating user: ' . json_encode($request->all()));

    // Find the user based on the user ID (you should have an ID parameter)
    $user =Userdetails::findOrFail($request->userid);
    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'User not found!',
        ], 404);
    }
    // Update user details
    $user->username = $request->username;
    $user->emp_id = $request->emp_id;
    $user->joiningdate = $request->joiningdate;
    $user->gender = $request->gender;
    $user->dob = $request->dob;
    $user->mail = $request->mail;
    $user->bloodgroup = $request->bloodgroup;
    $user->address = $request->address;
    $user->contact = $request->contact;

    // Only update the password if it's provided in the request
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }
    $userid=$request->userid;
    // Check if 'role_ids' is present and properly formatted
        $userrole = UserRole::where('user_id','=',$userid)
                    ->delete();
            
            $roleIdList = json_decode($request->input('roleIdList'));   
            
            foreach ($roleIdList as $roleId) 
            {
                $userRole = new UserRole();
                
                $userRole->user_id = $user->id;
                $userRole->role_id = $roleId;
                
                $userRole->save();
            }

    return response()->json([
        'success' => true,
        'message' => 'User updated successfully!',
    ]);
}

public function updateuserAction(Request $request)
{
    $user_id = $request->input('user_id');
    $user = User::find($user_id);
    
    if ($user) {
        // Update the action column to 1
        $user->active = 1;
        $user->save();
        
        return response()->json(['success' => true, 'message' => 'Task action updated successfully']);
    }

    return response()->json(['success' => false, 'message' => 'Task not found']);
}


}
