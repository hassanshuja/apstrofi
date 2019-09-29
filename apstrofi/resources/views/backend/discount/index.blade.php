@extends('backend.layout.master')
@include('backend.discount.css')
@section('content')
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__body">
            <ul class="nav nav-tabs nav-fill" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#kt_tabs_2_1">Cart Discount</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_tabs_2_2">Category Discount</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_tabs_2_3">Product Discount</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="kt_tabs_2_1" role="tabpanel">
                    @include('backend.discount.cart.index')
                </div>
                <div class="tab-pane" id="kt_tabs_2_2" role="tabpanel">
                    @include('backend.discount.category.index')
                </div>
                <div class="tab-pane" id="kt_tabs_2_3" role="tabpanel">
                    @include('backend.discount.product.index')
                </div>
            </div>
        </div>

    </div>


@endsection
@include('backend.discount.js')