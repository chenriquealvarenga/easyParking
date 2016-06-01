<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vigia extends Model
{
    
  public $timestamps = false;
  public function user()
  {
  	return $this->morphOne('App\User', 'userable');
	}
}
