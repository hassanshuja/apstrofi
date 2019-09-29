@section('page_js')
    <script type="text/javascript">
        "use strict";
        var login_url = "{{ route('admin.login') }}";
        $.ajaxPrefilter(function(options, originalOptions, xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        });
        // Class Definition
        var KTLoginGeneral = function() {

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

            var handleSignInFormSubmit = function() {
                $('#kt_login_signin_submit').click(function(e) {
                    e.preventDefault();
                    var btn = $(this);
                    var form = $(this).closest('form');

                    form.validate({
                        rules: {
                            email: {
                                required: !0,
                                email: !0
                            },
                            password: {
                                required: !0
                            }
                        }
                    });

                    if (!form.valid()) {
                        return;
                    }

                    btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

                    form.ajaxSubmit({
                        url: login_url,
                        method:'POST',
                        success: function(response) {
                            window.location.replace(response.url);
                        },
                        error : function(xhr, status, error){
                            btn.removeClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light").attr("disabled", !1), showErrorMsg(form, 'danger', 'Incorrect username or password. Please try again.');
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
            }

            // Public Functions
            return {
                // public functions
                init: function() {
                    handleSignInFormSubmit();
                }
            };
        }();

        // Class Initialization
        jQuery(document).ready(function() {
            KTLoginGeneral.init();
        });
    </script>
@endsection