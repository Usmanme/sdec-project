@extends('app.layout.layout')

@section('seo-breadcrumb')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'courses') }}
@endsection

@section('page-title', 'Courses')

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
                <h2 class="content-header-title float-start mb-0">Course List</h2>
                <div class="breadcrumb-wrapper">
                    {{ Breadcrumbs::render('courses') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        {{-- <form action="{{ route('course.list') }}" method="get">
            <div class="row d-flex justify-content-between">
                <div class="col-md-3 mb-1">
                    <h2>Blogs</h2>
                </div>
                <div class="col-md-5 d-flex mb-1">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Search Blog" value="{{ isset( request()->search) ? request()->search : ''  }}">
                    <button class="btn btn-primary" style="margin-left: 5px;">Search</button>
                </div>
            </div>
        </form> --}}
        <div class="col-md-12 d-flex justify-content-end mb-2">
            <a href="{{ route('course.importCourseForm') }}">
                <button class="dt-button btn btn-relief-outline-info waves-effect waves-float waves-light"
                    tabindex="0" aria-controls="tutor-table" type="button"><span><i class="bi bi-plus"></i> Import Courses
                        </span></button>
            </a>
        </div>
        <form id="course-datatable" action="{{route('course.delete')}}" method="get">
            <div class="d-flex justify-content-between mb-1">
                <div class="col-md-3">
                    <a href="{{ route('course.createOrEdit') }}">
                        <button class="dt-button btn btn-relief-outline-primary waves-effect waves-float waves-light"
                            tabindex="0" aria-controls="tutor-table" type="button"><span><i class="bi bi-plus"></i> Add Course
                                </span></button>
                    </a>
                </div>
                <div class="col-md-3 d-flex justify-content-end">
                    <button onclick="deleteSelected()" class="dt-button btn btn-relief-outline-danger waves-effect waves-float waves-light"
                        tabindex="0" aria-controls="tutor-table" type="button"><span><i class="bi bi-plus"></i> Delete
                            Selected</span></button>
                </div>

            </div>
            <div class="table-responsive">
                <table class="table table-hover table-striped" id="user-book-tutors">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Course</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Program Code</th>
                            <th>Fee</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Created By</th>
                            <th>Created AT</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data['courses'] as $course)
                            <tr>
                                <td>
                                    <div class="form-check"> <input class="form-check-input dt-checkboxes" type="checkbox"
                                            value="{{ $course->id }}" name="chkTableRow[]"
                                            onchange="changeTableRowColor(this)"
                                            id="chkTableRow_{{ $course->id }}"><label class="form-check-label"
                                            for="chkTableRow_{{ $course->id }}"></label></div>
                                </td>
                                <td>{{ $course->title ?? '--' }}</td>
                                <td>{{ \Str::limit($course->description,20) ?? '--' }}</td>
                                <td>{{$course->category??'--'}}</td>
                                <td>{{$course->sub_category ?? '--'}}</td>
                                <td>{{ $course->program_code ?? '--' }}</td>
                                <td>{{ $course->fee ?? '--' }}</td>
                                <td>{{ $course->start_date ?? '--' }}</td>
                                <td>{{ $course->end_date ?? '--' }}</td>
                                <td>
                                    <span class="badge rounded-pill @if ($course->status == 'active') badge-light-success @else badge-light-danger @endif ">{{ $course->status == 'active' ? 'Active' : 'Inactive' }}</span>
                                </td>
                                <td>
                                    <span class="badge rounded-pill badge-light-secondary">{{ $course->name ?? 'Admin'}}</span>
                                </td>
                                <td class="text-primary fw-bold">{{ $course->created_at ?? '' }}</td>
                                <td>
                                    <a class="btn btn-relief-outline-warning waves-effect waves-float waves-light"
                                        style="margin: 5px" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Edit Category" href="{{ route('course.createOrEdit',['id'=>encryptParams($course->id)]) }}">
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
                    {{ $data['courses']->links() }}
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
    function createNewCategory()
    {
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
                    $('#course-datatable').submit();
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
