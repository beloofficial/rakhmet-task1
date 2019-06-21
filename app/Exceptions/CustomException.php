<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
trait CustomException
{
    //
    public function customExceptions($request,$e)
    {
    	
    	if ($e instanceof ModelNotFoundException)
    	{
    		return response()->json([
    			'status' => 'error',
    			'type'=>'ModelNotFoundException'

    		], 500);
    	}
    	return parent::render($request, $e);
    }
}
