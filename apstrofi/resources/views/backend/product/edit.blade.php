@extends('backend.layout.master')
@include('backend.product.css',['type'=>'edit'])
@section('content')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Edit Product</h3>
        </div>
        <div class="kt-subheader__toolbar">
            <div class="kt-subheader__wrapper">
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <a href="{!! route('admin.product.index') !!}" class="btn btn-clean btn-icon-sm">
                                <i class="la la-long-arrow-left"></i>
                                Back To Listing
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">

            <!--begin::Portlet-->
            <form class="kt-form formAdd" onsubmit="return false;" data-type="edit" action="{!! route('admin.product.update',$product['id']) !!}" method="post" id="kt_form">
            <input type="hidden" id="product_id" name="product_id" value="{{$product['id']}}">
                <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {!! @$product['name'] ?: 'Edit Product' !!}
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">
                                <button type="submit" id="edit_product_submit" class="btn btn-brand btn-elevate btn-icon-sm">
                                    <i class="fa fa-check"></i>
                                   Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <ul class="nav nav-tabs nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#kt_tabs_2_1">General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_tabs_2_2">Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_tabs_2_3">Images</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_tabs_2_4">Meta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_tabs_2_5">Offers</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_tabs_2_1" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Name (Eng)</label>
                                        <input type="text" class="form-control" id="name"  name="name" value="{!! @$product['name'] !!}" placeholder="Product Name">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Name (Indo)</label>
                                        <input type="text" class="form-control" id="name_l" name="name_l" value="{!! @$product['name_l'] !!}" placeholder="Product Name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group kt-form__group">
                                        <label for="category_id" class="form-control-label">Select Category</label>
                                        <select class="form-control m-select2" id="category_id"  name="category_id">
                                            <option value="0">Select Category</option>
                                            @foreach($subcategory as $key=>$val)
                                                <option value="{!! $val['value'] !!}"  @if($product['category_id'] == $val['value']) selected @endif>{!! $val['text'] !!}</option>
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
                                        <select class="form-control"  id="attribute_value_color_id"  name="attribute_value_color_id">
                                            <option value="0">Select Colors</option>
                                            @foreach($colors as $key=>$v)
                                                <option value="{!! $key !!}" @if($product['attribute_value_color_id'] == $key) selected @endif>{!! $v !!}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="kt-form__group--inline">
                                        <label class="form-control-label">Price:</label>
                                        <div class="kt-form__control">
                                            <input type="text" class="form-control" id="price" name="price" value="{!! @$product['price'] !!}" placeholder="Price">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group kt-form__group">
                                        <div class="kt-form__label">
                                            <label class="kt-label m-label--single">SKU:</label>
                                        </div>
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
                                            <option value="1" @if(@$product['stock_availability'] == 1) selected @endif>Yes</option>
                                            <option value="0" @if(@$product['stock_availability'] == 0) selected @endif>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Product Weight</label>
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
                                            <option value="TOPS" @if(@$product['sizing_type'] == 'TOPS') selected @endif>TOPS</option>
                                            <option value="BOTTOM" @if(@$product['sizing_type'] == 'BOTTOM') selected @endif>BOTTOM</option>
                                            <option value="SHOES" @if(@$product['sizing_type'] == 'SHOES') selected @endif>SHOES</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group kt-form__group">
                                        <label class="form-control-label">Add Sizes: </label>
                                        <button class="btn btn-success" data-toggle="collapse" data-target="#demo">Add</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="alert alert-danger d-none" id="size_error"></div>
                            </div>
                            <div id="demo" class="row collapse" style="border:1px dashed #ccc; margin:10px 0px; padding: 10px 0px">
                                <div class="col-sm-3">
                                    <div class="form-group kt-form__group">
                                        <label class="form-control-label">Size:</label>
                                        <select class="form-control"  id="attribute_value_size_id"  name="attribute_value_size_id">
                                            <option value="">Select Size</option>
                                            @foreach($sizes as $key=>$v)
                                                <option value="{!! $key !!}" @if($product['attribute_value_size_id'] == $key) selected @endif>{!! $v !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group kt-form__group">
                                        <label class="form-control-label">Minimum Size :</label>
                                        <div class="kt-form__control">
                                            <input type="text" class="form-control" ID="min_size" name="min_size" value=""/>
                                        </div>
                                    </div>  
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group kt-form__group">
                                        <label class="form-control-label">Maximum Size :</label>
                                        <div class="kt-form__control">
                                            <input type="text" class="form-control" name="max_size" id="max_size" value=""/>
                                        </div>
                                    </div>  
                                </div>

                                <div class="col-sm-2">
                                    <div class="form-group kt-form__group">
                                        <label class="form-control-label">Quantity :</label>
                                        <div class="kt-form__control">
                                            <input type="text" class="form-control" name="quantity" id="quantity" value=""/>
                                        </div>
                                    </div>  
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group kt-form__group">
                                        <label class="form-control-label">Add :</label>
                                        <div class="kt-form__control">
                                            <button class="btn btn-danger" id="add_sizes">Add Size</button>
                                        </div>
                                    </div>  
                                </div>
                            </div>

                            <div class="row table-responsive" style="border:1px solid #ccc; margin:10px 0px; padding: 10px 0px">
                                <table class="table">
                                    <thead>
                                        <th>Size</th>
                                        <th>Min Size:</th>
                                        <th>Max Size</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody id="res_size">
                                    @if(count($sized) > 0)
                                        @foreach($sized as $sizes)
                                        <tr>
                                        <td>{{$sizes->name}}</td>
                                        <td>{{$sizes->min_size}}</td>
                                        <td>{{$sizes->max_size}}</td>
                                        <td>{{$sizes->qty}}</td>
                                        <td><button class="btn btn-warning"  onclick="deletesize({{$sizes->id}})">Delete</button></td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr><td colspan="5"> No Result Found</td></tr>
                                    @endif
                                </tbody>
                                </table>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="color" class="form-control-label">Tags</label>
                                        <select class="form-control m-select2" multiple id="tag_id"  name="tag_id[]">
                                            <option value="NONE">Select Tag</option>
                                            @foreach($tags as $key=>$val)
                                                <option value="{!! $key !!}" @if(isset($product['tag_id']) && in_array($key,$product['tag_id'])) selected @endif>{!! $val !!}</option>
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
                                            {{--<label class="kt-checkbox">
                                                Product Status
                                                <span></span>
                                            </label>--}}


                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label"> Product Status</label>
                                <div class="col-10 form-group">
                                    <label><span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success"><input type="checkbox" name="status" @if(@$product['status'] == 1) checked @endif value="{!! $product['status'] !!}">  <span></span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Model Name</label>
                                        <input type="text" class="form-control" value="{!! $product['modal'] !!}" id="modal" name="modal" placeholder="Model Name" >
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
                        </div>
                        <div class="tab-pane" id="kt_tabs_2_2" role="tabpanel">
                            @include('backend.product.detail-form')
                        </div>
                        <div class="tab-pane" id="kt_tabs_2_3" role="tabpanel">
                            @include('backend.product.image-form')
                            <div class="kt-section">
                                <div class="kt-section__content">
                                    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Images</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="kt_tabs_2_4" role="tabpanel">
                            @include('backend.product.meta-form')
                        </div>
                        <div class="tab-pane" id="kt_tabs_2_5" role="tabpanel">
                            @include('backend.product.offer')
                        </div>
                    </div>
                </div>
            </div>
                <input name="_method" value="PUT" type="hidden">
            </form>

            <!--end::Portlet-->
        </div>
    </div>
@endsection
@include('backend.product.js',['type'=>'edit'])