<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];
	public function works() {
		return $this->hasMany('App\Work', 'user_id_send', 'id');
	}
	public function news() {
		return $this->hasMany('App\News', 'profile_id', 'id');
	}
	public function profile() {
		return $this->hasOne('App\Profile', 'user_id', 'id');
	}
	public function messenger() {
		return $this->hasMany('App\Messenger', 'user_1', 'id');
	}

}
