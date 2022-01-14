<?php

use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\EnsembleController;
use App\Http\Controllers\Admin\EnsembletypeController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\InventorytypeController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\LocationdateController;
use App\Http\Controllers\Admin\MembershipController;
use App\Http\Controllers\Admin\MembershiptypeController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\OptiontypeController;
use App\Http\Controllers\Admin\ParticipantController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PaymenttypeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PhoneController;
use App\Http\Controllers\Admin\PhonetypeController;
use App\Http\Controllers\Admin\RepertoireController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Route::redirect('/', '/login');
Route::view('/', 'welcome');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Membership
    Route::resource('memberships', MembershipController::class, ['except' => ['store', 'update', 'destroy']]);

    // Membershiptype
    Route::resource('membershiptypes', MembershiptypeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Event
    Route::resource('events', EventController::class, ['except' => ['store', 'update', 'destroy']]);

    // Location
    Route::resource('locations', LocationController::class, ['except' => ['store', 'update', 'destroy']]);

    // Locationdate
    Route::resource('locationdates', LocationdateController::class, ['except' => ['store', 'update', 'destroy']]);

    // Participant
    Route::post('participants/media', [ParticipantController::class, 'storeMedia'])->name('participants.storeMedia');
    Route::resource('participants', ParticipantController::class, ['except' => ['store', 'update', 'destroy']]);

    // Optiontype
    Route::resource('optiontypes', OptiontypeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Option
    Route::resource('options', OptionController::class, ['except' => ['store', 'update', 'destroy']]);

    // School
    Route::resource('schools', SchoolController::class, ['except' => ['store', 'update', 'destroy']]);

    // Ensembletype
    Route::resource('ensembletypes', EnsembletypeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Ensemble
    Route::resource('ensembles', EnsembleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Repertoire
    Route::resource('repertoires', RepertoireController::class, ['except' => ['store', 'update', 'destroy']]);

    // Phonetype
    Route::resource('phonetypes', PhonetypeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Phone
    Route::resource('phones', PhoneController::class, ['except' => ['store', 'update', 'destroy']]);

    // Inventorytype
    Route::resource('inventorytypes', InventorytypeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Inventory
    Route::resource('inventories', InventoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Cart
    Route::resource('carts', CartController::class, ['except' => ['store', 'update', 'destroy']]);

    // Paymenttype
    Route::resource('paymenttypes', PaymenttypeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Payment
    Route::resource('payments', PaymentController::class, ['except' => ['store', 'update', 'destroy']]);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});

Route::group([
    'prefix' => 'user',
    'as' => 'user.',
    'namespace' => 'User',
    'middleware' => ['auth']
], function(){

   Route::get('/', [\App\Http\Controllers\Users\HomeController::class, 'index'])
    ->name('home');

    /** LOG OUT */
    Route::get('/logout', [\App\Http\Controllers\Users\LogoutController::class, 'index'])
        ->name('logout');

   /** MEMBERSHIP */
    Route::get('/membership', [\App\Http\Controllers\Users\MembershipController::class, 'index'])
        ->name('membership');
    Route::post('/membership/update', [\App\Http\Controllers\Users\MembershipController::class, 'update'])
        ->name('membership.update');

    /** OPTIONS */
    Route::get('/options', [\App\Http\Controllers\Users\OptionController::class, 'index'])
        ->name('options');
    Route::post('/options/update', [\App\Http\Controllers\Users\OptionController::class, 'update'])
        ->name('options.update');

    /** PASSWORD */
    Route::get('/password', [\App\Http\Controllers\UsersPasswordpController::class, 'index'])
        ->name('password');
    Route::post('/password/update', [\App\Http\Controllers\Users\PasswordController::class, 'update'])
        ->name('password.update');

    /** PHONES */
    Route::get('/phones', [\App\Http\Controllers\Users\PhoneController::class, 'index'])
        ->name('phones');
    Route::post('/phones/update', [\App\Http\Controllers\Users\PhoneController::class, 'update'])
        ->name('phones.update');

    /** PROFILE */
    Route::get('/profile', [\App\Http\Controllers\Users\ProfileController::class, 'index'])
        ->name('profile');
    Route::post('/profile/update', [\App\Http\Controllers\Users\ProfileController::class, 'update'])
        ->name('profile.update');

    /** SCHOOL */
    Route::get('/school', [\App\Http\Controllers\Users\SchoolController::class, 'index'])
        ->name('school');
    Route::post('/school/update', [\App\Http\Controllers\Users\SchoolController::class, 'update'])
        ->name('school.update');

    /** BROKEN SVG */
    Route::view('brokensvg', 'tailwinduiTemplate')->name('brokensvg');

});
