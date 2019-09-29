<div class="row">
    <div class="col-xl-6">
        <div class="form-group">
            <label>Description (Eng)</label>
            <textarea type="text" class="form-control summernote" name="description" placeholder="description">{!! @$product['description'] !!}</textarea>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="form-group">
            <label>Description (Indo)</label>
            <textarea type="text" class="form-control summernote" name="description_l" placeholder="description_l">{!! @$product['description_l'] !!}</textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="form-group">
            <label>Details & Sizing (Eng)</label>
            <textarea type="text" class="form-control summernote" name="sizing_detail" placeholder="Details & Sizing">{!! @$product['sizing_detail'] !!}</textarea>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="form-group">
            <label>Details & Sizing (Indo)</label>
            <textarea type="text" class="form-control summernote" name="sizing_detail_l" placeholder="Details & Sizing">{!! @$product['sizing_detail_l'] !!}</textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="form-group">
            <label>Shipping & Returns (Eng)</label>
            <textarea type="text" class="form-control summernote" name="shipping_return_detail" placeholder="Shipping & Returns">{!! @$product['shipping_return_detail'] !!}</textarea>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="form-group">
            <label>Shipping & Returns (Indo)</label>
            <textarea type="text" class="form-control summernote" name="shipping_return_detail_l" placeholder="Shipping & Returns">{!! @$product['shipping_return_detail_l'] !!}</textarea>
        </div>
    </div>
</div>