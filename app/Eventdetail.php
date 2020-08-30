<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Eventdetail extends Model
{
    use SoftDeletes;
	protected $fillable = [
		'startdate','enddate','teamname','teamno','event_id','pitch_id','user_id'
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function pitch()
	{
		return $this->belongsTo('App\Pitch');
	}

	public function event()
	{
		return $this->belongsTo('App\Event');
	}
}
