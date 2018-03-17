<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messenger extends Model {
	protected $table = "messengers";

	protected $fillable = ['user_1', 'content', 'user_2'];
	public function profile() {
		return $this->belongsTo('App\Profile', 'user_2', 'id');
	}
	public function user() {
		return $this->belongsTo('App\User', 'user_1', 'id');
	}
}
