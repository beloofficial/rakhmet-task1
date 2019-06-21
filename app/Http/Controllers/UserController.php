<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\User;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{
    /**
     * Store Category
     *
     * @param StoreUserRequest $request
     * @return /Illuminate\Http\Resources\Json\JsonResource
     */
    public function register(StoreUserRequest $request)
    {
    	$user = User::createGuest($request);
        return new UserResource($user);
    }
    public function getUser(Request $request)
    {
    	return new UserResource($request->user());
    }
}
