<?php

use App\Http\Controllers\AccessModelController;
use App\Http\Controllers\AccessPointController;
use App\Http\Controllers\ActivitylogController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AppointmentDeviationController;
use App\Http\Controllers\AppointmentTypeController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobseekerController;
use App\Http\Controllers\JobTypeController;
use App\Http\Controllers\LoginlogController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::get('/', [DashboardController::class, 'dashboard'])->name('index.dashboard');
// Route::get('/', function () {
//     return view('pages.jobseeker.jobseeker');
// });

// Route::get('/', [UserController::class, 'token'])->name('user.token');
// Route::get('/admin', [UserController::class, 'token'])->name('user.tokenx');
// Route::get('/admin/login', [UserController::class, 'token']);

// Route::post('/admin/login', [UserController::class, 'login'])->name('login');
// Route::get('/admin/logout', [UserController::class, 'logout'])->name('logout');

// Route::group(['middleware' => ['auth']], function () { //'CheckAccess'

    // Route::get('/activity-log', [ActivitylogController::class, 'view'])->name('activity-log.view');

    // ----------- Create user -----
    Route::get('/admin/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/admin/user/store', [UserController::class, 'store'])->name('user.store');
    Route::post('/admin/user/destroy', [UserController::class, 'destroy'])->name('user.destroy');

    // ------------- Create Access Model-------------
    Route::get('/admin/accessModel', [AccessModelController::class, 'index'])->name('access_model.index');
    Route::post('/admin/accessModel/store', [AccessModelController::class, 'store'])->name('access_model.store');
    // Route::post('/admin/accessModel/destroy', [AcesssModelController::class, 'destroy'])->name('access_model.destroy');
    // Route::POST('/admin/accessModel/update', [AcesssModelController::class, 'update'])->name('access_model.update');
    // ----------------- end ----------------

    //--------------- Create Access Point ---------
    Route::get('/admin/accessPoint/{id}', [AccessPointController::class, 'index'])->name('access_point.index');
    Route::post('/admin/accessPoint/store', [AccessPointController::class, 'store'])->name('access_point.store');
    // Route::post('/admin/accessPoint/destroy', [AcesssPointController::class, 'destroy'])->name('access_point.destroy');
    // Route::POST('/admin/accessPoint/update', [AcesssPointController::class, 'update'])->name('access_point.update');
    // -------------- end -------------

    // -------------- Create PermisionController ----------
    // Route::get('/p', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('/admin/permission/{id}', [PermissionController::class, 'index'])->name('permission.index');
    Route::post('/admin/permission/store', [PermissionController::class, 'store'])->name('permission.store');
    //  -------------------------- end ------------------------

    //activityLog
    Route::get('activitylog', [ActivitylogController::class, 'index'])->name('activitylog.index');
    Route::post('activitylog/store', [ActivitylogController::class, 'store'])->name('activitylog.store');

     //loginLog
     Route::get('loginLog', [LoginlogController::class, 'index'])->name('loginlog.index');
     Route::post('loginLog/store', [LoginlogController::class, 'store'])->name('loginLog.store');

    //role
    Route::get('role', [RoleController::class, 'index'])->name('role.index');
    Route::post('role/store', [RoleController::class, 'store'])->name('role.store');

    //country
    Route::get('country', [CountryController::class, 'index'])->name('country.index');
    Route::post('country/store', [CountryController::class, 'store'])->name('country.store');

    //consultant
    Route::get('consultant', [ConsultantController::class, 'index'])->name('consultant.index');
    Route::post('consultant/store', [ConsultantController::class, 'store'])->name('consultant.store');
    Route::get('consultant/status-change', [ConsultantController::class, 'statusChange'])->name('consultant.status-change');

    //jobseeker
    Route::get('jobseeker', [JobseekerController::class, 'index'])->name('jobseeker.index');
    Route::post('jobseeker/store', [JobseekerController::class, 'store'])->name('jobseeker.store');
    Route::get('jobseeker/status-change', [JobseekerController::class, 'statusChange'])->name('jobseeker.status-change');

    // job
    Route::get('job', [JobController::class, 'index'])->name('job.index');
    Route::post('job/store', [JobController::class, 'store'])->name('job.store');

    // jobType
    Route::get('jobtype', [JobTypeController::class, 'index'])->name('jobtype.index');
    Route::post('jobtype/store', [JobTypeController::class, 'store'])->name('jobtype.store');

    // Route::get('/file-import', [PaymentController::class,'importView'])->name('import-view');
    // Route::post('/import', [PaymentController::class,'import'])->name('import');
    // Route::get('/export-users', [PaymentController::class,'exportUsers'])->name('export-users');

     //appointmentType
     Route::get('appointmenttype', [AppointmentTypeController::class, 'index'])->name('appointmenttype.index');
     Route::post('appointmenttype/store', [AppointmentTypeController::class, 'store'])->name('appointmenttype.store');
     Route::get('appointmenttype/status-change', [AppointmentTypeController::class, 'statusChange'])->name('appointmenttype.status-change');

    //appointment
    Route::get('appointment', [AppointmentController::class, 'index'])->name('appointment.index');
    Route::post('appointment/store', [AppointmentController::class, 'store'])->name('appointment.store');
    Route::get('appointment/status-change', [AppointmentController::class, 'statusChange'])->name('appointment.status-change');

    //appointmentDeviation
    Route::get('appointmentdeviation', [AppointmentDeviationController::class, 'index'])->name('appointmentdeviation.index');
    Route::post('appointmentdeviation/store', [AppointmentDeviationController::class, 'store'])->name('appointmentdeviation.store');
    Route::get('appointmentdeviation/status-change', [AppointmentDeviationController::class, 'statusChange'])->name('appointmentdeviation.status-change');

    // report
    // Route::get('report/memberdetail', [ReportController::class, 'memberDetailReport'])->name('memberDetail');
    // Route::get('report/paymentdetail', [ReportController::class, 'paymentDetailReport'])->name('paymentDetail');
    // Route::get('report/monthlypaymentmember', [ReportController::class, 'monthlyPaymentMemberDetailReport'])->name('monthlyPaymentMember');
    // Route::get('report/monthlypaymentsummary', [ReportController::class, 'monthlyPaymentSummaryDetailReport'])->name('monthlyPaymentSummary');
// });
