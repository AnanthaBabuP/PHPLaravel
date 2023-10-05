<?php

namespace App\Http\Controllers\pagination;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import the DB facade

class PaginationController extends Controller
{
    // Pagination Controller

    public function index()
    {
       $users = DB::table('student')->paginate(5); // Retrieve data from the "student" table
       return view('Pagination.details', ['users' => $users]); // Pass the data to the view
    }
}
