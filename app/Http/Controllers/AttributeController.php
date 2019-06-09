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
    //
    public function index(){
    	$attributes = Attribute::get();
    	return fractal()
    		->collection($attributes)
    		->transformWith(new AttributeTransformer)
    		->toArray();
    }

    public function getGoods(Attribute $attribute){

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

    public function store(StoreAttributeRequest $request){
    		
    		if(!Gate::allows('check-admin'))
    		{
                abort(403, 'Unauthorized action.');
            }

    		$attribute = new Attribute;
    		$attribute->name = $request->name;
    		$attribute->save();

    		return fractal()
                ->item($attribute)
                ->transformWith(new AttributeTransformer)
                ->toArray();

    }

    public function update(Attribute $attribute,Request $request){

    	if(!Gate::allows('check-admin') and !Gate::allows('check-moderator'))
    	{
            abort(403, 'Unauthorized action.');
        }

        $attribute->name = $request->name;
        $attribute->save();
        return fractal()
                ->item($attribute)
                ->transformWith(new AttributeTransformer)
                ->toArray();
    	
    }

    public function destroy(Attribute $attribute){

    	if(!Gate::allows('check-admin'))
    	{
            abort(403, 'Unauthorized action.');
        }

    	$attribute->delete();

    	return response(null,204);
    }

}
