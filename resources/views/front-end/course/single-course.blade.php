@extends('front-end.layout.app')
@section('title', 'Single Course')
@section('description', 'Single Course Descripiton.')
@section('keywords', 'Single Course Keywords')
@section('page-css')
<link rel="stylesheet" href="{{asset('app-assets')}}/client/css/courses.css">
@endsection
@section('content')
    <div id="wrapper" class="clearfix">

        <section id="slider" class="slider-element min-vh-60 min-vh-md-100 dark"
            style="overflow: hidden; background: url('{{ asset('app-assets') }}/client/images/events/parallax/hr.jpg') no-repeat center center;background-size: cover;">
            <div class="slider-inner">

                <div class="vertical-middle">
                    <div class="container py-5">
                        <div class="heading-block text-center border-bottom-0">
                            <div class="banner-text">
                                <p><strong>PROFESSIONAL & PERSONAL DEVELOPMENT COURSES</strong></p>
                                <h2>Ready to become the best you?
                                    Find courses to help you grow</h2>
                                <p>Whether you’re looking for professional courses, an evening fitness class or want to get
                                    your career started, you’ve come to the right place. Search and compare courses today!
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <select name="" id="" class="form-select">
                                        <option value="{{ $course?->category?->name }}">{{ $course?->category?->name }}</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="" id="" class="form-select">
                                        <option value="{{ $course?->subCategories->name }}">{{ $course?->subCategories->name }}</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control search-box" placeholder="Type in the course">
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-success w-100">Search</button>
                                </div>

                            </div>
                            {{-- <h1>The Apple WWDC Event starts in:</h1> --}}
                        </div>

                        {{-- <div id="countdown-ex1" class="countdown countdown-large coming-soon mx-auto" data-year="2021" style="max-width:700px;"></div> --}}

                        {{-- <div class="text-center topmargin-lg">

                        <a href="#" class="button button-3d button-purple button-rounded button-xlarge">Buy Tickets</a>
                        <span class="d-none d-md-inline-block"> - OR - </span>
                        <a href="#" class="button button-3d button-white button-light button-rounded button-xlarge">Read Details</a>

                    </div> --}}
                    </div>
                </div>

            </div>
        </section>
        <section id="corses-singel" class="pt-90 pb-120 gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="corses-singel-left mt-30">
                            <div class="title">
                                <h3>{{ $course['title'] ?? '' }}</h3>
                            </div>
                            <br><br>
                            <div class="corses-tab mt-30">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                        aria-labelledby="overview-tab">
                                        <div class="overview-description">
                                            <div class="singel-description pt-40">
                                                <h5>Course Description</h5>
                                                <p>
                                                    {{ $course['description'] }}
                                                </p>
                                            </div>
                                            {{-- <div class="singel-description pt-40">
                                                <h4>How Will You Benefit?</h4>
                                                <ul>
                                                    <li>Fast track your career in human resources</li>
                                                    <li>Learn the inside secrets of how to become an HR pro in months not years!</li>
                                                    <li>Study a human resources course that was designed in conjunction with the federal government and HR industry</li>
                                                    <li>Free up valuable time, don’t waste time and money travelling to classes</li>
                                                    <li>Study at your own pace whenever and wherever you are
                                                  Have access to a tutor</li>
                                                    <li>Easy interest-free payment plans from as low as £25 per week</li>
                                                  </ul>
                                            </div> --}}
                                        </div> <!-- overview description -->
                                    </div>
                                </div> <!-- tab content -->
                            </div>
                        </div> <!-- corses singel left -->

                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="course-features mt-30">
                                    <h4>Course Features </h4>
                                    <ul>
                                        <li><i class="fa fa-clock-o"></i>Start Date : <span>{{ $course['start_date'] }}</span></li>
                                        <li><i class="fa fa-clone"></i>End Date : <span>{{ $course['end_date'] }}</span></li>
                                        <li><i class="fa fa-beer"></i>Venue : <span>{{ $course['venue'] }}</span></li>
                                    </ul>
                                    {{-- <div class="price-button pt-10">
                                        <span>Price : <b>998 GBP excl. VAT</b></span>
                                        <a href="#" class="main-btn">Find Out More</a>
                                    </div> --}}
                                </div> <!-- course features -->
                            </div>



                        </div> <!-- releted courses -->
                    </div>
                </div> <!-- row -->
            </div>
        </section>

    </div>
@endsection
