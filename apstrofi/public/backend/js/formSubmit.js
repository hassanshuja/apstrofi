
var SnippetForm = function() {
    var i = function(e, i, a) {
            var l = $('<div class="m-alert m-alert--outline alert alert-' + i + ' alert-dismissible" role="alert">\t\t\t<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\t\t\t<span></span>\t\t</div>');
            e.find(".alert").remove(), l.prependTo(e), mUtil.animateClass(l[0], "fadeIn animated"), l.find("span").html(a)
        };
    return {
        init: function(validationRules = {},table_id,arrayRule={}) {
            $.validator.setDefaults({
                ignore: ":hidden" // validate all hidden select elements
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
             $("#m_form_submit,.m_form_submit").click(function(e) {
                e.preventDefault();
                 var btn = $(this);
                 var form = $(this).closest('form');

                 form.validate(validationRules);
                 $('[name*='+arrayRule.field+']').each(function() {
                     $(this).rules("add", "required");
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
                         btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                         if(response.status){
                             form.clearForm();
                             form.validate().resetForm();
                             showErrorMsg(form, 'success', response.msg);
                             setTimeout(function() {
                                 $('#'+table_id).DataTable().ajax.reload();
                                 $('.modal').modal('hide');

                             }, 2e3)
                         }
                     },
                     error : function(xhr, status, error){
                         btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                         if (xhr.responseJSON !== undefined || xhr.responseJSON !== null) {
                             $.each(xhr.responseJSON.errors, function(key,val){
                                 form.find('#'+key).closest('.form-group').addClass('validate is-invalid');
                                 form.find('#'+key).after("<div id='"+key+"_error' class='error invalid-feedback'>"+val[0]+"</div>");
                             });
                             $('.invalid-feedback').show();
                         }
                         showErrorMsg(form, 'danger', xhr.responseJSON.message);
                         //a.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), i(l, "danger", xhr.responseJSON.message)
                     }
                 });
            });

            $(document).on('click','#open-search-form, .open-search-form ',function () {
                $('.search-table-form').fadeToggle('slow');
            });


        }
    };


}();

jQuery(document).ready(function() {
    $('[data-dismiss=modal]').on('click', function (e) {
        var $t = $(this),
            target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];

        $(target)
            .find("input[type=text],input[type=password],input[type=email],textarea,input[type=hidden],input[type=file]").not('input[name="_method"]')
            .val('')
            .end();
        // .find("input[type=checkbox], input[type=radio]")
        // .prop("checked", "")
        // .end();
        $(target).find("input[type=checkbox]").removeAttr("checked");
        $(target).find("input[type=radio]:first").trigger('click');
        $(target).find("input[type=radio]:first").prop("checked", true).end();
        $(target).find('select').each(function (key,val) {
            $(this).val($(val).find('option:first').val());
        });
        $(target).find('.invalid-feedback').remove();
        $(target).find('.form-control').removeClass('is-invalid');
        $(target).find('.form-group').removeClass('validate');
        $(target).find('.form-group').removeClass('is-invalid');
        $(target).find('.m-alert').remove();
        $('.image-preview').hide();
        $('.preview').attr('src','');
        $(target).find('.alert').remove();
        if($.isFunction($.fn.select2))
        {
            $(e.currentTarget).find('.m-select2').val("").trigger('change');
        }

        if($.isFunction($.fn.tagsinput))
        {
            $(e.currentTarget).find('input').tagsinput('removeAll');

        }
        if($.isFunction($.fn.paraia_multi_select)){
            $('.paraia-multi-select').remove();
        }

    });
    $('.modal').on('hidden.bs.modal', function (e) {
        $(this)
            .find("input[type=text],input[type=password],input[type=email],textarea,input[type=hidden],input[type=file]").not('input[name="_method"]')
            .val('')
            .end();
        // .find("input[type=checkbox], input[type=radio]")
        // .prop("checked", "")
        // .end();
        $(this).find('select').each(function (key,val) {
            $(this).val($(val).find('option:first').val());
        });
        $(this).find("input[type=checkbox]").removeAttr("checked");
        $(this).find('.invalid-feedback').remove();
        $(this).find('.form-control').removeClass('is-invalid');
        $(this).find('.form-group').removeClass('validate');
        $(this).find('.form-group').removeClass('is-invalid');
        $(this).find('.m-alert').remove();
        $('.image-preview').hide();
        $('.preview').attr('src','');
        $(this).find('.alert').remove();
        if($.isFunction($.fn.select2))
        {
            $(e.currentTarget).find('.m-select2').val("").trigger('change');
        }

        if($.isFunction($.fn.tagsinput))
        {
            $(e.currentTarget).find('.input-tag').tagsinput('removeAll');

        }
        if($.isFunction($.fn.repeater)){
            $('[data-repeater-item]').not('div:first').remove();
        }
        if($.isFunction($.fn.paraia_multi_select)){
            $('.paraia-multi-select').remove();
        }

    });
    $(document).on('change', '.change_status', function (event, state) {
        var status = 0;
        if ($(this).is(':checked')) {
            status = 1;
        }else {
            status = 0;
        }
        var url = $(this).data('action');
        var id = $(this).data('id');
        var modal = $(this).data('modal');
        $.ajax({
            type: 'post',
            url : url,
            data: {status:status,id:id},
            success : function(data){
                if(modal){
                    $('#'+modal).DataTable().ajax.reload();
                }

            }

        });
    });

    $('.modal-data').on('shown.bs.modal', function (e) {
        var type = $(e.relatedTarget).data('type');
        var url = $(e.relatedTarget).data('action');
        if(type == 'add')
        {
            $(e.currentTarget).find('.formAdd').attr('action',url);
            $(e.currentTarget).find('.formAdd').find('input[name="_method"]').remove();
        }
        else if(type == 'edit' && $(this).attr('id') == 'add')
        {

            var key = $(e.relatedTarget).data('key');
            var modal = $(e.relatedTarget).data('modal');
            if ($.fn.DataTable.fnIsDataTable($(modal)[0]) ) {
                var data = $(modal).DataTable().context[0].json.record_data[key];
            }else
            {
                console.log(modal);
                var data = $(e.relatedTarget).data('data').replace(/'/g, '"');
                data = JSON.parse(data);
            }
            $(e.currentTarget).find('.formAdd').attr('action',url);
            var select2Array = ['shop_id','product_id','blog_category_id'];
            var imgArray = ['image_url'];
            var dateArray = ['start_at','end_at','start_date','end_date'];
            var radoiArray = ['vendor_type','approved','is_track'];
            var inputTag = [''];
            var repeatArray = ['extra_menu'];
            var summerNoteArray = ['description','description_l'];
            $(e.currentTarget).find('.formAdd').append('<input name="_method" value="PUT" type="hidden"/>');
            $.each(data,function (key,val) {
                if($.isFunction($.fn.select2) && $.isArray(val) && $.inArray(key,select2Array) != -1)
                {
                    setTimeout(function () {
                        $(e.currentTarget).find('.formAdd').find('#'+key).val(val).change();
                    },500);
                }else if($.isFunction($.fn.fileinput) && $.inArray(key,imgArray) != -1)

                {
                    $(e.currentTarget).find('.formAdd').find('#'+key).attr('src',val);
                }else if($.isFunction($.fn.summernote) && $.inArray(key,summerNoteArray) != -1)

                {
                    $(e.currentTarget).find('.formAdd').find('#'+key).summernote('code',val);
                }else if($.isFunction($.fn.datepicker) && $.inArray(key,dateArray) != -1)

                {
                    $(e.currentTarget).find('.formAdd').find('#'+key).datepicker('setDate', val);
                }else if($.inArray(key,radoiArray) != -1)
                {
                    $(e.currentTarget).find('.formAdd').find('#'+key+'_'+val).prop('checked',true);
                }else if($.inArray(key,repeatArray) != -1 && $.isArray(val)){

                    if(val.length > 0){
                        $repeater.setList(val);
                    }

                }
                else{
                    $(e.currentTarget).find('.formAdd').find('#'+key).val(val);
                }

            })

        }
        else if(type == 'edit' && $(this).attr('id') == 'edit')
        {

            var key = $(e.relatedTarget).data('key');
            var modal = $(e.relatedTarget).data('modal');
            if ($.fn.DataTable.fnIsDataTable($(modal)[0]) ) {
                var data = $(modal).DataTable().context[0].json.record_data[key];
            }else
            {
                var data = $(e.relatedTarget).data('data').replace(/'/g, '"');
                data = JSON.parse(data);
            }
            $(e.currentTarget).find('.formAdd').attr('action',url);
            var select2Array = ['shop_id','edit_country_id'];
            var imgArray = ['edit_image_url'];
            var dateArray = ['edit_start_at','edit_end_at','edit_start_date','edit_end_date'];
            var radoiArray = ['edit_vendor_type','edit_approved','edit_is_track'];
            var inputTag = [''];
            $(e.currentTarget).find('.formAdd').append('<input name="_method" value="PUT" type="hidden"/>');
            $.each(data,function (key,val) {
                if($.isFunction($.fn.select2) && $.isArray(val) && $.inArray(key,select2Array) != -1)
                {
                    setTimeout(function () {
                        $(e.currentTarget).find('.formAdd').find('#edit_'+key).val(val).change();
                    },500);
                }else if($.isFunction($.fn.fileinput) && $.inArray(key,imgArray) != -1)

                {
                    $(e.currentTarget).find('.formAdd').find('#edit_'+key).attr('src',val);
                }else if($.isFunction($.fn.datepicker) && $.inArray(key,dateArray) != -1)

                {
                    $(e.currentTarget).find('.formAdd').find('#edit_'+key).datepicker('setDate', val);
                }else if($.inArray(key,radoiArray) != -1)
                {
                    $(e.currentTarget).find('.formAdd').find('#edit_'+key+'_'+val).prop('checked',true);
                }
                else{
                    $(e.currentTarget).find('.formAdd').find('#edit_'+key).val(val);
                }

            })

        }

    });
    $(document).on('confirmed.bs.confirmation','.delete-data', function () {
        var url = $(this).data('action');
        var modal_name = $(this).data('modal');
        $.ajax({
            type: 'delete',
            url : url,
            success : function(data){
                /*if(data.status){
                    $('.response-msg').addClass('note-success');
                    $('.response-msg').find('p').text(data.msg);
                }else{
                    $('.response-msg').addClass('note-danger');
                    $('.response-msg').find('p').text(data.msg);
                }
                $( ".response-msg" ).fadeIn( "fast",function () {
                    setTimeout(function () {
                        $( ".response-msg" ).fadeOut("slow");
                    },3000);

                });*/
                $(modal_name).DataTable().ajax.reload();
            },
            error: function(ts) {

            }
        });
    });


});