
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserManagementController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('admin')->group(function () {
    Route::controller(UserManagementController::class)->prefix('user-management')->group(function () {
        Route::get('users', 'index'); // all users, + fetch by type
        Route::get('user/{id}', 'show')->name('show.user');
        Route::post('user/{id}/accept', 'accept');
        Route::post('user/{id}/refuse', 'refuse');
        Route::get('applicants', 'showRegistrationRequests');
        Route::get('update-requests', 'showUserProfileUpdateRequests');
    });
});