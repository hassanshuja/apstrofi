"use strict";

// Class definition
var KTWizard2 = function () {
    // Base elements
    var wizardEl;
    var formEl;
    var validator;
    var wizard;

    // Private functions
    var initWizard = function () {
        // Initialize form wizard
        wizard = new KTWizard('kt_wizard_v2', {
            startStep: 1,
        });

        // Validation before going to next page
        wizard.on('beforeNext', function(wizardObj) {
            if (validator.form() !== true) {
                wizardObj.stop();  // don't go to the next step
            }
        })

        // Change event
        wizard.on('change', function(wizard) {
            KTUtil.scrollTop();
        });
    }

    var initValidation = function() {
        validator = formEl.validate({
            // Validate only visible fields
            ignore: ":hidden",

            // Validation rules
            rules: {
                //= Step 1
                name: {
                    required: true
                },
                name_l: {
                    required: true
                },
                price: {
                    required: true,
                    number:true
                },
                sku: {
                    required: true
                },
                brand_id :{
                    required:true
                },

                //= Step 2
                /*meta_title: {
                    required: true
                },
                meta_keywords: {
                    required: true
                },
                meta_description: {
                    required: true
                },

                //= Step 3
                delivery: {
                    required: true
                },
                packaging: {
                    required: true
                },
                preferreddelivery: {
                    required: true
                },

                //= Step 4
                locaddress1: {
                    required: true
                },
                locpostcode: {
                    required: true
                },
                loccity: {
                    required: true
                },
                locstate: {
                    required: true
                },
                loccountry: {
                    required: true
                },

                //= Step 5
                ccname: {
                    required: true
                },
                ccnumber: {
                    required: true,
                    creditcard: true
                },
                ccmonth: {
                    required: true
                },
                ccyear: {
                    required: true
                },
                cccvv: {
                    required: true,
                    minlength: 2,
                    maxlength: 3
                },*/
            },

            // Display error
            invalidHandler: function(event, validator) {
                KTUtil.scrollTop();

                /*swal.fire({
                    "title": "",
                    "text": "There are some errors in your submission. Please correct them.",
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary"
                });*/
            },

            // Submit valid form
            submitHandler: function (form) {

            }
        });
    }

    var initSubmit = function() {
        var btn = formEl.find('[data-ktwizard-type="action-submit"]');

        btn.on('click', function(e) {
            e.preventDefault();

            /*if (validator.form()) {

            }*/

            // See: src\js\framework\base\app.js
            KTApp.progress(btn);
            //KTApp.block(formEl);
            $('#subcategory_id').val(multiSelect.paraia_multi_select('get_items'));
            // See: http://malsup.com/jquery/form/#ajaxSubmit
            formEl.ajaxSubmit({
                success: function(response) {
                    KTApp.unprogress(btn);
                    if(response.status){
                        window.location.href = response.url;
                    }
                    //KTApp.unblock(formEl);

                    /*swal.fire({
                        "title": "",
                        "text": "The application has been successfully submitted!",
                        "type": "success",
                        "confirmButtonClass": "btn btn-secondary"
                    });*/
                }
            });
        });
    }

    return {
        // public functions
        init: function() {
            wizardEl = KTUtil.get('kt_wizard_v2');
            formEl = $('#kt_form');

            initWizard();
            initValidation();
            initSubmit();
        }
    };
}();

jQuery(document).ready(function($) {
    KTWizard2.init();
});

