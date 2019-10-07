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

        <!--begin::Form-->
        <form class="kt-form" onsubmit="return false" id="section_1_form" action="{!! route('admin.page.men.store-section1') !!}">
            <div class="kt-portlet__body">
                <div class="kt-form__section kt-form__section--first">
                    <div id="kt_repeater_1">
                        <div class="form-group  row">
                            <label class="col-lg-2 col-form-label">Slider Detail: <div data-repeater-create="" class="btn btn btn-sm btn-brand btn-pill">
															<span>
																<i class="la la-plus"></i>
																<span>Add</span>
															</span>
                                </div></label>
                            @if(!empty($page) && count($page['section_1']) > 0)
                                <div data-repeater-list="section_1" class="col-lg-10">
                                    @foreach($page['section_1'] as $key=>$val)
                                    <div data-repeater-item class="form-group row align-items-center">
                                    <div class="col-sm-4">
                                        <div class="form-group kt-form__group">
                                            <label for="code" class="form-control-label">Slider Text (Eng):</label>
                                            <input type="text" name="slider_text" value="{!! $val['slider_text'] !!}"  class="form-control" placeholder="Slider Text">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group kt-form__group">
                                            <label for="code" class="form-control-label">Slider Text (Indo):</label>
                                            <input type="text" name="slider_text_l" value="{!! $val['slider_text_l'] !!}"  class="form-control " placeholder="Slider Text">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group kt-form__group">
                                            <label for="code" class="form-control-label">Button Text (Eng):</label>
                                            <input type="text" name="button_text" value="{!! $val['button_text'] !!}" class="form-control " placeholder="Button Text">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group kt-form__group">
                                            <label for="code" class="form-control-label">Button Text (Eng):</label>
                                            <input type="text" name="button_text_l" value="{!! $val['button_text_l'] !!}" class="form-control " placeholder="Button Text">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group kt-form__group">
                                            <label for="code" class="form-control-label">Button Color :</label>
                                            <input type="text" name="button_color" value="{!! $val['button_color'] !!}" class="form-control" placeholder="#3d3d3d">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group kt-form__group">
                                            <label for="code" class="form-control-label">Link:</label>
                                            <input type="text" name="redirect_link" value="{!! $val['redirect_link'] !!}" class="form-control" placeholder="Link">
                                        </div>
                                    </div>
                                    <div class="col-sm-2 imgUp">
                                        <div class="imagePreview" @if(@$val['image_url'] != '') style="background-image: url({!! url($val['image_url']) !!}) !important;" @endif></div>
                                        <label class="btn btn-primary col-sm-12">
                                            Upload<input type="file" name="image_url" class="uploadFile img"  style="width: 0px;height: 0px;overflow: hidden;">
                                        </label>
                                        <input type="hidden" value="{!!@ $val['image_url'] !!}" name="image_url1">
                                    </div><!-- col-2 -->
                                    <div class="col-md-2">
                                        <div data-repeater-delete="" class="btn-sm btn btn-danger btn-pill">
																	<span>
																		<i class="la la-trash-o"></i>
																		<span>Delete</span>
																	</span>
                                        </div>
                                    </div>

                                </div>
                                    <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                                    @endforeach
                            </div>
                            @else
                                <div data-repeater-list="section_1" class="col-lg-10">
                                    <div data-repeater-item class="form-group row align-items-center">
                                        <div class="col-sm-4">
                                            <div class="form-group kt-form__group">
                                                <label for="code" class="form-control-label">Slider Text (Eng):</label>
                                                <input type="text" name="slider_text"   class="form-control" placeholder="Slider Text">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group kt-form__group">
                                                <label for="code" class="form-control-label">Slider Text (Indo):</label>
                                                <input type="text" name="slider_text_l"  class="form-control " placeholder="Slider Text">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group kt-form__group">
                                                <label for="code" class="form-control-label">Button Text (Eng):</label>
                                                <input type="text" name="button_text" class="form-control " placeholder="Button Text">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group kt-form__group">
                                                <label for="code" class="form-control-label">Button Text (Eng):</label>
                                                <input type="text" name="button_text_l" class="form-control " placeholder="Button Text">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group kt-form__group">
                                                <label for="code" class="form-control-label">Button Color :</label>
                                                <input type="text" name="button_color" class="form-control" placeholder="#3d3d3d">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group kt-form__group">
                                                <label for="code" class="form-control-label">Link:</label>
                                                <input type="text" name="redirect_link" class="form-control" placeholder="Link">
                                            </div>
                                        </div>
                                        <div class="col-sm-2 imgUp">
                                            <div class="imagePreview"></div>
                                            <label class="btn btn-primary col-sm-12">
                                                Upload<input type="file" name="image_url" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                            </label>
                                        </div><!-- col-2 -->
                                        <div class="col-md-2">
                                            <div data-repeater-delete="" class="btn-sm btn btn-danger btn-pill">
																	<span>
																		<i class="la la-trash-o"></i>
																		<span>Delete</span>
																	</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>

    <div class="row">
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
                               <div class="col-md-3">
                                    <div class="kt-form__group--inline">
                                        <div class="kt-form__label">
                                            <label class="kt-label m-label--single">Button Text (Eng):</label>
                                        </div>
                                        <div class="kt-form__control">
                                            <input type="text" name="section_2[button_text]" value="{!!@ $page['section_2']['button_text'] !!}" id="section_2_button_text" class="form-control" placeholder="Button Text">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="kt-form__group--inline">
                                        <div class="kt-form__label">
                                            <label class="kt-label m-label--single">Button Text (Eng):</label>
                                        </div>
                                        <div class="kt-form__control">
                                            <input type="text" name="section_2[button_text_l]" value="{!!@ $page['section_2']['button_text_l'] !!}" id="section_2_button_text_l" class="form-control" placeholder="Button Text">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="kt-form__group--inline">
                                        <div class="kt-form__label">
                                            <label class="kt-label m-label--single">Button Color :</label>
                                        </div>
                                        <div class="kt-form__control">
                                            <input type="text" name="section_2[button_color]" value="{!!@ $page['section_2']['button_color'] !!}" id="section_2_button_color" class="form-control" placeholder="#3d3d3d">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="kt-form__group--inline">
                                        <div class="kt-form__label">
                                            <label class="kt-label m-label--single">Link:</label>
                                        </div>
                                        <div class="kt-form__control">
                                            <input type="text" name="section_2[redirect_link]" value="{!!@ $page['section_2']['redirect_link'] !!}" id="section_2_redirect_link" class="form-control" placeholder="Link">
                                        </div>
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
                                <div class="col-md-3">
                                    <div class="kt-form__group--inline">
                                        <div class="kt-form__label">
                                            <label class="kt-label m-label--single">Button Text (Eng):</label>
                                        </div>
                                        <div class="kt-form__control">
                                            <input type="text" name="section_3[button_text]" value="{!!@ $page['section_3']['button_text'] !!}" id="section_3_button_text" class="form-control" placeholder="Button Text">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="kt-form__group--inline">
                                        <div class="kt-form__label">
                                            <label class="kt-label m-label--single">Button Text (Eng):</label>
                                        </div>
                                        <div class="kt-form__control">
                                            <input type="text" name="section_3[button_text_l]" value="{!!@ $page['section_3']['button_text_l'] !!}" id="section_3_button_text_l" class="form-control" placeholder="Button Text">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="kt-form__group--inline">
                                        <div class="kt-form__label">
                                            <label class="kt-label m-label--single">Button Color :</label>
                                        </div>
                                        <div class="kt-form__control">
                                            <input type="text" name="section_3[button_color]" value="{!!@ $page['section_3']['button_color'] !!}" id="section_3_button_color" class="form-control" placeholder="#3d3d3d">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="kt-form__group--inline">
                                        <div class="kt-form__label">
                                            <label class="kt-label m-label--single">Link:</label>
                                        </div>
                                        <div class="kt-form__control">
                                            <input type="text" name="section_3[redirect_link]" value="{!!@ $page['section_3']['redirect_link'] !!}" id="section_3_redirect_link" class="form-control" placeholder="Link">
                                        </div>
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
@endsection
@include('backend.page.men.js')