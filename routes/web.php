<?php

// use App\Http\Controllers\PageController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PhotoController;

Route::resource('photos', PhotoController::class);
Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);
Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
]);

Route::get('/hello', [WelcomeController::class,'hello']);

Route::get('/world', function () {
    return 'World';
});

Route::get('/', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/articles/{id}', [PageController::class, 'articles']);

Route::get('/user/{name}', function ($name) {
    return 'Nama Saya - ' . $name;
});

Route::get('/posts/{post}/comments/{comment}', function ($post, $comment) { 
    return 'Pos ke-' . $post . " Komentar ke-: " . $comment;
});


Route::get('/user/profile', function(){
    //
})->name('profile');

Route::middleware(['first', 'second'])->group(function () { 
    Route::get('/', function () { 
    }); 

    Route::get('/user/profile', function () {         
    }); 
});

Route::domain('{account}.example.com')->group(function () { 
    Route::get('/user/{id}', function ($account, $id) { 
    }); 
});

Route::middleware('auth')->group(function () { 
    Route::get('/user', [UserController::class, 'index']); 
    Route::get('/post', [PostController::class, 'index']); 
    Route::get('/event', [EventController::class, 'index']); 
});

Route::prefix('admin')->group(function () { 
    Route::get('/user', [UserController::class, 'index']); 
    Route::get('/post', [PostController::class, 'index']); 
    Route::get('/event', [EventController::class, 'index']);  
});

Route::redirect('/here', '/there',);

Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

// Route::get('/greeting', function () {  	
//     return view('hello', ['name' => 'Aril Ibbet Ardana Putra']); 
// }); 

Route::get('/greeting', [WelcomeController::class, 'greeting']); 