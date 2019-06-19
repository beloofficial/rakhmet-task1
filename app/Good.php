<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\StoreGoodRequest;
use App\Category;
use App\CategoryGood;
use App\Attribute;
use App\GoodAttribute;

class Good extends Model
{
    //
	protected $fillable = [
        'name'
    ];
  	public function findAttributeValue(){
    	 return $this->hasOne('App\GoodAttribute');
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
        GoodAttribute::insert($data);
    }
    
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
