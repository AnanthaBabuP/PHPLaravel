<?php

namespace App\Http\Controllers\studDetails;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudDeleteController extends Controller
{
    public function index() {
        $users = DB::table('student')->get();
        return view('DBProcess.stud_delete_view', ['users' => $users]);
    }

    public function destroy($id) {
        DB::delete('delete from student where id = ?',[$id]);
        echo "Record deleted successfully.<br/>";
        echo '<a href = "/delete-records">Click Here</a> to go back.';
     }
}
