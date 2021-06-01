<?php

use App\Http\Controllers\LogEntryController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/auth/google/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/google/callback', function () {
    $socialite = Socialite::driver('google')->user();

    $user = User::where('email', $socialite->getEmail())->first();
    if(!$user) {
        // User doesn't exist, we need to create one
        $user = User::create([
            'name' => $socialite->getName(),
            'email' => $socialite->getEmail(),
            'password' => Hash::make(Str::random(20)),
        ]);
    }

    Auth::loginUsingId($user->id, $remember = true);
    return redirect()->route('home');
});

Route::get('/auth/basic/redirect', function () {
    return redirect()->route('home');
})->middleware('auth.basic');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('log-entries', LogEntryController::class)->only([
        'index', 'create', 'store'
    ]);
});
