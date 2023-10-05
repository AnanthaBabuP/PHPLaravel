<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class CustomException extends Exception
{
    public function render($request)
    {
        return response()->view('errors.Custom',  ['exception' => $this], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}