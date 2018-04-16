<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class XuLyVanBan extends Model
{
    public function profile()
	{
		return $this->belongsTo('App\Profile','nguoixuly','id');
	}
}
