<?php

namespace App\Transforms;

use App\GoodAttribute;

class GoodAttributeTransformer extends \League\Fractal\TransformerAbstract
{
	/**
     * Turn this item object into a generic array
     *
     * @param GoodAttribute $goodAttribute
     * @return array
     */
	public function transform(GoodAttribute $goodAttribute){

			return [
					'value'=>$goodAttribute->value,
					

			];
	}	


}