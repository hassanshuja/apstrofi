"use strict";
var Datatables = function() {



    var initTable1 = function(id,url,column) {
        // begin first table
        var columns = [];
        $.each(column,function (key,val) {
            columns.push({data:val});
        })
        var table = $("#"+id).DataTable({
            responsive: true,
            // Pagination settings
            dom: `<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            // read more: https://datatables.net/examples/basic_init/dom.html

            lengthMenu: [5, 10, 25, 50],

            pageLength: 10,

            language: {
                'lengthMenu': 'Display _MENU_',
            },

            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url: url,
                type: 'POST'
            },
            columns: columns,
            "drawCallback": function(settings) {
                if($.isFunction($.fn.confirmation))
                {
                    $('[data-toggle="confirmation"]').confirmation();
                }
            },
            "columnDefs":[ {
                "targets": 'no-sort',
                "orderable": false,
            } ]


        });

        var filter = function() {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());
            table.column($(this).data('col-index')).search(val ? val : '', false, false).draw();
        };

        var asdasd = function(value, index) {
            var val = $.fn.dataTable.util.escapeRegex(value);
            table.column(index).search(val ? val : '', false, true);
        };

        $('#kt_search,.kt_search_'+id).on('click', function(e) {
            e.preventDefault();
            var params = {};
            var form = $(this).closest('form');
            var modal = form.data('modal');
            form.find('.kt-input').each(function() {
                var i = $(this).data('col-index');
                if (params[i]) {
                    params[i] += '|' + $(this).val();
                }
                else {
                    params[i] = $(this).val();
                }
            });
            if(modal != undefined){
                var tbl = $('#'+modal).DataTable();
                $.each(params, function(i, val) {
                    // apply search params to datatable
                    tbl.column(i).search(val ? val : '', false, false);
                });
                tbl.table().draw();
            }else{
                $.each(params, function(i, val) {
                    // apply search params to datatable
                    table.column(i).search(val ? val : '', false, false);
                });
                table.table().draw();
            }

        });

        $('#kt_reset,.kt_reset_'+id).on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            var modal = form.data('modal');
            if(modal != undefined){
                var tbl = $('#'+modal).DataTable();
                form.find('.kt-input').each(function() {
                    $(this).val('');
                    tbl.column($(this).data('col-index')).search('', false, false);
                });
                tbl.table().draw();
            }else{
                form.find('.kt-input').each(function() {
                    $(this).val('');
                    table.column($(this).data('col-index')).search('', false, false);
                });
                table.table().draw();
            }

        });


    };

    return {

        //main function to initiate the module
        init: function(id,url,column) {
            initTable1(id,url,column);
        },

    };

}();
