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

Route::prefix('auth')->name("auth.")->group(function () {
    Route::get('login', 'AuthController@getlogin')->name("getlogin");
    Route::post('login', 'AuthController@postlogin')->name("postlogin");
    Route::get('changelang/{id}', 'AuthController@changelang')->name("changelang");
    Route::get('forgot-password', 'AuthController@getforgot')->name("getforgot");
    Route::post('send-forgot-password', 'AuthController@postforgot')->name("postforgot");
    Route::get('reset-password/{token}', 'AuthController@resetpassword')->name("resetpassword");
    Route::post('change-password', 'AuthController@changepassword')->name("changepassword");
});
Route::group(['middleware' => 'AUTH'], function () {
    //home
    Route::name("home.")->group(function () {
        Route::get('', 'HomeController@index')->name("index");
        Route::get('home/logout', 'HomeController@logout')->name("logout");
        Route::get('procedure', 'HomeController@procedure')->name("procedure");
        Route::any('home/notallow', 'HomeController@notallow')->name("notallow");
        Route::any('home/notallowajax', 'HomeController@notallowajax')->name("notallowajax");
        Route::post('home/datatable', 'HomeController@datatable')->name("datatable");
    });
    //!home
    //modules
    Route::prefix('modules')->name("modules.")->group(function () {
        Route::get('', 'ModulesController@index')->name("index");
        Route::post('/store', 'ModulesController@store')->name("store");
        Route::get('/edit/{id}', 'ModulesController@edit')->name("edit");
        Route::get('/delete/{id}', 'ModulesController@delete')->name("delete");
        Route::post('/datatable', 'ModulesController@datatable')->name("datatable");
    });
    //!modules
    //roles
    Route::prefix('roles')->name("roles.")->group(function () {
        Route::get('', 'RolesController@index')->name("index");
        Route::post('/store', 'RolesController@store')->name("store");
        Route::get('/edit/{id}', 'RolesController@edit')->name("edit");
        Route::get('/delete/{id}', 'RolesController@delete')->name("delete");
        Route::post('/update-rule', 'RolesController@updaterule')->name("updaterule");
        Route::get('/rule/{id}', 'RolesController@rule')->name("rule");
    });
    //!roles
    //web configs
    Route::prefix('web-configs')->name("webconfigs.")->group(function () {
        Route::get('', 'WebconfigsController@index')->name("index");
        Route::get('create', 'WebconfigsController@create')->name("create");
        Route::post('/store', 'WebconfigsController@store')->name("store");
        Route::get('/edit/{id}', 'WebconfigsController@edit')->name("edit");
        Route::get('/delete/{id}', 'WebconfigsController@delete')->name("delete");
        Route::post('/datatable', 'WebconfigsController@datatable')->name("datatable");
    });
    //!roles
    //constructions
    Route::prefix('constructions')->name("constructions.")->group(function () {
        Route::get('', 'ConstructionsController@index')->name("index");
        Route::post('/store', 'ConstructionsController@store')->name("store");
        Route::get('/edit/{id}', 'ConstructionsController@edit')->name("edit");
        Route::get('/create', 'ConstructionsController@create')->name("create");
        Route::get('/delete/{id}', 'ConstructionsController@delete')->name("delete");
    });
    //!constructions
    //areas
    Route::prefix('areas')->name("areas.")->group(function () {
        Route::get('', 'AreasController@index')->name("index");
        Route::post('/store', 'AreasController@store')->name("store");
        Route::get('/edit/{id}', 'AreasController@edit')->name("edit");
        Route::get('/create', 'AreasController@create')->name("create");
        Route::get('/delete/{id}', 'AreasController@delete')->name("delete");
    });
    //!areas
    //menus
    Route::prefix('menus')->name("menus.")->group(function () {
        Route::get('', 'MenusController@index')->name("index");
        Route::post('/store', 'MenusController@store')->name("store");
        Route::get('/edit/{id}', 'MenusController@edit')->name("edit");
        Route::get('/delete/{id}', 'MenusController@delete')->name("delete");
        Route::get('/tree/{id}', 'MenusController@tree')->name("tree");
        Route::post('/additem', 'MenusController@additem')->name("additem");
        Route::get('/edititem/{id}', 'MenusController@edititem')->name("edititem");
        Route::get('/destroyitem/{id}', 'MenusController@destroyitem')->name("destroyitem");
        Route::post('/updatesort/{id}', 'MenusController@updatesort')->name("updatesort");
    });
    //!menus

    //language
    Route::prefix('languages')->name("languages.")->group(function () {
        Route::get('', 'LanguagesController@index')->name("index");
        Route::post('/store', 'LanguagesController@store')->name("store");
        Route::get('/edit/{id}', 'LanguagesController@edit')->name("edit");
        Route::get('/delete/{id}', 'LanguagesController@delete')->name("delete");
    });
    //!language
    //language
    Route::prefix('notifications')->name("notifications.")->group(function () {
        Route::get('/check/{token}', 'NotificationssController@index')->name("check");
    });
    //!language
    //languagelabels
    Route::prefix('language-labels')->name("language_labels.")->group(function () {
        Route::get('', 'LanguageLabelsController@index')->name("index");
        Route::post('/store', 'LanguageLabelsController@store')->name("store");
        Route::get('/edit/{id}', 'LanguageLabelsController@edit')->name("edit");
        Route::get('/destroy/{id}', 'LanguageLabelsController@destroy')->name("destroy");
        Route::post('/datatable', 'LanguageLabelsController@datatable')->name("datatable");
        Route::get('/export', 'LanguageLabelsController@export')->name("export");
        Route::post('/import', 'LanguageLabelsController@import')->name("import");
    });
    //!languagelabels
    //Email Template
    Route::prefix('email-template')->name("email_template.")->group(function () {
        Route::get('', 'EmailTemplateController@index')->name("index");
        Route::get('/create', 'EmailTemplateController@create')->name("create");
        Route::post('/store', 'EmailTemplateController@store')->name("store");
        Route::get('/edit/{id}', 'EmailTemplateController@edit')->name("edit");
        Route::post('/update/{id}', 'EmailTemplateController@update')->name("update");
        Route::get('/destroy/{id}', 'EmailTemplateController@destroy')->name("delete");
    });
    //!Email Template
    //Email Template
    Route::prefix('excel-template')->name("excel_templates.")->group(function () {
        Route::get('', 'ExcelTemplatesController@index')->name("index");
        Route::get('/create', 'ExcelTemplatesController@create')->name("create");
        Route::post('/store', 'ExcelTemplatesController@store')->name("store");
        Route::get('/edit/{id}', 'ExcelTemplatesController@edit')->name("edit");
        Route::post('/update/{id}', 'ExcelTemplatesController@update')->name("update");
        Route::get('/destroy/{id}', 'ExcelTemplatesController@destroy')->name("delete");
        Route::post('/datatable', 'ExcelTemplatesController@datatable')->name("datatable");
    });
    //!Email Template
    //profile
    Route::prefix('profile')->name("profile.")->group(function () {
        Route::get('', 'ProfileController@index')->name("index");
        Route::get('/logout', 'ProfileController@logout')->name("logout");
        Route::get('/change-password', 'ProfileController@GetchangePassword')->name("GetchangePassword");
        Route::post('/change-password', 'ProfileController@PostchangePassword')->name("PostchangePassword");
        Route::post('/update', 'ProfileController@update')->name("update");
        Route::get('/see-notifycation', 'ProfileController@seenotification')->name("seenotification");
        Route::get('/notifycation/{offset}', 'ProfileController@notifycation')->name("notifycation");
    });
    //!profile
    //users
    Route::prefix('users')->name("users.")->group(function () {
        Route::get('', 'UsersController@index')->name("index");
        Route::get('/create', 'UsersController@create')->name("create");
        Route::post('/store', 'UsersController@store')->name("store");
        Route::get('/edit/{id}', 'UsersController@edit')->name("edit");
        Route::post('/update', 'UsersController@update')->name("update");
        Route::get('/delete/{id}', 'UsersController@delete')->name("delete");
    });
    //!users
    //customers
    Route::prefix('customers')->name("customers.")->group(function () {
        Route::get('', 'CustomersController@index')->name("index");
        Route::get('/create', 'CustomersController@create')->name("create");
        Route::post('/store', 'CustomersController@store')->name("store");
        Route::get('/edit/{id}', 'CustomersController@edit')->name("edit");
        Route::post('/update/{id}', 'CustomersController@update')->name("update");
        Route::get('/delete/{id}', 'CustomersController@delete')->name("delete");
        Route::post('/import', 'CustomersController@import')->name("import");
        Route::get('/export', 'CustomersController@export')->name("export");
    });
    //!customers
    //Construction
    Route::prefix('construction')->name("construction.")->group(function () {
        Route::get('', 'ConstructionController@index')->name("index");
        Route::get('/create', 'ConstructionController@create')->name("create");
        Route::post('/store', 'ConstructionController@store')->name("store");
        Route::get('/edit/{id}', 'ConstructionController@edit')->name("edit");
        Route::post('/update/{id}', 'ConstructionController@update')->name("update");
        Route::get('/delete/{id}', 'ConstructionController@delete')->name("delete");
    });
    //!Construction
    //Construction Completion
    Route::prefix('construction_completion')->name("construction_completion.")->group(function (){
        Route::get('','ConstructionCompletionController@index')->name("index");
        Route::get('/edit','ConstructionCompletionController@edit')->name("edit");
        Route::post('/update','ConstructionCompletionController@update')->name("update");
        Route::post('/approve','ConstructionCompletionController@approve')->name("approve");
    });
    Route::prefix('sale_user')->name("sale_user.")->group(function (){
        Route::get('','SaleUserController@index')->name("index");
        Route::post('/update','SaleUserController@update')->name("update");
    });
    //!Construction Completion
    //orders

    Route::prefix('orders')->name("orders.")->group(function () {
        Route::get('', 'OrdersController@index')->name("index");
        Route::post('/store/{id}', 'OrdersController@store')->name("store");
        Route::get('/edit/{id}', 'OrdersController@edit')->name("edit");
        Route::get('/destroy/{id}', 'OrdersController@destroy')->name("destroy");
        Route::get('/status/{id}', 'OrdersController@status')->name("status");
        Route::get('/get-quotations/{id}', 'OrdersController@getquotations')->name("getquotations");
        Route::get('/get-quotation/{id}', 'OrdersController@getquotation')->name("getquotation");
        Route::get('/get-status/', 'OrdersController@getstatus')->name("getstatus");
        Route::get('/status/{id}', 'OrdersController@status')->name("status");
        Route::post('data', 'OrdersController@datatable')->name('datatable');
        Route::post('data-status/{id}', 'OrdersController@datatablestatus')->name('datatablestatus');
        Route::get('/create-contract/{id}', 'OrdersController@createcontract')->name("createcontract");
        Route::get('/view/{id}', 'OrdersController@view')->name("view");
        Route::get('/design-request-order/{id}', 'OrdersController@DesignRequest')->name("DesignRequest");
        Route::get('/dowload-quotation-item/{orderID}/{productID}', 'OrdersController@dowloadQuotation')->name("dowloadQuotation");
        Route::get('/dowload-other-item/{orderID}/{detailID}', 'OrdersController@dowloadOtherQuotation')->name("dowloadOtherQuotation");
        Route::get('/create', 'OrdersController@create')->name("create");
        Route::get('/start-order/{id}', 'OrdersController@startorder')->name("startorder");
        Route::get('/get-users/', 'OrdersController@getUsers')->name("getUsers");
        Route::get('/winningbidding/{id?}', 'OrdersController@winning_bidding')->name("winning_bidding");
        Route::get('/get-constructions/', 'OrdersController@getconstructions')->name("getconstructions");
        Route::post('/upload-request/', 'OrdersController@uploadRequest')->name("uploadRequest");
        Route::get('/export-revenue-slip/{id}/{lang?}', 'OrdersController@ExportRevenueSlip')->name("ExportRevenueSlip");
        Route::get('/revenue-view/{id?}', 'OrdersController@revenueView')->name("revenueView");
        Route::post('/revenue-update/{id?}', 'OrdersController@revenueUpdate')->name("revenueUpdate");

    });
    //!orders
    //quotations
    Route::prefix('quotations')->name("quotations.")->group(function () {
        Route::get('', 'QuotationsController@index')->name("index");
        Route::get('/customer/{id}', 'QuotationsController@customer')->name("customer");
        Route::get('/create', 'QuotationsController@create')->name("create");
        Route::get('/rate/{id}', 'QuotationsController@rate')->name("rate");
        Route::post('/store', 'QuotationsController@store')->name("store");
        Route::get('/edit/{id}', 'QuotationsController@edit')->name("edit");
        Route::get('/destroy/{id}', 'QuotationsController@destroy')->name("destroy");
        Route::post('/get-price-item-poduct', 'QuotationsController@getpriceitemproduct')->name("getpriceitemproduct");
        Route::get('/get-items-product/{id}', 'QuotationsController@getitemsproduct')->name("getitemsproduct");
        Route::post('/reload-items', 'QuotationsController@reloaditems')->name("reloaditems");
        Route::post('/get-price-poduct', 'QuotationsController@gettotalproduct')->name("gettotalproduct");
        Route::post('/add-detail', 'QuotationsController@adddetail')->name("adddetail");
        Route::get('/delete-product/{id}', 'QuotationsController@deleteproduct')->name("deleteproduct");
        Route::get('/delete-item-product/{id}', 'QuotationsController@deleteitemproduct')->name("deleteitemproduct");
        Route::get('/delete-item-other-product/{id}', 'QuotationsController@deleteitemotherproduct')->name("deleteitemotherproduct");
        Route::get('/delete-other-product/{id}', 'QuotationsController@deleteotherproduct')->name("deleteotherproduct");
        Route::get('/get-customers/', 'QuotationsController@getcustomers')->name("getcustomers");
        Route::get('/get-constructions/', 'QuotationsController@getconstructions')->name("getconstructions");
        Route::get('/get-branchs/', 'QuotationsController@getbranchs')->name("getbranchs");
        Route::get('/get-areas/', 'QuotationsController@getareas')->name("getareas");
        Route::get('/view-tree/{id}', 'QuotationsController@viewtree')->name("viewtree");
        Route::get('/status/{id}', 'QuotationsController@status')->name("status");
        Route::post('data', 'QuotationsController@datatable')->name('datatable');
        Route::post('data-status/{id}', 'QuotationsController@datatablestatus')->name('datatablestatus');
        Route::get('created-order/{id}', 'QuotationsController@createdorder')->name('createdorder');
        Route::get('view/{id}', 'QuotationsController@view')->name('view');
        Route::get('copy/{id}', 'QuotationsController@copy')->name('copy');
        Route::get('/get-status/', 'QuotationsController@getstatus')->name("getstatus");
        Route::get('/export/{id}/{lang?}', 'QuotationsController@export')->name("export");
        Route::get('reversion/{id}', 'QuotationsController@reversion')->name('reversion');
        Route::get('/export-receipt/{id}/{lang?}', 'QuotationsController@exportreceipt')->name("exportreceipt");
        Route::get('/download-special/{id}', 'QuotationsController@downloadSpecial')->name('downloadSpecial');
        Route::post('/view-reversion', 'QuotationsController@viewreversion')->name('viewreversion');
        Route::post('/export-merge', 'QuotationsController@QuotationSetMerge')->name('QuotationSetMerge');
        Route::get('/download-merge/{id}', 'QuotationsController@downloadmerge')->name('downloadmerge');
        Route::post('get-reversion', 'QuotationsController@getreversion')->name('getreversion');

        Route::get('/design-request-order/{id}', 'QuotationsController@DesignRequest')->name("DesignRequest");
        Route::get('/dowload-quotation-item/{quotationID}/{productID}', 'QuotationsController@dowloadQuotation')->name("dowloadQuotation");
        Route::get('/dowload-other-item/{quotationID}/{detailID}', 'QuotationsController@dowloadOtherQuotation')->name("dowloadOtherQuotation");

        Route::get('salesman', 'QuotationsController@salesman')->name('salesman');
    });
    //!quotations
    //request-design
    Route::prefix('request-design')->name("request-design.")->group(function () {
        Route::get('/export/{order}', 'RequestDesignController@export')->name("export");
    });
    //!request-design
    //taxs
    Route::prefix('taxs')->name("taxs.")->group(function () {
        Route::get('', 'TaxsController@index')->name("index");
        Route::post('/store', 'TaxsController@store')->name("store");
        Route::get('/edit/{id}', 'TaxsController@edit')->name("edit");
        Route::get('/delete/{id}', 'TaxsController@delete')->name("delete");
    });
    //!taxs
    //status
    Route::prefix('status')->name("status.")->group(function () {
        Route::get('', 'StatusController@index')->name("index");
        Route::post('/store', 'StatusController@store')->name("store");
        Route::get('/edit/{id}', 'StatusController@edit')->name("edit");
        Route::get('/destroy/{id}', 'StatusController@destroy')->name("destroy");
        Route::post('/update-rule', 'StatusController@updaterule')->name("updaterule");
        Route::get('/rule/{id}', 'StatusController@rule')->name("rule");
        Route::post('/datatable', 'StatusController@datatable')->name("datatable");
    });
    //!status
    //contracts
    Route::prefix('contracts')->name("contracts.")->group(function () {
        Route::get('', 'ContractsController@index')->name("index");
        Route::get('/create/', 'ContractsController@create')->name("create");
        Route::post('/store/', 'ContractsController@store')->name("store");
        Route::get('/edit/{id}', 'ContractsController@edit')->name("edit");
        Route::post('/update/{id}', 'ContractsController@update')->name("update");
        Route::get('/delete/{id}', 'ContractsController@delete')->name("delete");
        Route::get('/view/{id}', 'ContractsController@view')->name("view");
        Route::get('/contract-construction/', 'ContractsController@contract_construction')->name("contract_construction");
        Route::get('/download-payment-order/{id}','ContractsController@DownloadPaymentOrder')->name("DownloadPaymentOrder");
        Route::get('/download-acceptance/{id}','ContractsController@DownloadAcceptance')->name("DownloadAcceptance");
        Route::get('/download-subcontractors/{id}','ContractsController@DownloadSubcontractors')->name("subcontractors");
    });
    //!contracts
    //factory-product
    Route::prefix('factory_product')->name("factory_product.")->group(function () {
        Route::get('', 'FactoryProductController@index')->name("index");
        Route::post('/import', 'FactoryProductController@import')->name("import");
        Route::get('/external', 'FactoryProductController@external')->name("external");
        Route::post('/import_external', 'FactoryProductController@import_external')->name("import_external");
    });
    //!factory-product
    //Main List
    Route::prefix('main_list')->name("main_list.")->group(function () {
        Route::get('', 'MainListController@index')->name("index");
    });
    //!Main List
    //factory-partition
    Route::prefix('factorys')->name("factorys.")->group(function () {
        Route::get('', 'FactoryPartitionController@index')->name("index");
        Route::post('/import', 'FactoryPartitionController@import')->name("import");
        Route::post('/export', 'FactoryPartitionController@export')->name("export");
    });
    //!factory-partition
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::prefix('item-class')->name('item-class.')->group(function () {
            Route::get('', 'ItemClassController@index')->name('index');
            Route::post('data', 'ItemClassController@datatable')->name('datatable');
            Route::get('show/{id}', 'ItemClassController@show')->name('show');
            Route::post('store', 'ItemClassController@store')->name('store');
            Route::post('update', 'ItemClassController@update')->name('update');
        });

        Route::prefix('product-class')->name('product-class.')->group(function () {
            Route::get('', 'ProductClassController@index')->name('index');
            Route::post('data', 'ProductClassController@datatable')->name('datatable');
            Route::get('show/{id}', 'ProductClassController@show')->name('show');
            Route::post('store', 'ProductClassController@store')->name('store');
            Route::post('update', 'ProductClassController@update')->name('update');
        });

        Route::prefix('items')->name('items.')->group(function () {
            Route::get('', 'ItemsController@index')->name('index');
            Route::post('data', 'ItemsController@datatable')->name('datatable');
            Route::get('show/{id}', 'ItemsController@show')->name('show');
            Route::post('store', 'ItemsController@store')->name('store');
            Route::post('update', 'ItemsController@update')->name('update');
            Route::get('query', 'ItemsController@query')->name('query');
            Route::get('by-class', 'ItemsController@by_item_class')->name('by-class');
        });

        Route::prefix('item-price')->name('item-price.')->group(function () {
            Route::get('', 'ItemPriceController@index')->name('index');
            Route::post('data', 'ItemPriceController@datatable')->name('datatable');
            Route::post('add', 'ItemPriceController@store')->name('store');
            Route::put('update', 'ItemPriceController@update')->name('update');
            Route::get('show/{id}', 'ItemPriceController@show')->name('show');
            Route::get('export', 'ItemPriceController@export')->name('export');
            Route::get('import', 'ItemPriceController@import')->name('import');
            Route::post('import', 'ItemPriceController@importing')->name('importing');
        });

        Route::prefix('price-pattern')->name('price-pattern.')->group(function () {
            Route::get('', 'PricePatternController@index')->name('index');
            Route::get('add', 'PricePatternController@create')->name('create');
            Route::post('add', 'PricePatternController@store')->name('store');
            Route::post('update', 'PricePatternController@update')->name('update');
            Route::post('data', 'PricePatternController@datatable')->name('datatable');
        });

        Route::prefix('currency')->name('currency.')->group(function () {
            Route::get('', 'CurrencyController@index')->name('index');
            Route::get('add', 'CurrencyController@create')->name('create');
            Route::post('add', 'CurrencyController@store')->name('store');
            Route::post('update', 'CurrencyController@update')->name('update');
            Route::post('data', 'CurrencyController@datatable')->name('datatable');
            Route::get('show/{id}', 'CurrencyController@show')->name('show');
        });

        Route::prefix('matrix-value')->name('matrix-value.')->group(function () {
            Route::get('', 'MatrixValueController@index')->name('index');
            Route::post('data', 'MatrixValueController@datatable')->name('datatable');
            Route::post('add', 'MatrixValueController@store')->name('store');
            Route::put('add', 'MatrixValueController@update')->name('update');
            Route::get('show/{id}', 'MatrixValueController@show')->name('show');
        });

        Route::prefix('matrix-type')->name('matrix-type.')->group(function () {
            Route::get('', 'MatrixTypeController@index')->name('index');
            Route::post('data', 'MatrixTypeController@datatable')->name('datatable');
            Route::post('add', 'MatrixTypeController@store')->name('store');
            Route::put('add', 'MatrixTypeController@update')->name('update');
            Route::get('show/{id}', 'MatrixTypeController@show')->name('show');
        });

        Route::prefix('tax')->name('tax.')->group(function () {
            Route::get('', 'TaxController@index')->name('index');
            Route::post('data', 'TaxController@datatable')->name('datatable');
            Route::post('add', 'TaxController@store')->name('store');
            Route::put('add', 'TaxController@update')->name('update');
            Route::get('show/{id}', 'TaxController@show')->name('show');
        });

        Route::prefix('completion-report')->name('completion-report.')->group(function () {
            Route::get('', 'CompletionReportController@index')->name('index');
            Route::any('data', 'CompletionReportController@datatable')->name('datatable');
            Route::get('{id}', 'CompletionReportController@periods')->name('periods');
            Route::get('{id}/add', 'CompletionReportController@create')->name('create');
            Route::post('{id}/add', 'CompletionReportController@store')->name('store');
            Route::post('{id}/update', 'CompletionReportController@update')->name('update');
        });

        Route::prefix('factory-code')->name('factory-code.')->group(function () {
            Route::get('', 'FactoryCodeController@index')->name('index');
            Route::any('data', 'FactoryCodeController@datatable')->name('datatable');
            Route::post('add', 'FactoryCodeController@store')->name('store');
            Route::post('update', 'FactoryCodeController@update')->name('update');
            Route::get('show/{id}', 'FactoryCodeController@show')->name('show');
            Route::delete('delete/{id}', 'FactoryCodeController@destroy')->name('delete');
        });
    });
    //!conflicts code...?

});
