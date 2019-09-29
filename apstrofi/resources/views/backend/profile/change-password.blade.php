<form class="kt-form" onsubmit="return false" action="{!! route('admin.change-password') !!}">
    <div class="kt-portlet__body">
        <div class="kt-section kt-section--first">
            <h3 class="kt-section__title">Enter New Password</h3>
            <div class="kt-section__body">
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Old Password:</label>
                    <div class="col-lg-6">
                        <input class="form-control" type="password" name="old_password" id="old_password"  placeholder="Enter Your Old Password">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">New Password:</label>
                    <div class="col-lg-6">
                        <input class="form-control " type="password" name="new_password" id="new_password" placeholder="Enter Your New Password">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Re-type New Password:</label>
                    <div class="col-lg-6">
                        <input class="form-control " type="password" name="confirm_password" id="confirm_password" placeholder="Re-type New Password">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="kt-portlet__foot">
        <div class="kt-form__actions">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <button type="reset" class="btn btn-success form_submit">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>