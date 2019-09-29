@extends('backend.layout.master')
@include('backend.product.css',['type'=>'add'])

@section('content')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Add Product</h3>
        </div>
        <div class="kt-subheader__toolbar">
            <div class="kt-subheader__wrapper">
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <a href="{!! route('admin.product.index') !!}" class="btn btn-clean btn-icon-sm">
                                <i class="la la-long-arrow-left"></i>
                                Back To Listing
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">

            <!--begin::Portlet-->
            <form class="kt-form formAdd" onsubmit="return false;" data-type="add" action="{!! route('admin.product.add') !!}" method="post" id="kt_form">
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {!! @$product['name'] ?: 'Add Product' !!}
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">
                                    <button type="submit" id="edit_product_submit" class="btn btn-brand btn-elevate btn-icon-sm">
                                        <i class="fa fa-check"></i>
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <ul class="nav nav-tabs nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_tabs_2_1">General</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tabs_2_2">Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tabs_2_3">Images</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tabs_2_4">Meta</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_tabs_2_1" role="tabpanel">
                                @include('backend.product.general-form')
                            </div>
                            <div class="tab-pane" id="kt_tabs_2_2" role="tabpanel">
                                @include('backend.product.detail-form')
                            </div>
                            <div class="tab-pane" id="kt_tabs_2_3" role="tabpanel">
                                @include('backend.product.image-form')
                            </div>
                            <div class="tab-pane" id="kt_tabs_2_4" role="tabpanel">
                                @include('backend.product.meta-form')
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!--end::Portlet-->
        </div>
    </div>
@endsection
@include('backend.product.js',['type'=>'add'])

