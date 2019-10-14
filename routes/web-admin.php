<?php

Route::group(['middleware'=>'admin.guest'], function ($api) {
    $api->get('/', 'LoginController@showLoginForm')->name('admin');
    $api->post('login', 'LoginController@login')->name('admin.login');
});

Route::group(['middleware'=>['admin.auth'],'as'=>'admin.'], function ($api) {

    $api->get('admin-logout', function () {
        auth()->guard('admin')->logout();
        return redirect()->to('/');
    })->name('logout');

    //Dashboard
    $api->get('dashboard', 'DashboardController@index')->name('dashboard');


    /*Profile*/
    $api->get('profile', 'ProfileController@index')->name('profile');
    $api->post('change-password', 'ProfileController@changePassword')->name('change-password');
    $api->post('change-profile-pic', 'ProfileController@changeProfilePic')->name('change-profile-pic');
    $api->post('change-user-info', 'ProfileController@changeUserInfo')->name('change-user-info');

    /*System User*/
    $api->post('system-user/list-ajax',['as'=>'system-user.list-ajax','uses'=>'SystemUserController@listAjax']);
    $api->post('system-user/change-status',['as'=>'system-user.change-status','uses'=>'SystemUserController@changeStatus']);
    $api->resource('system-user', 'SystemUserController',['names' => [
        'index'=>'system-user.index',
        'store' => 'system-user.add',
        'destroy'=>'system-user.delete',
        'update'=>'system-user.update'
    ]]);

    /*Shop*/
    $api->post('shop/list-ajax',['as'=>'shop.list-ajax','uses'=>'ShopController@listAjax']);
    $api->post('shop/change-status',['as'=>'shop.change-status','uses'=>'ShopController@changeStatus']);
    $api->resource('shop', 'ShopController',['names' => [
        'index'=>'shop.index',
        'store' => 'shop.add',
        'destroy'=>'shop.delete',
        'update'=>'shop.update'
    ]]);

    /*Brands*/
    $api->post('brand/list-ajax',['as'=>'brand.list-ajax','uses'=>'BrandController@listAjax']);
    $api->post('brand/change-status',['as'=>'brand.change-status','uses'=>'BrandController@changeStatus']);
    $api->resource('brand', 'BrandController',['names' => [
        'index'=>'brand.index',
        'store' => 'brand.add',
        'destroy'=>'brand.delete',
        'update'=>'brand.update'
    ]]);

    /*Promo*/
    $api->post('promo/list-ajax',['as'=>'promo.list-ajax','uses'=>'PromoCodeController@listAjax']);
    $api->post('promo/change-status',['as'=>'promo.change-status','uses'=>'PromoCodeController@changeStatus']);
    $api->resource('promo', 'PromoCodeController',['names' => [
        'index'=>'promo.index',
        'store' => 'promo.add',
        'destroy'=>'promo.delete',
        'update'=>'promo.update'
    ]]);

    /*Category*/
    $api->post('category/list-ajax',['as'=>'category.list-ajax','uses'=>'CategoryController@listAjax']);
    $api->post('category/change-status',['as'=>'category.change-status','uses'=>'CategoryController@changeStatus']);
    $api->resource('category', 'CategoryController',['names' => [
        'index'=>'category.index',
        'store' => 'category.add',
        'destroy'=>'category.delete',
        'update'=>'category.update'
    ]]);

    /*Sub Category*/
    $api->post('sub-category/list-ajax',['as'=>'sub-category.list-ajax','uses'=>'SubCategoryController@listAjax']);
    $api->post('sub-category/change-status',['as'=>'sub-category.change-status','uses'=>'SubCategoryController@changeStatus']);
    $api->resource('sub-category', 'SubCategoryController',['names' => [
        'index'=>'sub-category.index',
        'store' => 'sub-category.add',
        'destroy'=>'sub-category.delete',
        'update'=>'sub-category.update'
    ]]);

    /*Blog*/
    $api->post('blog/list-ajax',['as'=>'blog.list-ajax','uses'=>'BlogController@listAjax']);
    $api->post('blog/change-status',['as'=>'blog.change-status','uses'=>'BlogController@changeStatus']);
    $api->get('blog/view-images/{id}',['as'=>'blog.view-images','uses'=>'BlogController@viewImages']);
    $api->delete('blog/delete-image/{id}',['as'=>'blog.delete-image','uses'=>'BlogController@deleteImage']);
    $api->post('blog/list-images',['as'=>'blog.list-images','uses'=>'BlogController@listImages']);
    $api->post('blog/update-image-order',['as'=>'blog.update-blog-image-order','uses'=>'BlogController@updateImageOrder']);
    $api->resource('blog', 'BlogController',['names' => [
        'index'=>'blog.index',
        'store' => 'blog.add',
        'destroy'=>'blog.delete',
        'update'=>'blog.update'
    ]]);

    /*Blog Category*/
    $api->post('blog-category/list-ajax',['as'=>'blog-category.list-ajax','uses'=>'BlogCategoryController@listAjax']);
    $api->post('blog-category/change-status',['as'=>'blog-category.change-status','uses'=>'BlogCategoryController@changeStatus']);
    $api->resource('blog-category', 'BlogCategoryController',['names' => [
        'index'=>'blog-category.index',
        'store' => 'blog-category.add',
        'destroy'=>'blog-category.delete',
        'update'=>'blog-category.update'
    ]]);

    /*Merchant*/
    $api->get('merchant/get-province',['as'=>'merchant.getprovince','uses'=>'MerchantController@getprovince']);
    $api->post('merchant/get-city',['as'=>'merchant.getcity','uses'=>'MerchantController@getcity']);
    $api->post('merchant/get-suburb',['as'=>'merchant.suburb','uses'=>'MerchantController@getsuburb']);
    $api->post('merchant/get-area',['as'=>'merchant.area','uses'=>'MerchantController@getarea']);
    $api->post('merchant/list-ajax',['as'=>'merchant.list-ajax','uses'=>'MerchantController@listAjax']);
    $api->post('merchant/change-status',['as'=>'merchant.change-status','uses'=>'MerchantController@changeStatus']);
    $api->resource('merchant', 'MerchantController',['names' => [
        'index'=>'merchant.index',
        'store' => 'merchant.add',
        'destroy'=>'merchant.delete',
        'update'=>'merchant.update'
    ]]);

    /*Product*/
    $api->post('product/select-category',['as'=>'product.select-category','uses'=>'ProductController@selectCategory']);
    $api->post('product/list-ajax',['as'=>'product.list-ajax','uses'=>'ProductController@listAjax']);
    $api->post('product/change-status',['as'=>'product.change-status','uses'=>'ProductController@changeStatus']);
    $api->post('product/list-images/{id}',['as'=>'product.list-images','uses'=>'ProductController@listImages']);
    $api->post('product/update-product-image-order',['as'=>'product.update-product-image-order','uses'=>'ProductController@updateProductImageOrder']);
    $api->delete('product/delete-image/{id}',['as'=>'product.delete-image','uses'=>'ProductController@deleteImage']);
    $api->resource('product', 'ProductController',['names' => [
        'index'=>'product.index',
        'create'=>'product.create',
        'store' => 'product.add',
        'destroy'=>'product.delete',
        'edit'=>'product.edit',
        'update'=>'product.update'
    ]]);

    $api->post('product/add_sizes', ['as' => 'product.add_sizes', 'uses' => 'ProductController@add_sizes']);
    $api->delete('product/delete_size/{id}', ['as' => 'product.delete_size', 'uses' => 'ProductController@delete_size']);

    /*Product Color*/
    $api->post('attribute/list-ajax',['as'=>'attribute.list-ajax','uses'=>'AttributeController@listAjax']);
    $api->post('attribute/change-status',['as'=>'attribute.change-status','uses'=>'AttributeController@changeStatus']);
    $api->resource('attribute', 'AttributeController',['names' => [
        'index'=>'attribute.index',
        'store' => 'attribute.add',
        'destroy'=>'attribute.delete',
        'update'=>'attribute.update'
    ]]);

    /*Discount*/
    $api->resource('discount', 'DiscountController',['names' => [
        'index'=>'discount.index'
    ]]);

    $api->post('orders/list-ajax',['as'=>'orders.list-ajax','uses'=>'OrdersController@listAjax']);
    $api->resource('orders', 'OrdersController',['names' => [
        'index'=>'orders.index'
    ]]);

    $api->post('discount-cart/select-category',['as'=>'discount-cart.select-product','uses'=>'DiscountCartController@selectProduct']);
    $api->post('discount-cart/list-ajax',['as'=>'discount-cart.list-ajax','uses'=>'DiscountCartController@listAjax']);
    $api->post('discount-cart/change-status',['as'=>'discount-cart.change-status','uses'=>'DiscountCartController@changeStatus']);
    $api->resource('discount-cart', 'DiscountCartController',['names' => [
        'store' => 'discount-cart.add',
        'destroy'=>'discount-cart.delete',
        'update'=>'discount-cart.update'
    ]]);

    $api->post('discount-category/select-category',['as'=>'discount-category.select-product','uses'=>'DiscountCategoryController@selectProduct']);
    $api->post('discount-category/list-ajax',['as'=>'discount-category.list-ajax','uses'=>'DiscountCategoryController@listAjax']);
    $api->post('discount-category/change-status',['as'=>'discount-category.change-status','uses'=>'DiscountCategoryController@changeStatus']);
    $api->resource('discount-category', 'DiscountCategoryController',['names' => [
        'store' => 'discount-category.add',
        'destroy'=>'discount-category.delete',
        'update'=>'discount-category.update'
    ]]);

    $api->post('discount-product/select-category',['as'=>'discount-product.select-product','uses'=>'DiscountProductController@selectProduct']);
    $api->post('discount-product/list-ajax',['as'=>'discount-product.list-ajax','uses'=>'DiscountProductController@listAjax']);
    $api->post('discount-product/change-status',['as'=>'discount-product.change-status','uses'=>'DiscountProductController@changeStatus']);
    $api->resource('discount-product', 'DiscountProductController',['names' => [
        'store' => 'discount-product.add',
        'destroy'=>'discount-product.delete',
        'update'=>'discount-product.update'
    ]]);

    /*Tag*/
    $api->post('tag/list-ajax',['as'=>'tag.list-ajax','uses'=>'TagController@listAjax']);
    $api->post('tag/change-status',['as'=>'tag.change-status','uses'=>'TagController@changeStatus']);
    $api->post('tag/change-home-style',['as'=>'tag.change-home-style','uses'=>'TagController@changeHomeStyle']);
    $api->resource('tag', 'TagController',['names' => [
        'index'=>'tag.index',
        'store' => 'tag.add',
        'destroy'=>'tag.delete',
        'update'=>'tag.update'
    ]]);

    /*Page Management*/

    $api->group(['as'=>'page.'], function ($api) {

        /*Men Index*/
        $api->post('men/store-section1',['as'=>'men.store-section1','uses'=>'Page\MenController@storeSection1']);
        $api->post('men/store-section2',['as'=>'men.store-section2','uses'=>'Page\MenController@storeSection2']);
        $api->post('men/store-section3',['as'=>'men.store-section3','uses'=>'Page\MenController@storeSection3']);
        $api->resource('men', 'Page\MenController',['names' => [
            'index'=>'men.index'
        ]]);

        /*Women Index*/
        $api->post('women/store-section1',['as'=>'women.store-section1','uses'=>'Page\WomenController@storeSection1']);
        $api->post('women/store-section2',['as'=>'women.store-section2','uses'=>'Page\WomenController@storeSection2']);
        $api->post('women/store-section3',['as'=>'women.store-section3','uses'=>'Page\WomenController@storeSection3']);
        $api->resource('women', 'Page\WomenController',['names' => [
            'index'=>'women.index'
        ]]);

        /*Home Index*/
        $api->post('home/store-section1',['as'=>'home.store-section1','uses'=>'Page\HomeController@storeSection1']);
        $api->post('home/store-section2',['as'=>'home.store-section2','uses'=>'Page\HomeController@storeSection2']);
        $api->post('home/store-section3',['as'=>'home.store-section3','uses'=>'Page\HomeController@storeSection3']);
        $api->resource('home', 'Page\HomeController',['names' => [
            'index'=>'home.index'
        ]]);

        /*common Index*/
        $api->resource('common', 'Page\CommonContentController',['names' => [
            'index'=>'common.index',
            'store' => 'common.add'
        ]]);

        /*About Index*/
        $api->resource('about', 'Page\AboutContentController',['names' => [
            'index'=>'about.index',
            'store' => 'about.add'
        ]]);

        /*orderandshipping Index*/
        $api->resource('orderandshipping', 'Page\OrderandShippingContentController',['names' => [
            'index'=>'orderandshipping.index',
            'store' => 'orderandshipping.add'
        ]]);

        /*returnandexchange Index*/
        $api->resource('returnandexchange', 'Page\ReturnandexchangeContentController',['names' => [
            'index'=>'returnandexchange.index',
            'store' => 'returnandexchange.add'
        ]]);

        /*paymentmethods Index*/
        $api->resource('paymentmethods', 'Page\PaymentMethodsContentController',['names' => [
            'index'=>'paymentmethods.index',
            'store' => 'paymentmethods.add'
        ]]);

        /*partnership Index*/
        $api->resource('partnership', 'Page\PartnershipContentController',['names' => [
            'index'=>'partnership.index',
            'store' => 'partnership.add'
        ]]);

        /*termsandconditions Index*/
        $api->resource('termsandconditions', 'Page\TermsAndConditionsContentController',['names' => [
            'index'=>'termsandconditions.index',
            'store' => 'termsandconditions.add'
        ]]);

        /*smartsizing Index*/
        $api->resource('smartsizing', 'Page\SmartSizingController',['names' => [
            'index'=>'smartsizing.index',
            'store' => 'smartsizing.add'
        ]]);

        /*contact Index*/
        $api->resource('contact', 'Page\ContactContentController',['names' => [
            'index'=>'contact.index',
            'store' => 'contact.add'
        ]]);

    });
});
