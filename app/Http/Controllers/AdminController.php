<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use App\Http\Resources\User as UserResource;
use CheckUser;

class AdminController extends Controller
{
	/**
     * Change role of user
     *
     * @param UpdateUserRequest $request
     * @return /Illuminate\Http\Resources\Json\JsonResource
     */
    public function change(UpdateUserRequest $request)
	{
    	CheckUser::isAdmin();
        $user = User::changeRole($request->id,$request->role);
        return new UserResource($user);
    }
}
