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
                        <div class="col-sm-4">
                            <div class="form-group kt-form__group">
                                <label for="name" class="form-control-label">Name:</label>
                                <input type="text" name="name" autocomplete="off" id="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group kt-form__group">
                                <label for="name" class="form-control-label">Phone:</label>
                                <input type="text" name="phone" autocomplete="off" id="phone" class="form-control" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group kt-form__group">
                                <label for="name" class="form-control-label">Designation:</label>
                                <input type="text" name="designation" autocomplete="off" id="designation" class="form-control" placeholder="Designation">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group kt-form__group">
                                <label for="email" class="form-control-label">Email:</label>
                                <input type="email" name="email" autocomplete="off" id="email" class="form-control" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group kt-form__group">
                                <label for="password" class="form-control-label">Password:</label>
                                <input type="password" name="password" autocomplete="off" id="password" class="form-control" placeholder="Password">
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