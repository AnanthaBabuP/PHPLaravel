<?php

namespace App\Http\Controllers\valitation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class ValidationController extends Controller
{
    public function showform() {
        return view('valitation.login');
     }
     public function validateform(Request $request) {
      //   $validator = Validator::make($request->all(), [
      //       'username' => 'required|max:8',
      //       'password' => 'required'
      //    ], [
      //       'username.required' => 'The username field is required.',
      //       'username.max' => 'The username may not be greater than :max characters.',
      //       'password.required' => 'The password field is required.'
      //    ]);
      //    if ($validator->fails()) {
      //       return redirect()->back()->withErrors($validator)->withInput();
      //    }
      print_r("Hai");
         
         
         $this->validate($request,[
            'username'=>'required|max:8',
            'password'=>'required'
         ]);
         print_r($request->all());
         // // Validation successful, continue with your logic here
         
         // // Print the form data
         // print_r($request->all());
     }
}
