<?php

namespace App\Transforms;

use App\Good;
use App\GoodAttribute;
use League\Fractal\ParamBag;
use Illuminate\Support\Facades\URL;
class GoodTransformer extends \League\Fractal\TransformerAbstract
{

	protected $availableIncludes = ['goodAttribute'];
	public function transform(Good $good){

			return [
					'id'=>$good->id,
					'name'=>$good->name,
			];
	}	

	public function includeGoodAttribute(Good $good){
		$attr = request()->route()->parameter('attribute')->id;
		
		$g = $good->findAttributeValue()->where('attribute_id',$attr)->first();
		return $this->item($g, new GoodAttributeTransformer);
	}

}