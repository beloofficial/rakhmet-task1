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
    public function updateName($name)
    {
        $this->name = $name;
        $this->save();
    }
}
