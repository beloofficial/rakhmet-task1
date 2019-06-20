<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\StoreGoodRequest;
use App\Category;
use App\CategoryGood;
use App\Attribute;
use App\AttributeGood;

class Good extends Model
{
    //
	protected $fillable = [
        'name'
    ];
  	public function findAttributeValue(){
    	 return $this->hasOne('App\AttributeGood');
    }

    public function storeAll($request)
    {
        $this->name = $request->name;
        $this->save();
        $this->addCategory($request);
        $this->addAttribute($request);
    }

    public function addCategory(StoreGoodRequest $request)
    {
    	$data = [];
        foreach ($request->category as $key => $category) {

            if(Category::find($category['id'])) {
                array_push($data, ['category_id'=>$category['id'],'good_id'=>$this->id]);
            }
        }
        CategoryGood::insert($data);
    }

    public function addAttribute(StoreGoodRequest $request)
    {
    	$data = [];

        foreach ($request->attribute as $key => $attribute) {
            
            if(Attribute::find($attribute['id'])) {
           
                array_push($data, ['good_id'=>$this->id,'attribute_id'=>$attribute['id'],'value'=>$attribute['value']]);
            }
        }
        AttributeGood::insert($data);
    }
    
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function updateName($name)
    {
        $this->name = $name;
        $this->save();
    }
}
