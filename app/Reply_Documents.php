<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply_Documents extends Model
{
 	protected $table = "reply__documents";
 	public function document(){
 		return $this->belongsTo('App\Document','id_van_ban','id');
 	}  
 	public function user(){
 		return $this->belongsTo('App\User','user_id','id');
 	} 
}
