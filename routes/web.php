<?php

use App\Http\Controllers\AdvertController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DocController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return redirect('/dashboard');
});

Route::prefix('dashboard')->group(function () {

    Route::controller(AuthController::class)->prefix('auth')->group(function(){
        Route::get('/login', 'showLogin')->name('login');
        Route::post('/login', 'login')->name('login-post');
        Route::get('/register', 'showRegister')->name('register');
        Route::get('/logout', 'logout')->name('logout');
    });

    Route::middleware('auth')->group(function () {

        Route::controller(MainController::class)->group(function(){
            Route::get('/', 'home')->name('control-panel');
            Route::get('/system', 'system')->name('system');
            Route::post('/system/save', 'system_save')->name('system-save');
        });

        Route::controller(UserController::class)->prefix('user')->group(function(){
            Route::get('/all', 'all')->name('users');
            Route::get('/new', 'new')->name('user-new');
            Route::post('/new', 'newUser')->name('user-post-new');
            Route::post('/change-password', 'change_password')->name('user-post-change-password');
            Route::post('/update', 'update')->name('user-update');
            Route::post('/remove', 'remove')->name('user-remove');
        });


        Route::controller(CustomerController::class)->prefix('/customer')->group(function(){
            Route::get('/new' , 'new')->name('customer-new');
            Route::get('/all' , 'all')->name('customer-all');
            Route::get('/detail/{id}', 'detail')->name('customer-detail');
            Route::post('/save', 'save')->name('customer-save');
            Route::post('/update', 'update')->name('customer-update');
        });

        Route::controller(AdvertController::class)->prefix('advert')->group(function(){
            Route::get('/new', 'new')->name('advert-new');
            Route::get('/all', 'all')->name('advert-all');
            Route::get('/detail/{id}', 'detail')->name('advert-detail');
            Route::get('/edit/{id}', 'edit')->name('advert-edit');
            Route::get('/sold', 'sold')->name('advert-sold');
            Route::get('/on-sale', 'on_sale')->name('advert-on-sale');
            Route::post('/save', 'save')->name('advert-save');
            Route::post('/update', 'update')->name('advert-update');
            Route::post('/change-status', 'change_status')->name('advert-change-status');
            Route::post('/add-note', 'add_note')->name('advert-add-note');
            Route::post('/sell', 'sell')->name('advert-sell');
            Route::post('/add-expense', 'add_expense')->name('advert-add-expense');
            Route::post('/delete', 'delete')->name('advert-delete');
            Route::post('/delete/photo', 'delete_photo')->name('advert-delete-photo');
        });

        Route::controller(ReportController::class)->prefix('report')->middleware('auth')->group(function(){
            Route::get('/revenue', 'revenue')->name('report-revenue');
            Route::get('/expense', 'expense')->name('report-expense');
            Route::post('/get-user-report', 'get_user_report')->name('report-get-user');
            Route::post('/get-user-expense-report', 'get_user_expense_report')->name('report-get-user-expense');
            Route::post('/get-car-expense-report', 'get_car_expense_report')->name('report-get-car-expense');
        });

        Route::controller(DocController::class)->prefix('docs')->middleware('auth')->group(function(){
            Route::get('how-to-use', 'htu')->name('htu');
            Route::get('support', 'support')->name('support');
        });

        Route::controller(VehicleController::class)->prefix('type')->middleware('auth')->group(function(){
            Route::post('brands', 'getBrands')->name('get-brands');
            Route::post('/model/models', 'getModels')->name('get-models');
        });

        Route::controller(UploadController::class)->prefix('upload')->middleware('auth')->group(function(){
            Route::post('/profile', 'profile')->name('upload-profile');
            Route::post('/photos', 'photos')->name('upload-photos');
            Route::post('/get-photos', 'get_photos')->name('get-photos');
        });
    });
});


