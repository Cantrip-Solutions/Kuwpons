<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/userRegister','ConsumerController@userRegister');

Route::group(['middleware' => 'auth'], function () {

	Route::get('/dashboard', 'DashboardController@gotoDashboard')->middleware('role:A|S');


	//-------------------------Admin Panel-----------------------
	Route::group(['middleware' => 'role:A'], function () {

		// Consumer route
		Route::get('/tab/consumer', 'ConsumerController@chartConsumer');
		Route::get('/tab/consumer/view/{name}/{id}', 'ConsumerController@viewConsumer');

		// Company user route
		Route::get('/tab/company', 'CompanyController@chartCompany');
		Route::get('/tab/company/add',  ['uses'=>'CompanyController@addCompany', 'as'=> 'addCompany']);
		Route::get('/tab/company/edit/{name}/{id}', 'CompanyController@editCompany');
		Route::get('/tab/company/view/{name}/{id}', 'CompanyController@viewCompany');
		Route::post('/tab/company/update', 'CompanyController@updateCompany');
		Route::get('/tab/company/delete/{id}', 'CompanyController@destroyCompany');
		Route::get('/tab/company/changeStatus/{id}', 'CompanyController@changeStatus');
		Route::post('getState', 'CompanyController@getState');
		Route::post('getCity', 'CompanyController@getCity');
		Route::post('/tab/company/create', 'CompanyController@createCompany');

		// Category route
		
		Route::get('/tab/category', 'CategoryController@chartCategory');
		Route::get('/tab/category/add',  ['uses'=>'CategoryController@addCategory', 'as'=> 'addCategory']);
		Route::post('/tab/category/create', 'CategoryController@createCategory');
		Route::post('getSubCategories', 'CategoryController@getSubCategories');
		Route::get('/tab/subcategory/add/{cat_id}',  ['uses'=>'CategoryController@addsubCategory']);
		Route::post('/tab/subcategory/create', 'CategoryController@createSubCategory');
		Route::get('tab/category/edit/{name}/{id}', 'CategoryController@editCategory');
		Route::post('updateCategory', 'CategoryController@updateCategory');
		Route::post('category/delete', 'CategoryController@deleteCategory');

		// Product route
		 
		Route::get('/tab/product', 'ProductController@chartProduct');
		Route::get('/tab/product/add',  ['uses'=>'ProductController@addProduct', 'as'=> 'addProduct']);
		Route::post('/createProduct', 'ProductController@createProduct');
		Route::get('/tab/product/delete/{id}', 'ProductController@deleteProduct');
		Route::get('/tab/product/edit/{name}/{id}', 'ProductController@editProduct');
		Route::get('/tab/product/editSpec/{name}/{id}', 'ProductController@editSpecification');
		Route::get('/tab/product/imageGallery/{name}/{id}', 'ProductController@imageGallery');
		Route::post('/tab/product/update', 'ProductController@updateProduct');
		Route::get('/tab/product/stockAdjust/{name}/{id}', 'ProductController@addQuantity');
		Route::post('/tab/product/updateProductQuantity', 'ProductController@updateProductQuantity');
		Route::get('/tab/product/stockHistory/{name}/{id}', 'ProductController@stockHistory');
		Route::post('/addToImageGallery', 'ProductController@addToImageGallery');
		Route::get('/tab/product/stockHistory/{name}/{id}', 'ProductController@stockHistory');
		Route::post('/tab/image/delete', 'ProductController@deleteImage');

		// Specification Management
		Route::get('/tab/chartSpecification',  'SpecificationController@chartSpecification');
		Route::get('/tab/specification/add',  ['uses'=>'SpecificationController@addSpecification', 'as'=> 'addSpecification']);


		//Discount product route
		
		Route::get('/tab/offers/discount', 'OffersController@productDiscount');
		Route::get('/tab/offers/coupons', 'OffersController@chartCoupons');
		Route::get('/tab/offers/coupons/add', ['uses'=>'OffersController@addCoupons','as'=> 'addCoupons']);
		Route::post('/tab/offers/coupons/create', 'OffersController@createCoupon');
		
		//Discount product route
		Route::get('/tab/orders', 'OrdersController@chartOrders');
		Route::get('/tab/transactions', 'OrdersController@chartTransactions');

		// ------------------------Settings---------------------------

		// Menu Management
		Route::get('/settings/menuManagement', 'SettingsController@menuManagement');
		Route::post('updateProfile', 'HomeController@updateProfile');

	});

	//-------------------------Vendor Panel-----------------------
	Route::group(['middleware' => 'role:S'], function () {

		Route::get('/vendor/chartCompanyProducts', 'CompanyController@chartCompanyProducts');
		Route::post('/vendor/updateCoupon', 'CompanyController@updateCoupon');

	});

	// ------------------------Settings---------------------------

	// Change Password for all
	Route::get('passwordChange', 'SettingsController@passwordChange');
	Route::post('updatePassword', 'SettingsController@updatePassword');

	// -------------------- frontend Myaccount ------------------------//
		
	Route::get('/myAccount', 'HomeController@myAccount');
	Route::post('updateProfile', 'HomeController@updateProfile');	
	Route::post('updateUserPassword', 'HomeController@updateUserPassword');	


	// ------------------------Place Order-----------------------------
	Route::post('/placeOrder', 'OrdersController@placeOrder');
	Route::get('/orderHistory', 'OrdersController@orderHistory');
	
});


// Categories
Route::get('/category/{name}/{id}', 'HomeController@searchCategory');

// Products
Route::get('/coupon/{name}/{id}', 'HomeController@couponDetails');
Route::post('/searchedProduct', 'HomeController@searchProduct');

// Cart
Route::post('/addToCart/{id}/{quantity}', 'OrdersController@addToCart');
Route::get('/cartValue', 'OrdersController@cartValue');
Route::get('/cartSync', 'OrdersController@cartSync');
Route::get('/myCart', 'OrdersController@myCart');
Route::post('/updateCartQuantity', 'OrdersController@updateCartQuantity');
Route::post('/deleteProductFromCart', 'OrdersController@deleteProductFromCart');
Route::get('/myAccount/checkout', 'OrdersController@checkout');

//Static Page
Route::get('/contact_us', 'HomeController@contact_us');
Route::get('/about_us', 'HomeController@about_us');
Route::get('/terms_conditions', 'HomeController@termsConditions');
Route::get('/how_it_workes', 'HomeController@howItWorkes');



