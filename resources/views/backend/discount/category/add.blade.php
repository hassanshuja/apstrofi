<div class="modal fade modal-data" id="add-category-discount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="formAdd" onsubmit="return false;"   role="form">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group kt-form__group">
                                <label for="code" class="form-control-label">Title (Eng):</label>
                                <input type="text" name="title" autocomplete="off" id="category_title" class="form-control" placeholder="Title">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group kt-form__group">
                                <label for="code" class="form-control-label">Title (Indo):</label>
                                <input type="text" name="title_l" autocomplete="off" id="category_title_l" class="form-control" placeholder="Title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3">Discount Period:</label>
                                <div class="col-sm-12">
                                    <div class="input-daterange input-group m_datepicker" >
                                        <input type="text" class="form-control" placeholder="Start Date" id="category_start_at" name="start_at" readonly />
                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="la la-ellipsis-h"></i>
                                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="End Date" id="category_end_at" name="end_at" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                    <div class="row">
                        <div id="kt_repeater_1">
                            <div class="form-group ">
                                <label class="col-lg-12 col-form-label">Select Category: <div data-repeater-create="" class="btn btn btn-sm btn-brand btn-pill">
															<span>
																<i class="la la-plus"></i>
																<span>Add</span>
															</span>
                                    </div></label>
                                <div class="kt-form__control">
                                    <div data-repeater-list="category" class="col-lg-12">
                                        <div data-repeater-item class="form-group row align-items-center">
                                            <div class="col-sm-5">
                                                <div class="kt-form__group--inline">
                                                    <div class="kt-form__label">
                                                        <label>Name:</label>
                                                    </div>
                                                    <div class="kt-form__control">
                                                        <select class="form-control"  name="category_id">
                                                            <option value="">Select Category</option>
                                                            @foreach($category as $key=>$val)
                                                                <option value="{!! $key !!}">{!! $val !!}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="d-md-none kt-margin-b-10"></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="kt-form__group--inline">
                                                    <div class="kt-form__label">
                                                        <label class="kt-label m-label--single">Min. Quantity:</label>
                                                    </div>
                                                    <div class="kt-form__control">
                                                        <input type="number" name="qty" value="1" class="form-control" placeholder="Min. Quantity">
                                                    </div>
                                                </div>
                                                <div class="d-md-none kt-margin-b-10"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div data-repeater-delete="" class="btn-sm btn btn-danger btn-pill">
																	<span>
																		<i class="la la-trash-o"></i>
																		<span>Delete</span>
																	</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group m-form__group">
                                <label for="category_id" class="form-control-label">Amount Type</label>
                                <select class="form-control" id="category_type" name="type">
                                    <option value="PERCENTAGE">Percentage</option>
                                    <option value="FIXED">Fixed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group kt-form__group">
                                <label for="name" class="form-control-label">Amount:</label>
                                <input type="text" name="amount" autocomplete="off" id="category_amount" class="form-control" placeholder="Amount">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group kt-form__group">
                                <label for="note" class="form-control-label">Description (Eng):</label>
                                <textarea  class="form-control" name="description" id="category_description"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group kt-form__group">
                                <label for="note" class="form-control-label">Description (Indo):</label>
                                <textarea  class="form-control" name="description_l" id="category_description_l"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group kt-form__group">
                                <label class="form-control-label">Offer Type</label>
                                <div class="kt-form__control">
                                    <select class="form-control" id="category_offer_type" name="offer_type">
                                        <option value="">Select Offer Type</option>
                                        <option value="0">Individual</option>
                                        <option value="1">Combo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-md-none kt-margin-b-10"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="m_form_submit">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>