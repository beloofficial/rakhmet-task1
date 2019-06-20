<?php

namespace App\Transforms;

use App\AttributeGood;

class AttributeGoodTransformer extends \League\Fractal\TransformerAbstract
{
	/**
     * Turn this item object into a generic array
     *
     * @param AttributeGood $attributeGood
     * @return array
     */
	public function transform(AttributeGood $attributeGood){

			return [
					'value'=>$attributeGood->value,
					

			];
	}	


}