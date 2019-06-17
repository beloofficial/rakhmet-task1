<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAttributeRequest;
use App\Attribute;
use App\Transforms\AttributeTransformer;
use App\Transforms\GoodTransformer;
use App\Policies\AdminPolicy;
use App\Policies\ModeratorPolicy;
use Illuminate\Support\Facades\Gate;
use App\Good;

class AttributeController extends Controller
{
    
    public function index()
    {
    	$attributes = Attribute::get();
    	return fractal()
    		->collection($attributes)
    		->transformWith(new AttributeTransformer)
    		->toArray();
    }

    public function getGoods(Attribute $attribute)
    {

    	$data = $attribute->findGoods()->get('good_id');
        $goods = collect(new Good);
        foreach ($data as $key => $value) {

            $goods->add(Good::find($value->good_id));
        }  
        return fractal()
            ->collection($goods)
            ->parseIncludes(['goodAttribute'])
            ->transformWith(new GoodTransformer)
            ->toArray();
    }

    public function store(StoreAttributeRequest $request)
    {
    	$attribute = new Attribute;
    	$attribute->create($request->validated());
    }

    public function update(Attribute $attribute,Request $request)
    {
        $attribute->name = $request->name;
        $attribute->save();
    }

    public function destroy(Attribute $attribute)
    {
    	$attribute->delete();
    	return response(null,204);
    }
}
