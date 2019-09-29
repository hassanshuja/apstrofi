@section('page_js')
    <script src="{!! asset('backend/assets/vendors/general/jquery-validation/dist/jquery.validate.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/general/jquery-validation/dist/additional-methods.js')!!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/custom/components/vendors/jquery-validation/init.js')!!}" type="text/javascript"></script>

    <script src="{!! asset('backend/assets/vendors/custom/tag-input/tagsinput.js') !!}"></script>
    <script src="{!! asset('backend/assets/vendors/general/select2/dist/js/select2.full.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/general/fileinput/js/fileinput.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/general/fileinput/themes/fas/theme.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/general/summernote/dist/summernote.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/custom/bootstrap-confirmation/bootstrap-confirmation.min.js') !!}"></script>

    <script type="text/javascript">
        $(document).ready(function () {


            $(document).on('submit','#section_1_form',function () {
                var form = $(this);
                form.find('.form-group').removeClass('validate is-invalid');
                form.find('.form-control').removeClass('is-invalid');
                form.find('.invalid-feedback').remove();
                var send_data = new FormData($(this)[0]);
                $.ajax({
                    url: form.attr('action'),
                    type: "post",
                    data: send_data,
                    processData: false,
                    cache: false,
                    contentType: false,
                    success: function (data) {
                        //console.log(response);
                        $('.success').fadeIn(200).show().delay(1000).fadeOut();
                        $("#data").html(data);

                    },
                    error : function(xhr, status, error){


                        form.find('button[type=submit]').removeAttr('disabled');
                        form.find('button[type=submit]').button('reset');

                        if (xhr.responseJSON !== undefined || xhr.responseJSON !== null) {
                            // curObj.hasClass('');
                            $.each(xhr.responseJSON.errors, function(key,val){
                                key = key.replace(/\./g, "_");
                                form.find('#'+key).parent('.form-group').addClass('validate is-invalid');
                                form.find('#'+key).addClass('is-invalid');
                                form.find('#'+key).after("<div id='"+key+"-error' class='error invalid-feedback'>"+val[0]+"</div>");
                                form.find('.invalid-feedback').show();
                            });
                        }
                    }
                });

            });
        });
        $('.summernote').summernote({
            height: 150,   //set editable area's height
            codemirror: { // codemirror options

            }
        });
    </script>

@endsection
