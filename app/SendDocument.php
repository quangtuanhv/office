<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SendDocument extends Model
{
	protected $table = "send_documents";
	public function document(){
		return $this->belongsTo('App\Document','id_congvan','id');
	}
	public function profile(){
		return $this->belongsTo('App\Profile','nguoichuyen','id');
	}
	public function user(){
		return $this->belongsTo('App\User','nguoinhan','id');
	}
}
