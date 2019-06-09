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
    //

    public function store(StoreGoodRequest $request){
        
        if(!Gate::allows('check-admin'))
        {
                abort(403, 'Unauthorized action.');
        }
        //add new Good
        $good = new Good;
        $good->name = $request->name;
        $good->save();
        // end of adding new Good

        //insert 'id' of all categories and insert 'id' of product to 'data'<array>
        $data = [];
        foreach ($request->category as $key => $category) {
            
            if(Category::find($category['id']))
                array_push($data, ['category_id'=>$category['id'],'good_id'=>$good->id]);
        }
    	
        CategoryGood::insert($data);

        //end of operation with inserting this 'data' to category_goods_table.
    	
        //insert 'id' of all attributes and insert 'id' of product to 'data'<array>

        $data = [];
        foreach ($request->attribute as $key => $attribute) {
            
            if(Attribute::find($attribute['id']))
                array_push($data, ['good_id'=>$good->id,'attribute_id'=>$attribute['id'],'value'=>$attribute['value']]);
        }
        
        GoodAttribute::insert($data);

        //end of operation with inserting this 'data' to good_attributs_table.
        
    	return fractal()
    		->item($good)
    		->transformWith(new GoodTransformer)
    		->toArray();
    }

    public function update(UpdateGoodRequest $request,Good $good){

        if(!Gate::allows('check-admin') and !Gate::allows('check-moderator'))
        {
            abort(403, 'Unauthorized action.');
        }

    	$good->name = $request->name;
    	$good->save();

    	return fractal()
    		->item($good)
    		->transformWith(new GoodTransformer)
    		->toArray();
    }

    public function destroy(Good $good){

        if(!Gate::allows('check-admin'))
        {
                abort(403, 'Unauthorized action.');
        }
    	$good->delete();
        
    	return response(null,204);
    }
}
