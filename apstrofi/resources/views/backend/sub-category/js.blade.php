@section('page_js')
    <!--begin::Page Vendors -->
    <script src="{!! asset('backend/assets/vendors/custom/datatables/datatables.bundle.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/custom/bootstrap-confirmation/bootstrap-confirmation.min.js') !!}"></script>
    <script src="{!! asset('backend/assets/vendors/general/select2/dist/js/select2.full.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/general/fileinput/js/fileinput.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/general/fileinput/themes/fas/theme.js') !!}" type="text/javascript"></script>

    <!--end::Page Vendors -->
    <script src="{!! asset('backend/js/formSubmit.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/js/dynamic-datatable.js') !!}" type="text/javascript"></script>
    <!--begin::Page Resources -->
    <script type="text/javascript">
        var list_url = '{!! route("admin.sub-category.list-ajax") !!}';
        var table_id = 'kt_table_1';
        var columns = ['slug','name','category','shop','status','action'];
        jQuery(document).ready(function() {
            $("#shop_id").select2({
                placeholder: "Select Shop",
                width:'100%'
            });
            Datatables.init(table_id,list_url,columns);
            var validationRule = {
                rules: {
                    slug:{
                        required: !0,
                    },
                    name:{
                        required: !0,
                    },
                    name_l:{
                        required: !0,
                    },
                    category_id:{
                        required: !0,
                    },
                    "shop_id[]":{
                        required: !0,
                    }
                }
            };
            SnippetForm.init(validationRule,table_id);
            /*$(".image-upload").fileinput({
                theme: 'fas',
                "autoReplace": true,
                showUpload:false,
                "maxFileCount": 1,
                allowedFileExtensions: ["jpg", "png"],
                fileActionSettings: {
                    showUpload:false,
                }
            });*/
        });
    </script>

    <!--end::Page Resources -->
@endsection