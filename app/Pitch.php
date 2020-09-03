<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Pitch extends Model
{
	use SoftDeletes;
	protected $fillable = [
		'name',
		'photo',
		'description',
		'field_size',
		'stadia_id'
	];

	public function stadia()
	{
		return $this->belongsTo('App\Stadium');
	}

	public function events()
	{
		return $this->hasMany('App\Event');
	}

	public function rentdetails()
	{
		return $this->hasMany('App\Rentdetail');
	}

	public function eventdetails()
	{
		return $this->hasMany('App\Eventdetail');
	}
}
