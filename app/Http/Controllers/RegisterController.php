<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\User;
use App\Transforms\UserTransformer;

class RegisterController extends Controller
{
    /**
     * Store Category
     *
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(StoreUserRequest $request)
    {
    	User::createGuest($request);
    	return response()->json(['status' => 'success'], 200);
    }
}
