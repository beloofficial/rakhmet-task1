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
use App\Http\Resources\Attribute as AttributeResource;
use App\Http\Resources\AttributeCollection;

class AttributeController extends Controller
{

    /**
     * The attribute repository instance.
     */
    protected $attribute;

    /**
     * Create a new controller instance.
     *
     * @param  Attribute $attribute
     * @return void
     */
    public function __construct(Attribute $attribute)
    {
        $this->attribute = $attribute;
    }

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
    	$attribute = Attribute::store($request->validated());

        return (new AttributeResource($attribute));
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
        $attribute = $attribute->updateName($request->name);
        return (new AttributeResource($attribute));
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
