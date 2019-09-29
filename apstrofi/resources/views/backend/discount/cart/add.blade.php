<div class="modal fade modal-data" id="add-cart-discount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="text" name="title" autocomplete="off" id="cart_title" class="form-control" placeholder="Title">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group kt-form__group">
                                <label for="code" class="form-control-label">Title (Indo):</label>
                                <input type="text" name="title_l" autocomplete="off" id="cart_title_l" class="form-control" placeholder="Title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3">Discount Period:</label>
                                <div class="col-sm-12">
                                    <div class="input-daterange input-group m_datepicker" >
                                        <input type="text" class="form-control" placeholder="Start Date" id="cart_start_at" name="start_at" readonly />
                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="la la-ellipsis-h"></i>
                                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="End Date" id="cart_end_at" name="end_at" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group m-form__group">
                                <label for="category_id" class="form-control-label">Amount Type</label>
                                <select class="form-control" id="cart_type" name="type">
                                    <option value="PERCENTAGE">Percentage</option>
                                    <option value="FIXED">Fixed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group kt-form__group">
                                <label for="name" class="form-control-label">Amount:</label>
                                <input type="text" name="amount" autocomplete="off" id="cart_amount" class="form-control" placeholder="Amount">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group kt-form__group">
                                <label for="name" class="form-control-label">Max Discount Amount:</label>
                                <input type="text" name="max_discount_amount" autocomplete="off" id="cart_max_discount_amount" class="form-control" placeholder="Max Discount price">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group kt-form__group">
                                <label for="name" class="form-control-label">Minimum Order Amount:</label>
                                <input type="text" name="min_order_amount" autocomplete="off" id="cart_min_order_amount" class="form-control" placeholder="Minimum Order Amount">
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group kt-form__group">
                                    <label for="note" class="form-control-label">Description (Eng):</label>
                                    <textarea  class="form-control" name="description" id="cart_description"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group kt-form__group">
                                    <label for="note" class="form-control-label">Description (Indo):</label>
                                    <textarea  class="form-control" name="description_l" id="cart_description_l"></textarea>
                                </div>
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