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
                        <label for="name" class="form-control-label">Name (English):</label>
                        <input type="text" name="name" autocomplete="off" id="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group kt-form__group">
                        <label for="name_l" class="form-control-label">Name (Indonesia):</label>
                        <input type="text" name="name_l" autocomplete="off" id="name_l" class="form-control" placeholder="Name">
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