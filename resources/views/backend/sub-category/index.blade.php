@extends('backend.layout.master')
@include('backend.sub-category.css')
@section('content')
    @include('backend.sub-category.add')
    <div class="kt-portlet kt-portlet--mobile">
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
                        <a href="javascript:void(0)" data-type="add" data-action="{!! route('admin.sub-category.add') !!}" data-toggle="modal" data-target="#add" class="btn btn-success btn-icon-sm">
                            <i class="la la-plus"></i>
                            Add SubCategory
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <!--begin: Search Form -->
            <form class="kt-form kt-form--fit kt-margin-b-20 search-table-form">
                <div class="row kt-margin-b-20">
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                        <label>Slug:</label>
                        <input type="text" class="form-control kt-input" placeholder="E.g: men" data-col-index="0">
                    </div>
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                        <label>Title(Eng):</label>
                        <input type="text" class="form-control kt-input" placeholder="E.g: abc" data-col-index="1">
                    </div>
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                        <label>Category:</label>
                        <select class="form-control kt-input" data-col-index="2">
                            <option value="">Select</option>
                            @foreach($category as $key=>$val)
                                <option value="{!! $key !!}">{!! $val !!}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                        <label>Status:</label>
                        <select class="form-control kt-input" data-col-index="5">
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
                    <th>Slug </th>
                    <th>Title(Eng) </th>
                    <th class="no-sort">Category </th>
                    <th class="no-sort">Gender </th>
                    {{--<th class="no-sort">Image </th>--}}
                    <th> Status </th>
                    <th class="no-sort"> Actions </th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Slug </th>
                    <th>Title(Eng) </th>
                    <th>Category </th>
                    <th>Gender </th>
                    {{--<th class="no-sort">Image </th>--}}
                    <th> Status </th>
                    <th class="no-sort"> Actions </th>
                </tr>
                </tfoot>
            </table>

            <!--end: Datatable -->
        </div>
    </div>
@endsection
@include('backend.sub-category.js')