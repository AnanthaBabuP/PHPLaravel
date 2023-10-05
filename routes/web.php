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

// Redirect Class 
use App\Http\Controllers\redirect\RedirectController;

// DB Process
use App\Http\Controllers\studDetails\StudInsertController;
use App\Http\Controllers\studDetails\StudViewController;
use App\Http\Controllers\studDetails\StudUpdateController;
use App\Http\Controllers\studDetails\StudDeleteController;

// session
use App\Http\Controllers\session\SessionController;
// valitation
use App\Http\Controllers\valitation\ValidationController;
// upload
use App\Http\Controllers\upload\UploadFileController;

// Mail
use App\Http\Controllers\mail\MailController;

// ajax
use App\Http\Controllers\ajax\AjaxController;

// App\Exceptions
use App\Exceptions\FailedToLoadHomePage;

/**
 * 20231005 Added AB В≥Вс
 */
// Pagination
use App\Http\Controllers\pagination\PaginationController;

// Pagination
use App\Http\Controllers\contracts\ContractsController;

// ERROR HANDLING
use App\Exceptions\CustomException;

// ENCRYPTION PROCESS
use App\Http\Controllers\Encryption\EncryptionController;

//HASHING PROCESS
use App\Http\Controllers\Hashing\AuthController;

use App\Http\Controllers\RegistrationController;

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
    return view('welcome', [
        'data' => $variableMissing
    ]);
});

// Route::get('/', function () {
//     try {
//         return view('welcome', [
//             'data' => $variableMissing
//         ]);
//     } catch (Throwable $exception) {
//         throw new FailedToLoadHomePage($exception->getMessage());
//     }
// });

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

//class MyClass{
//    public $foo = 'bar';
// }

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
* REDIRECT PROCESS
*/
// Redirecting to Named Routes
Route::get('/test2', function () {
    return view('redirect.test');
})->name('testing');

Route::get('/redirect', function () {
    return redirect()->route('testing');
});

// Redirecting to Controller Actions
Route::get('rr', [RedirectController::class, 'index']);

Route::get('/redirectcontroller', function () {
    return redirect()->action([RedirectController::class, 'index']);
});

/*
* DB PROCESS
*/

// Insert Process
Route::get('insert', [StudInsertController::class, 'insertform']);

// Create Process
Route::post('create', [StudInsertController::class, 'insert']);

// Retrive Data
Route::get('view-records', [StudViewController::class, 'index']);

// Update Process
Route::get('edit-records', [StudUpdateController::class, 'index']);
Route::get('edit/{id}', [StudUpdateController::class, 'show']);
Route::post('edit/{id}', [StudUpdateController::class, 'edit']);

// delete process
Route::get('delete-records', [StudDeleteController::class, 'index']);
Route::get('delete/{id}', [StudDeleteController::class, 'destroy']);

/*
* SESSION PROCESS
*/
Route::get('session/get', [SessionController::class, 'accessSessionData']);
Route::get('session/set', [SessionController::class, 'storeSessionData']);
Route::get('session/remove', [SessionController::class, 'deleteSessionData']);

/*
* VALITATION PROCESS
*/
Route::get('/validation', [ValidationController::class, 'showForm']);
Route::post('/validation', [ValidationController::class, 'validateForm']);

/*
* UPLOAD FILE PROCESS
*/
Route::get('/uploadfile', [UploadFileController::class, 'index'])->name('uploadfile.index');
Route::post('/uploadfile', [UploadFileController::class, 'showUploadFile'])->name('uploadfile.showUploadFile');

/*
* MAIL PROCESS
*/
Route::get('sendbasicemail', [MailController::class, 'basicEmail'])->name('sendbasicemail');
Route::get('sendhtmlemail', [MailController::class, 'htmlEmail'])->name('sendhtmlemail');
Route::get('sendattachmentemail', [MailController::class, 'attachmentEmail'])->name('sendattachmentemail');

/*
* AJAX PROCESS
*/
Route::view('ajax', 'ajax.message');
Route::post('/getmsg', [AjaxController::class, 'index']);

/*
* PAGENATION PROCESS
*/
Route::get('pagination', [PaginationController::class, 'index']);

// DEMO
Route::get('/cache-demo', [ContractsController::class, 'cacheDemo']);

/*
* ERORR PROCESS
*/
Route::get('/throw-exception', function () {
    throw new CustomException('This is a custom exception.');
});


/*
* ENCRYPTION PROCESS
*/
Route::get('/encrypt', [EncryptionController::class, 'encrypt']);
Route::get('/decrypt', [EncryptionController::class, 'decrypt']);

/*
* HASHING PROCESS
*/
Route::post('/hashingRegister', [AuthController::class, 'register']);
Route::post('/hashingLogin', [AuthController::class, 'login']);

Route::get('/register12', [RegistrationController::class, 'register']);

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


Route :: get('about/{id}',function($id){
    return 'abouve'.$id;
});

Route::view('welcome','welcome',['name' => 'Anantha Babu']);


