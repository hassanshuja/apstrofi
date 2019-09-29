 <div class="row">
    <div class="col-sm-3">
        <div class="form-group kt-form__group">
            <label>Product Name (Eng)</label>
            <input type="text" class="form-control" id="name" data-rule-required="true"  name="name" value="{!! @$product['name'] !!}" placeholder="Product Name">
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group kt-form__group">
            <label>Product Name (Indo)</label>
            <input type="text" class="form-control" id="name_l" name="name_l" value="{!! @$product['name_l'] !!}" placeholder="Product Name">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group kt-form__group">
            <label for="category_id" class="form-control-label">Select Category</label>
            <select class="form-control m-select2" id="category_id"  name="category_id">
                <option value="0">Select Category</option>
                @foreach($subcategory as $key=>$val)
                    <option value="{!! $val['value'] !!}" >{!! $val['text'] !!}</option>
                @endforeach
            </select>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-sm-3">
        <div class="form-group kt-form__group">
            <label for="category_id" class="form-control-label">Select Brand</label>
            <select class="form-control m-select2" id="brand_id"  name="brand_id">
                <option value="0">Select Brand</option>
                @foreach($brand as $key=>$val)
                    <option value="{!! $key !!}" @if(@$product['brand_id'] == $key) selected @endif>{!! $val !!}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group kt-form__group">
            <label class="form-control-label">Color:</label>
            <div class="kt-form__control">
                <select class="form-control"  id="attribute_value_color_id"  name="attribute_value_color_id">
                    <option value="0">Select Colors</option>
                    @foreach($colors as $key=>$val)
                        <option value="{!! $key !!}" @if(isset($product['attribute_value_color_id']) && in_array($key,$product['attribute_value_color_id'])) selected @endif>{!! $val !!}</option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>
    <div class="col-sm-3">
        <div class="form-group kt-form__group">
            <label class="form-control-label">Price:</label>
            <div class="kt-form__control">
                <input type="text" class="form-control" id="price" name="price" value="{!! @$product['price'] !!}" placeholder="Price">
            </div>
        </div>

    </div>
    <div class="col-sm-3">
        <div class="form-group kt-form__group">
            <label class="form-control-label">SKU:</label>
            <div class="kt-form__control">
                <input type="text" class="form-control" id="sku" name="sku" value="{!! @$product['sku'] !!}" placeholder="Stock-keeping unit">
            </div>
        </div>

    </div>

</div>

<div class="row">
    <div class="col-sm-3">
        <div class="form-group kt-form__group">
            <label for="stock_availability" class="form-control-label">Stock Availability</label>
            <select class="form-control" id="stock_availability"   name="stock_availability">
                <option value="1" @if(@$product['qty'] == 1) selected @endif>Yes</option>
                <option value="0" @if(@$product['qty'] == 0) selected @endif>No</option>
            </select>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label class="form-control-label">Product Weight</label>
            <input type="number" class="form-control" value="{!! @$product['weight'] !!}" name="weight" placeholder="Product Weight" >
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="color" class="form-control-label">Sizing Gender</label>
            <select class="form-control" id="sizing_gender"  name="sizing_gender">
                <option value="NONE">Select Gender</option>
                <option value="MEN" @if(@$product['sizing_gender'] == 'MEN') selected @endif>MEN</option>
                <option value="WOMEN" @if(@$product['sizing_gender'] == 'WOMEN') selected @endif>WOMEN</option>
            </select>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="color" class="form-control-label">Sizing Type</label>
            <select class="form-control" id="sizing_type"  name="sizing_type">
                <option value="NONE">Select Sizing Type</option>
                <option value="TOPS" @if(@$product['sizing_gender'] == 'MEN') selected @endif>TOPS</option>
                <option value="BOTTOM" @if(@$product['sizing_gender'] == 'WOMEN') selected @endif>BOTTOM</option>
                <option value="SHOES" @if(@$product['sizing_gender'] == 'WOMEN') selected @endif>SHOES</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="color" class="form-control-label">Tags</label>
            <select class="form-control m-select2" multiple id="tag_id"  name="tag_id[]">
                <option value="NONE">Select Tag</option>
                @foreach($tags as $key=>$val)
                    <option value="{!! $key !!}">{!! $val !!}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class="col-2 col-form-label">Other Details</label>
    <div class="col-10">
        <div class="form-group">
            <div class="kt-checkbox-inline">
                <label class="kt-checkbox">
                    <input type="checkbox" name="is_featured" @if(@$product['is_featured'] == 1) checked @endif value="1">Featured
                    <span></span>
                </label>
                <label class="kt-checkbox">
                    <input type="checkbox" name="is_new_arrival" @if(@$product['is_new_arrival'] == 1) checked @endif value="1">New Arrival
                    <span></span>
                </label>
                <label class="kt-checkbox">
                    <input type="checkbox" name="is_sustainable" @if(@$product['is_sustainable'] == 1) checked @endif value="1">Sustainable products
                    <span></span>
                </label>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="form-control-label">Model Name</label>
            <input type="text" class="form-control" value="" id="modal" name="modal" placeholder="Model Name" >
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="color" class="form-control-label">Product Grouping</label>
            <select class="form-control m-select2"  id="product_group"  name="product_group">
                <option value="">Select Product</option>
                @foreach($products as $key=>$val)
                    <option value="{!! $val !!}">{!! $val !!}</option>
                @endforeach
            </select>
        </div>
    </div>

</div>