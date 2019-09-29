@section('page_js')
    <script src="{!! asset('backend/assets/vendors/general/jquery.repeater/jquery.repeater.js') !!}"></script>
    <script src="{!! asset('backend/assets/vendors/general/jquery-validation/dist/jquery.validate.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/general/jquery-validation/dist/additional-methods.js')!!}" type="text/javascript"></script>
    <script src="{!! asset('backend/assets/vendors/custom/components/vendors/jquery-validation/init.js')!!}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var $repeater1 = $("#kt_repeater_1").repeater({
                initEmpty: !1,
                errorMessage: true,
                errorMessageClass: 'error_message',
                show: function() {
                    $(this).slideDown()
                },
                hide: function(e) {
                    $(this).slideUp(e)
                }
            });
            $(document).on("change",".uploadFile", function()
            {
                var uploadFile = $(this);
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

                if (/^image/.test( files[0].type)){ // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadend = function(){ // set image data as background of div
                        //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                        uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
                    }
                }

            });
            /*$("#section_1_form").validate();
            $('.required').each(function() {
                setTimeout(function () {
                    $(this).rules("add",
                        {
                            required: true,

                        });
                },300);

            });*/
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
                    success: function (response) {
                        console.log(response);
                            // console.log(response);
                            $('.success').fadeIn(200).show().delay(1000).fadeOut();
                            $("#data").html(response);

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

            $(document).on('submit','#section_2_form',function () {
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
                    success: function (response) {
                        console.log(response);
                        $('.success').fadeIn(200).show().delay(1000).fadeOut();
                        $("#data").html(response);

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

            $(document).on('submit','#section_3_form',function () {
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
                    success: function (response) {
                        console.log(response);
                        $('.success').fadeIn(200).show().delay(1000).fadeOut();
                        $("#data").html(response);

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

    </script>
@endsection
