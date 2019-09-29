<form class="kt-form" onsubmit="return false" action="{!! route('admin.change-user-info') !!}">
    <div class="kt-portlet__body">
        <div class="kt-section kt-section--first">
            <h3 class="kt-section__title">Personal Details</h3>
            <div class="kt-section__body">
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Full Name:</label>
                    <div class="col-lg-6">
                        <input class="form-control " type="text" name="name" value="{!! auth()->guard('admin')->user()->name !!}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Email address:</label>
                    <div class="col-lg-6">
                        <input class="form-control m-input" type="text" name="email" value="{!! auth()->guard('admin')->user()->email !!}">
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