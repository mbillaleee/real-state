<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Backend\AmenitieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\PropertyTypeController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Admin Group Middleware
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/update', [AdminController::class, 'AdminProfileUpdate'])->name('admin.profile.update');
    Route::get('/admin/change/password', [AdminController::class, 'AdminCangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
});
Route::middleware(['auth','role:agent'])->group(function(){
    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
});


Route::get('/admin/login', [AdminController::class, 'AdminLogIn'])->name('admin.login');



//Admin Group Middleware
Route::middleware(['auth','role:admin'])->group(function(){
    Route::controller(PropertyTypeController::class)->group(function(){
        //Property type controller
        Route::get('/all/type', 'index')->name('all.type');
        Route::get('/add/type', 'create')->name('add.type');
        Route::post('/store/type', 'store')->name('store.type');
        Route::get('/edit/type/{id}', 'edit')->name('edit.type');
        Route::post('/update/type/{id}', 'update')->name('update.type');
        Route::get('/delete/type/{id}', 'destroy')->name('delete.type');

    });

    Route::controller(AmenitieController::class)->group(function(){
        //Property amenitie controller
        Route::get('/all/amenitie', 'index')->name('all.amenitie');
        Route::get('/add/amenitie', 'create')->name('add.amenitie');
        Route::post('/store/amenitie', 'store')->name('store.amenitie');
        Route::get('/edit/amenitie/{id}', 'edit')->name('edit.amenitie');
        Route::post('/update/amenitie/{id}', 'update')->name('update.amenitie');
        Route::get('/delete/amenitie/{id}', 'destroy')->name('delete.amenitie');

    });

    //Permission All Route
    Route::controller(RoleController::class)->group(function(){
        //  controller
        Route::get('/all/permission', 'AllPermission')->name('all.permission');
        Route::get('/add/permission', 'CreatePermission')->name('add.permission');
        Route::post('/store/permission', 'StorePermission')->name('store.permission');
        Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
        Route::post('/update/permission/{id}', 'UpdatePermission')->name('update.permission');
        Route::get('/delete/permission/{id}', 'DestroyPermission')->name('delete.permission');
        Route::get('/import/permission', 'ImportPermission')->name('import.permission');
        Route::get('/export/permission', 'ExportPermission')->name('export.permission');
        Route::post('/import/store/permission', 'ImportStorePermission')->name('import.store.permission');

    });
    //Permission All Route
    Route::controller(RoleController::class)->group(function(){
        //  controller
        Route::get('/all/role', 'AllRole')->name('all.role');
        Route::get('/add/role', 'CreateRole')->name('add.role');
        Route::post('/store/role', 'StoreRole')->name('store.role');
        Route::get('/edit/role/{id}', 'EditRole')->name('edit.role');
        Route::post('/update/role/{id}', 'UpdateRole')->name('update.role');
        Route::get('/delete/role/{id}', 'DestroyRole')->name('delete.role');
        Route::get('/import/role', 'ImportRole')->name('import.role');
        Route::get('/export/role', 'ExportRole')->name('export.role');
        Route::post('/import/store/role', 'ImportStoreRole')->name('import.store.role');


        Route::get('/add/roles/permission', 'AddRolePermission')->name('add.roles.permission');

    });

  });

require __DIR__.'/auth.php';
