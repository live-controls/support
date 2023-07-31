<?php

use Illuminate\Support\Facades\Route;

//Admin Interface
Route::middleware(array_merge([
    'web',
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified']) 
    )->group(function(){

        Route::prefix(config('livecontrols_support.route_prefix', 'support'))->group(function () {
            Route::get('tickets', [SupportTicketController::class, 'index'])->name('livecontrols.support.index');
            Route::get('tickets/new', [SupportTicketController::class, 'create'])->name('livecontrols.support.create');
            Route::post('tickets/new', [SupportTicketController::class, 'store'])->name('livecontrols.support.store');
            Route::get('tickets/show/{supportTicket}', [SupportTicketController::class, 'show'])->name('livecontrols.support.show');
            Route::delete('tickets/delete/{supportTicket}', [SupportTicketController::class, 'destroy'])->name('livecontrols.support.delete');
            Route::get('tickets/open/{supportTicket}', [SupportTicketController::class, 'open'])->name('livecontrols.support.open');
            Route::get('tickets/close/{supportTicket}', [SupportTicketController::class, 'close'])->name('livecontrols.support.close');
        });
});