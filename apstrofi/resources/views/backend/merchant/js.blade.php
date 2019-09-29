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
        var list_url = '{!! route("admin.merchant.list-ajax") !!}';
        var table_id = 'kt_table_1';
        var columns = ['name','email','status','action'];
        var getProvince = '{!! route('admin.merchant.getprovince') !!}';
        var getCity = '{!! route('admin.merchant.getcity') !!}';
        var getSuburb = '{!! route('admin.merchant.suburb') !!}';
        var getArea = '{!! route('admin.merchant.area') !!}';
        jQuery(document).ready(function() {
            Datatables.init(table_id,list_url,columns);
            var validationRule = {
                rules: {
                    name:{
                        required: !0,
                    },
                    email:{
                        required: !0,
                        email:!0
                    },
                    password:{
                        required: !0,
                    },
                    phone:{
                        required: !0,
                    },
                    province_id:{
                        required: !0,
                    },
                    city_id:{
                        required: !0,
                    },
                    suburb_id:{
                        required: !0,
                    },
                    area_id:{
                        required: !0,
                    }
                }
            };
            SnippetForm.init(validationRule,table_id);
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
            function getprovince(edit_id = null)
            {
                $("select[name=province_id] option[value!='']").remove();
                $("input[name=province]").val("");
                $("select[name=city_id] option[value!='']").remove();
                $("input[name=city]").val("");
                $("select[name=suburb_id] option[value!='']").remove();
                $("input[name=suburb]").val("");
                $("select[name=area_id] option[value!='']").remove();
                $("input[name=area]").val("");
                $("input[name=zip_code]").val("");
                //$("select[data-name=delivery] option").remove();

                $.ajax({
                    url: getProvince,
                    type: "get",
                    success:function (response) {
                        var result = JSON.parse(response);
                        $('select[name=province_id]').find('option').not(':first').remove();
                        $('select[name=province_id]').removeAttr('disabled');
                        $.each(result,function(index, item )
                        {
                            var option = new Option(item.name,item.id);
                            if(edit_id == item.id){
                                $(option).attr("selected",true);
                            }
                            $('select[name=province_id]').append($(option));
                        });

                    }
                });
            }

            function getcity(id,edit_id = null)
            {
                $("select[name=city_id] option[value!='']").remove();
                $("input[name=city]").val("");
                $("select[name=suburb_id] option[value!='']").remove();
                $("input[name=suburb]").val("");
                $("select[name=area_id] option[value!='']").remove();
                $("input[name=area]").val("");
                $("input[name=zip_code]").val("");
                // $("select[data-name=delivery] option").remove();
                if(id != ''){
                    $.ajax({
                        url: getCity,
                        type: "post",
                        data:{id:id},
                        success:function (response) {
                            var result = JSON.parse(response);
                            $('select[name=city_id]').find('option').not(':first').remove();
                            $('select[name=city_id]').removeAttr('disabled');
                            $.each(result,function(index, item )
                            {
                                var option = new Option(item.name,item.id);
                                if(edit_id == item.id){
                                    $(option).attr("selected",true);
                                }
                                $('select[name=city_id]').append($(option));
                            });

                        }
                    });
                }

            }

            function getsuburb(id,edit_id = null)
            {
                $("select[name=suburb_id] option[value!='']").remove();
                $("input[name=suburb]").val("");
                $("select[name=area_id] option[value!='']").remove();
                $("input[name=area]").val("");
                $("input[name=zip_code]").val("");
                //$("select[data-name=delivery] option").remove();
                if(id != '') {
                    $.ajax({
                        url: getSuburb,
                        type: "post",
                        data: {id: id},
                        success: function (response) {
                            var result = JSON.parse(response);
                            $('select[name=suburb_id]').find('option').not(':first').remove();
                            $('select[name=suburb_id]').removeAttr('disabled');
                            $.each(result, function (index, item) {
                                var option = new Option(item.name, item.id);
                                if(edit_id == item.id){
                                    $(option).attr("selected",true);
                                }
                                $('select[name=suburb_id]').append($(option));
                            });

                        }
                    });
                }
            }

            function getarea(id,edit_id = null)
            {
                $("select[name=area_id] option[value!='']").remove();
                $("input[name=area]").val("");
                $("input[name=zip_code]").val("");
                //$("select[data-name=delivery] option").remove();
                if(id != '') {
                    $.ajax({
                        url: getArea,
                        type: "post",
                        data: {id: id},
                        success: function (response) {
                            var result = JSON.parse(response);
                            $('select[name=area_id]').find('option').not(':first').remove();
                            $('select[name=area_id]').removeAttr('disabled');
                            $.each(result, function (index, item) {
                                var option = new Option(item.name, item.id);
                                if(edit_id == item.id){
                                    $(option).attr("selected",true);
                                }
                                $(option).attr("data-zip_code", item.postcode);
                                $('select[name=area_id]').append($(option));
                            });

                        }
                    });
                }

            }
            $(document).on('change','select[name=province_id]',function () {
                var id = $.trim($(this).val());
                $('input[name=province]').val($(this).children(":selected").text());
                getcity(id);
            });
            $(document).on('change','select[name=city_id]',function () {
                var id = $.trim($(this).val());
                $('input[name=city]').val($(this).children(":selected").text());
                getsuburb(id);
            });
            $(document).on('change','select[name=suburb_id]',function () {
                var id = $.trim($(this).val());
                $('input[name=suburb]').val($(this).children(":selected").text());
                getarea(id);
            });
            $(document).on('change','select[name=area_id]',function () {
                var zip_code = $(this).children(":selected").data("zip_code");
                $("input[name=zip_code]").val("");
                $('input[name=area]').val($(this).children(":selected").text());
                if(zip_code != ''){
                    $("input[name=zip_code]").val(zip_code);
                }

            });
            $('.modal-data').on('shown.bs.modal', function (e) {
                var type = $(e.relatedTarget).data('type');
                var url = $(e.relatedTarget).data('action');
                if (type == 'add') {
                    getprovince();
                }
                else if (type == 'edit' ) {
                    var key = $(e.relatedTarget).data('key');
                    var modal = $(e.relatedTarget).data('modal');
                    var data = $(modal).DataTable().context[0].json.record_data[key];
                    getprovince(data.province_id);
                    getcity(data.province_id,data.city_id);
                    getsuburb(data.city_id,data.suburb_id);
                    getarea(data.suburb_id,data.area_id);
                    $(e.currentTarget).find('.formAdd').find('#zip_code').val(data.zip_code);
                    $(e.currentTarget).find('.formAdd').find('#province').val(data.province);
                    $(e.currentTarget).find('.formAdd').find('#city').val(data.city);
                    $(e.currentTarget).find('.formAdd').find('#suburb').val(data.suburb);
                    $(e.currentTarget).find('.formAdd').find('#area').val(data.area);
                }
            });

        });
    </script>

    <!--end::Page Resources -->
@endsection