<div id="kt_repeater_1">
    <div class="form-group  row" id="kt_repeater_1">
        <div data-repeater-list="" class="col-lg-12">
            <div data-repeater-item class="form-group row align-items-center">
                <div class="col-md-2">
                    <div class="kt-form__group--inline">
                        <div class="kt-form__label">
                            <label>Color:</label>
                        </div>
                        <div class="kt-form__control">
                            <select class="form-control  m-select2"  id="attribute_value_id"  name="attribute_value_id">
                                <option value="">Select Colors</option>
                                @foreach($colors as $key=>$val)
                                    <option value="{!! $key !!}" @if(isset($product['attribute_value_id']) && in_array($key,$product['attribute_value_id'])) selected @endif>{!! $val !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="col-md-2">
                    <div class="kt-form__group--inline">
                        <div class="kt-form__label">
                            <label class="kt-label m-label--single">Price:</label>
                        </div>
                        <div class="kt-form__control">
                            <input type="text" class="form-control" id="price" name="price" value="{!! @$product['price'] !!}" placeholder="Price">
                        </div>
                    </div>

                </div>
                <div class="col-md-2">
                    <div class="kt-form__group--inline">
                        <div class="kt-form__label">
                            <label class="kt-label m-label--single">SKU:</label>
                        </div>
                        <div class="kt-form__control">
                            <input type="text" class="form-control" id="sku" name="sku" value="{!! @$product['sku'] !!}" placeholder="Stock-keeping unit">
                        </div>
                    </div>

                </div>

                <div class="col-md-2">
                    <div data-repeater-delete="" class="btn-sm btn btn-danger btn-pill">
																	<span>
																		<i class="la la-trash-o"></i>
																		<span>Delete</span>
																	</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-2 col-form-label"></label>
        <div class="col-lg-4">
            <div data-repeater-create="" class="btn btn btn-sm btn-brand btn-pill">
															<span>
																<i class="la la-plus"></i>
																<span>Add</span>
															</span>
            </div>
        </div>
    </div>
</div>