<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function change(UpdateUserRequest $request)
	{
    	$user = User::find($request->id);
    	$user->role = $request->role;
    	$user->save();
    }
}
