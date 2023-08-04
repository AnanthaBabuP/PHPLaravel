<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ImplicitController extends Controller {
   private $myclass;
   
   public function __construct(\MyClass $myclass) {
      $this->myclass = $myclass;
   }
   public function index() {
      dd($this->myclass);
   }
}