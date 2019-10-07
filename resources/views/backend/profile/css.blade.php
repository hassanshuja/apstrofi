@section('page_css')
    <link href="{!! asset('backend/assets/vendors/general/croppie/css/croppie.css') !!}" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            cursor: inherit;
            display: block;
        }
        .upload-msg {
            text-align: center;
            padding: 50px;
            font-size: 22px;
            color: #aaa;
            width: 260px;
            margin: 50px auto;
            border: 1px solid #aaa;
        }
        .upload-demo .upload-demo-wrap, .upload-demo .upload-result, .upload-demo.ready .upload-msg {
            display: none;
        }
    </style>
@endsection