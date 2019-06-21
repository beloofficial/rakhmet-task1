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
use App\Http\Resources\Category as CategoryResource;
use App\Http\Resources\CategoryCollection;
use CheckUser;

class CategoryController extends Controller
{

    /**
     * The good repository instance.
     */
    protected $category;

    /**
     * Create a new controller instance.
     *
     * @param  Category $category
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    /**
     * Store Category
     *
     * @param StoreCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreCategoryRequest $request)
    {
        CheckUser::isAdmin();
    	$category = Category::store($request->validated());  
        return new CategoryResource($category);
    }

    /**
     * Get Categories
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
    	$categories = Category::get();
        return new CategoryCollection($categories);
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
        CheckUser::isModerator();
        return new CategoryResource($category->updateName($request->name));
        
    }

    /**
     * Delete Category
     *
     * @param Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Category $category)
    {
        CheckUser::isAdmin();
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
