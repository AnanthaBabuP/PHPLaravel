<?php

namespace App\Http\Controllers\studDetails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import the DB facade

class StudViewController extends Controller
{
    //
    public function index()
   {
      $users = DB::select('select * from student'); // Retrieve data from the "student" table
      return view('DBProcess.stud_view', ['users' => $users]); // Pass the data to the view
   }
}
