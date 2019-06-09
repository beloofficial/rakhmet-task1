<?php

namespace App\Transforms;

use App\Category;

class CategoryTransformer extends \League\Fractal\TransformerAbstract
{

	public function transform(Category $category){

			return [
					'id'=>$category->id,
					'name'=>$category->name,

			];
	}	


}