<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Good;

class Category extends Model
{
    //
	protected $fillable = [
        'name'
    ];
    public function findGoods(){
    	 return $this->hasMany('App\CategoryGood');
    }
    public function Goods()
    {
        return $this->belongsToMany(Good::class);
    }
}
