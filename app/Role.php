<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {
	protected $table = "roles";
	public function profile() {
		return $this->hasMany('App\Profile', 'role_id', 'id');
	}
}
