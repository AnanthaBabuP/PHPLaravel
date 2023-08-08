<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

// cookie controller
class CookieController extends Controller
{
    public function setCookie(Request $request)
    {
        $minutes = 1;
        $response = new Response('Hello World');
        $response->cookie('name', 'virat', $minutes);

        return $response;
    }

    public function getCookie(Request $request)
    {
        $value = $request->cookie('name');
        return $value;
    }
}
