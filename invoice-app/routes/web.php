<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
Route::get('/api/delete_invoice/{id}',[InvoiceController::class,'delete_invoice']);
Route::post('/api/update_invoice/{id}',[InvoiceController::class,'update_invoice']);
Route::get('/api/delete_invoice_items/{id}',[InvoiceController::class,'delete_invoice_items']);
Route::get('/api/edit_invoice/{id}',[InvoiceController::class,'edit_invoice']);
Route::get('/api/show_invoice/{id}',[InvoiceController::class,'show_invoice']);
Route::post('/api/add_invoice',[InvoiceController::class,'add_invoice']);
Route::get('/api/products',[ProductController::class,'all_product']);
Route::get('/api/customers',[CustomerController::class,'all_customer']);
Route::get('/api/create_invoices', [InvoiceController::class, 'create_invoice']);
Route::get('/api/search_invoices', [InvoiceController::class, 'search_invoice']);
Route::get('/api/get_all_invoices', [InvoiceController::class, 'get_all_invoice']);
// web.php

Route::get('/', function () {
    return view('welcome');
});


Route::get('/{pathMatch}',function (){
    return view('welcome');
})->where('pathMatch','.*');

