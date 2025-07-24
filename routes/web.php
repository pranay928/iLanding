<?php

use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/',[HomeController::class,'home']);
Route::post('/msgFromHomePage',[HomeController::class,'msgFromHomePage'])->name('msgFromHomePage');


Route::middleware(['guest'])->group(function () {
    
    Route::get('/showRegister',[AdminController::class,'showRegister'])->name('showRegister');
    Route::post('/register',[AdminController::class,'register'])->name('register');
    Route::get('/panel',[AdminController::class,'showLogin'])->name('showLogin');
    Route::post('login',[AdminController::class,'login'])->name('login');
    
});


Route::middleware(['auth'])->group(function () {
    
    
    Route::get('/userType',[AdminController::class,'userType'])->name('userType');
    Route::get('/logout',[AdminController::class,'logout'])->name('logout');
    
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    
    Route::get('/showAddToHeroSection',[DashboardController::class,'showAddToHeroSection'])->name('showAddToHeroSection');
    Route::post('/addToHeroSection',[DashboardController::class,'addToHeroSection'])->name('addToHeroSection');
    
    
    Route::get('/showAddToAboutSection',[DashboardController::class,'showAddToAboutSection'])->name('showAddToAboutSection');
    Route::post('/addToAboutSection',[DashboardController::class,'addToAboutSection'])->name('addToAboutSection');
    
    
    Route::get('/showFeaturesSection',[DashboardController::class,'showFeaturesSection'])->name('showFeaturesSection');
    Route::get('/showAddTooFeaturesSection',[DashboardController::class,'showAddTooFeaturesSection'])->name('showAddTooFeaturesSection');
    Route::post('/AddToFeaturesSection',[DashboardController::class,'AddToFeaturesSection'])->name('AddToFeaturesSection');
    Route::get('/showModifyFeaturesSection/{id}',[DashboardController::class,'showModifyFeaturesSection'])->name('showModifyFeaturesSection');
    Route::put('/UpdateToFeaturesSection/{id}',[DashboardController::class,'UpdateToFeaturesSection'])->name('UpdateToFeaturesSection');
    Route::delete('/DeleteToFeaturesSection/{id}',[DashboardController::class,'DeleteToFeaturesSection'])->name('DeleteToFeaturesSection');
    
    
    Route::get('/showFeaturesCardSection',[DashboardController::class,'showFeaturesCardSection'])->name('showFeaturesCardSection');
    Route::post('/AddToFeaturesCardSection',[DashboardController::class,'AddToFeaturesCardSection'])->name('AddToFeaturesCardSection');
    Route::get('/showFeaturesCardTableSection',[DashboardController::class,'showFeaturesCardTableSection'])->name('showFeaturesCardTableSection');
    Route::get('/showModifyFeatureCardSection/{id}',[DashboardController::class,'showModifyFeatureCardSection'])->name('showModifyFeatureCardSection');
    Route::delete('/DeleteToFeatureCardSection/{id}',[DashboardController::class,'DeleteToFeatureCardSection'])->name('DeleteToFeatureCardSection');
    Route::put('/UpdateToFeaturesCardSection/{id}',[DashboardController::class,'UpdateToFeaturesCardSection'])->name('UpdateToFeaturesCardSection');
    
    Route::get('/showAddToCTASection',[DashboardController::class,'showAddToCTASection'])->name('showAddToCTASection');
    Route::post('/AddToCTASection',[DashboardController::class,'AddToCTASection'])->name('AddToCTASection');
    
    Route::get('/showAddToTestimonialSection',[DashboardController::class,'showAddToTestimonialSection'])->name('showAddToTestimonialSection');
    Route::get('/showAddToTestimonialTableSection',[DashboardController::class,'showAddToTestimonialTableSection'])->name('showAddToTestimonialTableSection');
    Route::post('/AddToTestimonialSection',[DashboardController::class,'AddToTestimonialSection'])->name('AddToTestimonialSection');
    Route::get('/showUpdateToTestimonialSection/{id}',[DashboardController::class,'showUpdateToTestimonialSection'])->name('showUpdateToTestimonialSection');
    Route::put('/UpdateToTestimonialSection/{id}',[DashboardController::class,'UpdateToTestimonialSection'])->name('UpdateToTestimonialSection');
    Route::delete('/DeleteToTestimonialSection/{id}',[DashboardController::class,'DeleteToTestimonialSection'])->name('DeleteToTestimonialSection');
    
    
    Route::get('/showAddToServicesSection',[DashboardController::class,'showAddToServicesSection'])->name('showAddToServicesSection');
    Route::post('/AddToServicesSection',[DashboardController::class,'AddToServicesSection'])->name('AddToServicesSection');
    Route::get('/showAddToServicesTableSection',[DashboardController::class,'showAddToServicesTableSection'])->name('showAddToServicesTableSection');
    Route::get('/showUpdateToTeServicesSection/{id}',[DashboardController::class,'showUpdateToTeServicesSection'])->name('showUpdateToTeServicesSection');
    Route::put('/UpdateToTeServicesSection/{id}',[DashboardController::class,'UpdateToTeServicesSection'])->name('UpdateToTeServicesSection');
    
    Route::get('/showAddToContactSection',[DashboardController::class,'showAddToContactSection'])->name('showAddToContactSection');
    Route::post('/AddToContactSection',[DashboardController::class,'AddToContactSection'])->name('AddToContactSection');

    Route::get('/showMessagespage',[DashboardController::class,'showMessagespage'])->name('showMessagespage');
    
    
});

