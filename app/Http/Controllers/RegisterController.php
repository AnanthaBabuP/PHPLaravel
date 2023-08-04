<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
       $input = $request->all();
       User::create([
        'name' => $input['name'],
        'email' => $input['email'],
        'password' => Hash::make($input['password'])
      ]);
       return view('contact.thanks');
    }
}
