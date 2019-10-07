<div class="modal fade modal-data" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-full" role="document">
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
                                <label for="name" class="form-control-label">Title (English):</label>
                                <input type="text" name="title" autocomplete="off" id="title" class="form-control" placeholder="Title">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group kt-form__group">
                                <label for="name_l" class="form-control-label">Title (Indonesia):</label>
                                <input type="text" name="title_l" autocomplete="off" id="title_l" class="form-control" placeholder="Title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group kt-form__group">
                                <label for="name" class="form-control-label">Sub Title (English):</label>
                                <input type="text" name="subtitle" autocomplete="off" id="subtitle" class="form-control" placeholder="SubTitle">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group kt-form__group">
                                <label for="name_l" class="form-control-label">Sub Title (Indonesia):</label>
                                <input type="text" name="subtitle_l" autocomplete="off" id="subtitle_l" class="form-control" placeholder="SubTitle">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group kt-form__group">
                                <label for="name" class="form-control-label">Author (English):</label>
                                <input type="text" name="author" autocomplete="off" id="author" class="form-control" placeholder="Author">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group kt-form__group">
                                <label for="name_l" class="form-control-label">Author (Indonesia):</label>
                                <input type="text" name="author_l" autocomplete="off" id="author_l" class="form-control" placeholder="Author">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Description (Eng)</label>
                                <textarea type="text" class="form-control summernote" name="description" id="description" placeholder="description"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Description (Indo)</label>
                                <textarea type="text" class="form-control summernote" name="description_l" id="description_l" placeholder="description_l"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="color" class="form-control-label">Related Product</label>
                                <select class="form-control m-select2" multiple id="product_id"  name="product_id[]">
                                    <option value="" disabled>Select Product</option>
                                    @foreach($products as $key=>$val)
                                        <option value="{!! $key !!}">{!! $val !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="color" class="form-control-label">Blog Category</label>
                                <select class="form-control m-select2" id="blog_category_id"  name="blog_category_id">
                                    <option value="" disabled>Select Category</option>
                                    @foreach($category as $key=>$val)
                                        <option value="{!! $key !!}">{!! $val !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group kt-form__group">
                                <label>Image:</label>
                                <input type="file" class=" image-upload" name="image[]" multiple data-theme="fas">
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
