<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Event extends Model
{
     use SoftDeletes;
	protected $fillable = [
		'name','photo','startdate','enddate','teamno','pitch_id','description','rule'
	];

	public function pitch()
	{
		return $this->belongsTo('App\Pitch');
	}

	public function eventdetails()
	{
		return $this->hasMany('App\Eventdetail');
	}
}
