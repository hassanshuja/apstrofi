@extends('backend.layout.master')
@include('backend.profile.css')
@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="kt-portlet m-portlet--full-height  ">
                <div class="kt-portlet__body">
                    <div class="kt-card-profile">
                        <div class="kt-card-profile__title m--hide">
                            Your Profile
                        </div>
                        <div class="kt-card-profile__pic">
                            <div class="kt-card-profile__pic-wrapper">
                                <img class="image_url" src="{!! auth()->guard('admin')->user()->image_url !!}"  />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-8">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-toolbar">
                        <ul class="nav nav-tabs nav-tabs-bold nav-tabs-line   nav-tabs-line-right nav-tabs-line-brand" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_portlet_tab_1_1" role="tab" aria-selected="true">
                                    Update Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_tab_1_2" role="tab" aria-selected="false">
                                    Change Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_portlet_tab_1_3" role="tab" aria-selected="false">
                                    Change Password
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_portlet_tab_1_1">
                            @include('backend.profile.update')
                        </div>
                        <div class="tab-pane" id="kt_portlet_tab_1_2">
                            @include('backend.profile.change-profile')
                        </div>
                        <div class="tab-pane" id="kt_portlet_tab_1_3">
                            @include('backend.profile.change-password')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('backend.profile.js')