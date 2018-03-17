<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model {
	protected $table = "news";
	public function user() {
		return $this->belongsTo('App\User', 'profile_id', 'id');
	}
	public function comment() {
		return $this->hasMany('App\Comment', 'post_id', 'id');
	}
}
