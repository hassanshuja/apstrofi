<div class="row products-list">
    @foreach($data as $key=>$val)
        <div class="col-xl-2 col-md-3 col-sm-4">
            <div class="card-container">
                <div class="card">
                    <div class="front">
                        <div class="cover">
                            <img src="{!! asset('backend/assets/vendors/general/card/images/rotating_card_thumb.jpg') !!}"/>
                        </div>
                        <div class="user">
                            <img class="img-circle" src="{!! url($val['preview_url']) !!}"/>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h3 class="name">{!! $val['name'] !!}</h3>
                                <strong class="d-inline-block mb-2 text-primary">Brand : {!! $val['product_brand']['name'] !!}</strong><br/>

                                <strong class="d-inline-block mb-2 text-primary">Category : {!! $val['product_categories']['name'] !!}</strong><br/>
                                <strong class="d-inline-block mb-2 text-primary">Status : {!! $val['status'] ? '<span class="kt-font-success">Active </span>' : '<span class="kt-font-danger kt-font-bold">Inactive </span>' !!}</strong><br/>
                                <strong class="d-inline-block mb-2 text-primary">Price : {!! $val['price'] !!}</strong><br/>
                                <strong class="d-inline-block mb-2 text-primary">SKU : {!! $val['sku'] !!}</strong>
                            </div>
                            <div class="footer">
                                <div class="rating" onclick="rotateCard(this)">
                                    <i class="fa fa-mail-forward"></i> See Detail
                                </div>
                            </div>
                        </div>
                    </div> <!-- end front panel -->
                    <div class="back">
                        {{--<div class="header">
                            <h5 class="motto">"To be or not to be, this is my awesome motto!"</h5>
                        </div>--}}
                        <div class="content">
                            {{--<div class="main">
                                <h4 class="text-center">Description</h4>
                                <p class="text-center">{!! $val['description'] !!}</p>

                                <div class="stats-container">
                                    <div class="stats">
                                        <h4>235</h4>
                                        <p>
                                            Followers
                                        </p>
                                    </div>
                                    <div class="stats">
                                        <h4>114</h4>
                                        <p>
                                            Following
                                        </p>
                                    </div>
                                    <div class="stats">
                                        <h4>35</h4>
                                        <p>
                                            Projects
                                        </p>
                                    </div>
                                </div>

                            </div>--}}
                        </div>
                        <div class="footer">
                            <div class="social-links text-center">
                                <a href="{!! route('admin.product.edit',$val['id']) !!}" class="btn btn-success btn-sm">
                                    Edit
                                </a>
                                <a href="javascript:void(0)" data-toggle="confirmation"
                                   data-placement="top"  data-title="delete"  class="delete-product btn btn-danger btn-sm" data-modal="#kt_table_1" data-key="{!! $val['id'] !!}" data-action="{!! route('admin.product.delete',$val['id']) !!}" >
                                    Delete
                                </a>
                            </div>
                        </div>
                    </div> <!-- end back panel -->
                </div> <!-- end card -->
            </div> <!-- end card-container -->
        </div>


    @endforeach
</div>

{!! $data->render() !!}