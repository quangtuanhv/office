<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {
	protected $table = "profiles";

	public function user() {
		return $this->belongsTo('App\User', 'user_id'.'id');
	}

	public function chucVu() {
		return $this->belongsTo('App\ChucVu', 'chucVu_id', 'id');
	}
	public function donVi() {
		return $this->belongsTo('App\DonVi', 'donVi_id', 'id');
	}
	public function role() {
		return $this->belongsTo('App\Role', 'role_id', 'id');
	}
	public function messenger() {
		return $this->hasMany('App\Messenger', 'user_2', 'id');
	}

	public function works() {
		return $this->hasMany('App\Work', 'user_id_receive', 'id');
	}

	public function task(){
		return $this->hasMany('App\Task','profile_id','id');
	}
}
