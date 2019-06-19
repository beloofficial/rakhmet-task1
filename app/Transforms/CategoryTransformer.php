<?php

namespace App\Transforms;

use App\Category;

class CategoryTransformer extends \League\Fractal\TransformerAbstract
{

	/**
     * Turn this item object into a generic array
     *
     * @param Category $category
     * @return array
     */
	public function transform(Category $category){

			return [
					'id'=>$category->id,
					'name'=>$category->name,

			];
	}	


}