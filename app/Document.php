<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
	protected $table = "documents";
	public function donVi()
	{
		return $this->belongsTo('App\DonVi','co_quan_ban_hanh','id');
	}
	public function user(){
		return $this->belongsTo('App\User','user_id','id');
	}
	public function profile(){
		return $this->belongsTo('App\Profile','lanh_dao_xu_ly','id');
	}
	public function reply_document(){
 		return $this->belongsTo('App\Reply_Document','id_van_ban','id');
 	}  
 	public function sendDocument(){
 		return $this->hasMany('App\SendDocument','id_congvan','id');
 	}
}
