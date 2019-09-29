"use strict";
var Rowreorder = function() {

    var initTable1 = function(datable_id,url,column) {
        var table = $('#'+datable_id);
        var columns = [];
        $.each(column,function (key,val) {
            columns.push({data:val});
        });
        // begin first table
        table.DataTable({
            ajax: {
                url: url
            },
            'serverSide': true,
            columns: columns,
            responsive: true,
            "paging":   false,
            "searching": false,
            rowReorder: {
                'selector': 'tr',
                dataSrc: 'order'
            }

        });
        table.on( 'row-reorder', function ( e, diff, edit )
        {
            alert('zxcv');
            var result;
            var sendloop = [];

            for ( var i=0, ien=diff.length ; i<ien ; i++ )
            {
                var rowData = oTable.row( diff[i].node ).data();
                result = ''+diff[i].newData+','+diff[i].oldData+'';
                sendloop.push(result);
            }

            var jsonString = JSON.stringify(sendloop);

            $.ajax({
                type: "GET",
                url: "/dealboxx/ohs/admin/sort",
                data: {data : jsonString},
                cache: false
            });
        });

    };

    return {

        //main function to initiate the module
        init: function(datable_id,url,column) {
            initTable1(datable_id,url,column);
        },

    };

}();
