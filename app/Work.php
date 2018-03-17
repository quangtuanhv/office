<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model {
	protected $table = "works";

	protected $fillable = ['title', 'user_id_send', 'user_id_receive', 'receive_date', 'content', 'deadline', 'status', 'file'];
	public function profile() {
		return $this->belongsTo('App\Profile', 'user_id_receive', 'id');
	}
	public function user() {
		return $this->belongsTo('App\User', 'user_id_send', 'id');
	}
}
