@section('page_css')
    <link href="{!! asset('backend/assets/vendors/custom/datatables/datatables.bundle.css') !!}" rel="stylesheet" type="text/css" />
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
    </style>
@endsection