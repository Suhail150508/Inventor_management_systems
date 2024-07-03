<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SalesProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\MainAccountController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\VendorController;

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



// Route::get('/new',[HomeController::class,'newpemplate']);

Route::get('/dashboard',[HomeController::class,'dashboard']);



Route::get('/post-create',[HomeController::class,'userCreate']);
Route::post('/post-store',[PostsController::class,'userStore']);
Route::get("/post-edit/{id}",[PostsController::class,'userEdit']);
Route::put("/post-update/{post}",[PostsController::class,'userUpdate'])->name('posts.update');
Route::delete("/post-delete/{id}",[PostsController::class,'userDelete']);


Route::get('/posts{id}',[PostsController::class,'status']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('home');


Route::get('/investor',[InvestorController::class, 'investor']);
Route::get('/invest-create',[InvestorController::class, 'investorCreate']);
Route::post('/investor-creater',[InvestorController::class, 'investorStore']);
Route::get("/investor-edit/{id}",[PostsController::class,'investorEdit']);
Route::put("/investor-update/{post}",[PostsController::class,'userUpdate'])->name('investor.update');
Route::delete("/investor-delete/{id}",[PostsController::class,'investorDelete']);
Route::get('/investor-status/{id}',[PostsController::class,'status']);


Route::get('/invest_return',[InvestorController::class, 'investReturn']);
Route::post('/amount-return',[InvestorController::class, 'AmountReturn']);


Route::get('/invest',[InvestorController::class, 'invest']);
Route::post('/amount-add',[InvestorController::class, 'investAmount']);

Route::post('/amount-withdraw',[InvestorController::class, 'investRrturn']);
Route::post('/invest-return-amount',[InvestorController::class, 'returnAmount']);
Route::get('/investors_statement',[InvestorController::class,'InvestorStatement']);
Route::get('/investor_statement',[InvestorController::class,'InvestorStatementInfo']);
Route::post('total_information',[InvestorController::class,'totalInformation']);
Route::get('/investors_invoice',[InvestorController::class,'AllInvoice']);


Route::get('/invoice', [InvoiceController::class,'invoice'])->name('invoice');


Route::get('/all-customer',[CustomerController::class,'customers']);

Route::get('/customer-create',[CustomerController::class, 'customerCreate']);
Route::post('/customer-store',[CustomerController::class, 'customerStore']);
Route::get("/customer-edit/{id}",[CustomerController::class,'customerEdit']);
Route::put("/customer-update/{id}",[CustomerController::class,'customerUpdate'])->name('customer.update');
Route::delete("/customer-delete/{id}",[CustomerController::class,'customerDelete']);
Route::get('/customer-status/{id}',[CustomerController::class,'status']);

Route::get('/search-customer',[CustomerController::class,'searchCustomer']);
Route::get('/search-customer-info',[CustomerController::class,'searchCustomerInfo']);
Route::post('/search-customer-invoice',[CustomerController::class,'searchCustomerInvoice']);
Route::get('/customer_invoice',[CustomerController::class,'AllCustomerInvoice']);
Route::post('/customer-invoice-add',[CustomerController::class,'CustomerInvoiceAdd']);

Route::get('/search-invoice/{id}',[CustomerController::class,'searchInvoice']);
Route::get('/invoice-details/{id}',[CustomerController::class,'invoiceDetails']);

Route::get('/search-sales-invoice',[CustomerController::class,'searchCustomer']);

Route::get('/all-sales-invoice',[SalesProductController::class,'allSalesInv']);
Route::get('/sales_invoice',[SalesProductController::class,'SalesInvoice']);
Route::get('/sales-fetch-data-sale', [SalesProductController::class,'salesfetchData'])->name('salesdatafatchdata');
Route::get('/sales-fetch-data', [SalesProductController::class,'fetchData'])->name('salesdatafatch');
Route::post('/sales-invoice-store',[SalesProductController::class,'salesInvoiceStore']);
Route::get('/sales-invoice-edit/{id}',[SalesProductController::class,'salesInvoiceEdit']);
Route::get('/sales-invoice-show/{id}',[SalesProductController::class,'salesInvoiceShow']);
Route::delete('/sales-invoice-store',[SalesProductController::class,'salesInvoiceStore']);
Route::post('/sales-invoice-update',[SalesProductController::class,'salesInvoiceUpdate']);
// Route::post('/update-quantity', 'SalesProductController@updateQuantity');
Route::get('/slproduct-fetch', [SalesProductController::class,'slfetchsQty'])->name('slproduct.fetchs');
Route::get('/return-sales-invoice',[SalesProductController::class,'returnSalesInvoice']);
Route::post('/return-sales-invoice-store',[SalesProductController::class,'returnSalesInvoiceStore']);
Route::get('/all-return-sales-invoice',[SalesProductController::class,'allReturnSalesInvoiceStore']);
Route::get('/return-sales-invoice-edit/{id}',[SalesProductController::class,'returnSalesInvoiceEdit']);

Route::get('/due-sales-payment',[SalesProductController::class,'duePaySales']);
Route::get('/due-sales-payment-create',[SalesProductController::class,'duePayInvoiceCreate']);
Route::post('/due-sales-payment-store',[SalesProductController::class,'duePayInvoiceStore']);
Route::get('/search-customer-due-payment',[SalesProductController::class,'customerDuePayInvoices']);

Route::get('/show-vendor',[VendorController::class,'showVendor']);
Route::get('/vendor-edit/{id}',[VendorController::class,'VendorEdit']);
Route::put('/vendor-update/{id}',[VendorController::class,'VendorUpdate']);
Route::get('/search-vendor-info',[VendorController::class,'searchVendorInfo']);
Route::post('/search-vendor-invoice',[VendorController::class,'searchVendorInvoice']);
Route::delete('vendor-delete/{id}',[VendorController::class,'vendorDelete']);

Route::get('/create-vendor',[VendorController::class,'CreateVendor']);
Route::post('/vendor-create',[VendorController::class,'storeVendor']);
Route::get('/fetch-data', [VendorController::class,'fetchData'])->name('fetch.data');
Route::get('/product-fetchs', [VendorController::class,'fetchsCode'])->name('product.fetchs');
Route::get('/product-fetch', [VendorController::class,'fetchCode'])->name('product.fetch');


Route::get('/all-products',[VendorController::class,'showProduct']);
Route::get('/all-product-info',[VendorController::class,'allProductInfo']);
Route::get('/purchase-product',[VendorController::class,'PurchaseProduct']);
Route::post('/purchase-product-store',[VendorController::class,'PurchaseProductStore']);
Route::get('/product-edit/{id}',[VendorController::class,'PurchaseProductEdit']);
Route::post('/purchase-product-update/{id}',[VendorController::class,'PurchaseProductUpdate']);
Route::delete('/product-delete/{id}',[VendorController::class,'PurchaseProductDelete']);


Route::post('/product-create',[VendorController::class,'storeProduct']);

Route::get('/purchase_invoice',[VendorController::class,'purchaseInvoice']);
Route::post('/purchase-invoice-store',[VendorController::class,'purchaseInvoiceStore']);
Route::get('/purchase-invoice-edit/{id}',[VendorController::class,'purchaseInvoiceEdit']);
Route::get('/purchase-invoice-show/{id}',[VendorController::class,'purchaseInvoiceShow']);
Route::post('/purchase-invoice-update',[VendorController::class,'purchaseInvoiceUpdate']);
Route::post('/product-create',[VendorController::class,'storeProduct']);
Route::get('/slproduct-fetchs', [VendorController::class,'purfetchsQty'])->name('purproduct.fetchs');
Route::get('/all-return-purchase-invoice',[VendorController::class,'allReturnPurchaseInvoice']);
Route::get('/return-purchase-invoice',[VendorController::class,'returnPurchaseInvoice']);
Route::post('/return-purchase-invoice-store',[VendorController::class,'returnPurchaseInvoiceStore']);
Route::get('/return-purchase-invoice-edit/{id}',[VendorController::class,'returnPurchaseInvoiceEdit']);

Route::get('/all-purchase-invoice',[VendorController::class,'allPInvoice']);
// Route::post('/search-customer',[VendorController::class,'searchCustomer']);
Route::get('/due-payment-invoice',[VendorController::class,'duePayInvoice']);
Route::get('/due-payment-invoice-create',[VendorController::class,'duePayInvoiceCreate']);
Route::post('/due-payment-invoice-store',[VendorController::class,'duePayInvoiceStore']);
Route::get('/due-vendor-payment',[VendorController::class,'vendorDuePayInvoices']);


Route::get('/pdf',[VendorController::class,'pdfExport']);




Route::get('/expence-invoice',[VendorController::class,'expenceInvoice']);
Route::get('/expence-create',[VendorController::class,'expenceInvoiceCreate']);
Route::post('/expence-invoice-store',[VendorController::class,'expenceInvoiceStore']);
Route::get('/expence-edit/{id}',[VendorController::class,'expenceInvoiceEdit']);
Route::get('/add-category',[VendorController::class,'addCategory']);
Route::post('/add-category-store',[VendorController::class,'categoryStore']);
Route::get('/search-expence-invoice',[VendorController::class,'searchExpence']);


Route::get('/company-info',[VendorController::class,'companyInfo']);
Route::get('/company-create',[VendorController::class,'companyCreate']);
Route::get('/company-edit/{id}',[VendorController::class,'companyEdit']);
Route::put('/company-info-update/{id}',[VendorController::class,'companyUpdate']);
Route::post('/company-info-create',[VendorController::class,'comInfoStore']);
Route::delete('/company-delete/{id}',[VendorController::class,'comInfoDelete']);

Route::get('/search-purchase-invoice',[VendorController::class,'searchVendor']);



Route::get('/main_account',[MainAccountController::class,'mainAccount']);

Route::get('/download-pdf-student',[InvestorController::class,'downloadPDFStudentInfo']);



Route::get('/logout',[InvestorController::class,'logout']);


Route::get('/test',[InvestorController::class,'test']);


//---Report---
Route::get('/investor-report',[InvestorController::class, 'investorReport']);
Route::get('/all-purchase-invoice-report',[VendorController::class,'allPInvoiceReport']);
Route::get('/all-return-purchase-invoice-report',[VendorController::class,'allReturnPurchaseInvoiceReport']);
Route::get('/due-payment-invoice-report',[VendorController::class,'duePayInvoiceReport']);
Route::get('/show-vendor-report',[VendorController::class,'showVendorReport']);
Route::get('/all-sales-invoice-report',[SalesProductController::class,'allSalesInvReport']);
Route::get('/all-return-sales-invoice-report',[SalesProductController::class,'allReturnSalesInvoiceStoreReport']);
Route::get('/due-sales-payment-report',[SalesProductController::class,'duePaySalesReport']);
Route::get('/all-customer-report',[CustomerController::class,'customersReport']);
Route::get('/expence-invoice-report',[VendorController::class,'expenceInvoiceReport']);
Route::get('/main_account-report',[MainAccountController::class,'mainAccountReport']);
Route::get('/company-info-report',[VendorController::class,'companyInfoReport']);
Route::get('/all-product-info-report',[VendorController::class,'allProductInfoReport']);


