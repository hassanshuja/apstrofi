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
                        <label for="title" class="form-control-label">Title (English):</label>
                        <input type="text" name="title" autocomplete="off" id="title" class="form-control" placeholder="Title">
                    </div>
                    <div class="form-group kt-form__group">
                        <label for="title_l" class="form-control-label">Title (Indonesia):</label>
                        <input type="text" name="title_l" autocomplete="off" id="title_l" class="form-control" placeholder="Title">
                    </div>
                    <div class="kt-form__group--inline">
                        <div class="kt-form__label">
                            <label class="kt-label m-label--single">Preview Image:</label>
                        </div>
                        <div class="kt-form__control">
                            <input type="file" name="image" class="form-control m-input image-upload1"   accept="image/*">
                            <div class="image-preview" style="display: none">
                                <img class="preview" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Optional</label>
                        <div class="col-10">
                            <div class="form-group">
                                <div class="kt-checkbox-inline">
                                    <label class="kt-checkbox">
                                        <input type="checkbox" name="is_home_style"  value="1">Is Home Style?
                                        <span></span>
                                    </label>
                                </div>
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