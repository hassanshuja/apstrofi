<div class="modal fade modal-data" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <div class="form-group kt-form__group">
                        <label for="code" class="form-control-label">Promo Code:</label>
                        <input type="text" name="code" autocomplete="off" id="code" class="form-control" placeholder="Promo Code">
                    </div>
                    <div class="form-group m-form__group">
                        <label for="category_id" class="form-control-label">Amount Type</label>
                        <select class="form-control" id="type" name="type">
                            <option value="FIXED">Fixed</option>
                            <option value="PERCENTAGE">Percentage</option>
                        </select>
                    </div>
                    <div class="form-group kt-form__group">
                        <label for="name" class="form-control-label">Amount:</label>
                        <input type="text" name="value" autocomplete="off" id="value" class="form-control" placeholder="Amount">
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Offer Period:</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="input-daterange input-group" id="m_datepicker_5">
                                <input type="text" class="form-control" placeholder="Start Date" id="start_at" name="start_at" readonly />
                                <div class="input-group-append">
													<span class="input-group-text">
														<i class="la la-ellipsis-h"></i>
													</span>
                                </div>
                                <input type="text" class="form-control" placeholder="End Date" id="end_at" name="end_at" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group kt-form__group">
                        <label for="note" class="form-control-label">Description:</label>
                        <textarea  class="form-control" name="description" id="description"></textarea>
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