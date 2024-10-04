<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jobs\walletController;
use App\Http\Controllers\Auth\AuthNewController;
use App\Http\Controllers\jobs\jobOrderController;
use App\Http\Controllers\customers\fileController;
use App\Http\Controllers\selects\selectsController;
use App\Http\Controllers\customers\ninetyController;
use App\Http\Controllers\jobs\transactionController;

use App\Http\Controllers\visaType\visaTypeController;
use App\Http\Controllers\customers\customersController;
use App\Http\Controllers\dashboards\dashbordController;
use App\Http\Controllers\jobs\vue\jobOrderControllerVue;
use App\Http\Controllers\jobs\transactionGroupController;
use App\Http\Controllers\jobTransaction\jobTransactionController;
use App\Http\Controllers\jobType\jobDetailController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Auth
//Auth Group

Route::middleware(['IsAdmin'])->group(function () {
       Route::get('auth/users', [AuthNewController::class, 'index'])->name('auth.index');
       Route::get('auth/create', [AuthNewController::class, 'create'])->name('auth.create');
       Route::get('auth/edit/{id}', [AuthNewController::class, 'edit'])->name('auth.edit');
       Route::put('auth/update/{user}', [AuthNewController::class, 'update'])->name('auth.update');
       Route::post('auth/store', [AuthNewController::class, 'store'])->name('auth.store');
       Route::post('auth/delete/{dataID}', [AuthNewController::class, 'delete'])->name('auth.delete');
});


//dashboards
// Route::get('/', [dashbordController::class, 'index'])->name('dashboard.index');
// Route::get('/home', [dashbordController::class, 'index'])->name('dashboard.index');

//Customs
Route::get('customer/all',[customersController::class,'index'])->name('customer.index');
Route::get('customer/table/content',[customersController::class,'tableIndex'])->name('customer.tableIndex');
Route::get('customer/create',[customersController::class,'create'])->name('customer.create');

Route::put('customer/update/{customersModel}',[customersController::class,'update'])->name('customer.update');
Route::post('customer/store',[customersController::class,'store'])->name('customer.store');
Route::get('customer/edit/{cus}',[customersController::class,'edit'])->name('customer.edit');
Route::middleware(['IsAdmin'])->group(function () {
       Route::get('customer/delete/',[customersController::class,'delete'])->name('customer.delete');
});

Route::get('customer/show/{cus}',[customersController::class,'show'])->name('customer.show');
Route::get('customer/type/form',[customersController::class,'formType'])->name('customer.formType');
Route::get('customer/type/edit/form',[customersController::class,'formTypeEdit'])->name('customer.formTypeEdit');
Route::get('customer/type/view/form',[customersController::class,'formTypeView'])->name('customer.formTypeView');


Route::middleware(['IsAdmin'])->group(function () {
 Route::get('customer/edit/ninety/{modelNinety}',[ninetyController::class,'edit'])->name('ninety.edit');

 //Ninety Days
 Route::put('customer/update/ninety/{modelNinety}',[ninetyController::class,'update'])->name('ninety.update');
 Route::get('customer/delete/ninety',[ninetyController::class,'delete'])->name('ninety.delete');
 //Visa Renew
 Route::get('customer/edit/visa/{visaRenewModel}',[visaTypeController::class,'edit'])->name('visarenew.edit');
 Route::put('customer/update/visa/{visaRenewModel}',[visaTypeController::class,'update'])->name('visarenew.update');
 Route::get('customer/delete/visa',[visaTypeController::class,'delete'])->name('visarenew.delete');
});

//Select
Route::get('selects/nationality',[selectsController::class,'nationality'])->name('select.nationality');
Route::get('selects/visa/type',[selectsController::class,'visaType'])->name('select.visaType');

// files Controller

Route::get('file/delete',[fileController::class,'deletefile'])->name('file.delete');

//Jobs Order 

Route::get('jobs',[jobOrderController::class,'index'])->name('joborder.index'); 
Route::get('',[jobOrderController::class,'index'])->name('joborder.index'); 

Route::get('jobs/searchIndex',[jobOrderController::class,'searchIndex'])->name('joborder.searchIndex'); 

Route::get('job/order/create',[jobOrderController::class,'create'])->name('joborder.craete'); 
Route::get('job/order/edit/{jobOrder}',[jobOrderController::class,'edit'])->name('joborder.edit'); 
Route::post('job/order/store',[jobOrderController::class,'store'])->name('joborder.store'); 
Route::post('job/order/close',[jobOrderController::class,'close'])->name('joborder.close'); 
Route::post('job/order/reOpen',[jobOrderController::class,'reOpen'])->name('joborder.reOpen'); 
Route::post('job/select/customer',[jobOrderController::class,'selectCustomer'])->name('joborder.select.selectCustomer'); 
Route::put('job/update/customer/{customersModel}',[jobOrderController::class,'CustomerUpdate'])->name('joborder.customerUpdate'); 

Route::get('jobs/select/jobtype',[jobOrderController::class,'jobType'])->name('joborder.jobType'); 
Route::get('jobs/select/serviceTrasaction',[jobOrderController::class,'serviceTrasaction'])->name('joborder.serviceTrasaction'); 

Route::middleware(['IsAdmin'])->group(function () {
   Route::get('job/order/delete',[jobOrderController::class,'delete'])->name('joborder.delete');
   Route::put('job/order/update/{jobOrder}',[jobOrderController::class,'update'])->name('joborder.update'); 
});

Route::middleware(['IsAdmin'])->group(function () {

});

//wallet
Route::middleware(['IsAdmin'])->group(function () {
Route::get('wallet/index',[walletController::class,'index'])->name('wallet.index'); 
Route::post('/update-wallet', [walletController::class, 'update'])->name('wallet.update');
Route::get('/create-wallet', [walletController::class, 'create'])->name('wallet.create');
Route::get('/edit-wallet/{walletModel}', [walletController::class, 'edit'])->name('wallet.edit');
Route::post('/store-wallet', [walletController::class, 'store'])->name('wallet.store');
Route::post('/delete-wallet', [walletController::class, 'delete'])->name('wallet.delete');
});

// Transaction Group
Route::middleware(['IsAdmin'])->group(function () {
       Route::get('transaction/group/index',[transactionGroupController::class,'index'])->name('transactionGroup.index'); 
       Route::get('transaction/group/create',[transactionGroupController::class,'create'])->name('transactionGroup.create'); 
       Route::post('transaction/group/store',[transactionGroupController::class,'store'])->name('transactionGroup.store'); 
       Route::get('transaction/group/edit/{transactionGroupModel}',[transactionGroupController::class,'edit'])->name('transactionGroup.edit'); 
       Route::post('transaction/group/update',[transactionGroupController::class,'update'])->name('transactionGroup.update'); 
       Route::post('transaction/group/delete',[transactionGroupController::class,'delete'])->name('transactionGroup.delete'); 
});

//Transaction
Route::get('transaction/create',[transactionController::class, 'create'])->name('transaction.create');
Route::get('transaction/edit/{transaction}',[transactionController::class, 'edit'])->name('transaction.edit');

Route::middleware(['IsAdmin'])->group(function () {
Route::post('transaction/delete',[transactionController::class, 'delete'])->name('transaction.delete');
});

// Visa Type
Route::middleware(['IsAdmin'])->group(function () {
       Route::get('visa/type',[visaTypeController::class,'index'])->name('visaType.index');
       Route::get('visa/modal/edit/{visaTypeModel}',[visaTypeController::class,'edit'])->name('visaType.edit');
       Route::post('visa/store',[visaTypeController::class,'store'])->name('visaType.store');
       Route::put('visa/update/{visaTypeModel}',[visaTypeController::class,'update'])->name('visaType.update');
       Route::get('visa/delete/{visaTypeModel}',[visaTypeController::class,'delete'])->name('visaType.delete');
});




// Services
Route::middleware(['IsAdmin'])->group(function () {
       Route::get('jobdetail',[jobDetailController::class,'index'])->name('jobdetail.index');
       Route::post('jobdetail/store',[jobDetailController::class,'store'])->name('jobdetail.store');
       Route::get('jobdetail/edit/{jobDetailModel}',[jobDetailController::class,'edit'])->name('jobdetail.edit');
       Route::get('jobdetail/delete/{jobDetailModel}',[jobDetailController::class,'delete'])->name('jobdetail.delete');
       Route::put('jobdetail/update/{jobDetailModel}',[jobDetailController::class,'update'])->name('jobdetail.update');
         
});
// job Trasaction
Route::middleware(['IsAdmin'])->group(function () {
       Route::get('jobtrasactions',[jobTransactionController::class,'index'])->name('jobtrasaction.index');
       Route::post('jobtrasaction/store',[jobTransactionController::class,'store'])->name('jobtrasaction.store');
       Route::get('jobtrasaction/edit/{jobTrasactionModel}',[jobTransactionController::class,'edit'])->name('jobtrasaction.edit');
       Route::put('jobtrasaction/update/{jobTrasactionModel}',[jobTransactionController::class,'update'])->name('jobtrasaction.update');
       Route::get('jobtrasaction/delete/{jobTrasactionModel}',[jobTransactionController::class,'delete'])->name('jobtrasaction.delete');
         
});




