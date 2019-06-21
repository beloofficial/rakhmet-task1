<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{


    

    use Notifiable,HasApiTokens;


    const ADMIN = 1;
    const MODERATOR = 2;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Store attributes of this Good
     *
     * @param Request->id $id
     * @param Request->role $role
     * @return \Illuminate\Http\JsonResponse
     */
    static function changeRole($id,$role)
    {
        $user = User::find($id);
        $user->role = $role;
        $user->save();
        
        return $user;
    }
    
    /**
     * Store attributes of this Good
     *
     * @param StoreUserRequest $request
     * @return User $user
     */
    static function createGuest($request)
    {
        $request = $request->validated();
        $request['password'] = bcrypt($request['password']);
        $user = User::create($request);
        return $user;
    }
   


}
