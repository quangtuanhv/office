<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonVi extends Model {
	protected $table = "don_vis";
	public function profile() {
		return $this->belongsTo('App\Profile', 'donVi_id', 'id');
	}
	public function document(){
		return $this->hasMany('App\Document', 'advisory','id');
	}
}
