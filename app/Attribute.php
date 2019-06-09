<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function findGoods(){
    	 return $this->hasMany('App\GoodAttribute');
    }
}
