<div class="row">
    <div class="col-xl-12">
        <div class="form-group">
            <label>Meta Title</label>
            <input type="text" class="form-control" value="{!! @$product['meta_title'] !!}" name="meta_title" placeholder="Meta Title" >
            <span class="form-text text-muted">max 100 chars</span>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="form-group">
            <label>Meta Keywords</label>
            <textarea type="text" class="form-control" name="meta_keywords" placeholder="Meta keywords">{!! @$product['meta_keywords'] !!}</textarea>
            <span class="form-text text-muted">max 1000 chars</span>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="form-group">
            <label>Meta Description</label>
            <textarea type="text" class="form-control" name="meta_description" placeholder="Meta Description">{!! @$product['meta_description'] !!}</textarea>
            <span class="form-text text-muted">max 1000 chars</span>
        </div>
    </div>
</div>