<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CareerCategoryController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckListController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CustomCategoryController;
use App\Http\Controllers\CustomProductController;
use App\Http\Controllers\CustomProductMaterialController;
use App\Http\Controllers\CustomProductVariantController;
use App\Http\Controllers\EcommCategoryController;
use App\Http\Controllers\EcommController;
use App\Http\Controllers\EcommProductController;
use App\Http\Controllers\EcommQrCodeController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\favoriteCareerController;
use App\Http\Controllers\FavoriteCategoriesController;
use App\Http\Controllers\favoritesController;
use App\Http\Controllers\GeneralQrCodesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IntroCategoryController;
use App\Http\Controllers\IntroProductController;
use App\Http\Controllers\MenuCategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\pageBlocksController;
use App\Http\Controllers\PageContactusController;
use App\Http\Controllers\PageDescriptionController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProvinceCityController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\SamplesController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SiteLinkController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SocialAddressController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\SpecialUserController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;
// use App\Http\Middleware\checkListAdmin;
use App\Http\Controllers\ClassAttachmentController;
use App\Http\Controllers\ClassCommentController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\InstituteRequestController;
use App\Http\Controllers\LessonClassController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PageCategoryController;
use App\Http\Controllers\SearchController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\savePreviousUrl;
use App\Models\page_category;
use App\Models\pages;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Route::get('/fttest', function(){
    Schema::table('contact_us', function(Blueprint $table){
        $table->dropColumn('user_id');
    });
});

Route::get('/test', function () {
    Schema::table('pages', function (BluePrint $table) {
        $table->longText('description')->nullable()->change();
        $table->integer('category_id')->default(0)->after('description');
    });
    $allCats = [
        [
            'title' => 'عمومی',
            'slug' => 'General',
            'parent_id' => 0,
            'description' => null
        ],
        [
            'title' => 'هنرمند',
            'slug' => 'Artist',
            'parent_id' => 0,
            'description' => null
        ],
        [
            'title' => 'موزیسین / بند',
            'slug' => 'Musician / band',
            'parent_id' => 0,
            'description' => null
        ],
        [
            'title' => 'بلاگر',
            'slug' => 'Blogger',
            'parent_id' => 0,
            'description' => null
        ],
        [
            'title' => 'پوشاک (برند)',
            'slug' => 'Clothing (brand)',
            'parent_id' => 0,
            'description' => null
        ],
        [
            'title' => 'انجمن',
            'slug' => 'Community',
            'parent_id' => 0,
            'description' => null
        ],
        [
            'title' => 'سازنده دیجیتال',
            'slug' => 'Digital Creator',
            'parent_id' => 0,
            'description' => null
        ],
        [
            'title' => 'آموزش',
            'slug' => 'Education',
            'parent_id' => 0,
            'description' => null
        ],
        [
            'title' => 'کارآفرین',
            'slug' => 'Entrepreneur',
            'parent_id' => 0,
            'description' => null
        ],
        [
            'title' => 'سلامتی / زیبایی',
            'slug' => 'Health / Beauty',
            'parent_id' => 0,
            'description' => null
        ],
        [
            'title' => 'ویرایشگر',
            'slug' => 'Editor',
            'parent_id' => 0,
            'description' => null
        ],
        [
            'title' => 'نویسنده',
            'slug' => 'Writer',
            'parent_id' => 0,
            'description' => null
        ],
        [
            'title' => 'وبلاگ شخصی',
            'slug' => 'Personal blog',
            'parent_id' => 0,
            'description' => null
        ],
        [
            'title' => 'محصول / خدمات',
            'slug' => 'Product / service',
            'parent_id' => 0,
            'description' => null
        ],
        [
            'title' => 'گیمر',
            'slug' => 'gamer',
            'parent_id' => 0,
            'description' => null
        ],
        [
            'title' => 'رستوران',
            'slug' => 'Restaurant',
            'parent_id' => 0,
            'description' => null
        ],
        [
            'title' => 'زیبایی، آرایشی و بهداشت شخصی',
            'slug' => 'Beauty, cosmetic & personal care',
            'parent_id' => 0,
            'description' => null
        ],
        [
            'title' => 'خواربار فروشی',
            'slug' => 'Grocery Store',
            'parent_id' => 0,
            'description' => null
        ],
        [
            'title' => 'عکاس',
            'slug' => 'Photographer',
            'parent_id' => 0,
            'description' => null
        ],
        [
            'title' => 'فروش و خرده فروشی',
            'slug' => 'Shopping & retail',
            'parent_id' => 0,
            'description' => null
        ],
        [
            'title' => 'طراح سایت',
            'slug' => 'Web developer',
            'parent_id' => 0,
            'description' => null
        ],
        [
            'title' => 'برنامه نویس',
            'slug' => 'Programmer',
            'parent_id' => 0,
            'description' => null
        ],
        [
            'title' => 'متفرقه',
            'slug' => 'Sundry',
            'parent_id' => 0,
            'description' => null
        ],
    ];
    page_category::insert($allCats);
    $cat = page_category::where('slug', 'general')->first();
    pages::on('mysql')->update(['category_id' => $cat->id]);
    return "compeleted";
});

Route::group([
    'prefix' => 'page-category',
    'controller' => PageCategoryController::class,
    'middleware' => [UserMiddleware::class, AdminMiddleware::class],
    'as' => 'pageCategory.'
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/list', 'list')->name('list');
});

Route::get('/roadmap', function () {
    return view('guys.nasiri.roadmap');
})->name('roadmap');

Route::get('print/services', function () {
    return view('guys.ho.print');
})->name('print.services');
Route::get('/computer-services', function () {
    return view('guys.ft.computer');
})->name('computer.services');

Route::get('rinform', function () {
    return view('newhome');
});

Route::get('ringaa/mahdi', function () {
    return view('ringaa');
});

Route::get('/robot', function () {
    return view('abbasScratch.index');
});

Route::get('/set-ref-code', [UserController::class, 'setRefCode']);

Route::group([
    'prefix' => 'special-user',
    'controller' => SpecialUserController::class,
    'middleware' => [UserMiddleware::class],
    'as' => 'special-user.'
], function () {
    Route::post('/store', 'store')->name('store');
    Route::get('/delete/{user}/{pages}', 'delete')->name('delete');
    Route::get('/showAll/{pages}', 'index')->name('index');
    Route::get('/customerPage/{page_id}', 'customerPage')->name('page');
});

Route::group([
    'prefix' => 'samples',
    'controller' => SamplesController::class,
    'middleware' => [UserMiddleware::class],
    'as' => 'sample.'
], function () {
    Route::post('/store', 'store')->name('store');
    Route::post('/edit', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::post('/delete', 'delete')->name('delete');
});

Route::group([
    'prefix' => 'intro-cat',
    'controller' => IntroCategoryController::class,
    'middleware' => [UserMiddleware::class],
    'as' => 'introCat.'
], function () {
    Route::get('/list/{pages}', 'index')->name('list');
    Route::get('/create/{pages}', 'create')->name('create');
    Route::post('/store/{pages}', 'store')->name('store');
    Route::get('/edit/{intro_category}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::post('/delete', 'delete')->name('delete');
    Route::get('/selectCats/{pages?}', 'selectCats')->name('selectCats');
    //    Route::get('/selectCats', 'selectCats')->name('selectCats');
    Route::get('/user-intro-categories/{user?}', 'user_cats')->name('list');
    Route::get('/products/{intro_category}', 'products')->name('products')->withoutMiddleware([UserMiddleware::class]);
    Route::post('/deleteAll', 'deleteAll')->name('deleteAll');
});
Route::group([
    'prefix' => 'intro-pro',
    'controller' => IntroProductController::class,
    'middleware' => [UserMiddleware::class],
    'as' => 'introPro.'
], function () {
    Route::get('/create/{pages}', 'create')->name('create');
    Route::get('/list/{pages}', 'index')->name('list');
    Route::post('/store/{pages}', 'store')->name('store');
    Route::post('/update', 'update')->name('update');
    Route::post('/updatePage/{intro_product}', 'updatePage')->name('updatePage');
    Route::post('/delete', 'delete')->name('delete');
    Route::post('/showProducts', 'showProducts')->name('showProducts')->withoutMiddleware([UserMiddleware::class]);
    Route::post('/edit', 'edit')->name('edit');
    Route::get('/editPage/{intro_product}', 'editPage')->name('editPage');
    Route::post('/editSingle', 'editSingle')->name('editSingle');
    Route::get('/single/{intro_product}', 'single')->name('single');
    Route::get('/user-show/{intro_product}', 'showForUser')->name('showForUser')->withoutMiddleware([UserMiddleware::class]);
    //     Route::get('/user-intro-categories/{user}', 'user_cats')->name('list');
    Route::get('/products/{intro_category}', 'products')->name('products');
    Route::post('/deleteAll', 'deleteAll')->name('deleteAll');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/printery', [HomeController::class, 'printery'])->name('printery');
// Route::any('filter', [HomeController::class, 'filter'])->name('filter');
Route::get('/login/{message?}', [UserController::class, 'login'])->name('login')->middleware([LoginMiddleware::class]);
Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware([UserMiddleware::class]);
Route::post('userData', [UserController::class, 'userData'])->name('userData')->middleware([UserMiddleware::class]);
Route::get('/signup/{slug?}', [UserController::class, 'create'])->name('signup')->middleware([LoginMiddleware::class]);
Route::post('/send_code', [UserController::class, 'send_code'])->name('send_code');
Route::post('/removeActivationCode', [UserController::class, 'removeActivationCode'])->name('removeActivationCode');
Route::get('/forget_password', [UserController::class, 'forget_password'])->name('forget_password');
Route::post('/set_password', [UserController::class, 'set_password'])->name('set_password');
Route::get('/reset_password/{user}', [UserController::class, 'reset_password'])->name('reset_password');
Route::post('/save_password', [UserController::class, 'save_password'])->name('save_password');
Route::post('/check', [UserController::class, 'checkAuth'])->name('checkAuth');
Route::post('/loginWithActivationCode', [UserController::class, 'loginWithActivationCode'])->name('loginWithActivationCode');
Route::post('/check-activation-code', [UserController::class, 'checkActivationCode'])->name('checkActivationCode');

Route::group([
    'prefix' => 'search',
    'controller' => SearchController::class,
    'as' => 'search.'
], function () {
    Route::get('/', 'search')->name('search');
});

Route::group([
    'prefix' => 'users',
    'controller' => UserController::class,
    'as' => 'user.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::post('/store', 'store')->name('store')->withoutMiddleware([UserMiddleware::class]);
    Route::post('/check', 'check')->name('check')->withoutMiddleware([UserMiddleware::class]);
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/', 'index')->name('list');
    Route::get('/panel/{user}', 'panel')->name('panel');
    Route::get('/profile', 'profile')->name('profile');
    Route::get('/show/{user}', 'show')->name('show');
    Route::get('/edit/{user}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{user}', 'delete')->name('delete');
    Route::post('/deleteAll', 'deleteAll')->name('deleteAll');
    Route::get('/compelete', 'compelete_form')->name('compelete_form');
    Route::post('/save', 'save')->name('save');
    Route::get('/setting', 'setting')->name('setting');
    Route::post('/set', 'set')->name('set');
    route::post('/set_order', 'set_order')->name('set_order');
    Route::get('/create_user', 'create_user')->name('create_user');
    Route::post('/store_user', 'store_user')->name('store_user');
    Route::post('/search', 'search')->name('search');
    // Route::post('/checkFromMenu', 'checkFromMenu')->name('checkFromMenu')->withoutMiddleware([UserMiddleware::class]);
    Route::post('/setAddress', 'setAddress')->name('setAddress');
    Route::post('/customerSearch', 'customerSearch')->name('customerSearch');
    Route::get('/customers', 'myUsers')->name('myUsers');
    Route::get('/request/{user}', 'request')->name('request');
    Route::get('/requestList', 'requestList')->name('requestList');
    Route::post('/requestEvent', 'requestEvent')->name('requestEvent');
    Route::get('/deleteRequest/{requests}', 'deleteRequest')->name('deleteRequest');
    Route::get('/acceptRequest/{requests}', 'acceptRequest')->name('acceptRequest');
    Route::post('/editInfo', 'editInfo')->name('editInfo');
    Route::post('/editProfile', 'editProfile')->name('editProfile');
});

Route::group([
    'prefix' => 'province',
    'controller' => ProvinceCityController::class,
    'as' => 'pc.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::post('/city', 'city')->name('city');
});

// /// FAQ
Route::group([
    'prefix' => 'FAQ',
    'controller' => FAQController::class,
    'as' => 'FAQ.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/create/{pages}', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/FaqList', 'index')->name('list');
    Route::post('/edit', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::post('/delete', 'delete')->name('delete');
    Route::post('/add-question', 'addQuestion')->name('addQuestion');
});
// /pageBlocks
Route::group([
    'prefix' => 'pageBlocks',
    'controller' => pageBlocksController::class,
    'as' => 'pageBlocks.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::post('/edit', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::post('/delete', 'delete')->name('delete');
});

// client
Route::group([
    'controller' => ClientController::class,
    'as' => 'client.'
], function () {
    Route::get('/allPages', 'allPages')->name('allPages');
    //    Route::get('/{pages:user_name}', 'loadLink')->name('loadLink');
    Route::get('/{page:user_name}', 'loadPage')->name('loadPage');
    Route::get('/menu/{career}/{slug?}', 'show_menu')->name('menu');
});
Route::get('/career/{career}', [ClientController::class, 'show_career'])->name('show_career');
// Route::get('/socialPage/{pages}', [ClientController::class, 'show_socialPage'])->name('show_socialPage');

Route::group([
    'prefix' => 'settings',
    'controller' => SettingController::class,
    'as' => 'settings.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::group([
        'prefix' => 'colors',
        'as' => 'colors.'
    ], function () {
        Route::get('/create', 'createColor')->name('createColor');
        Route::post('/update', 'upsertColor')->name('upsertColor');
        Route::get('/show', 'showColors')->name('showColors');
        Route::get('/delete', 'deleteColor')->name('deleteColor');
    });
});

Route::group([
    'prefix' => 'settings',
    'controller' => SettingController::class,
    'as' => 'settings.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::group([
        'prefix' => 'logo',
        'as' => 'logo.'
    ], function () {
        Route::get('/create', 'createLogo')->name('createLogo');
        Route::post('/update', 'upsertLogo')->name('upsertLogo');
        Route::get('/show', 'showLogo')->name('showLogo');
    });
});

Route::group([
    'prefix' => 'settings',
    'controller' => SettingController::class,
    'as' => 'settings.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::group([
        'prefix' => 'main_ads',
        'as' => 'mainAds.'
    ], function () {
        Route::get('/create', 'createMainAds')->name('createMainAds');
        Route::post('/update', 'upsertMainAds')->name('upsertMainAds');
        Route::get('/show', 'showMainAds')->name('showMainAds');
    });
});

Route::group([
    'prefix' => 'settings',
    'controller' => SettingController::class,
    'as' => 'settings.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::group([
        'prefix' => 'main_banner_home',
        'as' => 'mainBanner.'
    ], function () {
        Route::get('/create', 'createMainBanner')->name('createMainBanner');
        Route::post('/update', 'upsertMainBanner')->name('upsertMainBanner');
        Route::get('/show', 'showMainBanner')->name('showMainBanner');
    });
});

Route::group([
    'prefix' => 'settings',
    'controller' => SettingController::class,
    'as' => 'settings.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::group([
        'prefix' => 'single_ads',
        'as' => 'singleAds.'
    ], function () {
        Route::get('/create', 'createSingleAds')->name('createSingleAds');
        Route::post('/update', 'upsertSingleAds')->name('upsertSingleAds');
        Route::get('/show', 'showSingleAds')->name('showSingleAds');
    });
});

Route::group([
    'prefix' => 'settings',
    'controller' => SettingController::class,
    'as' => 'settings.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::group([
        'prefix' => 'category_ads',
        'as' => 'categoryAds.'
    ], function () {
        Route::get('/create', 'createCategoryAds')->name('createCategoryAds');
        Route::post('/update', 'upsertCategoryAds')->name('upsertCategoryAds');
        Route::get('/show', 'showCategoryAds')->name('showCategoryAds');
    });
});

// aboutUs
Route::group([
    'prefix' => 'aboutUs',
    'controller' => AboutUsController::class,
    'as' => 'aboutUs.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/create_edit/{aboutUs?}', 'create_edit')->name('create_edit');
    Route::post('/updateOrcreate', 'updateOrcreate')->name('updateOrcreate');
    Route::get('/aboutUs', 'index')->name('list');
    Route::get('/delete/{aboutUs}', 'delete')->name('delete');
    Route::get('/clientList', 'clientList')->name('clientList')->withoutMiddleware([UserMiddleware::class]);
});

// socialMedia
Route::group([
    'prefix' => 'socialMedia',
    'controller' => SocialMediaController::class,
    'as' => 'socialMedia.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/socialMedias', 'index')->name('list');
    Route::get('/edit/{socialMedia}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{socialMedia}', 'delete')->name('delete');
    Route::post('/deleteAll', 'deleteAll')->name('deleteAll');
});
// siteLink
Route::group([
    'prefix' => 'siteLink',
    'controller' => SiteLinkController::class,
    'as' => 'siteLink.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/create/{pages}', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/medias', 'index')->name('list');
    Route::post('/edit', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::post('/delete', 'delete')->name('delete');
});
// socialAddress
Route::group([
    'prefix' => 'socialAddress',
    'controller' => SocialAddressController::class,
    'as' => 'socialAddress.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/create/{pages}', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/socialAddress', 'index')->name('list');
    Route::post('/edit/{social_address}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::post('/delete', 'delete')->name('delete');
});
// ////pages

Route::group([
    'prefix' => 'page',
    'controller' => PagesController::class,
    'as' => 'pages.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    //    Route::get('/store-with-click', 'storeWithClick')->name('storeWithClick')->withoutMiddleware([UserMiddleware::class]);
    Route::get('/my-pages', 'social_list')->name('social_list');
    Route::get('/list', 'index')->name('list');
    Route::get('/edit/{page}', 'edit')->name('edit');
    Route::post('/update/{page}', 'update')->name('update');
    Route::get('/delete/{page}', 'delete')->name('delete');
    Route::get('/{pages:user_name}', 'single')->name('single');
    Route::post('/deleteAll', 'deleteAll')->name('deleteAll');
    Route::get('/introCats/{pages}', 'introCats')->name('introCats')->withoutMiddleware([UserMiddleware::class]);
    Route::get('/admin/introCats/{pages}', 'adminIntroCats')->name('adminIntroCats');
    Route::get('/admin/proList/{pages}', 'proList')->name('proList');
    Route::get('/products/{pages}', 'products')->name('products')->withoutMiddleware([UserMiddleware::class]);
    Route::post('/editInfo', 'editInfo')->name('editInfo');
    Route::post('/saveAll', 'saveAll')->name('saveAll');
});

// /contactUs
Route::group([
    'prefix' => 'contactUs',
    'controller' => contactUsController::class,
    'as' => 'contactUs.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/create', 'create')->name('create')->withoutMiddleware([UserMiddleware::class]);
    Route::post('/store', 'store')->name('store')->withoutMiddleware([UserMiddleware::class]);
    Route::get('/myMessage', 'myMessage')->name('myMessage');
    Route::get('/contactUs', 'index')->name('list');
    Route::get('/single/{contactUs}', 'single')->name('single');
    Route::get('/clientSingle/{contactUs}', 'clientSingle')->name('show');
    Route::get('/edit/{contactUs}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{contactUs}', 'delete')->name('delete');
    Route::post('/deleteAll', 'deleteAll')->name('deleteAll');
});
// page contactus
Route::group([
    'prefix' => 'pageContactus',
    'controller' => PageContactusController::class,
    'as' => 'pageContacts.',
], function () {
    Route::post('/store', 'store')->name('store');
    Route::get('/FaqList', 'index')->name('list');
    Route::post('/edit', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::post('/delete', 'delete')->name('delete');
    Route::post('/add-contactus', 'addContactus')->name('addContactus');
});

// page description
Route::group([
    'prefix' => 'pageDescription',
    'controller' => PageDescriptionController::class,
    'as' => 'PD.',
], function () {
    Route::post('/store', 'store')->name('store');
    Route::get('/FaqList', 'index')->name('list');
    Route::post('/edit', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::post('/delete', 'delete')->name('delete');
});
// developed by mr.olyafam
// general qrcodes
Route::group([
    'prefix' => 'generalQrCodes',
    'controller' => GeneralQrCodesController::class,
    'as' => 'generalQrCodes.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/list', 'list')->name('list');
    Route::post('/edit', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{generalQrCodes}', 'delete')->name('delete');
});

Route::group([
    'prefix' => 'request',
    'controller' => InstituteRequestController::class,
    'as' => 'request.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/create/{institute}', 'create')->name('form');
    Route::post('/store', 'store')->name('store');
    Route::get('/requests/{institute}', 'requests')->name('requests');
    Route::get('/request_approve/{userId}/{instituteId}', 'approveRequest')->name('request_approve');
    Route::get('/userDelete/{user}/{institute}', 'userDelete')->name('userDelete');
});

Route::fallback(function () {
    return view('404');
});
