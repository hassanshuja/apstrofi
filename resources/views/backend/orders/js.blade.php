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
        var columns = ['date', 'order_detail', 'shipping_details', 'discount', 'invoice_id', 'customer_detail', 'subtotal', 'shipping_discount', 'grandtotal', 'payment_method', 'payment_status', 'action'];
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

            $(document).on('click', '.update-order, .cancel-order' , function(e){
                $('#error_msg').html('')
                var form = $(this).closest('form');
                var id = $(this).attr('data-id')
                var url = $(this).attr('data-action')
                $.ajax({
                    method: 'PUT',
                    url: url,
                    data:{id: id},
                    success: function(data){
                        $('#error_msg_order').css('display', 'block')
                        if(data.status == 'cancel'){
                            $("#error_msg_order").addClass('alert-danger');
                            $("#error_msg_order").removeClass('alert-success');
                        }
                        if(data.status == 'update'){
                            $("#error_msg_order").addClass('alert-success');
                            $("#error_msg_order").removeClass('alert-danger');
                        }
                        $('html, body').animate({
                            scrollTop: $("#error_msg_order").parent().offset().top - 100
                        }, 100);

                        $('#error_msg').html(data.message)
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