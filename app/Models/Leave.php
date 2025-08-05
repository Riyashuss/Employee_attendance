<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'date'];
    protected $table = 'leave'; // Explicitly set the table name
    public $timestamps = false; // Disable timestamps for this model


    /**
     * The user who requested the leave.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
