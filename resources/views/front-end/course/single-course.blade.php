@extends('front-end.layout.app')
@section('title', 'Single Course')
@section('description', 'Single Course Descripiton.')
@section('keywords', 'Single Course Keywords')
<style>
    .form-select:not(.not-dark),
    ::placeholder {
        color: #fff !important;
    }

    .lcb,
    .rcb {
        padding: 0;
        background-color: #fff;
        margin: 0 0 20px 0;
        width: 100%;
    }

    .lcb {
        max-width: 100%;
        min-width: 300px;
    }

    .lcb-head {
        padding: 0 20px;
    }

    .lcb-head,
    .rcb-head {
        font-size: 1.55rem;
        line-height: 1.2;
        font-weight: 800;
    }

    .lcb-head span.lcb-title {
        padding-bottom: 4px;
        border-bottom: solid 3px #212121;
    }

    .lcb-body {
        padding: 20px 20px 30px 20px;
    }

    .lcb-body,
    .lcb-body p {
        font-size: 1rem;
        line-height: 1.6;
    }

    main section>:last-child,
    main article>:last-child,
    .education-description-wrapper>:last-child {
        margin-bottom: 0;
    }

    title {
        padding-bottom: 4px;
        border-bottom: solid 3px #212121;
    }

    .fa-introbox ul {
        width: 100%;
        margin: 0 0 0 30px;
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        align-content: flex-start;
        align-items: flex-start;
    }

    ul {
        list-style-position: outside;
        line-height: 1.6;
    }

    .fa-ul {
        list-style-type: none;
    }

    .fa-ul>li {
        position: relative;
    }

    .fa-introbox li {
        display: inline-block;
        flex: 0 1 31%;
        min-width: 31%;
    }

    .lcb li,
    .rcb li {
        margin: 0 0 0 10px;
    }

    .fa-introbox a.list-group-item {
        word-break: break-word;
        overflow-wrap: break-word;
        hyphens: auto;
        position: relative;
        display: inline-block;
        padding: 4px 30px 4px 10px;
        font-size: 14.5px;
        margin-bottom: 13px;
        letter-spacing: -.2px;
        color: #414141;
        font-weight: 300;
        border: none;
    }

    .emg-pga,
    .row.emg-pga {
        padding-bottom: 26px;
        margin: 0 0 26px 0;
        border-bottom: solid 1px #efefef;
    }

    .emg-pga .pga-col-media {
        width: 34%;
        padding: 0;
        position: relative;
    }

    img {
        display: inline-block;
        vertical-align: middle;
        max-width: 80%;
        height: auto;
        -ms-interpolation-mode: bicubic;
    }

    .column:last-child:not(:first-child),
    .columns:last-child:not(:first-child) {
        float: right;
    }

    .emg-pga .pga-col-content {
        width: 66%;
        padding: 0 0 0 14px;
    }

    .emg-pga .pga-subtitle {
        margin-bottom: -6px;
    }

    .entry-content {
        margin: 0px !important;
    }

    .description {
        text-align: center;
        width: 43%;
    }

    .clientImage {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .clientImage span {
        margin-left: 10px;
    }

    .clientImage img {
        width: 40px;
        border-radius: 50%;
    }

    .reviewSection {
        padding: 1rem;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-around;
    }

    .reviewItem {
        width: 300px;
        padding: 10px;
        margin: 1rem;
        cursor: pointer;
        border-radius: 10px;
        background-color: #10102a;
        border: 1px solid #10102a;
        transition: all .2s linear;
    }

    .reviewItem:hover {
        border-color: aqua;
        transform: scale(1.01);
        background-color: #090921;
        box-shadow: 0 0px 5px 0px #cbc0c0;
    }

    .top {
        margin-bottom: 1rem;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }

    .top ul {
        display: flex;
        list-style: none;
    }

    .top ul li {
        padding-left: 4px;
    }

    article p {
        font-size: 15px;
        font-weight: 100;
        margin-bottom: 1rem;
        font-family: system-ui;
    }

    .banner-text {
        display: flex;
        flex-direction: column;
        max-width: 570px;
    }

    .review,
    .clientImage span {
        color: #fff;
    }

    .entry-meta p {
        color: #000;
    }

    .lcb:last-of-type {
        margin-bottom: 20px;
    }

    .lcb,
    .rcb {
        padding: 0;
        background-color: #fff;
        margin: 0 0 20px 0;
        width: 100%;
    }

    .lcb-head {
        padding: 0 20px;
    }

    .lcb-head,
    .rcb-head {
        font-size: 1.55rem;
        line-height: 1.2;
        font-weight: 800;
    }

    .lcb-head span.lcb-title {
        padding-bottom: 4px;
        border-bottom: solid 3px #212121;
    }

    .lcb-body {
        padding: 20px 20px 30px 20px;
    }

    h3,
    .h3 {
        color: #212121;
        font-size: 18px;
    }

    .lcb-body,
    .lcb-body p {
        font-size: 1rem;
        line-height: 1.6;
    }

    .emg-columns {
        display: flex;
        flex-wrap: wrap;
        clear: both;
        max-width: 100%;
        gap: 50px;
    }

    .emg-column ul {
        margin-bottom: 0 !important;
    }


    @media screen and (max-width:700px) {
        .container {
            height: auto;
        }

        .description {
            width: 90%;
        }
    }

    @media screen and (max-width:375px) {
        .reviewSection {
            padding: 0;
        }

        .reviewItem {
            width: 100%;
        }

        .clientImage {
            margin-bottom: 0.6rem;
        }

        .top {
            align-items: center;
            flex-direction: column;
            justify-content: center;
        }
    }

    #corses-singel {
        padding-top: 40px;
        padding-bottom: 70px;
    }
</style>
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
                                        <option value="Course">Course Category</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="" id="" class="form-select">
                                        <option value="Course">Course Delievery</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" placeholder="Type in the course">
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
                                <h3>Human Resources</h3>
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
                                                    There are certain skills you need to become a successful human resources
                                                    manager. The ICI human resources management program designed in
                                                    conjunction with the federal government and HR industry helps you learn
                                                    them quickly and conveniently.
                                                </p>
                                            </div>
                                            <div class="singel-description pt-40">
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
                                            </div>
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
                                        <li><i class="fa fa-clock-o"></i>Length : <span>21- 31 Weeks</span></li>
                                        <li><i class="fa fa-clone"></i>Next Course Start : <span>See anytime <a href="">See Details</a></span></li>
                                        <li><i class="fa fa-beer"></i>Course Delivery : <span>Self-Paced Online</span></li>
                                    </ul>
                                    <div class="price-button pt-10">
                                        <span>Price : <b>998 GBP excl. VAT</b></span>
                                        <a href="#" class="main-btn">Find Out More</a>
                                    </div>
                                </div> <!-- course features -->
                            </div>



                        </div> <!-- releted courses -->
                    </div>
                </div> <!-- row -->
            </div>
        </section>

    </div>
@endsection
