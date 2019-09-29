@section('page_js')
    <script src="{{asset('backend/assets/vendors/general/croppie/js/croppie.min.js')}}"></script>
    <script type="text/javascript">
        var image_url = "{!! route('admin.change-profile-pic') !!}";
        $(document).ready(function () {
            $(".form_submit").click(function(e) {
                e.preventDefault();
                var btn = $(this);
                var form = $(this).closest('form');
                form.validate({
                    rules: {
                        old_password: {
                            required: !0
                        },
                        new_password: {
                            required: !0
                        },
                        confirm_password:{
                            required: !0
                        }
                    }
                });

                if (!form.valid()) {
                    return;
                }
                btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
                form.find('.alert').remove();
                form.ajaxSubmit({
                    url: form.attr('action'),
                    method:'POST',
                    success: function(response) {
                        btn.removeClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light").attr("disabled", !1);
                    },
                    error : function(xhr, status, error){
                        btn.removeClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light").attr("disabled", !1);
                        if (xhr.responseJSON !== undefined || xhr.responseJSON !== null) {
                            $.each(xhr.responseJSON.errors, function(key,val){
                                form.find('#'+key).closest('.form-group').addClass('validate is-invalid');
                                form.find('#'+key).after("<div id='"+key+"_error' class='error invalid-feedback'>"+val[0]+"</div>");
                            });
                            $('.invalid-feedback').show();
                        }
                        showErrorMsg(form, 'danger', xhr.responseJSON.message);
                    }
                });



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

            });
            var tempFilename,
                rawImg,
                imageId;
            function readFile(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#upload-demo').addClass('ready');
                        $('.upload-msg').hide();
                        $('.upload-demo-wrap').show();
                        rawImg = e.target.result;
                        uploadCrop.croppie('bind', {
                            url: rawImg
                        }).then(function(){

                        });
                    }
                    reader.readAsDataURL(input.files[0]);
                }
                else {
                    alert("Sorry - you're browser doesn't support the FileReader API");
                }
            }

            var uploadCrop = $('#upload-demo').croppie({
                viewport: {
                    width: 200,
                    height: 200,
                    type: 'circle'
                },
                boundary: {
                    width: 300,
                    height: 300
                },
                enforceBoundary: false,
                enableExif: true
            });


            $('.item-img').on('change', function () {
                imageId = $(this).data('id');
                tempFilename = $(this).val();
                $('#cancelCropBtn').data('id', imageId);
                readFile(this);
            });
            $(document).on('click','#upload_btn',function () {
                uploadCrop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function (resp) {
                    $.ajax({
                        url: image_url,
                        type: "POST",
                        data: {base64_image:resp},
                        success:function (response) {
                            console.log(response);
                            $(".image_url").attr('src',resp);
                            $('#upload-demo').removeClass('ready');
                            $('#upload').val(''); // this will clear the input val.
                            uploadCrop.croppie('bind', {
                                url : ''
                            }).then(function () {
                                console.log('reset complete');
                            });
                        }
                    });

                });
                return false;
            });
        });
    </script>
@endsection