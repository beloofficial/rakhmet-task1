<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Good;
use App\Http\Requests\StoreGoodRequest;
use App\Http\Requests\UpdateGoodRequest;
use App\Transforms\GoodTransformer;
use App\Category;
use App\CategoryGood;
use App\Attribute;
use App\AttributeGood;
use App\Http\Resources\Good as GoodResource;
use App\Http\Resources\GoodCollection;
use CheckUser;

class GoodController extends Controller
{


    /**
     * The good repository instance.
     */
    protected $good;

    /**
     * Create a new controller instance.
     *
     * @param  Good $good
     * @return void
     */
    public function __construct(Good $good)
    {
        $this->good = $good;
    }
    /**
     * Store Good
     *
     * @param StoreGoodRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreGoodRequest $request)
    {   
        CheckUser::isAdmin();
        $good = $this->good->storeAll($request);
        return new GoodResource($good);
        
    }

    /**
     * Update Good
     *
     * @param UpdateGoodRequest $request
     * @param Good $good
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Good $good,UpdateGoodRequest $request)
    {
        CheckUser::isModerator();
        $good = $good->updateName($request->name);
        return new GoodResource($good);
        
    }

    /**
     * Delete Good
     *
     * @param Good $good
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Good $good)
    {
        CheckUser::isAdmin();
    	$good->delete();
    	return response()->json(['status' => 'success'], 200);
    }
}
