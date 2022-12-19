<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\Loan\LoanController;
use App\Http\Controllers\Admin\Todo\TodoController;
use App\Http\Controllers\Admin\Income\IncomeController;
use App\Http\Controllers\Admin\Member\MemberController;
use App\Http\Controllers\Admin\Account\AccountController;
use App\Http\Controllers\Admin\Expense\ExpenseController;
use App\Http\Controllers\Admin\Account\LedgerGroupController;
use App\Http\Controllers\Admin\Investment\InvestmentController;
use App\Http\Controllers\AdminController;

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


Route::get('/admin/home', [AdminController::class,'home'])->name('admin.setting');
require __DIR__.'/auth.php';

Route::middleware('auth')->prefix('admin')->group(function(){
    Route::get('/account', [AccountController::class , 'account'])->name('account');
    Route::resource('account/ledger-group', LedgerGroupController::class)->except('destroy');
Route::delete('account/ledger-group/delete', [LedgerGroupController::class, 'destroy'])->name('ledgergroup.destroy');
    Route::resource('banner', BannerController::class);
    Route::resource('blog', BlogController::class)->except('destroy');
    Route::delete('blog/delete', [BlogController::class, 'destroy'])->name('blog.destroy');
    Route::resource('todo', TodoController::class)->except('destroy');
    Route::delete('todo/delete', [TodoController::class, 'destroy'])->name('todo.destroy');

    Route::resource('loan', LoanController::class)->except('destroy');
    Route::delete('loan/delete', [LoanController::class, 'destroy'])->name('loan.destroy');

    Route::resource('investment', InvestmentController::class)->except('destroy');
    Route::delete('investment/delete', [InvestmentController::class, 'destroy'])->name('investment.destroy');


    Route::resource('income', IncomeController::class)->except('destroy');
    Route::delete('income/delete', [IncomeController::class, 'destroy'])->name('income.destroy');

    Route::resource('expense', ExpenseController::class)->except('destroy');
    Route::delete('expense/delete', [ExpenseController::class, 'destroy'])->name('expense.destroy');




    // Route::resource('member', MemberController::class)->except('create,show'),
    // Route::post('/save', 'MemberController@save'),

// Route::patch('/update/{id}', ['as' => 'member.update', 'uses' => 'MemberController@update']),

// Route::delete('/delete', ['as' => 'member.delete', 'uses' => 'MemberController@delete']),
// Route::resource('account', AccountController::class)->except('destroy'),
// Route::delete('account/delete', [AccountController::class, 'destroy'])->name('account.destroy'),

});

