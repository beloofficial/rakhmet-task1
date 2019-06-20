<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Category;
use App\Good;
use App\Transforms\GoodTransformer;
use App\Transforms\CategoryTransformer;
use App\Policies\AdminPolicy;
use App\Policies\ModeratorPolicy;
use Illuminate\Support\Facades\Gate;
use Exception;

class CategoryController extends Controller
{
    /**
     * Store Category
     *
     * @param StoreCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreCategoryRequest $request)
    {
    	Category::create($request->validated());    
        return response()->json(['status' => 'success'], 200);
    }

    /**
     * Get Categories
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
    	$categories = Category::get();
        return fractal()
    		->collection($categories)
    		->transformWith(new CategoryTransformer)
    		->toArray();
    }

    /**
     * Update Category
     *
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCategoryRequest $request,Category $category)
    {
        $category->updateName($request->name);
        return response()->json(['status' => 'success'], 200);
    }

    /**
     * Delete Category
     *
     * @param Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['status' => 'success'], 200);
    }

    /**
     * get Goods by Category
     *
     * @param Category $category
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */

    public function getGoods(Category $category)
    {
        $goods = $category->goods;
        return fractal()
            ->collection($goods)
            ->transformWith(new GoodTransformer)
            ->toArray();
    }
  

}
