<?php

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

Auth::routes();

Route::get('auth/user', function() {
    $user = \Illuminate\Support\Facades\Auth::user();

    if (!$user) {
        return json_encode((object)[]);
    }

    return \App\User::find($user->id);
})->name('auth.user');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/info', 'UserInformationController')->name('user-info');
Route::resource('/profile', 'ProfileController')->only(['index', 'store', 'update'])->parameters([
    'profile' => 'user'
]);
Route::resource('/address', 'AddressController')->only(['store', 'update'])->parameters([
    'address' => 'user'
]);
