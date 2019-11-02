@extends('backend.layout.master')
{{-- @include('backend.category.css') --}}
@section('content')
    <div class="kt-portlet kt-portlet--mobile">
         <div class="kt-portlet__body">
            <div style="display:none" id="error_msg_order" class="kt-alert kt-alert--outline alert alert-success alert-dismissible error_msg_order" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <span id="error_msg"></span>
            </div>
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
                <h3 class="kt-portlet__head-title">
                    {!! $page_title !!}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="javascript:void(0)" id="open-search-form" class="btn btn-default btn-icon-sm">
                            <i class="la la-search"></i>
                            Search
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        
            <!--begin: Search Form -->
            <form class="kt-form kt-form--fit kt-margin-b-20 search-table-form">
                <div class="row kt-margin-b-20">
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                        <label>Date :</label>
                        <input type="text" class="form-control kt-input"  data-col-index="0">
                    </div>
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                        <label>Invoice #:</label>
                        <input type="text" class="form-control kt-input" placeholder="E.g: 123123" data-col-index="1">
                    </div>
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                        <label>Status:</label>
                        <select class="form-control kt-input" data-col-index="3">
                            <option value="">Select</option>
                            <option value="1">Active</option>
                            <option value="0">InActive</option>
                        </select>
                    </div>
                </div>
                <div class="kt-separator kt-separator--md kt-separator--dashed"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <button class="btn btn-primary btn-brand--icon" id="kt_search">
                            <span>
                                <i class="la la-search"></i>
                                <span>Search</span>
                            </span>
                        </button>
                        &nbsp;&nbsp;
                        <button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
                            <span>
                                <i class="la la-close"></i>
                                <span>Reset</span>
                            </span>
                        </button>
                    </div>
                </div>
            </form>

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                <thead>
                <tr>
                    <th>Date </th>
                    <th>Order Details</th>
                    <th>Shipping Details </th>
                    <th>Disount </th>
                    <th >customer Detail </th>
                    <th>Invoice # </th>
                    <th>Subtotal </th>
                    <th>Discount </th>
                    <th>Grand Total </th>
                    <th>Payment Method</th>
                    <th>Payment Status</th>
                    <th class="no-sort">Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Date </th>
                    <th>Order Details</th>
                    <th>Shipping Details </th>
                    <th>Disount </th>
                    <th>customer Detail </th>
                    <th>Invoice # </th>
                    <th>Subtotal </th>
                    <th>Discount </th>
                    <th>Grand Total </th>
                    <th>Payment Method</th>
                    <th>Payment Status</th>
                    <th class="no-sort">Action</th>
                </tr>
                </tfoot>
            </table>

            <!--end: Datatable -->

            <input type="hidden" id="order_id" value="">
        </div>
    </div>
@endsection
@include('backend.orders.js')