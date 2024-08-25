<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentCategoryController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AgentJobpostController;
use App\Http\Controllers\ApplyjobController;
use App\Http\Controllers\ApplyUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobpostController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;






//Frontend
Route::redirect('/', 'loginPage');
// Route::get('welcome', function(){
//     return view('welcome');
// });

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('loginFront', [HomeController::class, 'loginPage'])->name('loginPage');
Route::get('registerFront', [HomeController::class, 'registerPage'])->name('registerPage');


//Admin login , register
Route::get('loginPage', [AuthController::class, 'loginPage'])->name('auth#loginPage');
Route::get('registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');

Route::post('logoutPage', [AuthController::class, 'logoutPage'])->name('auth#logout');
Route::post('logout', [AuthController::class, 'adminLogout'])->name('admin#logout');

Route::middleware(['auth'])->group(function () {

    //dashboard
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // admin
    Route::group(['prefix'=>'admin', 'middleware'=>'admin_auth'], function(){
        Route::get('dashboard', [AdminController::class, 'userList'])->name('user#list');
        Route::get('admin/profile', [AdminController::class, 'profile'])->name('admin#profile');
        Route::get('admin/profile-edit', [AdminController::class, 'profileEdit'])->name('admin#edit');
        Route::get('user-create/page', [AdminController::class, 'createPage'])->name('user#createPage');
        Route::post('create-user', [AdminController::class, 'create'])->name('user#create');


        //Users
        Route::prefix('registered-user')->group(function () {
            Route::get('edit/{id}', [RegisteredUserController::class, 'edit'])->name('user#edit');
            Route::post('update/{id}', [RegisteredUserController::class, 'userUpdate'])->name('user#update');
            Route::get('delete/{id}', [RegisteredUserController::class, 'delete'])->name('user#delete');
            Route::get('show/{id}', [RegisteredUserController::class, 'showDetails'])->name('user#details');
        });

        //Category
        Route::group(['prefix'=>'category', 'middleware'=>'admin_auth'], function(){
            Route::get('list', [CategoryController::class, 'list'])->name('category#list');
            Route::get('create/page', [CategoryController::class, 'createPage'])->name('category#createPage');
            Route::post('create', [CategoryController::class, 'create'])->name('category#create');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category#edit');
            Route::post('update/{id}', [CategoryController::class, 'categoryUpdate'])->name('category#update');
            Route::get('show/{id}', [CategoryController::class, 'showDetails'])->name('category#details');
            Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('category#delete');
        });

        //Job Posts
        Route::group(['prefix'=>'job', 'middleware'=>'admin_auth'], function(){
            Route::get('list', [JobpostController::class, 'list'])->name('job#list');
            Route::get('create/page', [JobpostController::class, 'createPage'])->name('job#createPage');
            Route::post('create', [JobpostController::class, 'create'])->name('job#create');
            Route::get('edit/{id}', [JobpostController::class, 'edit'])->name('job#edit');
            Route::post('update/{id}', [JobpostController::class, 'jobUpdate'])->name('job#update');
            Route::get('show/{id}', [JobpostController::class, 'showDetails'])->name('job#details');
            Route::get('delete/{id}', [JobpostController::class, 'delete'])->name('job#delete');

            Route::get('apply/user', [ApplyUserController::class, 'applyUser'])->name('apply#list');
        });

        // Search and Filter routes
        Route::get('/users/search', [RegisteredUserController::class, 'userSearch'])->name('user#search');

        //admin account
        Route::get('password/changePage', [AuthController::class, 'changePasswordPage'])->name('admin#changePasswordPage');
        Route::post('change/password', [AuthController::class, 'changePassword'])->name('admin#changePassword');
    });

    // Agent
    Route::group(['prefix'=>'agent', 'middleware'=>'agent_auth'], function(){
        Route::get('dashboard', [AgentController::class, 'dashboard'])->name('dashboard');
        Route::get('profile', [AgentController::class, 'index'])->name('profile');
        Route::get('edit/{id}', [AgentController::class, 'edit'])->name('agent#user#edit');
        Route::post('update/{id}', [AgentController::class, 'userUpdate'])->name('agent#user#update');
        Route::get('delete/{id}', [AgentController::class, 'delete'])->name('agent#user#delete');
        Route::get('show/{id}', [AgentController::class, 'showDetails'])->name('agent#user#details');

        //Category
        Route::group(['prefix'=>'category'], function(){
            Route::get('list', [AgentCategoryController::class, 'list'])->name('agent#category#list');
            Route::get('create/page', [AgentCategoryController::class, 'createPage'])->name('agent#category#createPage');
            Route::post('create', [AgentCategoryController::class, 'create'])->name('agent#category#create');
            Route::get('edit/{id}', [AgentCategoryController::class, 'edit'])->name('agent#category#edit');
            Route::post('update/{id}', [AgentCategoryController::class, 'categoryUpdate'])->name('agent#category#update');
            Route::get('show/{id}', [AgentCategoryController::class, 'showDetails'])->name('agent#category#details');
            Route::get('delete/{id}', [AgentCategoryController::class, 'delete'])->name('agent#category#delete');
        });

        //Job Posts
        Route::group(['prefix'=>'job'], function(){
            Route::get('list', [AgentJobpostController::class, 'list'])->name('agent#job#list');
            Route::get('search', [AgentJobpostController::class, 'search'])->name('agent#jobListSearch');
            Route::get('create/page', [AgentJobpostController::class, 'createPage'])->name('agent#job#createPage');
            Route::post('create', [AgentJobpostController::class, 'create'])->name('agent#job#create');
            Route::get('edit/{id}', [AgentJobpostController::class, 'edit'])->name('agent#job#edit');
            Route::post('update/{id}', [AgentJobpostController::class, 'jobUpdate'])->name('agent#job#update');
            Route::get('show/{id}', [AgentJobpostController::class, 'showDetails'])->name('agent#job#details');
            Route::get('delete/{id}', [AgentJobpostController::class, 'delete'])->name('agent#job#delete');

            Route::get('apply/user', [ApplyUserController::class, 'agentApplyUser'])->name('agent#apply#list');
        });

        //agent account
        Route::get('password/changePage', [AgentController::class, 'changePasswordPage'])->name('agent#changePasswordPage');
        Route::post('change/password', [AgentController::class, 'changePassword'])->name('agent#changePassword');

    });

    // user
    //home
    Route::group(['prefix'=>'user', 'middleware'=>'user_auth'], function(){
        // Route::get('home', function(){
        //     return view('user.home');
        // })->name('user#home');
        // Route::redirect('/', 'user-home');
        Route::get('user-home', [RegisteredUserController::class, 'index'])->name('user#home');


        Route::post('apply', [ApplyjobController::class, 'apply'])->name('applyJob');
    });
});









