<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Userdetails extends Model
{
    protected $table = 'user'; // Ensure correct table name
    protected $primaryKey = 'id'; // Make sure 'id' is the primary key
    public $incrementing = true; // Ensure auto-increment
    protected $fillable = [
        'username', 'password', 'dob', 'address', 'bloodgroup',
        'mail', 'contact', 'joiningdate', 'emp_id', 'gender', 'active'
    ];

    // Define the many-to-many relationship with the Role model
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id');
    }
}
