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
use App\GoodAttribute;
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
        $good->name = $request->name;
        $good->save();

        $good->addCategory($request);
        $good->addAttribute($request);

        return response()->json(['message' => 'OK'], 200);
    }

    /**
     * Update Good
     *
     * @param UpdateGoodRequest $request
     * @param Good $good
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateGoodRequest $request,Good $good)
    {
    	$good->name = $request->name;
    	$good->save();
        return response()->json(['message' => 'OK'], 200);
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
    	return response(null,204);
    }
}
