<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Define the fillable fields if needed
    protected $fillable = [
        'username', 'email', 'password','role_id'
    ];

    // Define hidden fields if needed
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';
	protected $primaryKey = 'id';
	public $timestamps = false;
     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Always encrypt the password when it is updated.
     *
     * @param $value
    * @return string
    */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
	
	public $roles = [
			   '1' => 'Admin',
			   
			];
			
	public $name = "test name1";
	
    public function role() {
        return $this->belongsTo(UserRole::class);
    }
	
	 public function roles() {
        return $this->roles;
    }
	
	public function updateNewRoles($userroles)
	{
		$this->roles = $userroles;
	}
	
	public function checkRole($roleid)
	{
		if (in_array($roleid, $this->roles))
		{
			return "true";
		}
		else
		{
			return "false";
		}			
	}
	
	public function getName()
	{
		return $this->name;
	}

}
