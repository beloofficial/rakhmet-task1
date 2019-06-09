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
    //
    public function store(StoreCategoryRequest $request){
            

            if(!Gate::allows('check-admin')){
                abort(403, 'Unauthorized action.');
            }
            
            
            
    		$category = new Category;

    		$category->name = $request->name;
    		$category->save();
            return fractal()
                ->item($category)
                ->transformWith(new CategoryTransformer)
                ->toArray();
          
    }

    public function index(){

    	$categories = Category::get();
    	return fractal()
    		->collection($categories)
    		->transformWith(new CategoryTransformer)
    		->toArray();
    	
    }

    public function update(UpdateCategoryRequest $request,Category $category){

        if(!Gate::allows('check-admin') and !Gate::allows('check-moderator')){
                abort(403, 'Unauthorized action.');
            }

        $category->name = $request->name;
        $category->save();

        return fractal()
                ->item($category)
                ->transformWith(new CategoryTransformer)
                ->toArray();
    }

    public function destroy(Category $category){

        if(!Gate::allows('check-admin')){
                abort(403, 'Unauthorized action.');
            }

        $category->delete();
        return response(null,204);
    }

    public function getGoods(Category $category){


        $data = $category->findGoods()->get('good_id');
        $goods = collect(new Good);
        foreach ($data as $key => $value) {

              $goods->add(Good::find($value->good_id));

          }  

        return fractal()
            ->collection($goods)
            ->transformWith(new GoodTransformer)
            ->toArray();
    }






}
