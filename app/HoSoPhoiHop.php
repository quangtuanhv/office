<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoSoPhoiHop extends Model
{
	protected $table = "ho_so_phoi_hops";
 	
 	public function profile(){
 		return $this->belongsTo('App\Profile','nguoisoan','id');
 	}
 	public function xulyhosophoihop(){
 		return $this->belongsTo('App\XuLyHoSoPhoiHop','id_hoso','id');
 	}
}
