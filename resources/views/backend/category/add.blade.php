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
                        <div class="col-sm-12">
                            <div class="form-group kt-form__group">
                                <label for="code" class="form-control-label">Slug:</label>
                                <input type="text" name="slug" autocomplete="off" id="slug" class="form-control" placeholder="Slug">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group kt-form__group">
                                <label for="name" class="form-control-label">Title (English):</label>
                                <input type="text" name="name" autocomplete="off" id="name" class="form-control" placeholder="Title">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group kt-form__group">
                                <label for="name_l" class="form-control-label">Title (Indonesia):</label>
                                <input type="text" name="name_l" autocomplete="off" id="name_l" class="form-control" placeholder="Title">
                            </div>
                        </div>
                    </div>
                   {{-- <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group kt-form__group">
                                <label for="note" class="form-control-label">Description (English):</label>
                                <textarea  class="form-control" name="description" id="description"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group kt-form__group">
                                <label for="note" class="form-control-label">Description (Indonesia):</label>
                                <textarea  class="form-control" name="description_l" id="description_l"></textarea>
                            </div>
                        </div>
                    </div>--}}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group m-form__group">
                                <label for="category_id" class="form-control-label">Gender</label>
                                <select class="form-control m-select2" id="shop_id" name="shop_id[]" multiple="multiple">
                                    @foreach($shop as $key=>$val)
                                        <option value="{!! $key !!}">{!! $val !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{--<div class="col-sm-6">
                            <div class="form-group kt-form__group">
                                <label>Image:</label>
                                <input type="file" class=" image-upload" name="image" data-theme="fas">
                            </div>
                        </div>--}}
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