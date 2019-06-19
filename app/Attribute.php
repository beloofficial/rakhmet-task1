<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Good;
class Attribute extends Model
{
	protected $fillable = [
        'name'
    ];
    public function findGoods(){
    	 return $this->hasMany('App\GoodAttribute');
    }

    public function goods()
    {
        return $this->belongsToMany(Good::class);
    }
}
