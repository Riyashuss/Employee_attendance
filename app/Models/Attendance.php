<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'attendance';
	protected $primaryKey = 'id';
	public $timestamps = false;

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'id'); // location_id in attendance references id in locations
    }


}
