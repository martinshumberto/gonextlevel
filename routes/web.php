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

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'Web\HomeController@index')->name('home');
    Route::get('/user/info', 'Web\UserInformationController')->name('user-info');
    Route::resource('/profile', 'Web\ProfileController')->only(['index', 'store', 'update'])->parameters([
        'profile' => 'user'
    ]);
    Route::resource('/address', 'Web\AddressController')->only(['store', 'update'])->parameters([
        'address' => 'user'
    ]);
    Route::resource('/prospect', 'Web\ProspectController')
        ->only(['index', 'store', 'update', 'destroy']);
    Route::post('/profile/upload', 'Web\ProfileAvatarUploadController')->name('profile.upload');
});
