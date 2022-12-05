<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\Todo\TodoController;
use App\Http\Controllers\Admin\Member\MemberController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('admin',[
    Route::resource('banner', BannerController::class),
    Route::resource('blog', BlogController::class)->except('destroy'),
    Route::delete('blog/delete', [BlogController::class, 'destroy'])->name('blog.destroy'),
    Route::resource('todo', TodoController::class)->except('destroy'),
    Route::delete('todo/delete', [TodoController::class, 'destroy'])->name('todo.destroy'),

    Route::resource('member', MemberController::class),
    Route::post('/save', 'MemberController@save'),

// Route::patch('/update/{id}', ['as' => 'member.update', 'uses' => 'MemberController@update']),

// Route::delete('/delete', ['as' => 'member.delete', 'uses' => 'MemberController@delete']),

]);

