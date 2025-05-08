<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QrShowController;
use App\Services\UserTokenValidator;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //QRコード表示
    Route::get('/show',[QrShowController::class,'show'])->name('qr.show');

    Route::get('/qrcode/scan', fn() => view('qrcode.qr_scan'));

    Route::get('/token/check/{token}', function ($token, UserTokenValidator $validator) {
        if ($validator->isValid($token)) {
            return redirect()->route('token.valid'); // 有効な場合
        } else {
            return redirect()->route('token.invalid'); // 無効な場合
        }
        }); 
    Route::view('/token/valid', 'qrcode.valid')->name('token.valid');
    Route::view('/token/invalid', 'qrcode.invalid')->name('token.invalid');

});


require __DIR__.'/auth.php';
