@section('page_js')
    <!--begin::Page Vendors -->
    <script src="{!! asset('backend/assets/vendors/custom/datatables/datatables.bundle.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/custom/bootstrap-confirmation/bootstrap-confirmation.min.js') !!}"></script>
    <script src="{!! asset('backend/assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}" type="text/javascript"></script>

    <!--end::Page Vendors -->
    <script src="{!! asset('backend/js/formSubmit.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/js/dynamic-datatable.js') !!}" type="text/javascript"></script>
    <!--begin::Page Resources -->
    <script type="text/javascript">
        var list_url = '{!! route("admin.promo.list-ajax") !!}';
        var table_id = 'kt_table_1';
        var columns = ['code','type','value','description','start_at','end_at','status','action'];
        jQuery(document).ready(function() {
            var t;
            t = {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            };
            $("#m_datepicker_5").datepicker({
                todayHighlight: !0,
                templates: t,
                format: 'yyyy-mm-dd',
                startDate: new Date(),
                autoclose: true
            });
            Datatables.init(table_id,list_url,columns);
            var validationRule = {
                rules: {
                    value:{
                        required: !0,
                        digits: true
                    },
                    type:{
                        required: !0,
                    },
                    start_at:{
                        required: !0,
                    },
                    end_at:{
                        required: !0,
                    },
                    code: {
                        required: !0,
                    },
                    description:{
                        required: !0,
                    }
                }
            };
            SnippetForm.init(validationRule,table_id);
        });
    </script>

    <!--end::Page Resources -->
@endsection