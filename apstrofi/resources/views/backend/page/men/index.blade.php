@extends('backend.layout.master')
@include('backend.page.men.css')
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon kt-hidden">
											<i class="la la-gear"></i>
										</span>
                <h3 class="kt-portlet__head-title">
                    {!! $page_title !!}
                </h3>
            </div>
        </div>
        <div class="alert alert-success alert-dismissible success" style="display:none">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Product Successfully Added!!.
        </div>
        <!--begin::Form-->
        <div class="row">
            <div class="col-lg-6">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
												<span class="kt-portlet__head-icon kt-hidden">
													<i class="la la-gear"></i>
												</span>
                            <h3 class="kt-portlet__head-title">
                                Form 1
                            </h3>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form" onsubmit="return false" id="section_1_form" action="{!! route('admin.page.men.store-section1') !!}">
                        <div class="kt-portlet__body">
                            <div class="kt-form__section kt-form__section--first">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group kt-form__group">
                                            <label for="code" class="form-control-label">Banner Text (Eng):</label>
                                            <input type="text" name="section_1[banner_text]" value="{!! @$page['section_1']['banner_text'] !!}" id="section_1_banner_text" class="form-control" placeholder="Banner Text">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group kt-form__group">
                                            <label for="code" class="form-control-label">Banner Text (Ind):</label>
                                            <input type="text" name="section_1[banner_text_l]" value="{!! @$page['section_1']['banner_text_l'] !!}" id="section_1_banner_text_l" class="form-control" placeholder="Banner Text">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group kt-form__group">
                                            <label for="code" class="form-control-label">Button Text (Eng):</label>
                                            <input type="text" name="section_1[button_text]" value="{!! @$page['section_1']['button_text'] !!}" id="section_1_button_text" class="form-control" placeholder="Button Text">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group kt-form__group">
                                            <label for="code" class="form-control-label">Button Text (Ind):</label>
                                            <input type="text" name="section_1[button_text_l]" value="{!! @$page['section_1']['button_text_l'] !!}" id="section_1_button_text_l" class="form-control" placeholder="Button Text">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group kt-form__group">
                                            <label for="code" class="form-control-label">Button Color:</label>
                                            <input type="text" name="section_1[button_color]" value="{!!@$page['section_1']['button_color'] !!}" id="section_1_button_color" class="form-control" placeholder="#3d3d3d">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group kt-form__group">
                                            <label for="code" class="form-control-label">Link:</label>
                                            <input type="text" name="section_1[redirect_link]" value="{!! @$page['section_1']['redirect_link'] !!}" id="section_1_redirect_link" class="form-control" placeholder="Link">
                                        </div>

                                    </div>
                                    <div class="col-sm-4 imgUp">
                                        <div class="imagePreview" @if(@$page['section_1']['image_url'] != '') style="background-image: url({!! url($page['section_1']['image_url']) !!}) !important;" @endif></div>
                                        <label class="btn btn-primary col-sm-12">
                                            Upload<input type="file" name="section_1[image_url]"  id="section_1_image_url" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                        </label>
                                        @if(@$page['section_1']['image_url'])
                                            <input type="hidden" value="{!!$page['section_1']['image_url'] !!}" name="section_1[image_url1]">
                                        @endif
                                    </div>
                                    <div class="col-sm-4 imgUp">
                                        <div class="imagePreview" @if(@$page['section_1']['mobile_image_url'] != '') style="background-image: url({!! url($page['section_1']['mobile_image_url']) !!}) !important;" @endif></div>
                                        <label class="btn btn-primary col-sm-12">
                                            Upload<input type="file" name="section_1[mobile_image_url]"  id="section_1_mobile_image_url" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                        </label>
                                        @if(@$page['section_1']['mobile_image_url'])
                                            <input type="hidden" value="{!!$page['section_1']['mobile_image_url'] !!}" name="section_1[mobile_image_url1]">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-brand">Submit</button>
                                        <button type="reset" class="btn btn-secondary">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!--end::Form-->
                </div>
            </div>
            <div class="col-lg-6">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
												<span class="kt-portlet__head-icon kt-hidden">
													<i class="la la-gear"></i>
												</span>
                            <h3 class="kt-portlet__head-title">
                                Form 2
                            </h3>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form" onsubmit="return false" id="section_2_form" action="{!! route('admin.page.men.store-section2') !!}">
                        <div class="kt-portlet__body">
                            <div class="kt-form__section kt-form__section--first">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group kt-form__group">
                                            <label for="code" class="form-control-label">Button Text (Eng):</label>
                                            <input type="text" name="section_2[button_text]" value="{!! @$page['section_2']['button_text'] !!}" id="section_2_button_text" class="form-control" placeholder="Button Text">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group kt-form__group">
                                            <label for="code" class="form-control-label">Button Text (Ind):</label>
                                            <input type="text" name="section_2[button_text_l]" value="{!! @$page['section_2']['button_text_l'] !!}" id="section_2_button_text_l" class="form-control" placeholder="Button Text">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group kt-form__group">
                                            <label for="code" class="form-control-label">Button Color:</label>
                                            <input type="text" name="section_2[button_color]" value="{!!@$page['section_2']['button_color'] !!}" id="section_2_button_color" class="form-control" placeholder="#3d3d3d">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group kt-form__group">
                                            <label for="code" class="form-control-label">Link:</label>
                                            <input type="text" name="section_2[redirect_link]" value="{!! @$page['section_2']['redirect_link'] !!}" id="section_2_redirect_link" class="form-control" placeholder="Link">
                                        </div>

                                    </div>
                                    <div class="col-sm-4 imgUp">
                                        <div class="imagePreview" @if(@$page['section_2']['image_url'] != '') style="background-image: url({!! url($page['section_2']['image_url']) !!}) !important;" @endif></div>
                                        <label class="btn btn-primary col-sm-12">
                                            Upload<input type="file" name="section_2[image_url]"  id="section_2_image_url" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                        </label>
                                        @if(@$page['section_2']['image_url'])
                                            <input type="hidden" value="{!!$page['section_2']['image_url'] !!}" name="section_2[image_url1]">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-brand">Submit</button>
                                        <button type="reset" class="btn btn-secondary">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!--end::Form-->
                </div>
            </div>
            <div class="col-lg-6">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
												<span class="kt-portlet__head-icon kt-hidden">
													<i class="la la-gear"></i>
												</span>
                            <h3 class="kt-portlet__head-title">
                                Form 3
                            </h3>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form" onsubmit="return false" id="section_3_form" action="{!! route('admin.page.men.store-section3') !!}">
                        <div class="kt-portlet__body">
                            <div class="kt-form__section kt-form__section--first">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group kt-form__group">
                                            <label for="code" class="form-control-label">Button Text (Eng):</label>
                                            <input type="text" name="section_3[button_text]" value="{!! @$page['section_3']['button_text'] !!}" id="section_3_button_text" class="form-control" placeholder="Button Text">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group kt-form__group">
                                            <label for="code" class="form-control-label">Button Text (Ind):</label>
                                            <input type="text" name="section_3[button_text_l]" value="{!! @$page['section_3']['button_text_l'] !!}" id="section_3_button_text_l" class="form-control" placeholder="Button Text">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group kt-form__group">
                                            <label for="code" class="form-control-label">Button Color:</label>
                                            <input type="text" name="section_3[button_color]" value="{!!@$page['section_3']['button_color'] !!}" id="section_3_button_color" class="form-control" placeholder="#3d3d3d">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group kt-form__group">
                                            <label for="code" class="form-control-label">Link:</label>
                                            <input type="text" name="section_3[redirect_link]" value="{!! @$page['section_3']['redirect_link'] !!}" id="section_3_redirect_link" class="form-control" placeholder="Link">
                                        </div>

                                    </div>
                                    <div class="col-sm-4 imgUp">
                                        <div class="imagePreview" @if(@$page['section_3']['image_url'] != '') style="background-image: url({!! url($page['section_3']['image_url']) !!}) !important;" @endif></div>
                                        <label class="btn btn-primary col-sm-12">
                                            Upload<input type="file" name="section_3[image_url]"  id="section_3_image_url" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                        </label>
                                        @if(@$page['section_3']['image_url'])
                                            <input type="hidden" value="{!!$page['section_3']['image_url'] !!}" name="section_3[image_url1]">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-brand">Submit</button>
                                        <button type="reset" class="btn btn-secondary">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!--end::Form-->
                </div>
            </div>
        </div>

        <!--end::Form-->
    </div>


@endsection
@include('backend.page.men.js')
