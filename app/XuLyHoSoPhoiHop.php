<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class XuLyHoSoPhoiHop extends Model
{
    public function profile(){
 		return $this->belongsTo('App\Profile','nguoigopy','id');
 	}
 	public function hosophoihop(){
 		return $this->belongsTo('App\HoSoPhoiHop','id_hoso','id');
 	}
}
