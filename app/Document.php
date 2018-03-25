<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
	public function donVi()
	{
		return $this->belongsTo('App\DonVi','advisory','id');
	}
	public function user(){
		return $this->belongsTo('App\User','user_id','id');
	}
	public function profile(){
		return $this->belongsTo('App\Profile','accept','id');
	}
}
