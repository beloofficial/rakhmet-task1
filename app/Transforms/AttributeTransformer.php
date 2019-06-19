<?php

namespace App\Transforms;

use App\Attribute;
use App\Good;
class AttributeTransformer extends \League\Fractal\TransformerAbstract
{

	/**
     * Turn this item object into a generic array
     *
     * @param Attribute $attribute
     * @return array
     */
	public function transform(Attribute $attribute){

			return [
					'id'=>$attribute->id,
					'name'=>$attribute->name,

			];
	}	

	


}