<?php

use App\Models\Customers;
use App\Models\Companies;
use App\Models\Address;
use App\models\Invoices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Get all customers
Route::get('/customers', 'CustomerController@getCustomers');

//Get specific customer
Route::get('/customer/{id}','CustomerController@getCustomerById');

//Add customer
Route::post('/addc', 'CustomerController@addCustomer');

//Update customer
Route::put('updateCustomer/{id}','CustomerController@updateCustomer');

//Delete customer
Route::delete('deleteCustomer/{id}','CustomerController@deleteCustomers');


//Companies
//Get all Company
Route::get('/companies', 'CompanyController@getCompanies');

//Get specific Company
Route::get('/company/{id}','CompanyController@getCompanyById');

//Add Company
Route::post('/addComp', 'CompanyController@addCompany');

//Update Company
Route::put('/updateCompany/{id}','CompanyController@updateCompany');

//Delete Company
Route::delete('/deleteCompany/{id}','CompanyController@deleteCompany');


//upload file
Route::post('/upload', 'FileUploadController@logoUpload');

//Companies
//Get all Address
Route::get('/addresses', 'AddressController@getAddress');

//Get specific Address
Route::get('/address/{id}','AddressController@getAddressById');

//Add Address
Route::post('/addAddress', 'AddressController@addAddress');

//Update Address
Route::put('/updateAddress/{id}','AddressController@updateAddress');

//Delete Address
Route::delete('/deleteAddress/{id}','AddressController@deleteAddress');

//Invoices
//Get all Address
Route::get('/invoices', 'InvoiceController@getInvoices');

//Get specific Address
Route::get('/invoice/{id}','InvoiceController@getInvoiceById');

//Add Address
Route::post('/addInvoice', 'InvoiceController@addInvoice');

//Update Address
Route::put('/updateInvoice/{id}','InvoiceController@updateInvoice');

//Delete Address
Route::delete('/deleteInvoice/{id}','InvoiceController@deleteInvoice');