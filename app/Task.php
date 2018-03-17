<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = "tasks";
    public function profile(){
    	return $this->belongsTo('App\Profile','profile_id','id');
    }
}
