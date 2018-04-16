<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiVanBan extends Model
{
	protected $table = "loai_van_bans";
	public function document(){
		return $this->hasMany('App\Document','id_loaivanban','id');
	}
}
