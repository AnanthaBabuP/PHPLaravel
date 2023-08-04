<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function first($id){
        return $id;
    }
    public function firstVal(){
        return 'return by controller';
    }

    public function returnView($id){
        return view('first');
    }

    public function returnFolderView($id){
        return view('user.create', ['name'=> 'ananth','age' => '24','gender'=> 'male']);
    }
}
