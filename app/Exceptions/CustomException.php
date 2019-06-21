<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
trait CustomException
{
    /**
     * Custom Exceptions
     *
     * @param Request $request
     * @param Exception $e
     * @return \Illuminate\Http\Response
     */
    public function customExceptions($request,$e)
    {
    	
    	if ($e instanceof ModelNotFoundException)
    	{
    		return response()->json([
    			'status' => 'error',
    			'type'=>'ModelNotFoundException'

    		], 500);
    	}

        if ($e instanceof HttpException)
        {

            return response()->json([
                'status' => 'error',
                'type'=>$e->getMessage()

            ], 500);
        }


        
    	return parent::render($request, $e);
    }
}
