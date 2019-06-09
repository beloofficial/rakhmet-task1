<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    //

  	public function findAttributeValue(){
    	 return $this->hasOne('App\GoodAttribute');
    }
}
