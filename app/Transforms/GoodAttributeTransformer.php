<?php

namespace App\Transforms;

use App\GoodAttribute;

class GoodAttributeTransformer extends \League\Fractal\TransformerAbstract
{

	public function transform(GoodAttribute $goodAttribute){

			return [
					'value'=>$goodAttribute->value,
					

			];
	}	


}