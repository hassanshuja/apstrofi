@section('page_js')
    <!--begin::Page Vendors -->
    <script src="{!! asset('backend/assets/vendors/custom/datatables/datatables.bundle.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/custom/bootstrap-confirmation/bootstrap-confirmation.min.js') !!}"></script>
    <script src="{!! asset('backend/assets/vendors/general/select2/dist/js/select2.full.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/general/summernote/dist/summernote.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/general/fileinput/js/fileinput.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/general/fileinput/themes/fas/theme.js') !!}" type="text/javascript"></script>
    <!--end::Page Vendors -->
    <script src="{!! asset('backend/js/formSubmit.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/js/dynamic-datatable.js') !!}" type="text/javascript"></script>
    <!--begin::Page Resources -->
    <script type="text/javascript">
        var list_url = '{!! route("admin.blog.list-ajax") !!}';
        var table_id = 'kt_table_1';
        var columns = ['title','title_l','status','action'];
        var updateUrl = '{!! route('admin.blog.update-blog-image-order') !!}';
        jQuery(document).ready(function() {
            Datatables.init(table_id,list_url,columns);
            var validationRule = {
                rules: {
                    title:{
                        required: !0,
                    },
                    title_l:{
                        required: !0,
                    },
                    author:{
                        required: !0,
                    },
                    author_l:{
                        required: !0,
                    },
                    /*"product_id[]":{
                        required: !0,
                    },*/
                    blog_category_id:{
                        required: !0
                    }
                }
            };
            SnippetForm.init(validationRule,table_id);
            $(".m-select2").select2({
                placeholder: "Select Product",
                width:'100%'
            });
            $('.summernote').summernote({
                height: 150,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            });
            $(document).on('change','.image-upload1',function (event) {
                // Reference to the DOM input element
                var input = event.target;
                var _this = $(this);
                // Ensure that you have a file before attempting to read it
                if (input.files && input.files[0]) {
                    // create a new FileReader to read this image and convert to base64 format
                    var reader = new FileReader();
                    // Define a callback function to run, when FileReader finishes its job
                    reader.onload = (e) => {
                        // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
                        // Read image as base64 and set to imageData
                        console.log(_this);
                        var imageData = e.target.result;
                        _this.next('.image-preview').show();
                        _this.next('.image-preview').find('.preview').attr('src',imageData);
                    }
                    // Start the reader job - read file as a data url (base64 format)
                    reader.readAsDataURL(input.files[0]);
                }
            });

            if($.isFunction($.fn.confirmation))
            {
                $('[data-toggle="confirmation"]').confirmation();
            }
            $(".image-upload").fileinput({
                theme: 'fas',
                "autoReplace": true,
                showUpload:false,
                //allowedFileExtensions: ["jpg", "png"],
                fileActionSettings: {
                    showUpload:false,
                }
            });
            $(document).on('confirmed.bs.confirmation','.delete-images', function () {
                var url = $(this).data('action');
                var id = $(this).data('id');
                $.ajax({
                    type: 'delete',
                    url : url,
                    success : function(data){
                        if(data.status){
                            $('#kt_table_2').DataTable().ajax.reload();
                        }
                    },
                    error: function(ts) {

                    }
                });
            });
            $('#view-images').on('shown.bs.modal', function (e) {
                var url = $(e.relatedTarget).data('action');
                loadTable(url,'kt_table_2');

            });

        });
        var table;
        function getParams() {
            return {
                'q': $('#q').val(),
            };
        }

        function loadTable(url,datable_id) {

            if (table) {
                table.ajax.url(url ).load();
                return;
            }
            table = $('#'+datable_id).DataTable({
                'paging': false,
                responsive: true,
                "searching": false,
                'rowReorder': {
                    'selector': 'tr',
                    'dataSrc': 'order', // follow the json data
                },
                'columnDefs': [
                    { 'orderable': true, 'targets': 0, 'className': 'reorder' },
                    { 'orderable': false, 'targets': '_all' }
                ],
                'columns': [
                    { 'data': 'order' },
                    { 'data': 'image' },
                    { 'data': 'action' }
                ],
                "drawCallback": function(settings) {
                    if($.isFunction($.fn.confirmation))
                    {
                        $('[data-toggle="confirmation"]').confirmation();
                    }
                },
                'ajax': {
                    'url': url,
                    'type': 'POST',
                    /*'data': function (d) { // do in this way, otherwise table.ajax.reload() not working
                        Object.assign(d, getParams());
                        return d;
                    },*/
                },
            });

            // every time drag the row will send a request to server to update the `seq` column
            table.on( 'row-reorder', function ( e, diff, edit ) {
                var postData = [];
                for ( var i = 0, ien = diff.length ; i < ien ; i++ ) {
                    var rowData = table.row(diff[i].node).data();
                    var b =rowData.action.split('data-id="');
                    var b2 = b[1].split('"><a');
                    postData.push({
                        'id': parseInt(b2[0]),
                        'new_seq': diff[i].newData,
                    });
                }

                $.ajax({
                    url: updateUrl,
                    dataType: 'json',
                    type: 'post',
                    async: false, // disable async, otherwise the table will reload before the db update
                    data: {
                        seqs: postData,
                    }
                });
            });
        }

    </script>

    <!--end::Page Resources -->
@endsection
