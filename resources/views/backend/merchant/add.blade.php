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
                    <div class="row">
                        <div class="form-group kt-form__group col-lg-6">
                            <label for="code" class="form-control-label">Name:</label>
                            <input type="text" name="name" autocomplete="off" id="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group kt-form__group col-lg-6">
                            <label for="name" class="form-control-label">Email:</label>
                            <input type="text" name="email" autocomplete="off" id="email" class="form-control" placeholder="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group kt-form__group col-lg-6">
                            <label for="name_l" class="form-control-label">Password:</label>
                            <input type="password" name="password" autocomplete="off" id="password" class="form-control" placeholder="password">
                        </div>
                        <div class="form-group kt-form__group col-lg-6">
                            <label for="name_l" class="form-control-label">Phone Number:</label>
                            <input type="text" name="phone" autocomplete="off" id="phone" class="form-control" placeholder="phone">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group m-form__group col-lg-6">
                            <label for="category_id" class="form-control-label">Province</label>
                            <select class="form-control" id="province_id" name="province_id">
                                <option value="">Select Province</option>
                            </select>
                            <input type="hidden" name="province" id="province">
                        </div>
                        <div class="form-group m-form__group col-lg-6">
                            <label for="category_id" class="form-control-label">City</label>
                            <select class="form-control" id="city_id" name="city_id">
                                <option value="">Select City</option>
                            </select>
                            <input type="hidden" name="city" id="city">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group m-form__group col-lg-6">
                            <label for="category_id" class="form-control-label">Suburb</label>
                            <select class="form-control" id="suburb_id" name="suburb_id">
                                <option value="">Select Suburb</option>
                            </select>
                            <input type="hidden" name="suburb" id="suburb">
                        </div>
                        <div class="form-group m-form__group col-lg-6">
                            <label for="category_id" class="form-control-label">Area</label>
                            <select class="form-control" id="area_id" name="area_id">
                                <option value="">Select Area</option>
                            </select>
                            <input type="hidden" name="area" id="area">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group kt-form__group col-lg-6">
                            <label for="name_l" class="form-control-label">Zip Code:</label>
                            <input type="text" name="zip_code" autocomplete="off" id="zip_code" readonly class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group kt-form__group col-lg-6">
                            <label for="note" class="form-control-label">Address:</label>
                            <textarea  class="form-control" name="address" id="address"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        {{--<div class="form-group kt-form__group col-lg-6">
                            <label>Image:</label>
                            <input type="file" class=" image-upload" name="image" data-theme="fas">
                        </div>--}}
                        <div class="form-group kt-form__group col-lg-6">
                            <label for="note" class="form-control-label">Notes:</label>
                            <textarea  class="form-control" name="notes" id="notes"></textarea>
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