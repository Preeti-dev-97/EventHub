<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganiserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriptionPlanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin/')->middleware(['auth','verified', 'admin'])->group(function() {
    Route::get('/admin_dashboard', function () {
        return view('admin.dashboard');
    })->name('admin_dashboard');

    Route::get('plans', [SubscriptionPlanController::class, 'index'])->name('plans.index');
    Route::get('plans/create', [SubscriptionPlanController::class, 'create'])->name('plans.create');
    Route::post('plans/create', [SubscriptionPlanController::class, 'store'])->name('plans.store');
     Route::get('plans/{plan}/edit', [SubscriptionPlanController::class, 'edit'])->name('plans.edit');
    Route::post('plans/{plan}/update', [SubscriptionPlanController::class, 'update'])->name('plans.update');

   // Include shared event routes with admin prefix
    Route::name('admin.')->group(base_path('routes/events.php'));

    Route::get('events/{event}/editStatus', [EventController::class, 'editStatus'])->name('events.editStatus');
    Route::post('events/{event}/editStatus', [EventController::class, 'updateStatus'])->name('events.updateStatus');

    Route::get('/events/upload', [EventController::class,'upload'])->name('events.upload');
    Route::post('/events/import', [EventController::class,'import'])->name('events.import');
});

Route::prefix('organiser/')->middleware(['auth', 'verified', 'organiser'])->group(function() {
    Route::get('/organiser_dashboard',[OrganiserController::class,'index'])->name('organiser_dashboard');

    Route::get('plans', [OrganiserController::class, 'plans'])->name('plans.list');
    Route::get('plans/{plan}/subscribe', [OrganiserController::class, 'subscribe'])->name('plans.subscribe');
    Route::get('success', [OrganiserController::class, 'success'])->name('plans.success');
    Route::get('cancel', [OrganiserController::class, 'cancel'])->name('plans.cancel');

    // Include shared event routes with organiser prefix
    Route::name('organiser.')->group(base_path('routes/events.php'));
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('events', [UserController::class, 'events'])->name('eventsList');
    Route::get('events/{event}', [UserController::class, 'show'])->name('eventShow');

    Route::get('bookEvent/{event}', [BookingController::class, 'bookEvent'])->name('bookEvent');
    Route::post('checkout/{event}', [BookingController::class, 'checkout'])->name('checkout');
    Route::get('payment/success', [BookingController::class, 'success'])->name('payment.success');
});

require __DIR__.'/auth.php';
