<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuyenXuLyVanBan extends Model
{
	public function nguoigiao()
	{
		return $this->belongsTo('App\User','id_nguoitao','id');
	}
	public function donvinhan()
	{
		return $this->belongsTo('App\DonVi','id_donvi','id');
	}
	public function nguoinhan()
	{
		return $this->belongsTo('App\Profile','id_nguoinhan','id');
	}

}