<?php

namespace App\Http\Controllers\redirect;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    //
    public function index()
    {
        return "Redirecting to controller's action.";
    }
}
