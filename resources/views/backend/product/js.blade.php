@section('page_js')
    <script src="{!! asset('backend/assets/vendors/custom/tag-input/tagsinput.js') !!}"></script>
    <script src="{!! asset('backend/assets/vendors/general/select2/dist/js/select2.full.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/general/fileinput/js/fileinput.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/general/fileinput/themes/fas/theme.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/general/summernote/dist/summernote.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/custom/bootstrap-confirmation/bootstrap-confirmation.min.js') !!}"></script>
    @if($type == 'edit')
        <script src="{!! asset('backend/assets/vendors/custom/datatables/datatables.bundle.js') !!}" type="text/javascript"></script>
     <script type="text/javascript">
            var datable_id = 'kt_table_1';
            var url = '{!! route('admin.product.list-images',$product['id']) !!}';
            var updateUrl = '{!! route('admin.product.update-product-image-order') !!}';
            /*$(document).ready(function () {

                var columns = ['order','image','action'];
                Rowreorder.init(datable_id,url,columns);
            });*/

            $(function () {
                // declare a global variable

                var table;
                function getParams() {
                    return {
                        'q': $('#q').val(),
                    };
                }

                function loadTable() {

                    if (table) {
                        table.ajax.reload(null, true);
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
                loadTable();
            });
        </script>
    @endif
    <!--end::Page Vendors -->
    <script type="text/javascript">
        var multiSelect = '';
        var id = "{!! @$product['id'] ?: 0 !!}";
        var defaultCategory = JSON.parse('{!! json_encode(@$product['category_id']) !!}');
        var showErrorMsg = function(form, type, msg) {
            var alert = $('<div class="kt-alert kt-alert--outline alert alert-' + type + ' alert-dismissible" role="alert">\
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\
			<span></span>\
		</div>');

            form.find('.alert').remove();
            alert.prependTo(form);
            //alert.animateClass('fadeIn animated');
            KTUtil.animateClass(alert[0], 'fadeIn animated');
            alert.find('span').html(msg);
        }
        $(document).ready(function () {
            $(".m-select2").select2({
                placeholder: "Select",
                width:'100%'
            });
            $('.summernote').summernote({
                height: 150,
                popover: {
                    image: [
                        ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']]
                    ],
                    link: [
                        ['link', ['linkDialogShow', 'unlink']]
                    ],
                    table: [
                        ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                        ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                    ],
                    air: [
                        ['color', ['color']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['para', ['ul', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture']]
                    ]
                }

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
            $("#tags").tagsinput('items');

            $(".image-upload").fileinput({
                theme: 'fas',
                "autoReplace": true,
                showUpload:false,
                //allowedFileExtensions: ["jpg", "png"],
                fileActionSettings: {
                    showUpload:false,
                }
            });

            $(document).on('change','#product_group',function () {
                $('#modal').val($(this).val());
            });
            if($.isFunction($.fn.confirmation))
            {
                $('[data-toggle="confirmation"]').confirmation();
            }
            $('input[type=checkbox]').on("change",function(){
                if($(this).is(':checked')){
                    $(this).val(1);
                    $(this).attr('checked','checked');
                }else{
                    $(this).val(0);
                    $(this).removeAttr('checked');
                }
            });
            $('#edit_product_submit').click(function(e) {
                e.preventDefault();
                var btn = $(this);
                var form = $(this).closest('form');
                var action = form.attr('action');
                var type = form.data('type');
                form.validate({
                    rules: {
                        name: {
                            required: !0
                        },
                        name_l: {
                            required: !0
                        },
                        price: {
                            required: !0,
                            number: !0
                        },
                        sale_price:{
                            number: !0
                        },
                        sku:{
                            required: !0
                        },
                        modal:{
                            required: !0
                        },
                        weight:{
                            number: !0
                        }

                    }
                });
                /*$('[name*=sku]').each(function() {
                    $(this).rules("add", "required");
                });*/
                if (!form.valid()) {
                    return;
                }

                btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
                form.ajaxSubmit({
                    url: action,
                    method:'POST',
                    success: function(response) {
                        showErrorMsg(form, 'success', 'Product Updated Successfully.');
                        if(type == 'add'){
                            setTimeout(function () {
                                btn.removeClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light").attr("disabled", !1);
                                window.location.href = response.url;
                            },2000);
                        }else{
                            btn.removeClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light").attr("disabled", !1);
                            $('#'+datable_id).DataTable().ajax.reload();
                        }


                    },
                    error : function(xhr, status, error){
                        if (xhr.responseJSON !== undefined || xhr.responseJSON !== null) {
                            $.each(xhr.responseJSON.errors, function(key,val){
                                form.find('#'+key).closest('.form-group').addClass('validate is-invalid');
                                form.find('#'+key).after("<div id='"+key+"_error' class='error invalid-feedback'>"+val[0]+"</div>");
                            });
                            $('.invalid-feedback').show();
                        }
                        btn.removeClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light").attr("disabled", !1); showErrorMsg(form, 'danger', xhr.responseJSON.message);
                    }
                    /*success: function(response, status, xhr, $form) {
                        // similate 2s delay
                        setTimeout(function() {
                            btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                            showErrorMsg(form, 'danger', 'Incorrect username or password. Please try again.');
                        }, 2000);
                    }*/
                });
            });
            $(document).on('confirmed.bs.confirmation','.delete-data', function () {
                var url = $(this).data('action');
                var id = $(this).data('id');
                $.ajax({
                    type: 'delete',
                    url : url,
                    success : function(data){
                        if(data.status){
                            $('#'+datable_id).DataTable().ajax.reload();
                        }
                    }
                });
            });

            $('#add_sizes').on('click', function(){
                let size = $('#attribute_value_size_id').val();
                let min_size = $('#min_size').val();
                let max_size = $('#max_size').val();
                let quantity = $('#quantity').val();
                let product_id = $('#product_id').val();

                if(size == '' || min_size == '' || max_size == '' || quantity == ''){
                    $('#size_error').removeClass('d-none');
                    $('#size_error').html('Please Fill all the fields');
                }else{
                    $('#size_error').addClass('d-none');
                }

                $.ajax({
                    url: '{{route('admin.product.add_sizes')}}',
                    method: 'post',
                    data: {attribute_value_size_id: size, min_size: min_size, max_size: max_size, qty: quantity, product_id:product_id},
                    success(data){
                        $('#res_size').empty();
                        let rows = data.map(function(item, index) {
                            let tr = '<tr>' + 
                                      '<td>' +item.name +'</td>' +
                                      '<td>' +item.min_size +'</td>' +
                                      '<td>' +item.max_size +'</td>' +
                                      '<td>' +item.qty +'</td>' +
                                      '<td><button class="btn btn-warning" onclick="deletesize('+item.id+')">Delete</button></td>'+
                                      '</tr>';

                            $('#res_size').append(tr)
                        });
                    }
                })

            });

        });


        function deletesize(id) {
                $.ajax({
                    url: "{{route('admin.product.delete_size','')}}/"+id,
                    method: 'delete',
                    success(data){
                        $('#res_size').empty();
                        if(data.length > 0){
                            let rows = data.map(function(item, index) {
                                let tr = '<tr>' + 
                                        '<td>' +item.name +'</td>' +
                                        '<td>' +item.min_size +'</td>' +
                                        '<td>' +item.max_size +'</td>' +
                                        '<td>' +item.qty +'</td>' +
                                        '<td><button class="btn btn-warning" onclick="deletesize('+item.id+')">Delete</button></td>'+
                                        '</tr>';

                                $('#res_size').append(tr)
                            });
                        }else{
                            $('#res_size').append('<tr><td colspan="5"> No Result Found</td></tr>')
                        }
                        
                    }
                });
            }

    </script>

@endsection
