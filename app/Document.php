<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
	protected $table = "documents";
	public function loaivanban()
	{
		return $this->belongsTo('App\LoaiVanBan','id_loaivanban','id');
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
