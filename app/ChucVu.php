<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model {
	protected $table = "chuc_vus";
	public function profile() {
		return $this->hasMany('App\Profile', 'chucVu_id', 'id');
	}
}
