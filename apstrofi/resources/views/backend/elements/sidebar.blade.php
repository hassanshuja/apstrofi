<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

    <!-- begin:: Aside -->
    <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
        <div class="kt-aside__brand-logo">
            <a href="javascript:void(0)">
                <img alt="Logo" src="{!! asset('backend/images/logo-big-white.png') !!}" />
            </a>
        </div>
        <div class="kt-aside__brand-tools">
            <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
								<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon id="Shape" points="0 0 24 0 24 24 0 24" />
											<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
											<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
										</g>
									</svg></span>
                <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon id="Shape" points="0 0 24 0 24 24 0 24" />
											<path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" />
											<path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
										</g>
									</svg></span>
            </button>

            <!--
<button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
-->
        </div>
    </div>

    <!-- end:: Aside -->

    <!-- begin:: Aside Menu -->
    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
            <ul class="kt-menu__nav ">
                <li class="kt-menu__item  @if(request()->route()->getName() == 'admin.dashboard.index') kt-menu__item--active @endif" aria-haspopup="true">
                    <a href="javascript:void(0)" class="kt-menu__link ">
                        <i class="kt-menu__link-icon flaticon-home"></i><span class="kt-menu__link-text">Dashboard</span>
                    </a>
                </li>
                <li class="kt-menu__item @if(request()->route()->getName() == 'admin.system-user.index') kt-menu__item--active @endif" aria-haspopup="true">
                    <a href="{!! route('admin.system-user.index') !!}" class="kt-menu__link ">
                        <i class="kt-menu__link-icon flaticon-user"></i><span class="kt-menu__link-text">User Management</span>
                    </a>
                </li>
                <li class="kt-menu__section ">
                    <h4 class="kt-menu__section-text">Feature</h4>
                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                </li>
                <li class="kt-menu__item  kt-menu__item--submenu  @if(request()->route()->getName() == 'admin.product.index' || request()->route()->getName() == 'admin.color.index' || request()->route()->getName() == 'admin.category.index' || request()->route()->getName() == 'admin.sub-category.index' || request()->route()->getName() == 'admin.brand.index' || request()->route()->getName() == 'admin.merchant.index' || request()->route()->getName() == 'admin.shop.index' || request()->route()->getName() == 'admin.attribute.index' || request()->route()->getName() == 'admin.tag.index') kt-menu__item--open kt-menu__item--here @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="{!! route('admin.product.index') !!}" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="kt-menu__link-icon flaticon-list-3"></i>
                        </span>
                        <span class="kt-menu__link-text">Product Management</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Product</span></span></li>
                            <li class="kt-menu__item @if(request()->route()->getName() == 'admin.product.index') kt-menu__item--active @endif" aria-haspopup="true"><a href="{!! route('admin.product.index') !!}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Product</span></a></li>
                            <li class="kt-menu__item @if(request()->route()->getName() == 'admin.attribute.index') kt-menu__item--active @endif" aria-haspopup="true"><a href="{!! route('admin.attribute.index') !!}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Product Attribute</span></a></li>
                            <li class="kt-menu__item @if(request()->route()->getName() == 'admin.category.index') kt-menu__item--active @endif" aria-haspopup="true"><a href="{!! route('admin.category.index') !!}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Category</span></a></li>
                            <li class="kt-menu__item @if(request()->route()->getName() == 'admin.sub-category.index') kt-menu__item--active @endif" aria-haspopup="true"><a href="{!! route('admin.sub-category.index') !!}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Sub Category</span></a></li>
                            <li class="kt-menu__item  @if(request()->route()->getName() == 'admin.brand.index') kt-menu__item--active @endif" aria-haspopup="true">
                                <a href="{!! route('admin.brand.index') !!}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Brand</span>
                                </a>
                            </li>
                            <li class="kt-menu__item @if(request()->route()->getName() == 'admin.merchant.index') kt-menu__item--active @endif" aria-haspopup="true">
                                <a href="{!! route('admin.merchant.index') !!}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Merchant</span>
                                </a>
                            </li>
                            <li class="kt-menu__item  @if(request()->route()->getName() == 'admin.shop.index') kt-menu__item--active @endif" aria-haspopup="true">
                                <a href="{!! route('admin.shop.index') !!}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Gender</span>
                                </a>
                            </li>
                            <li class="kt-menu__item  @if(request()->route()->getName() == 'admin.tag.index') kt-menu__item--active @endif" aria-haspopup="true">
                                <a href="{!! route('admin.tag.index') !!}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Tags</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li class="kt-menu__item  kt-menu__item--submenu  @if(request()->route()->getName() == 'admin.promo.index' || request()->route()->getName() == 'admin.discount.index') kt-menu__item--open kt-menu__item--here @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="{!! route('admin.promo.index') !!}" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="kt-menu__link-icon flaticon-list-3"></i>
                        </span>
                        <span class="kt-menu__link-text">Promo</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Promo</span></span></li>
                            <li class="kt-menu__item @if(request()->route()->getName() == 'admin.promo.index') kt-menu__item--active @endif" aria-haspopup="true"><a href="{!! route('admin.promo.index') !!}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Promo</span></a></li>
                            <li class="kt-menu__item @if(request()->route()->getName() == 'admin.discount.index') kt-menu__item--active @endif" aria-haspopup="true"><a href="{!! route('admin.discount.index') !!}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Discount</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="kt-menu__item " aria-haspopup="true">
                    <a href="javascript:void(0)" class="kt-menu__link ">
                        <i class="kt-menu__link-icon flaticon-users"></i><span class="kt-menu__link-text">Customer</span>
                    </a>
                </li>
                <li class="kt-menu__item " aria-haspopup="true">
                    <a href="javascript:void(0)" class="kt-menu__link ">
                        <i class="kt-menu__link-icon flaticon-cart"></i><span class="kt-menu__link-text">Orders</span>
                    </a>
                </li>
                <li class="kt-menu__item  kt-menu__item--submenu  @if(request()->route()->getName() == 'admin.blog.index' || request()->route()->getName() == 'admin.blog-category.index') kt-menu__item--open kt-menu__item--here @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="{!! route('admin.blog.index') !!}" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="kt-menu__link-icon flaticon-list-3"></i>
                        </span>
                        <span class="kt-menu__link-text">Blog</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Blog</span></span></li>
                            <li class="kt-menu__item @if(request()->route()->getName() == 'admin.blog-category.index') kt-menu__item--active @endif" aria-haspopup="true"><a href="{!! route('admin.blog-category.index') !!}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Blog Category</span></a></li>
                            <li class="kt-menu__item @if(request()->route()->getName() == 'admin.blog.index') kt-menu__item--active @endif" aria-haspopup="true"><a href="{!! route('admin.blog.index') !!}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Blog</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="kt-menu__item  kt-menu__item--submenu  @if(request()->route()->getName() == 'admin.page.men.index' || request()->route()->getName() == 'admin.page.women.index') kt-menu__item--open kt-menu__item--here @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="{!! route('admin.blog.index') !!}" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="kt-menu__link-icon flaticon-list-3"></i>
                        </span>
                        <span class="kt-menu__link-text">Page Management</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item @if(request()->route()->getName() == 'admin.page.general.index') kt-menu__item--active @endif" aria-haspopup="true"><a href="{!! route('admin.page.common.index') !!}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Common Index</span></a></li>
                            <li class="kt-menu__item @if(request()->route()->getName() == 'admin.page.home.index') kt-menu__item--active @endif" aria-haspopup="true"><a href="{!! route('admin.page.home.index') !!}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Home Index</span></a></li>
                            <li class="kt-menu__item @if(request()->route()->getName() == 'admin.page.men.index') kt-menu__item--active @endif" aria-haspopup="true"><a href="{!! route('admin.page.men.index') !!}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Men Index</span></a></li>
                            <li class="kt-menu__item @if(request()->route()->getName() == 'admin.page.women.index') kt-menu__item--active @endif" aria-haspopup="true"><a href="{!! route('admin.page.women.index') !!}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Women Index</span></a></li>
                            <li class="kt-menu__item @if(request()->route()->getName() == 'admin.page.about.index') kt-menu__item--active @endif" aria-haspopup="true"><a href="{!! route('admin.page.about.index') !!}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">About Index</span></a></li>
                            <li class="kt-menu__item @if(request()->route()->getName() == 'admin.page.orderandshipping.index') kt-menu__item--active @endif" aria-haspopup="true"><a href="{!! route('admin.page.orderandshipping.index') !!}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Orader & Shipping Index</span></a></li>
                            <li class="kt-menu__item @if(request()->route()->getName() == 'admin.page.returnandexchange.index') kt-menu__item--active @endif" aria-haspopup="true"><a href="{!! route('admin.page.returnandexchange.index') !!}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Return & Exchange Index</span></a></li>
                            <li class="kt-menu__item @if(request()->route()->getName() == 'admin.page.paymentmethods.index') kt-menu__item--active @endif" aria-haspopup="true"><a href="{!! route('admin.page.paymentmethods.index') !!}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Payment Methods Index</span></a></li>
                            <li class="kt-menu__item @if(request()->route()->getName() == 'admin.page.partnership.index') kt-menu__item--active @endif" aria-haspopup="true"><a href="{!! route('admin.page.partnership.index') !!}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Partnership Index</span></a></li>
                            <li class="kt-menu__item @if(request()->route()->getName() == 'admin.page.termsandconditions.index') kt-menu__item--active @endif" aria-haspopup="true"><a href="{!! route('admin.page.termsandconditions.index') !!}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Terms & Conditions Index</span></a></li>
                            <li class="kt-menu__item @if(request()->route()->getName() == 'admin.page.smartsizing.index') kt-menu__item--active @endif" aria-haspopup="true"><a href="{!! route('admin.page.smartsizing.index') !!}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Smart Sizing Index</span></a></li>

                            <li class="kt-menu__item @if(request()->route()->getName() == 'admin.page.contact.index') kt-menu__item--active @endif" aria-haspopup="true"><a href="{!! route('admin.page.contact.index') !!}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Conatct Index</span></a></li>

                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- end:: Aside Menu -->
</div>
