<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rentdetail extends Model
{
     use SoftDeletes;
	protected $fillable = [
		'starttime','endtime','rentdate','renthour','totalprice','pitch_id','user_id','status'
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function pitch()
	{
		return $this->belongsTo('App\Pitch');
	}
}
