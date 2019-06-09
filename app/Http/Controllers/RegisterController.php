<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreUserRequest;

use App\User;

use App\Transforms\UserTransformer;
class RegisterController extends Controller
{
    //
    public function register(StoreUserRequest $request){


    	$user = new User;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
        $user->role = 3;
    	$user->save();

    	return fractal()
    		->item($user)
    		->transformWith(new UserTransformer)
    		->toArray() ;
    }
}
