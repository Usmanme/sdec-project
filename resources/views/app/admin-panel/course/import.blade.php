@extends('app.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', $data['breadcrumb']) }}
@endsection

@section('page-title', $data['page_title'])

@section('page-vendor')

    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets') }}/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">

@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/forms/form-validation.css">
@endsection

@section('custom-css')
@endsection

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', $data['breadcrumb']) }}
@endsection
@section('breadcrumbs')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Import Courses</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render($data['breadcrumb']) }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

<div class="card">
    <center class="mt-2 mb-2"><h3>{{ $data['title'] }}</h3></center>
    <div class="card-body">
        <form action="{{route('course.import')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="">Select File</label>
            <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror" >
            @error('file')
                <div class="invalid-tooltip">{{ $message }}</div>
            @enderror

            <div class="card-footer d-flex align-items-center justify-content-end">
                <button type="submit" class="btn btn-relief-outline-success waves-effect waves-float waves-light me-1">
                    <i data-feather='save'></i>
                    {{ $data['submit_button'] }}
                </button>
                <a href="#"
                    class="btn btn-relief-outline-danger waves-effect waves-float waves-light">
                    <i data-feather='x'></i>
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
