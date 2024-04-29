@extends('app.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', $data['breadcrumb']) }}
@endsection

@section('page-title', $data['page_title'])

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/pages/dashboard-ecommerce.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/charts/chart-apex.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/filepond/filepond.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.preview.min.css">
@endsection

@section('custom-css')
<style>
        .customizer .customizer-toggle {
            display: none !important;
        }

        .filepond--drop-label {
            color: #7367F0 !important;
        }

        .filepond--item-panel {
            background-color: #7367F0;
        }

        .filepond--panel-root {
            background-color: #e3e0fd;
        }
        .filepond--item {
            width: calc(20% - 0.5em);
        }

</style>
@endsection

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', $data['breadcrumb']) }}
@endsection

@section('breadcrumbs')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Events</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render($data['breadcrumb']) }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-lg-12 col-md-12 col-12">
        <div class="card">
            <center class="mt-2 mb-2"><h3>{{ $data['title'] }}</h3></center>
            <div class="card-body">
                <form action="{{route('event.storeOrUpdate')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (isset($data))
                        {{ view('app.admin-panel.event.form-fields',['event'=>$data['event'] ?? null]) }}
                    @else
                        {{ view('app.admin-panel.event.form-fields') }}
                    @endif
                    <div class="card-footer d-flex align-items-center justify-content-end">
                        <button type="submit" class="btn btn-relief-outline-success waves-effect waves-float waves-light me-1">
                            <i data-feather='save'></i>
                            {{ $data['submit_button'] }}
                        </button>
                        <a href="{{route('event_list')}}"
                            class="btn btn-relief-outline-danger waves-effect waves-float waves-light">
                            <i data-feather='x'></i>
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('vendor-js')
    <script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.preview.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.typevalidation.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.imagecrop.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.imagesizevalidation.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/plugins/filepond.filesizevalidation.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/filepond/filepond.min.js"></script>
@endsection

@section('page-js')
<script src="{{ asset('app-assets') }}/js/scripts/jquery/jquery.min.js"></script>
@endsection

@section('custom-js')
<script>

    FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType,
        FilePondPluginFileValidateSize,
        FilePondPluginImageValidateSize,
        FilePondPluginImageCrop,
    );

    FilePond.create(document.getElementById('event_logo'), {
        styleButtonRemoveItemPosition: 'right',
        imageCropAspectRatio: '1:1',
        acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
        maxFileSize: '1000KB',
        ignoredFiles: ['.ds_store', 'thumbs.db', 'desktop.ini'],
        storeAsFile: true,
        allowMultiple: false,
        maxFiles: 1,
        required: false,
        checkValidity: true,
        credits: {
            label: '',
            url: ''
        }
        @if(isset($data['event']))
            ,files: [
                {
                    source: "{{ asset('app-assets/events/' . $data['event']['event_logo']) }}",
                }
            ],
        @endif
    });

</script>
@endsection
