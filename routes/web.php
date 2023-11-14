<?php

use App\Http\Controllers\RolesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\IdeaClosureDatesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ReportsController;




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
    return view('auth.login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('categories', CategoriesController::class);
Route::resource('ideas', IdeaController::class);
Route::resource('users', UsersController::class);
Route::resource('closureDates', IdeaClosureDatesController::class);
Route::resource('roles', RolesController::class);
Route::resource('reports', ReportsController::class);
Route::get('thumbsUp/{id}', 'App\Http\Controllers\IdeaController@thumbUp')->name('thumbsUp');
Route::get('thumbsDown/{id}', 'App\Http\Controllers\IdeaController@thumbDown')->name('thumbsDown');
Route::get('comment/{id}', 'App\Http\Controllers\IdeaController@comments')->name('comments');
Route::post('/postComment', 'App\Http\Controllers\IdeaController@commentStore')->name('commentStore');


Route::resource('departments', DepartmentsController::class);


// Route::get('/view/roles', [App\Http\Controllers\UsersController::class, 'viewRoles'])->name('viewRoles');
// Route::get('/create/roles', [App\Http\Controllers\UsersController::class, 'createRoles'])->name('createRoles');
// Route::post('/store/roles', [App\Http\Controllers\UsersController::class, 'storeRoles'])->name('storeRoles');



Route::get('send-mail', function () {
    $details = [
        'title' => 'Mail from Eweb',
        'body' => 'Your account has been created '
    ];

    \Mail::to('wmoonga@gmail.com')->send(new \App\Mail\MyTestMail($details));

    // dd("Email is Sent.");
});

Route::get('/send-user-email', 'App\Http\Controllers\IdeaController@notifyUser')->name('notifyUser');
Route::get('/closure/date', 'App\Http\Controllers\IdeaController@setClosureDate')->name('closureDate');
Route::post('/closure/date/store', 'App\Http\Controllers\IdeaController@setClosureDateStore')->name('closureDateStore');


Route::get('/reports/ideas/per/department', 'App\Http\Controllers\ReportsController@ideasPerDept')->name('reportIdeasPerDept');
Route::get('/reports/ideas/percentage/department', 'App\Http\Controllers\ReportsController@ideasPerCategory')->name('ideasPerCategory');


Route::get('get/ideas/totals', 'App\Http\Controllers\ReportsController@getTotalideas');