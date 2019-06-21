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
  	public function findAttributeValue()
    {
    	 return $this->hasOne('App\AttributeGood');
    }


    /**
     * Store Good
     *
     * @param StoreUserRequest $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function storeAll($request)
    {
        $this->name = $request->name;
        $this->save();
        $this->addCategory($request);
        $this->addAttribute($request);
        return $this;
    }

    /**
     * Store categories of this Good
     *
     * @param StoreGoodRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addCategory(StoreGoodRequest $request)
    {
    	$data = [];
        foreach ($request->category as $key => $category) {

            if(Category::find($category['id'])) {
                array_push($data, ['category_id'=>$category['id'],'good_id'=>$this->id]);
            }
        }
        CategoryGood::insert($data);
        return response()->json(['status' => 'success'], 200);
    }

    /**
     * Store attributes of this Good
     *
     * @param StoreGoodRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addAttribute(StoreGoodRequest $request)
    {
    	$data = [];

        foreach ($request->attribute as $key => $attribute) {
            
            if(Attribute::find($attribute['id'])) {
           
                array_push($data, ['good_id'=>$this->id,'attribute_id'=>$attribute['id'],'value'=>$attribute['value']]);
            }
        }
        AttributeGood::insert($data);
        return response()->json(['status' => 'success'], 200);
    }
    
    /**
     * Return Good categories
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Store attributes of this Good
     *
     * @param Request->name $name
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateName($name)
    {
        $this->name = $name;
        $this->save();
        return $this;
    }
}
