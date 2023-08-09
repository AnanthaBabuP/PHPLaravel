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
use App\Http\Controllers\UriController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\UserRegistration;


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

Route::get('/foo/bar', [UriController::class, 'index']);

// Basic Response
Route::get('/basic_response', function () {
    return 'Hello World';
});

// Attaching Headers
Route::get('/header', function () {
    return response("Hello", 200)->header('Content-Type', 'text/html');
});

// JSON Response
Route::get('json', function () {
    return response()->json(['name' => 'Virat Gandhi', 'state' => 'Gujarat']);
});

// Cookies
Route::get('cookie/set', [CookieController::class, 'setCookie']);
Route::get('cookie/get', [CookieController::class, 'getCookie']);

/*
* VIEW
*/

// Views
Route::get('/test', function () {
    return view('view.test');
});

// Passing Data to Views
Route::get('/passingViewTest', function () {
    return view('view.passingTest', ['name' => 'World Rider']);
});

// Sharing Data with all Views
Route::get('/sharingData1', function () {
    return view('view.sharingData1');
});

Route::get('/sharingData2', function () {
    return view('view.sharingData2');
});

/*
* LOGIN AND REGISTER PROCESS
*/

Route::post('/register',[RegisterController::class,'store'])->name('register');

Route::get('register',function(){
    return view('contact.create');
});

Route::get('/login', [LoginController::class, 'index']);

Route::post('/check', [LoginController::class, 'check'])->name('check');

// Display registration form
Route::view('/register', 'register');

// Handle registration form submission
Route::post('/user/register', [UserRegistration::class, 'postRegister']);

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


