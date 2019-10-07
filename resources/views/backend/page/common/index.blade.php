@extends('backend.layout.master')
@include('backend.page.common.css')
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
            <strong>Success!</strong>Data Successfully Added!!.
        </div>


        <form class="kt-form" onsubmit="return false" id="section_1_form" action="{!! route('admin.page.common.add') !!}">
            <div class="kt-portlet__body">
                <div class="kt-form__section kt-form__section--first">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group kt-form__group">
                                <label for="code" class="form-control-label">About Title (Eng):</label>
                                <input type="text" name="about_title" value="{!! @$page['about_title'] !!}" id="about_title" class="form-control" placeholder="About Title">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group kt-form__group">
                                <label for="code" class="form-control-label">About Title (Indo):</label>
                                <input type="text" name="about_title_l" value="{!!@$page['about_title_l'] !!}" id="about_title_l" class="form-control" placeholder="About Title">
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group kt-form__group">
                                <label for="code" class="form-control-label">About Content (Eng):</label>
                                <textarea name="about_content"  id="about_content" class="form-control" placeholder="About Content">{!! @$page['about_content'] !!}</textarea>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-group kt-form__group">
                                <label for="code" class="form-control-label">About Content (Indo):</label>
                                <textarea type="text" name="about_content_l"  id="about_content_l" class="form-control" placeholder="About Content">{!! @$page['about_content_l'] !!}</textarea>
                            </div>

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
    </div>

@endsection
@include('backend.page.common.js')
