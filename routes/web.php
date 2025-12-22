<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingEnquiryController;
use App\Http\Controllers\CabController;
use App\Http\Controllers\CabServiceController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CustomizeTourEnquiryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnquiryController as ControllersEnquiryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PageController as ControllersPageController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TourPackageController as ControllersTourPackageController;
use App\Http\Controllers\Web\CabServiceController as WebCabServiceController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\PageController;
use App\Http\Controllers\Web\TourPackageController;
use App\Models\TourPackage;
use Illuminate\Support\Facades\Route;

Route::get('all-tours', function () {
    $tours = TourPackage::all();
    return response()->json($tours->toArray() ?? []);
});

Route::group([
    'prefix' => 'tour-panel',
], function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'doLogin']);


    Route::group([
        'middleware' => 'auth',
        'as' => 'admin.'
    ], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/site-setting', [SiteController::class, 'create'])->name('site.edit');
        Route::put('/site-setting', [SiteController::class, 'update'])->name('site.update');

        Route::post('/cab-service/{cabService}/details', [CabServiceController::class, 'updateDetails'])->name('cab-service.details');

        Route::resource('/booking-enquiry', BookingEnquiryController::class)->only(['index', 'destroy']);
        Route::resource('/customize-tour-enquiry', CustomizeTourEnquiryController::class)->only(['index', 'destroy']);
        Route::resource('/media', MediaController::class)->only(['index', 'store', 'destroy']);

        Route::resources([
            'slider' => SliderController::class,
            'city' => CityController::class,
            'cab' => CabController::class,
            'cab-service' => CabServiceController::class,
            'faq' => FaqController::class,
            'enquiry' => ControllersEnquiryController::class,
            'blog' => BlogController::class,
            'tour-package' => ControllersTourPackageController::class,
            'page' => ControllersPageController::class,
        ]);
    });
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/enquiry-submit', [ControllersEnquiryController::class, 'store'])->name('enquiry.submit');
Route::post('/customize-tour', [CustomizeTourEnquiryController::class, 'store'])->name('customize-tour.store');
Route::get('/tours/{tourPackage}', [TourPackageController::class, 'show'])->name('tour.show');
Route::get('/cab-service/{cabService}', [WebCabServiceController::class, 'show'])->name('cab-service.show');
Route::resource('/blog', BlogController::class)->only(['show']);
Route::resource('/cab', CabController::class)->only(['show']);
Route::resource('/booking-enquiry', BookingEnquiryController::class)->only(['store']);
Route::get('{page}', [PageController::class, 'show'])->name('page.show');
