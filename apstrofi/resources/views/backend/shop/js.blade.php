@section('page_js')
    <!--begin::Page Vendors -->
    <script src="{!! asset('backend/assets/vendors/custom/datatables/datatables.bundle.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/custom/bootstrap-confirmation/bootstrap-confirmation.min.js') !!}"></script>
    <!--end::Page Vendors -->
    <script src="{!! asset('backend/js/formSubmit.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/js/dynamic-datatable.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/general/fileinput/js/fileinput.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/general/fileinput/themes/fas/theme.js') !!}" type="text/javascript"></script>
    <!--begin::Page Resources -->
    <script type="text/javascript">
        var list_url = '{!! route("admin.shop.list-ajax") !!}';
        var table_id = 'kt_table_1';
        var columns = ['code','name','photo','note','status','action'];
        jQuery(document).ready(function() {
            Datatables.init(table_id,list_url,columns);
            var validationRule = {
                rules: {
                    name:{
                        required: !0,
                    },
                    name_l:{
                        required: !0,
                    },
                    code: {
                        required: !0
                    },
                    'shop_id[]':{
                        required: !0
                    }
                }
            };
            SnippetForm.init(validationRule,table_id);
            /*$(document).on('change','.image-upload',function (event) {
                // Reference to the DOM input element
                var input = event.target;
                // Ensure that you have a file before attempting to read it
                if (input.files && input.files[0]) {
                    // create a new FileReader to read this image and convert to base64 format
                    var reader = new FileReader();
                    // Define a callback function to run, when FileReader finishes its job
                    reader.onload = (e) => {
                        // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
                        // Read image as base64 and set to imageData
                        var imageData = e.target.result;
                        $('.image-preview').show();
                        $('.preview').attr('src',imageData);
                    };
                    // Start the reader job - read file as a data url (base64 format)
                    reader.readAsDataURL(input.files[0]);
                }
            });*/
            $(".image-upload").fileinput({
                theme: 'fas',
                "autoReplace": true,
                showUpload:false,
                "maxFileCount": 1,
                allowedFileExtensions: ["jpg", "png"],
                fileActionSettings: {
                    showUpload:false,
                }
            });
        });
    </script>

    <!--end::Page Resources -->
@endsection