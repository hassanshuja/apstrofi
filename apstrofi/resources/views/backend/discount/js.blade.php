@section('page_js')
    <script src="{!! asset('backend/assets/vendors/custom/datatables/datatables.bundle.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/custom/bootstrap-confirmation/bootstrap-confirmation.min.js') !!}"></script>
    <script src="{!! asset('backend/assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/general/jquery.repeater/jquery.repeater.js') !!}"></script>
    <script src="{!! asset('backend/js/dynamic-datatable.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/js/discount.js') !!}" type="text/javascript"></script>
    <script type="text/javascript">
        var list_url1 = '{!! route("admin.discount-cart.list-ajax") !!}';
        var table_id1 = 'kt_table_1';
        var columns1 = ['title','offer_period','type','amount','discount_related','status','action'];

        var list_url2 = '{!! route("admin.discount-category.list-ajax") !!}';
        var table_id2 = 'kt_table_2';
        var columns2 = ['title','offer_period','type','amount','offer_type','status','action'];

        var list_url3 = '{!! route("admin.discount-product.list-ajax") !!}';
        var table_id3 = 'kt_table_3';
        var columns3 = ['title','offer_period','type','amount','offer_type','status','action'];
        jQuery(document).ready(function() {
            Datatables.init(table_id1,list_url1,columns1);
            Datatables.init(table_id2,list_url2,columns2);
            Datatables.init(table_id3,list_url3,columns3);
            var validationRule1 = {
                rules: {
                    title:{
                        required: !0,
                    },
                    title_l:{
                        required: !0,
                    },
                    start_at:{
                        required: !0,
                    },
                    end_at:{
                        required: !0,
                    },
                    type:{
                        required: !0,
                    },
                    amount:{
                        required: !0,
                        number:!0
                    },
                    max_discount_amount:{
                        required: !0,
                        number:!0
                    },
                    min_order_amount:{
                        required: !0,
                        number:!0
                    },
                    description:{
                        required: !0,
                    },
                    description_l:{
                        required: !0,
                    }
                }
            };
            var validationRule2 = {
                rules: {
                    title:{
                        required: !0,
                    },
                    title_l:{
                        required: !0,
                    },
                    start_at:{
                        required: !0,
                    },
                    end_at:{
                        required: !0,
                    },
                    type:{
                        required: !0,
                    },
                    amount:{
                        required: !0,
                        number:!0
                    },
                    description:{
                        required: !0,
                    },
                    description_l:{
                        required: !0,
                    },
                    offer_type:{
                        required: !0
                    }
                }
            };
            var validationRule3 = {
                rules: {
                    title:{
                        required: !0,
                    },
                    title_l:{
                        required: !0,
                    },
                    start_at:{
                        required: !0,
                    },
                    end_at:{
                        required: !0,
                    },
                    type:{
                        required: !0,
                    },
                    amount:{
                        required: !0,
                        number:!0
                    },
                    description:{
                        required: !0,
                    },
                    description_l:{
                        required: !0,
                    },
                    offer_type:{
                        required: !0
                    }
                }
            };
            var arrayRule1 = {
            };
            var arrayRule2 = {
                field:"category"
            };
            var arrayRule3 = {
                field:"product"
            };
            SnippetForm.init([validationRule1,validationRule2,validationRule3],[table_id1,table_id2,table_id3],[arrayRule1,arrayRule2,arrayRule3]);
        });
    </script>
@endsection