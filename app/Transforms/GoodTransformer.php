<?php

namespace App\Transforms;

use App\Good;
use App\GoodAttribute;
use League\Fractal\ParamBag;
use Illuminate\Support\Facades\URL;
class GoodTransformer extends \League\Fractal\TransformerAbstract
{

	protected $availableIncludes = ['goodAttribute'];

	/**
     * Turn this item object into a generic array
     *
     * @param Good $good
     * @return array
     */
	public function transform(Good $good){

			return [
					'id'=>$good->id,
					'name'=>$good->name,
			];
	}	
	
	/**
     * Turn this item object into a generic item
     *
     * @param Good $good
     * @return item
     */
	public function includeGoodAttribute(Good $good){
		$attr = request()->route()->parameter('attribute')->id;
		
		$g = $good->findAttributeValue()->where('attribute_id',$attr)->first();
		return $this->item($g, new GoodAttributeTransformer);
	}

}