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
	
	public function chuyenxulyvanban(){
		return $this->hasMany('App\ChuyenXuLyVanBan','id_nguoinhan','id');
	}
	public function xulyvanban(){
		return $this->hasMany('App\XuLyVanBan','nguoixuly','id');
	}

	public function hosophoihop(){
		return $this->hasMany('App\HoSoPhoiHop','nguoisoan','id');
	}
	public function xulyhosophoihop(){
		return $this->hasMany('App\XuLyHoSoPhoiHop','nguoigopy','id');
	}
}