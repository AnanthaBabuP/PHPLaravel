<?php

namespace App\Http\Controllers\StudDetails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudUpdateController extends Controller
{
    public function index()
   {
      $users = DB::select('select * from student');
      return view('DBProcess.stud_edit_view', ['users' => $users]);
   }

   public function show($id)
   {
      $users = DB::select('select * from student where id = ?', [$id]);
      return view('DBProcess.stud_update', ['users' => $users]);
   }

   public function edit(Request $request, $id)
   {
      $name = $request->input('stud_name');
      DB::table('student')->where('id', $id)->update(['name' => $name]);
      echo "Record updated successfully.<br/>";
      echo '<a href="/edit-records">Click Here</a> to go back.';
   }
}
