<?php
//app/Helpers/User.php
namespace App\Helpers;
use Auth;
use App\User as UserModel;

class User {
    /**
     * 
     * @return string
     */

    /**
     * Check is Admin
     *
     * @return mix
     */
    public static function isAdmin() 
    {
        User::authUser();

        if (Auth::user()->role != UserModel::ADMIN) 
        {
            abort(403, 'NOT ADMIN');
        }
        return true;
    }

    /**
     * Check is Moderator
     *
     * @return mix
     */
    public static function isModerator() 
    {
 		User::authUser();

        if (Auth::user()->role != UserModel::ADMIN or Auth::user()->role != UserModel::MODERATOR) 
        {
         	abort(403, 'NOT MODERATOR');   
        }

        return true;  
    }
    
    /**
     * Check is Authorized
     *
     * @return mix
     */
    public static function authUser()
    {
    	if(!Auth::user())
    		abort(403, 'NOT USER');
        return true;
    }
}