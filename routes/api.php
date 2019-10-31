<?php


Route::post('register', 'Auth\AuthController@register')->name('register');
Route::post('login', 'Auth\AuthController@login')->name('login');
//getting current user
Route::get('/user', 'Auth\AuthController@user');
Route::post('/logout', 'Auth\AuthController@logout');

Route::resource('categories', 'Front\Categories\CategoryController');

Route::get('men/category',['as'=>'men.category','uses'=>'Front\Categories\CategoryController@menCategory']);
Route::get('men/subcategory/{parent_id}',['as'=>'men.category','uses'=>'Front\Categories\CategoryController@menSubCategory']);

Route::get('women/category',['as'=>'women.category','uses'=>'Front\Categories\CategoryController@womenCategory']);
Route::get('women/subcategory/{parent_id}',['as'=>'women.category','uses'=>'Front\Categories\CategoryController@womenSubCategory']);


Route::get('page/women',['as'=>'page.women','uses'=>'Front\Page\PageController@women']);
Route::get('page/men',['as'=>'page.men','uses'=>'Front\Page\PageController@men']);
Route::get('page/home',['as'=>'page.home','uses'=>'Front\Page\PageController@home']);

//This api is for getting common static pages
//on front like about us, contact us etc...
Route::get('page/common',['as'=>'page.common','uses'=>'Front\Page\PageController@common']);

Route::get('page/commonpagecontent/{page}',['as'=>'page.commonpage','uses'=>'Front\Page\PageController@commonPageContent']);
Route::get('blog',['as'=>'blog','uses'=>'Front\Blog\BlogController@index']);
Route::get('blog/detail/{slug}',['as'=>'blog.category','uses'=>'Front\Blog\BlogController@detail']);
Route::get('brands',['as'=>'brands','uses'=>'Front\Brand\BrandController@index']);
Route::get('brands/{slug}',['as'=>'brands.product-list','uses'=>'Front\Brand\BrandController@productList']);
Route::post('subscription',['as'=>'subscription','uses'=>'Front\Misc\SubscriptionController@subscription']);



//Route to get merchants using name
Route::post('merchantDetails',['as'=>'merchantDetails','uses'=>'Front\Merchant\MerchantController@merchantDetails']);

// Route::resource('subscription', '');
Route::get('page/catalogue/{id}',['as'=>'page.catalogue','uses'=>'Front\Catalogue\CatalogueController@index']);

//this is for Tag list on catalogue page on front
Route::get('page/generalcatalogue',['as'=>'page.generalcatalogue','uses'=>'Front\Catalogue\CatalogueController@generalCatalogue']);

/* MEN ROUTES*/
Route::get('men/allproducts',['as'=>'men.allproducts','uses'=>'Front\Men\MenController@getAllProducts']);
Route::get('men/featuredproducts',['as'=>'men.featuredproducts','uses'=>'Front\Men\MenController@getFeaturedProducts']);


/* WOMEN ROUTES*/
Route::get('women/allproducts',['as'=>'women.allproducts','uses'=>'Front\Women\WomenController@getAllProducts']);
Route::get('women/featuredproducts',['as'=>'women.featuredproducts','uses'=>'Front\Women\WomenController@getFeaturedProducts']);


Route::get('products/featuredproducts',['as'=>'products.featuredproducts','uses'=>'Front\Products\ProductsController@allfeaturedProducts']);
Route::resource('products', 'Front\Products\ProductsController');
/* CATALOGUE ROUTES*/
Route::get('product/colors',['as'=>'product.colors','uses'=>'Front\Catalogue\CatalogueController@getProductColors']);
Route::get('product/sizes',['as'=>'product.sizes','uses'=>'Front\Catalogue\CatalogueController@getProductSizes']);

Route::get('page/search/{id}',['as'=>'page.search','uses'=>'Front\Catalogue\CatalogueController@searchCatalogue']);

// Route::get('/vtweb', 'PagesController@vtweb');

// Route::get('/vtdirect', 'PagesController@vtdirect');
// Route::post('/vtdirect', 'PagesController@checkout_process');

// Route::get('/vt_transaction', 'PagesController@transaction');
// Route::post('/vt_transaction', 'PagesController@transaction_process');

// Route::post('/vt_notif', 'PagesController@notification');

Route::get('/snap', 'Snap\SnapController@snap');
Route::post('/snaptokenization', 'Snap\SnapController@token');
Route::post('/snapfinish', 'Snap\SnapController@finish');


// Route::post('orders/kredivo_notify', 'Backend\OrdersController@kredivoNotify');
Route::post('orders/kredivo_push_uri', 'Backend\OrdersController@kredivoPushUri');
Route::get('orders/getorderid','Backend\OrdersController@getOrderId');
Route::resource('orders', 'Backend\OrdersController');


Route::resource('orderDetails', 'Backend\OrderDetailsController');

//get disocunts 
Route::get('discount/cart',['as'=>'discount.cart','uses'=>'Backend\DiscountCartController@index']);
Route::get('discount/category',['as'=>'discount.category','uses'=>'Backend\DiscountCategoryController@index']);
Route::get('discount/shipping',['as'=>'discount.shipping','uses'=>'Backend\DiscountCartController@shipping']);

//get promocode details
Route::get('promo/getdetails/{code}',['as'=>'promo.getdetails','uses'=>'Backend\PromoCodeController@getdetails']);

// Route::post('payment/mtrans', 'Backend\PaymentController@store');
Route::resource('payment', 'Backend\PaymentController');

//Get All tags for Discover Your Style
Route::get('tag/menTags',['as'=>'tag.menTags','uses'=>'Backend\TagController@menTags']);
Route::get('tag/womenTags',['as'=>'tag.womenTags','uses'=>'Backend\TagController@womenTags']);