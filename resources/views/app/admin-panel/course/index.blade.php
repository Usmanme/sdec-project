@extends('app.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'categories') }}
@endsection

@section('page-title', 'Categories')

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

@section('breadcrumbs')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Categories</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('categories') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <form id="categories-datatable" action="{{ route('category.delete') }}" method="get">
                {{ $dataTable->table() }}
            </form>
        </div>
    </div>

    @include('app.admin-panel.image-modal.modal')


@endsection

@section('vendor-js')
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/responsive.bootstrap5.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/buttons.colVis.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/jszip.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
@endsection

@section('page-js')
    <script src="{{ asset('app-assets') }}/vendors/js/tables/datatable/buttons.server-side.js"></script>
@endsection

@section('custom-js')
{{ $dataTable->scripts() }}
<script>
    function createNewCategory()
    {
        location.href = '{{ route('category.createOrEdit') }}';
    }

    function addImagesToModal(id)
    {
        $.ajax({
            type: "GET",
            url: "{{ route('category.image') }}",
            data: { id: id },
            success: function (response) {
                if (response.status) {
                    $('#images_modal_body').empty();
                    $('#modalLabel').text("Category Image");
                        $('#images_modal_body').append(`
                            <img class="img-fluid swiper_img" src="{{ asset('app-assets/images/category/${response.image}') }}" alt="'image'" />
                        `);
                    $('#image-modal').modal('show');
                }
            }
        });
    }

    function addDetailsToModal(id)
    {
        $.ajax({
            type: "GET",
            url: "{{ route('category.details') }}",
            data: { id: id},
            success: function (response) {
                $('#images_modal_body').empty();
                $('#modalLabel').text("Category Details");
                $('#images_modal_body').append(`
                    <div class="row">
                        <div class="col-lg-6 col-md-6 position-relative">
                            <label for="name">Category</label>
                            <input type="text" name="name" id="name" value="${response.data.name}" disabled class="form-control @error('name') is-invalid @enderror" placeholder="Category">
                        </div>
                        <div class="col-lg-6 col-md-6 position-relative">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Description" disabled> ${response.data.description} </textarea>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 position-relative">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title" value="${response.data.meta_title}" disabled class="form-control @error('meta_title') is-invalid @enderror" placeholder="Meta Title">
                        </div>
                        <div class="col-lg-6 col-md-6 position-relative">
                            <label for="meta_keyword">Meta Keyword</label>
                            <input type="text" name="meta_keyword" id="meta_keyword" value="${response.data.meta_keyword}" disabled  class="form-control @error('meta_keyword') is-invalid @enderror" placeholder="Meta Keyword">
                        </div>
                    </div>
                    <br>
                `);
            }
        });
        $('#image-modal').modal('show');
    }

    function deleteSelected() {
        var selectedCheckboxes = $('.dt-checkboxes:checked').length;
        if (selectedCheckboxes > 0) {

            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Are you sure you want to delete the selected items?',
                showCancelButton: true,
                cancelButtonText: 'No, cancel!',
                confirmButtonText: 'Yes, delete it!',
                confirmButtonClass: 'btn-danger',
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#categories-datatable').submit();
                }
            });
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Please select at least one item!',
            });
        }
    }

    function changeTableRowColor(element) {
        if ($(element).is(':checked'))
            $(element).closest('tr').addClass('table-primary');
        else {
            $(element).closest('tr').removeClass('table-primary');
        }
    }

</script>
@endsection
