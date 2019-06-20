<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
	/**
     * Change role of user
     *
     * @param UpdateUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function change(UpdateUserRequest $request)
	{
    	
        User::changeRole($request->id,$request->role);
    	return response()->json(['status' => 'success'], 200);
    }
}
