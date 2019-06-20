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
    public function Goods()
    {
        return $this->belongsToMany(Good::class);
    }

    public function updateName($name)
    {
    	$this->name = $name;
    	$this->save();
    }
}
