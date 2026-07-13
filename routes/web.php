<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PetController;
use App\Models\Pet;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'totalPets' => Pet::count(),
        'latestPet' => Pet::latest('created_at')->first(),
    ]);
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Pet management (list, create form + store)
    Route::get('/pets', [PetController::class, 'index'])->name('pets.index');
    Route::get('/pets/create', [PetController::class, 'create'])->middleware(['verified'])->name('pets.create');
    Route::post('/pets', [PetController::class, 'store'])->name('pets.store');
});

require __DIR__.'/auth.php';
