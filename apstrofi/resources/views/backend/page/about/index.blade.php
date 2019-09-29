@extends('backend.layout.master')
@include('backend.page.about.css')
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


        <form class="kt-form" onsubmit="return false" id="section_1_form" action="{!! route('admin.page.about.add') !!}">
            <div class="kt-portlet__body">
                <div class="kt-form__section kt-form__section--first">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group kt-form__group">
                                <label for="code" class="form-control-label">Title:</label>
                                <input type="text" name="title" value="{!! @$page['title'] !!}" id="title" class="form-control" placeholder="Main Title">
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group kt-form__group">
                                <label>Description:</label>
                                <textarea type="text" class="form-control summernote" name="description" placeholder="description">{!! @$page['description'] !!}</textarea>
                            </div>
                        </div>
                        {{-- <div class="col-md-12">
                             <div class="form-group kt-form__group">
                                 <label for="code" class="form-control-label">Sub Title:</label>
                                 <input type="text" name="sub_title" value="{!! @$page['sub_title'] !!}" id="sub_title" class="form-control" placeholder="Sub Title">
                             </div>

                         </div>
                         <div class="col-md-12">
                             <div class="form-group kt-form__group">
                                 <label for="code" class="form-control-label">Category Title1:</label>
                                 <input type="text" name="category_title" value="{!! @$page['category_title'] !!}" id="category_title" class="form-control" placeholder="Category Title1">
                             </div>
                         </div>
                         <div class="col-md-12">
                             <div class="form-group kt-form__group">
                                 <label for="code" class="form-control-label">Category Content:</label>
                                 <textarea name="category_content"  id="category_content" class="form-control" placeholder="Category Content">{!! @$page['category_content'] !!}</textarea>
                             </div>
                         </div>
                         <div class="col-md-12">
                             <div class="form-group kt-form__group">
                                 <label for="code" class="form-control-label">Category Title2 :</label>
                                 <input type="text" name="category_title_l" value="{!!@$page['category_title_l'] !!}" id="category_title_l" class="form-control" placeholder="Category Title2">
                             </div>
                         </div>
                         <div class="col-md-12">
                             <div class="form-group kt-form__group">
                                 <label for="code" class="form-control-label">Category Content:</label>
                                 <textarea type="text" name="category_content_l"  id="category_content_l" class="form-control" placeholder="Category Content">{!! @$page['category_content_l'] !!}</textarea>
                             </div>
                         </div>
                         <div class="col-md-12">
                             <div class="form-group kt-form__group">
                                 <label for="code" class="form-control-label">Category Title3 :</label>
                                 <input type="text" name="category_title_ll" value="{!!@$page['category_title_ll'] !!}" id="category_title_ll" class="form-control" placeholder="Category Title3">
                             </div>
                         </div>
                         <div class="col-md-12">
                             <div class="form-group kt-form__group">
                                 <label for="code" class="form-control-label">Category Content:</label>
                                 <textarea type="text" name="category_content_ll"  id="category_content_ll" class="form-control" placeholder="Category Content">{!! @$page['category_content_ll'] !!}</textarea>
                             </div>
                         </div>--}}
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
@include('backend.page.about.js')
