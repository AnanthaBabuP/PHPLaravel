<?php

use Illuminate\Support\Facades\Route;
//sample
use App\Http\Controllers\FirstController;
// login screen
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
// evitance file
use App\Http\Controllers\TestController;
use App\Http\Controllers\ABCController;
use App\Http\Controllers\MyController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ImplicitController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

/*
* EVITANCE PROCESS
*/

Route::middleware(['Role:editor'])->group(function () {
    Route::get('role', [TestController::class, 'index']);
});

Route::middleware(['terminate'])->get('terminate', [ABCController::class, 'index']);

Route::middleware(['auth'])->get('profile', [UserController::class, 'showProfile']);

Route::middleware(['First'])->get('/usercontroller/path', [UserController::class, 'showPath']);

Route::resource('my', MyController::class);

Route::controller('test', 'ImplicitController');

class MyClass{
    public $foo = 'bar';
 }

Route::get('/myclass', [ImplicitController::class, 'index']);

/*
* LOGIN AND REGISTER PROCESS
*/

Route::post('/register',[RegisterController::class,'store'])->name('register');


Route::get('register',function(){
    return view('contact.create');
});

Route::get('/login', [LoginController::class, 'index']);

Route::post('/check', [LoginController::class, 'check'])->name('check');

// route types
// get
// post
// put
// patch
// delete

// modal

Route::get('/name/{name}', function (string $name) {
    return $name;
})->where('name', '[A-Za-z]+');
 
Route::get('/number/{id}', function (string $id) {
    return $id;
})->where('id', '[0-9]+');
 
Route::get('/user/{id}/{name}', function (string $id, string $name) {
    return $id.'   '.$name;
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

// connect controller
Route::get('first',[FirstController::class, 'firstVal']); // use declare path first

Route::get('first/{id}',[FirstController::class, 'first']);

Route::get('returnView/{id}',[FirstController::class, 'returnView']);

Route::get('returnFolderView/{id}',[FirstController::class, 'returnFolderView']);

// definison For component
// Route::get('test',function(){
//     return view('components.first-component');
// });

Route :: get('about/{id}',function($id){
    return 'abouve'.$id;
});

Route::view('welcome','welcome',['name' => 'Anantha Babu']);


