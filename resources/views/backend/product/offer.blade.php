<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">
                    <a href="javascript:void(0)" data-type="add" data-action="{!! route('admin.category.add') !!}" data-toggle="modal" data-target="#add" class="btn btn btn-success btn-icon-sm">
                        <i class="la la-plus"></i>
                        Add Discount
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="kt-portlet__body">

        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
            <thead>
            <tr>
                <th>Offer Name </th>
                <th>Quantity </th>
                <th>Start Date </th>
                <th>End Date </th>
                <th> Status </th>
                <th class="no-sort"> Actions </th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Offer Name </th>
                <th>Quantity </th>
                <th>Start Date </th>
                <th>End Date </th>
                <th> Status </th>
                <th class="no-sort"> Actions </th>
            </tr>
            </tfoot>
        </table>

        <!--end: Datatable -->
    </div>
</div>