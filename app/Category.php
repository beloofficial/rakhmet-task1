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

    /**
     * Update name of Category
     *
     * @param UpdateUserRequest $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateName($name)
    {
    	$this->name = $name;
    	$this->save();
        return $this;
    }

    /**
     * Create new Category
     *
     * @param  Request $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    static function store($request)
    {
        $attribute = Attribute::create($request);
        return $attribute;
    }
}
