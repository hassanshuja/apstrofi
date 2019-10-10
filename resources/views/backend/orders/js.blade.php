@section('page_js')
    <!--begin::Page Vendors -->
    <script src="{!! asset('backend/assets/vendors/custom/datatables/datatables.bundle.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/custom/bootstrap-confirmation/bootstrap-confirmation.min.js') !!}"></script>
    <!--end::Page Vendors -->
    <script src="{!! asset('backend/js/formSubmit.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/js/dynamic-datatable.js') !!}" type="text/javascript"></script>
    <!--begin::Page Resources -->
    <script type="text/javascript">
        var list_url = '{!! route("admin.orders.list-ajax") !!}';
        var table_id = 'kt_table_1';
        var columns = ['date', 'invoice_id','subtotal', 'shipping_discount', 'grandtotal', 'payment_status', 'action'];
        jQuery(document).ready(function() {
            Datatables.init(table_id,list_url,columns);
            var validationRule = {
                rules: {
                    date:{
                        required: !0,
                    },
                    invoice_id:{
                        required: !0,
                    },
                    subtotal:{
                        required : !0
                    }
                }
            };
            SnippetForm.init(validationRule,table_id);

            $(document).on('click', '.update-order' , function(e){
                var id = $(this).attr('data-id')
                var url = $(this).attr('data-action')
                $.ajax({
                    method: 'PUT',
                    url: url,
                    success: function(data){
                        $('#kt_table_1').dataTable().api().ajax.reload()
                    },
                    fail(err){
                        console.log(err)
                    }
                })
            })
        });
    </script>

    <!--end::Page Resources -->
@endsection