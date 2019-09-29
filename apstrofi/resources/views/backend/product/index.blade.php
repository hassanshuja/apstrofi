@extends('backend.layout.master')
@section('page_css')
    <link href="{!! asset('backend/assets/vendors/custom/datatables/datatables.bundle.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('backend/assets/vendors/general/card/css/rotating-card.css') !!}" rel="stylesheet" />
    <style type="text/css">
        .card .user img {
            background: none repeat scroll 0 0 #FFFFFF;
            border: 4px solid #FFFFFF;
            width: 118px;
            height: 161px;
            border-radius: 100px / 127px;
        }

        .card .user {
            border-radius: unset !important;
            display: block;
            height: 160px !important;
            margin: -89px auto 0 !important;
            overflow: hidden;
            width: 120px;
        }
        .card .content {
            background-color: rgba(0, 0, 0, 0);
            box-shadow: none;
            padding: 10px 10px 10px;
            min-height: 335px;
        }
        .card .name {
            max-height: 50px;
            margin-bottom: 8px;
            overflow: hidden;
        }
        h3.name {
            font-size: 14px !important;
            line-height: 16px !important;
        }
        .card .content {
            background-color: rgba(0, 0, 0, 0);
            box-shadow: none;
            padding: 10px 10px 10px;
            min-height: 367px;
        }

    </style>
@endsection
@section('content')
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
                        <a href="{!! route('admin.product.create') !!}" class="btn btn-success btn-icon-sm">
                            <i class="la la-plus"></i>
                            Add Product
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
                        <label>Name(Eng):</label>
                        <input type="text" class="form-control kt-input" id="name_search"  placeholder="E.g: abc" data-col-index="1">
                    </div>
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                        <label>Status:</label>
                        <select class="form-control kt-input" id="status_search" data-col-index="3">
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
            <div class="products-list">
                @include('backend.product.list-ajax')
            </div>


            <!--begin: Datatable -->
            {{--<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                <thead>
                <tr>
                    <th>Name </th>
                    <th>Category </th>
                    <th>Brand </th>
                    <th> Status </th>
                    <th class="no-sort"> Actions </th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Name </th>
                    <th>Category </th>
                    <th>Brand </th>
                    <th> Status </th>
                    <th class="no-sort"> Actions </th>
                </tr>
                </tfoot>
            </table>--}}

            <!--end: Datatable -->
        </div>
    </div>
@endsection
@section('page_js')

    <script src="{!! asset('backend/assets/vendors/custom/bootstrap-confirmation/bootstrap-confirmation.min.js') !!}"></script>
    <script type="text/javascript">
        var url_val = window.location.href;
        $(document).ready(function () {


            $(document).on('confirmed.bs.confirmation','.delete-data', function () {
                var url = $(this).data('action');
                var modal_name = $(this).data('modal');
                $.ajax({
                    type: 'delete',
                    url : url,
                    success : function(data){
                        /*if(data.status){
                            $('.response-msg').addClass('note-success');
                            $('.response-msg').find('p').text(data.msg);
                        }else{
                            $('.response-msg').addClass('note-danger');
                            $('.response-msg').find('p').text(data.msg);
                        }
                        $( ".response-msg" ).fadeIn( "fast",function () {
                            setTimeout(function () {
                                $( ".response-msg" ).fadeOut("slow");
                            },3000);

                        });*/
                    },
                    error: function(ts) {

                    }
                });
            });

            $(document).on('click','#open-search-form',function () {
                $('.search-table-form').fadeToggle('slow');
            });
            /*$(document).on('change', '.change_status', function (event, state) {
                var status = 0;
                if ($(this).is(':checked')) {
                    status = 1;
                }else {
                    status = 0;
                }
                var url = $(this).data('action');
                var id = $(this).data('id');
                var modal = $(this).data('modal');
                $.ajax({
                    type: 'post',
                    url : url,
                    data: {status:status,id:id},
                    success : function(data){
                        if(modal){
                            $('#'+modal).DataTable().ajax.reload();
                        }

                    }

                });
            });*/

            $('body').on('click', '.pagination a', function(e) {
                e.preventDefault();

                $('#load a').css('color', '#dfecf6');
                $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

                url_val = $(this).attr('href');
                getProducts(url_val);
               // window.history.pushState("", "", url);
            });
            $(document).on('click','#kt_search',function () {

                getProducts(url_val,{name : $('#name_search').val(),status : $('#status_search').val(),page:1});
                return false;


            });
            $(document).on('change','#status_search',function () {
                getProducts(url_val,{name : $('#name_search').val(),status : $('#status_search').val(),page:1});
                return false;

            });
            $(document).on('click','#kt_reset',function () {
                getProducts(url_val,{name : '',status : '',page:1});
                return false;
            });
            $(document).on('confirmed.bs.confirmation','.delete-product', function () {
                var url = $(this).data('action');
                var id = $(this).data('id');
                $.ajax({
                    type: 'delete',
                    url : url,
                    success : function(data){
                        getProducts(url_val);
                    }
                });
            });
            setTimeout(function () {
                if($.isFunction($.fn.confirmation))
                {
                    $('[data-toggle="confirmation"]').confirmation();
                }
            },1000);
            function getProducts(url,data = {}) {
                $.ajax({
                    url : url,
                    data : data
                }).done(function (data) {
                    $('.products-list').html(data);
                    setTimeout(function () {
                        if($.isFunction($.fn.confirmation))
                        {
                            $('[data-toggle="confirmation"]').confirmation();
                        }
                    },1000);
                }).fail(function () {
                    alert('Articles could not be loaded.');
                });
            }

            function rotateCard(btn){
                var $card = $(btn).closest('.card-container');
                console.log($card);
                if($card.hasClass('hover')){
                    $card.removeClass('hover');
                } else {
                    $card.addClass('hover');
                }
            }
        });

    </script>
@endsection