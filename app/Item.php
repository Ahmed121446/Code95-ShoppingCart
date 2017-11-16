<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function User(){
    	return $this->belongsTo(\App\User::class);
    }
}
