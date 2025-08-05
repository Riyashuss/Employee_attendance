<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function update() {
        $userroles = DB::table('user_role as ur')
            ->where('ur.user_id', auth()->user()->id)
            ->join('role as r', 'r.id', '=', 'ur.role_id')
            ->select('r.role_name as role_name') 
            ->get();
    
        return view('update', compact('userroles')); 
    }
    
   
    public function index()
    {
            // Get the currently authenticated user
            $user = Auth::user();
    
            // Pass the user data to the view
            return view('update', compact('user'));
        }


        public function __construct()
        {
            $this->middleware('auth');
        }
    
 }
    



