<?php

use Illuminate\Support\Facades\Route;
use App\Models\Xodim;
use App\Models\Yangilik;
use App\Http\Controllers\XodimController;
use App\Http\Controllers\YangilikController;

// Public HOME (welcome) — DB’dan xodimlar va yangiliklar chiqaradi
Route::get('/', function () {
    $xodimlar = Xodim::orderBy('id')->get();
    $yangiliklar = Yangilik::orderByDesc('id')->get(); // xohlasangiz ->take(8)->get()

    return view('welcome', compact('xodimlar', 'yangiliklar'));
})->name('home');


// Admin panel (auth kerak)
Route::middleware(['auth'])->group(function () {

    // Login bo‘lgandan keyin /admin ga kirsangiz xodimlar sahifasiga otkazadi
    Route::get('/admin', function () {
        return redirect()->route('xodimlar.index');
    })->name('admin');

    Route::resource('xodimlar', XodimController::class)
        ->parameters(['xodimlar' => 'xodim']);

    Route::resource('yangiliklar', YangilikController::class)
        ->parameters(['yangiliklar' => 'yangilik']);
});


// Auth routes (Breeze/Jetstream)
if (file_exists(__DIR__ . '/auth.php')) {
    require __DIR__ . '/auth.php';
}
