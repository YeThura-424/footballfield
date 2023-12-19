<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Stadium extends Model
{
    use SoftDeletes;
	protected $fillable = [
		'name','photo'
	];

	public function pitches()
	{
		return $this->hasMany('App\Pitch');
	}
}
