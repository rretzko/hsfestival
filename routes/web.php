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

Route::view('/', 'welcome');

Auth::routes(['register' => true]);

/** PAYPAL IPN ACCESS */
Route::post('update_account', [App\Http\Controllers\Paypal\PaypalController::class,'update'])->name('paypal.ipn');

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

    /** COVID-19 STATUS */
    Route::get('/covid19status', [\App\Http\Controllers\Users\Covid19Controller::class, 'create'])
        ->name('covid19status');
    Route::get('/covid19status/edit/{vaccination}', [\App\Http\Controllers\Users\Covid19Controller::class, 'edit'])
        ->name('covid19status.edit');
    Route::get('/covid19status/show', [\App\Http\Controllers\Users\Covid19Controller::class, 'show'])
        ->name('covid19status.show');
    Route::get('/covid19status/remove/{vaccination}', [\App\Http\Controllers\Users\Covid19Controller::class, 'destroy'])
        ->name('covid19status.remove');
    Route::post('/covid19status/store', [\App\Http\Controllers\Users\Covid19Controller::class, 'store'])
        ->name('covid19status.store');
    Route::post('/covid19status/update/{vaccination}', [\App\Http\Controllers\Users\Covid19Controller::class, 'update'])
        ->name('covid19status.update');
    Route::post('/covid19status/upload', [\App\Http\Controllers\Users\Covid19Controller::class, 'upload'])
        ->name('covid19status.upload');

    /** ENSEMBLES */
    Route::get('/ensembles', [\App\Http\Controllers\Users\EnsembleController::class, 'index'])
        ->name('ensembles');
    Route::get('/ensembles/create', [\App\Http\Controllers\Users\EnsembleController::class, 'create'])
        ->name('ensembles.create');
    Route::get('/ensembles/destroy/{ensemble}', [\App\Http\Controllers\Users\EnsembleController::class, 'destroy'])
        ->name('ensembles.destroy');
    Route::get('/ensembles/edit/{ensemble}', [\App\Http\Controllers\Users\EnsembleController::class, 'edit'])
        ->name('ensembles.edit');
    Route::post('/ensembles/store', [\App\Http\Controllers\Users\EnsembleController::class, 'store'])
        ->name('ensembles.store');
    Route::post('/ensembles/update/{ensemble}', [\App\Http\Controllers\Users\EnsembleController::class, 'update'])
        ->name('ensembles.update');

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
    //Route::get('/password', [\App\Http\Controllers\UsersPasswordpController::class, 'index'])
    //    ->name('password');
    Route::post('/password/update', [\App\Http\Controllers\Users\PasswordController::class, 'update'])
        ->name('password.update');

    /** PAYMENT */
    Route::get('/payment', [\App\Http\Controllers\Users\Payments\PaymentController::class, 'index'])
        ->name('payment');
    Route::get('/payment/download', [\App\Http\Controllers\Users\Payments\PaymentController::class, 'download'])
        ->name('payment.download');

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

    /** RECORDINGS */
    Route::get('/recordings', [\App\Http\Controllers\Users\AdjudicationController::class, 'index'])
        ->name('recordings');

    /** REPERTOIRE */
    Route::get('/repertoire/{ensemble}', [\App\Http\Controllers\Users\RepertoireController::class, 'index'])
        ->name('repertoire');
    Route::get('/repertoire/{event}/{ensemble}/create', [\App\Http\Controllers\Users\RepertoireController::class, 'create'])
        ->name('repertoire.create');
    Route::get('/repertoire/destroy/{repertoire}', [\App\Http\Controllers\Users\RepertoireController::class, 'destroy'])
        ->name('repertoire.destroy');
    Route::get('/repertoire/edit/{repertoire}', [\App\Http\Controllers\Users\RepertoireController::class, 'edit'])
        ->name('repertoire.edit');
    Route::post('/repertoire/{event}/{ensemble}/store', [\App\Http\Controllers\Users\RepertoireController::class, 'store'])
        ->name('repertoire.store');
    Route::post('/repertoire/update/{repertoire}', [\App\Http\Controllers\Users\RepertoireController::class, 'update'])
        ->name('repertoire.update');

    /** SCHOOL */
    Route::get('/school', [\App\Http\Controllers\Users\SchoolController::class, 'index'])
        ->name('school');
    Route::post('/school/update', [\App\Http\Controllers\Users\SchoolController::class, 'update'])
        ->name('school.update');

    /** SIGHTREADING */
    Route::get('/sightreading', [\App\Http\Controllers\Users\SightreadingController::class, 'index'])
        ->name('sightreading');
    Route::post('/sightreading/update', [\App\Http\Controllers\Users\SightreadingController::class, 'update'])
        ->name('sightreading.update');

    /** BROKEN SVG */
    Route::view('brokensvg', 'tailwinduiTemplate')->name('brokensvg');

});

/** EVENT MANAGEMENT */
Route::group([
    'prefix' => 'eventmanagement',
    'as' => 'eventmanagement.',
    'middleware' => ['auth']
], function(){

    Route::get('/eventmanagement', [\App\Http\Controllers\Eventmanagement\EventmanagementController::class, 'index'])
        ->name('index');

    /** ADJUDICATORS */
    Route::get('/adjudicators', [\App\Http\Controllers\Eventmanagement\AdjudicatorController::class, 'create'])
        ->name('adjudicators.create');
    Route::get('/adjudicators/attach/{adjudicator}', [\App\Http\Controllers\Eventmanagement\AdjudicatorController::class, 'attach'])
        ->name('adjudicators.attach');
    Route::get('/adjudicators/edit/{adjudicator}', [\App\Http\Controllers\Eventmanagement\AdjudicatorController::class, 'edit'])
        ->name('adjudicators.edit');
    Route::get('/adjudicators/remove/{adjudicator}', [\App\Http\Controllers\Eventmanagement\AdjudicatorController::class, 'destroy'])
        ->name('adjudicators.remove');
    Route::post('/adjudicators/store', [\App\Http\Controllers\Eventmanagement\AdjudicatorController::class, 'store'])
        ->name('adjudicators.store');
    Route::post('/adjudicators/update/{adjudicator}', [\App\Http\Controllers\Eventmanagement\AdjudicatorController::class, 'update'])
        ->name('adjudicators.update');

    /** LOG IN AS */
    Route::get('/loginas', [\App\Http\Controllers\Eventmanagement\LoginasController::class, 'index'])
        ->name('loginas.index');
    Route::post('/loginas/update', [\App\Http\Controllers\Eventmanagement\LoginasController::class, 'update'])
        ->name('loginas.update');

    /** PARTICIPANTS */
    Route::get('/participants', [\App\Http\Controllers\Eventmanagement\RegistrantController::class, 'index'])
        ->name('participants.index');
    Route::get('/participant/{user}', [\App\Http\Controllers\Eventmanagement\ParticipantController::class, 'edit'])
        ->name('participant.edit');

    /** PASSWORD RESET */
    Route::get('/passwordreset', [\App\Http\Controllers\Eventmanagement\PasswordresetController::class, 'index'])
        ->name('passwordreset.index');
    Route::post('/passwordreset/update', [\App\Http\Controllers\Eventmanagement\PasswordresetController::class, 'update'])
        ->name('passwordreset.update');

    /** PAYMENTS */
    Route::get('/payments', [\App\Http\Controllers\Eventmanagement\PaymentController::class, 'index'])
        ->name('payments.index');
    Route::get('/payments/edit/{payment}', [\App\Http\Controllers\Eventmanagement\PaymentController::class, 'edit'])
        ->name('payments.edit');
    Route::get('/payments/export', [\App\Http\Controllers\Eventmanagement\PaymentController::class, 'export'])
        ->name('payments.export');
    Route::post('/payments/store', [\App\Http\Controllers\Eventmanagement\PaymentController::class, 'store'])
        ->name('payments.store');
    Route::post('/payments/update/{payment}', [\App\Http\Controllers\Eventmanagement\PaymentController::class, 'update'])
        ->name('payments.update');
    Route::get('/payments/delete/{payment}', [\App\Http\Controllers\Eventmanagement\PaymentController::class, 'destroy'])
        ->name('payments.delete');

    /** PAYMENTS FOR SIGHTREADINGS */
    Route::get('/sightreadingpayments', [\App\Http\Controllers\Eventmanagement\Sightreadings\PaymentController::class, 'index'])
        ->name('sightreadings.payments.index');
    Route::get('/sightreadingpayments/edit/{sightreadingPayment}', [\App\Http\Controllers\Eventmanagement\Sightreadings\PaymentController::class, 'edit'])
        ->name('sightreadings.payments.edit');
    Route::get('/sightreadingpayments/remove/{sightreadingPayment}', [\App\Http\Controllers\Eventmanagement\Sightreadings\PaymentController::class, 'destroy'])
        ->name('sightreadings.payments.remove');
    Route::get('/sightreadingpayments/export', [\App\Http\Controllers\Eventmanagement\Sightreadings\PaymentController::class, 'export'])
        ->name('sightreadings.payments.export');
    Route::post('/sightreadingpayments/store', [\App\Http\Controllers\Eventmanagement\Sightreadings\PaymentController::class, 'store'])
        ->name('sightreadings.payments.store');
    Route::post('/sightreadingpayments/update/{sightreadingPayment}', [\App\Http\Controllers\Eventmanagement\Sightreadings\PaymentController::class, 'update'])
        ->name('sightreadings.payments.update');


    /** REGISTRANTS */
    Route::get('/registrants/download', [\App\Http\Controllers\Eventmanagement\RegistrantController::class, 'download'])
        ->name('registrants.download');
    Route::get('/registrants/{venue?}', [\App\Http\Controllers\Eventmanagement\RegistrantController::class, 'index'])
    ->name('registrants.index');
    Route::get('/registrant/{user}', [\App\Http\Controllers\Eventmanagement\RegistrantController::class, 'edit'])
        ->name('registrant.edit');
    Route::post('registrant/{user}/bio/update',[App\Http\Controllers\Eventmanagement\Registrant\BioController::class, 'update'])
        ->name('registrant.bio.update');
    Route::post('registrant/{user}/options/update',[App\Http\Controllers\Eventmanagement\Registrant\OptionsController::class, 'update'])
        ->name('registrant.options.update');
    Route::post('registrant/{user}/ensembles/{ensemble}/update',[App\Http\Controllers\Eventmanagement\Registrant\EnsemblesController::class, 'update'])
        ->name('registrant.ensembles.update');

    /** REPERTOIRE */
    Route::get('/repertoire/{repertoire}/{user}',[App\Http\Controllers\Eventmanagement\RepertoireController::class, 'edit'])
        ->name('repertoire.edit');
    Route::get('/repertoire/destroy/{repertoire}/{user}',[App\Http\Controllers\Eventmanagement\RepertoireController::class, 'destroy'])
        ->name('repertoire.destroy');
    Route::post('/repertoire/{repertoire}/{user}',[App\Http\Controllers\Eventmanagement\RepertoireController::class, 'update'])
        ->name('repertoire.update');

    /** REPORTS */
    Route::get('/plaques/index', [\App\Http\Controllers\Eventmanagement\Plaques\PlaquesController::class, 'index'])
        ->name('plaques.index');
    Route::get('/plaques/export', [\App\Http\Controllers\Eventmanagement\Plaques\PlaquesController::class, 'export'])
        ->name('plaques.export');
    Route::get('/program', [\App\Http\Controllers\Eventmanagement\Pdfs\ProgramController::class, 'pdf'])
        ->name('program.pdf');
    Route::get('/sightreading/index', [\App\Http\Controllers\Eventmanagement\Sightreadings\SightreadingController::class, 'index'])
        ->name('sightreading.index');
    Route::get('/sightreading/orders/export', [\App\Http\Controllers\Eventmanagement\Sightreadings\SightreadingController::class, 'export'])
        ->name('sightreadings.orders.export');
    Route::get('/sightreading.orders.pdf', [\App\Http\Controllers\Eventmanagement\Sightreadings\SightreadingController::class, 'pdf'])
        ->name('sightreading.orders.pdf');
    Route::get('/vaccinations', [\App\Http\Controllers\Eventmanagement\Pdfs\VaccinationsController::class, 'pdf'])
        ->name('vaccinations.pdf');

    /** SCHEDULING */
    Route::get('/scheduling/days', [App\Http\Controllers\Eventmanagement\Scheduling\DayController::class, 'index'])
        ->name('scheduling.days');
    Route::post('/scheduling/days/update', [App\Http\Controllers\Eventmanagement\Scheduling\DayController::class, 'update'])
        ->name('scheduling.days.update');
    Route::get('/scheduling/timeslots', [App\Http\Controllers\Eventmanagement\Scheduling\TimeslotController::class, 'index'])
        ->name('scheduling.timeslots');
    Route::post('/scheduling/timeslots/update', [App\Http\Controllers\Eventmanagement\Scheduling\TimeslotController::class, 'update'])
        ->name('scheduling.timeslots.update');
});

/** RECORDING ENGINEER */
Route::group([
    'prefix' => 'recordingengineer',
    'as' => 'recordingengineer.',
    'middleware' => ['auth']
], function() {

    Route::get('/recordingengineer', [\App\Http\Controllers\Recordingengineer\RecordingengineerController::class, 'create'])
        ->name('create');
    Route::get('/recordingengineer/edit/{adjudication}', [\App\Http\Controllers\Recordingengineer\RecordingengineerController::class, 'edit'])
        ->name('edit');
    Route::get('/recordingengineer/remove/{adjudication}', [\App\Http\Controllers\Recordingengineer\RecordingengineerController::class, 'destroy'])
        ->name('remove');
    Route::post('/recordingengineer', [\App\Http\Controllers\Recordingengineer\RecordingengineerController::class, 'store'])
        ->name('store');
    Route::post('/recordingengineer/update/{adjudication}', [\App\Http\Controllers\Recordingengineer\RecordingengineerController::class, 'update'])
        ->name('update');
});

