<?php

namespace App\Transforms;

use App\User;

class UserTransformer extends \League\Fractal\TransformerAbstract
{

	/**
     * Turn this item object into a generic array
     *
     * @param User $user
     * @return array
     */
	public function transform(User $user){

			return [
					'id' =>$user->id,
					'name'=>$user->name,
					'email'=>$user->email,
					'role'=>$user->role,

			];
	}	

}