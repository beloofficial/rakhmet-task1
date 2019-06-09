<?php

namespace App\Transforms;

use App\Attribute;
use App\Good;
class AttributeTransformer extends \League\Fractal\TransformerAbstract
{

	public function transform(Attribute $attribute){

			return [
					'id'=>$attribute->id,
					'name'=>$attribute->name,

			];
	}	

	


}