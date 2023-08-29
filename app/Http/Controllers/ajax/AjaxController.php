<?php

namespace App\Http\Controllers\ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function index() {
        $msg = "This is a simple message.";
        return response()->json(['msg' => $msg], 200);
     }
}
