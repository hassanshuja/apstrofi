@section('page_css')
    @if($type == 'add')
        <link href="{!! asset('backend/assets/app/custom/wizard/wizard-v2.default.css') !!}" rel="stylesheet" type="text/css" />
        @else
        <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css" rel="stylesheet">
    @endif
    <link href="{!! asset('backend/assets/vendors/custom/tag-input/tagsinput.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('backend/assets/vendors/general/select2/dist/css/select2.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('backend/assets/vendors/general/fileinput/css/fileinput.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('backend/assets/vendors/general/summernote/dist/summernote.css') !!}" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .modal-full{
            min-width: 100%;
            margin: 0;
        }
        .form-control{
            height:auto !important;
        }
        .image-preview {
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            padding: 20px;
        }
        img.preview {
            width: 200px;
            background-color: white;
            border: 1px solid #DDD;
            padding: 5px;
        }
        .note-toolbar {
            position: relative;
            z-index: 20;
        }
    </style>
@endsection
