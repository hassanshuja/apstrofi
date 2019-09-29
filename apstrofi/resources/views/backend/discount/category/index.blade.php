@include('backend.discount.category.add')
<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
            <h3 class="kt-portlet__head-title">
                Category Discount
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">
                    <a href="javascript:void(0)" id="open-search-form" class="btn btn-default btn-icon-sm">
                        <i class="la la-search"></i>
                        Search
                    </a>
                    <a href="javascript:void(0)" data-type="add" data-action="{!! route('admin.discount-category.add') !!}" data-toggle="modal" data-target="#add-category-discount" class="btn btn btn-success btn-icon-sm">
                        <i class="la la-plus"></i>
                        Add Discount
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="kt-portlet__body">
        <!--begin: Search Form -->
        <form class="kt-form kt-form--fit kt-margin-b-20 search-table-form" data-modal="kt_table_2">
            <div class="row kt-margin-b-20">
                <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                    <label>Title:</label>
                    <input type="text" class="form-control kt-input" placeholder="E.g: abc" data-col-index="0">
                </div>
                <div class="col-lg-3 m--margin-bottom-10-tablet-and-mobile">
                    <label>Order Date:</label>
                    <input type="text" class="form-control kt-input" name="datefilter" value="" placeholder="Enter Date" data-col-index="1">
                </div>
                <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                    <label>Status:</label>
                    <select class="form-control kt-input" data-col-index="5">
                        <option value="">Select</option>
                        <option value="1">Active</option>
                        <option value="0">InActive</option>
                    </select>
                </div>
            </div>
            <div class="kt-separator kt-separator--md kt-separator--dashed"></div>
            <div class="row">
                <div class="col-lg-12">
                    <button class="btn btn-primary btn-brand--icon kt_search_kt_table_3" >
													<span>
														<i class="la la-search"></i>
														<span>Search</span>
													</span>
                    </button>
                    &nbsp;&nbsp;
                    <button class="btn btn-secondary btn-secondary--icon kt_reset_kt_table_3">
													<span>
														<i class="la la-close"></i>
														<span>Reset</span>
													</span>
                    </button>
                </div>
            </div>
        </form>

        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_2">
            <thead>
            <tr>
                <th>Title </th>
                <th>Offer Period </th>
                <th class="no-sort">Type </th>
                <th class="no-sort">Amount </th>
                <th class="no-sort">Offer Type </th>
                <th> Status </th>
                <th class="no-sort"> Actions </th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Title </th>
                <th>Offer Period </th>
                <th>Type </th>
                <th>Amount </th>
                <th>Offer Type </th>
                <th> Status </th>
                <th class="no-sort"> Actions </th>
            </tr>
            </tfoot>
        </table>

        <!--end: Datatable -->
    </div>
</div>