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
    /**
     * Get All Attributes
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
    	$attributes = Attribute::get();
    	return fractal()
    		->collection($attributes)
    		->transformWith(new AttributeTransformer)
    		->toArray();
    }

    /**
     * Get Goods by Attribute
     *
     * @param Attribute $attribute
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getGoods(Attribute $attribute)
    {
        $goods = $attribute->goods;
        return fractal()
            ->collection($goods)
            ->parseIncludes(['goodAttribute'])
            ->transformWith(new GoodTransformer)
            ->toArray();
    }

    /**
     * Store Attribute
     *
     * @param StoreAttributeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreAttributeRequest $request)
    {
    	Attribute::create($request->validated());
        return response()->json(['status' => 'success'], 200);
    }

    /**
     * Update Attribute
     *
     * @param Attribute $attribute
     * @param StoreAttributeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Attribute $attribute,Request $request)
    {
        $attribute->updateName($request->name);
        return response()->json(['status' => 'success'], 200);
    }

    /**
     * Delete Attribute
     *
     * @param Attribute $attribute
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Attribute $attribute)
    {
    	$attribute->delete();
    	return response()->json(['status' => 'success'], 200);
    }
}
