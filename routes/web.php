<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/*', function () {
    echo "404 ERROR";
});

Route::get('/register', [RegistrationController::class, 'index'])->name('register');

Route::group(['prefix' => '/customer'], function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customer');
    Route::get('/trash', [CustomerController::class, 'trash'])->name('customer.trash');
    Route::post('/', [CustomerController::class, 'store'])->name('customer');
    Route::get('/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');
    Route::get('/forcedelete/{id}', [CustomerController::class, 'forceDelete'])->name('customer.forcedelete');
    Route::get('/restore/{id}', [CustomerController::class, 'restore'])->name('customer.restore');
    Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
});


//middleware checking
Route::get('/no-access', function () {
    echo 'You are not allowed to access this page.';
})->name('no-route');

// middleware group for database relations
Route::middleware(['guard'])->group(function () {
    Route::get('/data', [IndexController::class, 'data'])->middleware('guard');
    Route::get('/data2', [IndexController::class, 'data2'])->middleware('guard');
});

//route model binding
Route::get('/blood/{id}', [IndexController::class, 'blood']);

//retireving all sessions
Route::get('/get-all-session', function () {
    $session = session()->all();
    p($session);
});

//setting session
Route::get('/set-session', function (Request $request) {
    $request->session()->put('user_name', 'Durlav Parajuli');
    $request->session()->put('user_id', '123');
    // $request->session()->flash('status', 'Success'); //flash one time only
    return redirect('get-all-session');
});

//destroy session
Route::get('/destroy-session', function () {
    session()->forget(['user_name', 'user_id']);
    return redirect('get-all-session');
});

//File Upload
Route::get('/upload', function () {
    return view('upload');
});
Route::post('/upload', [RegistrationController::class, 'upload'])->name('upload');

//language change
Route::get('/{lang?}', function ($lang = null) {
    App::setLocale($lang);
    return view('welcome');
});