@extends('front-end.layout.app')
@section('title','Home')
@section('description','Home Descripiton.')
@section('keywords','Home Keywords')
@section('page-css')
<link rel="stylesheet" href="{{asset('app-assets')}}/client/css/courses.css">
@endsection
@section('content')
<div id="wrapper" class="clearfix">
    <section id="slider" class="slider-element min-vh-60 min-vh-md-100 dark" style="overflow: hidden; background: url('{{ asset('app-assets') }}/client/images/events/parallax/home.jpg') no-repeat center center;background-size: cover;">
        <div class="slider-inner">

            <div class="vertical-middle">
                <div class="container py-5">
                    <div class="heading-block text-center border-bottom-0">
                        <h1>The Apple WWDC Event starts in:</h1>
                    </div>
                    <div class="heading-block text-center border-bottom-0">
                        <div class="banner-text">
                            <p><strong>PROFESSIONAL & PERSONAL DEVELOPMENT COURSES</strong></p>
                            <h2>Ready to become the best you?
                                Find courses to help you grow</h2>
                            <p>Whether you’re looking for professional courses, an evening fitness class or want to get
                                your career started, you’ve come to the right place. Search and compare courses today!
                            </p>
                        </div>
                        <form method="GET" >
                        <div class="row">
                            <div class="col-md-2">
                                <select name="category" id="category" class="form-select categories-dropdown">
                                    <option value="">--Select Category--</option>
                                    @forelse ($data['categories'] as $category)
                                        <option value="{{$category->id}}" {{ isset(request()->category) && request()->category == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                    @empty
                                        <option value="">--No Category Found--</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="sub_category" id="sub_category" class="form-select sub-categories-dropdown">
                                    <option value="">--Select Sub Category--</option>
                                    @forelse ($data['sub_categories'] as $sub_category)
                                        <option value="{{$sub_category->id}}"  {{ isset(request()->sub_category) && request()->sub_category == $sub_category->id ? 'selected' : '' }}>{{$sub_category->name}}</option>
                                    @empty
                                        <option value="">--No Sub Category Found--</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control search-box" name="course_name" id="course_name" value="{{ isset(request()->course_name) ? request()->course_name : '' }}" placeholder="Type in the course">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" id="search_courses" class="btn btn-success w-100">Search</button>
                            </div>

                        </div>
                    </form>
                        {{-- <h1>The Apple WWDC Event starts in:</h1> --}}
                    </div>
                    <div id="countdown-ex1" class="countdown countdown-large coming-soon mx-auto" data-year="2021" style="max-width:700px;"></div>

                    <div class="text-center topmargin-lg">

                        <a href="#" class="button button-3d button-purple button-rounded button-xlarge">Buy Tickets</a>
                        <span class="d-none d-md-inline-block"> - OR - </span>
                        <a href="#" class="button button-3d button-white button-light button-rounded button-xlarge">Read Details</a>

                    </div>
                </div>
            </div>

        </div>
    </section>

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row col-mb-50 mb-3" id="courses-section">
                    @forelse ($data['courses'] as $course)
                        <div class="col-sm-6 col-lg-3">
                            <div class="feature-box fbox-effect fbox-center fbox-outline fbox-dark border-bottom-0">
                                <div class="fbox-icon">
                                    <a href="{{ route('course.details',['slug'=>$course->slug]) }}"><i class="icon-calendar i-alt"></i></a>
                                </div>
                                <div class="fbox-content">
                                    <h3>{{ $course['title'] }}<span class="subtitle">{{ $course['description'] }}</span></h3>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h3>No Course Found</h3>
                    @endforelse
                </div>
                {{ $data['courses']->links() }}
            </div>
        </div>
    </section>
</div>
@section('page-js')
<script>
    $(document).on('change','#category', function(){
        let category_id = $(this).val();
        $.ajax({
            type: "GET",
            url: "{{route('categorySubCategories')}}",
            data: {category_id:category_id},
            dataType: "json",
            beforeSend:function(){
                $('#sub_category').empty();
            },
            success: function (response) {
                if(response.status) {
                    // let selected_sub_category = {{$data['course']->sub_category_id??0}}; ${selected_sub_category == value.id ? 'selected' : ''}
                    let html = '';
                    $.each(response.data, function (index, value) {
                        html+=`<option value=${value.id} >${value.name}</option>`;
                    });
                    $('#sub_category').append(html);
                }else {
                    let html = "<option value=''>--No Sub Category Found--</option>";
                    $('#sub_category').append(html);
                }
            }
        });
    });
</script>
@endsection
