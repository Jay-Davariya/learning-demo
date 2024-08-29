<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Mail\StaticMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\ShopkeeperController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';


// Route::get('index', function () {
//     return view('index');
// });

Route::get('/dashboard', function () {
    return view('home');
});
Route::get('/getproduct/{id}', function () {
    return view('customerproduct');  
}); 
Route::get('/dashboard', [CustomerController::class, 'count'])->name('customer.dashboard');

Route::post('getState/{id}', [CustomerController::class, 'getStates'])->name('customer.getStates');

Route::post('getCities/{id}', [CustomerController::class, 'getCities'])->name('customer.getCities');

// Route::get('/', function (Request $request) {
// });
// Route::get('/customer',[CustomerController::class,'index'])->name('customer');
// Route::get('customer/{id}',[ProductController::class,'index'])->name('customer.product');

// Route::get('edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');

// Route::post('update', [CustomerController::class, 'update'])->name('customer.update');

// Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');

// Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
// Route::post('/store', [ProductController::class, 'store'])->name('product.store');

Route::delete('customer/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');

// Route::post('/upload-product', [CustomerController::class, 'uploadProfile'])->name('upload.product');

// Route::get('/search', [CustomerController::class, 'search'])->name('customer.search');
// Route::get('/shopkeeper', [ShopkeeperController::class, 'dropdown'])->name('dropdown.shopkeeper');

// Route::resource('customer', 'CustomerController', [
//     'except' => ['customer', 'store']   
// ]); 

Route::get('upload-ui', [CustomerController::class, 'uploadUi' ]);
Route::post('file-upload', [CustomerController::class, 'FileUpload' ])->name('FileUpload');

Route::get('customer-data', [CustomerController::class, 'getData'])->name('customer.data');

Route::get('/getproduct/{id}', [ProductController::class, 'getproduct'])->name('getproduct');

Route::get('/product/{id}', [ProductController::class, 'index'])->name('product.data');

Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::resource('customer', CustomerController::class);
    Route::resource('product', ProductController::class);


});

// Route::get('/send-static-mail', function () {
//     mail::to('jaydavariya95@gmail.com')->send(new StaticMail());
//     return 'Static mail has been sent!';
// });
// Route::get('send-mail', [CustomerController::class, 'index']);

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
