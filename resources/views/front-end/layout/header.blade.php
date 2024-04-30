<header id="header" class="full-header">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row">

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="{{ route('homepage') }}" class="standard-logo" data-dark-logo="images/logo-dark.png">SDEC SAUDI</a>
                    <a href="index.html" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img src="{{ asset('app-assets') }}/client/images/logo@2x.png" alt=""></a>
                </div><!-- #logo end -->

                <div class="header-misc">

                    <!-- Top Search
                    ============================================= -->
                    <div id="top-search" class="header-misc-icon">
                        <a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
                    </div><!-- #top-search end -->


                </div>

                <div id="primary-menu-trigger">
                    <svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
                </div>

                <!-- Primary Navigation
                ============================================= -->
                <nav class="primary-menu">

                    <ul class="menu-container">

                        <li class="menu-item">
                            <a class="menu-link" href="#"><div>Professional Courses</div></a>
                            <ul class="sub-menu-container">
                                <li class="menu-item">
                                    <li class="menu-item">
                                        <a class="menu-link" href="rs-demos.html"><div>Business</div></a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="rs-demos.html"><div>Leadership & Management</div></a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="rs-demos.html"><div>IT & Computer Skills</div></a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="rs-demos.html"><div>Construction</div></a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="rs-demos.html"><div>Human Resources</div></a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="rs-demos.html"><div>Health & Safety</div></a>
                                    </li>
                                </li>

                            </ul>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="#"><div>Top 10 Courses</div></a>
                            <ul class="sub-menu-container">
                                <li class="menu-item">
                                    <li class="menu-item">
                                        <a class="menu-link" href="rs-demos.html"><div>Communication Skills</div></a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="rs-demos.html"><div>Counselling</div></a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="rs-demos.html"><div>Human Resource</div></a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="rs-demos.html"><div>IT & Computer Skills</div></a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="rs-demos.html"><div>Leadership</div></a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="rs-demos.html"><div>All Top 10 Courses</div></a>
                                    </li>
                                </li>

                            </ul>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="#"><div>Discover</div></a>
                            <ul class="sub-menu-container">
                                <li class="menu-item">
                                    <li class="menu-item">
                                        <a class="menu-link" href="rs-demos.html"><div>Average Salary Guides</div></a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="rs-demos.html"><div>Funding For Learning</div></a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="rs-demos.html"><div>Webinars</div></a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="rs-demos.html"><div>Job & Salary</div></a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="rs-demos.html"><div>All Articles</div></a>
                                    </li>
                                </li>

                            </ul>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="#"><div>Advertise</div></a>
                            <ul class="sub-menu-container">
                                <li class="menu-item">
                                    <li class="menu-item">
                                        <a class="menu-link" href="rs-demos.html"><div>Our Services</div></a>
                                    </li>
                                </li>

                            </ul>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="{{ route('categories') }}"><div>Categories</div></a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="{{ route('events') }}"><div>Events</div></a>
                        </li>
                    </ul>


                </nav><!-- #primary-menu end -->

                <form class="top-search-form" action="search.html" method="get">
                    <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.." autocomplete="off">
                </form>

            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header>
