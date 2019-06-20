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
use Illuminate\Support\Facades\Gate;

class GoodController extends Controller
{

    /**
     * Store Good
     *
     * @param StoreGoodRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreGoodRequest $request)
    {   
    
        $good = new Good;
        $good->storeAll($request);
        return response()->json(['status' => 'success'], 200);
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
        $good->updateName($request->name);
        return response()->json(['status' => 'success'], 200);
    }

    /**
     * Delete Good
     *
     * @param Good $good
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Good $good)
    {
    	$good->delete();
    	return response()->json(['status' => 'success'], 200);
    }
}
