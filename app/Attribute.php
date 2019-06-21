<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Good;
class Attribute extends Model
{
	protected $fillable = [
        'name'
    ];
    public function goods()
    {
        return $this->belongsToMany(Good::class);
    }


    /**
     * Update name of Attribute
     *
     * @param  Request->name $name
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateName($name)
    {
        $this->name = $name;
        $this->save();
        return $this;
    }

    /**
     * Create new Attribute
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
