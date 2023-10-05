<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function register()
    {
        // Create a new user (for simplicity, you can customize this logic)
        $user = new User1();
        $user->name = 'John Doe'; // Replace with user data
        $user->email = 'johndoe@example.com';
        $user->password = bcrypt('password'); // Replace with a secure password
        $user->save();

        // Trigger the UserRegistered event
        event(new UserRegistered($user));

        return 'User registered successfully!';
    }
}
