@section('page_js')
    <!--begin::Page Vendors -->
    <script src="{!! asset('backend/assets/vendors/custom/datatables/datatables.bundle.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/custom/bootstrap-confirmation/bootstrap-confirmation.bundle.js') !!}"></script>
    <!--end::Page Vendors -->
    <script src="{!! asset('backend/js/formSubmit.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/js/dynamic-datatable.js') !!}" type="text/javascript"></script>
    <!--begin::Page Resources -->
    <script type="text/javascript">
        var list_url = '{!! route("admin.system-user.list-ajax") !!}';
        var table_id = 'kt_table_1';
        var columns = ['name','email','photo','status','action'];
        jQuery(document).ready(function() {
            Datatables.init(table_id,list_url,columns);
            var validationRule = {
                rules: {
                    name:{
                        required: !0,
                    },
                    email: {
                        required: !0,
                        email: !0
                    },
                    phone:{
                        required: !0,
                        digits : !0
                    },
                    password:{
                        required: !0,
                    }
                }
            };
            SnippetForm.init(validationRule,table_id);
        });
    </script>

    <!--end::Page Resources -->
@endsection