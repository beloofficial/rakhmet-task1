<?php

namespace App\Transforms;

use App\User;

class UserTransformer extends \League\Fractal\TransformerAbstract
{

	public function transform(User $user){

			return [
					'name'=>$user->name,
					'email'=>$user->email,
					'ok'=>"200",

			];
	}	


}