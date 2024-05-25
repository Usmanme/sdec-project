@extends('app.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'subCategory') }}
@endsection

@section('page-title', 'Sub Categories')

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
                <h2 class="content-header-title float-start mb-0">Sub Category List</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('subCategory') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="col-md-12 d-flex justify-content-end mb-2">
                <a href="{{ route('sub-category.importSubCategoryForm') }}">
                    <button class="dt-button btn btn-relief-outline-info waves-effect waves-float waves-light"
                        tabindex="0" aria-controls="tutor-table" type="button"><span><i class="bi bi-plus"></i> Import
                            Sub Category
                        </span></button>
                </a>
            </div>
            <form id="sub-category-datatable" action="{{ route('sub-category.delete') }}" method="get">
                <div class="d-flex justify-content-between mb-1">
                    <div class="col-md-3">
                        <a href="{{ route('sub-category.createOrEdit') }}">
                            <button class="dt-button btn btn-relief-outline-primary waves-effect waves-float waves-light"
                                tabindex="0" aria-controls="tutor-table" type="button"><span><i class="bi bi-plus"></i>
                                    Add Sub Category
                                </span></button>
                        </a>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <button onclick="deleteSelected()"
                            class="dt-button btn btn-relief-outline-danger waves-effect waves-float waves-light"
                            tabindex="0" aria-controls="tutor-table" type="button"><span><i class="bi bi-plus"></i>
                                Delete
                                Selected</span></button>
                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="user-book-tutors">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sub Category</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Created By</th>
                                <th>Created AT</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data['subCategories'] as $subCategory)
                                <tr>
                                    <td>
                                        <div class="form-check"> <input class="form-check-input dt-checkboxes"
                                                type="checkbox" value="{{ $subCategory->id }}" name="chkTableRow[]"
                                                onchange="changeTableRowColor(this)"
                                                id="chkTableRow_{{ $subCategory->id }}"><label class="form-check-label"
                                                for="chkTableRow_{{ $subCategory->id }}"></label></div>
                                    </td>
                                    <td>{{ $subCategory->name ?? '--' }}</td>
                                    <td>{{ \Str::limit($subCategory->description, 20) ?? '--' }}</td>
                                    <td>
                                        <span
                                            class="badge rounded-pill badge-light-primary ">{{ $subCategory?->category?->name }}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge rounded-pill @if ($subCategory->status == 'active') badge-light-success @else badge-light-danger @endif ">{{ $subCategory->status == 'active' ? 'Active' : 'Inactive' }}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge rounded-pill badge-light-secondary">{{ $subCategory?->user?->name ?? 'Admin' }}</span>
                                    </td>
                                    <td class="text-primary fw-bold">{{ $subCategory->created_at ?? '' }}</td>
                                    <td>
                                        <a class="btn btn-relief-outline-warning waves-effect waves-float waves-light"
                                            style="margin: 5px" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Edit Category"
                                            href="{{ route('sub-category.createOrEdit', ['id' => encryptParams($subCategory->id)]) }}">
                                            <i class="bi bi-pencil" style="font-size: 1.1rem" class="m-10"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="12">
                                    <center>
                                        <p class="text-danger fw-bold">
                                            No Record Found
                                        </p>
                                    </center>
                                </td>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-2 d-flex justify-content-end">
                        {{ $data['subCategories']->links() }}
                    </div>
                </div>
            </form>
        </div>
    </div>


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
    <script>
        function createNewCategory() {
            location.href = '{{ route('course.createOrEdit') }}';
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
                        $('#sub-category-datatable').submit();
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
