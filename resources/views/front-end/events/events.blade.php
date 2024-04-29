@extends('front-end.layout.app')
@section('title', 'Home')
@section('description', 'Home Descripiton.')
@section('keywords', 'Home Keywords')
@section('page-css')
@endsection
@section('content')
    <div class="content-wrap">
        <div class="container clearfix">

            <div class="row">
                <div class="postcontent col-lg-9">

                    <div class="row">
                        @forelse ($data['events'] as $event)
                            <div class="entry event col-12">
                                <div class="grid-inner row g-0 p-4">
                                    <div class="col-md-5 mb-md-0">
                                        <a href="{{ route('event.details',['id'=>$event['id']]) }}" class="entry-image">
                                            <img src="{{ asset('app-assets') }}/events/{{ $event['event_logo'] }}"
                                                alt="Inventore voluptates velit totam ipsa tenetur">
                                            <div class="entry-date">
                                                {{ dateMonth($event->start_date_time)[0] }}<span>{{ dateMonth($event->start_date_time)[1] }}</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-7 ps-md-4">
                                        <div class="entry-title title-sm">
                                            <h2><a href="{{ route('event.details',['id'=>$event['id']]) }}">{{ $event->title }}</a></h2>
                                        </div>
                                        <div class="entry-meta">
                                            <ul>
                                                <li><span class="badge bg-warning text-dark py-1 px-2">Private</span></li>
                                                <li><a href="{{ route('event.details',['id'=>$event['id']]) }}"><i class="icon-time"></i>
                                                        {{ timeConversion($event->start_date_time) }} -
                                                        {{ timeConversion($event->end_date_time) }}</a></li>
                                                <li><a href="{{ route('event.details',['id'=>$event['id']]) }}"><i class="icon-map-marker2"></i>
                                                        {{ $event->location }}</a></li>
                                            </ul>
                                        </div>
                                        <div class="entry-content">
                                            <p>{{ $event->description }}</p>
                                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur voluptate rerum molestiae eaque possimus exercitationem eligendi fuga.</p> --}}
                                            {{-- <a href="#" class="btn btn-secondary disabled">Buy Tickets</a> --}}
                                            <a href="{{ route('event.details',['id'=>$event['id']]) }}" class="btn btn-danger">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div style="text-align: center">No Event Found</div>
                        @endforelse

                    </div>

                    <!-- Pager
                    ============================================= -->
                    <div class="d-flex justify-content-between">
                        {{ $data['events']->links() }}
                    </div>
                    <!-- .pager end -->

                </div>

                <div class="sidebar col-lg-3">
                    <div class="sidebar-widgets-wrap">

                        <div class="widget">
                            <h4>Events</h4>

                            <div id="oc-portfolio-sidebar"
                                class="owl-carousel carousel-widget owl-loaded owl-drag with-carousel-dots" data-items="1"
                                data-margin="10" data-loop="true" data-nav="false" data-autoplay="5000">





                                <div class="owl-stage-outer">
                                    <div class="owl-stage"
                                        style="transform: translate3d(-542px, 0px, 0px); transition: all 0.25s ease 0s; width: 1626px;">
                                        @forelse ($data['all_events'] as $all_event)
                                            <div class="owl-item cloned" style="width: 261px; margin-right: 10px;">
                                                <div class="portfolio-item">
                                                    <div class="portfolio-image">
                                                        <a href="{{ route('event.details',['id'=>$all_event['id']]) }}">
                                                            <img src="{{ asset('app-assets') }}/events/{{ $all_event['event_logo'] }}" alt="Image">
                                                        </a>
                                                        <div class="bg-overlay">
                                                            <div class="bg-overlay-bg dark not-animated"
                                                                data-hover-animate="fadeIn" data-hover-speed="350"
                                                                style="animation-duration: 350ms;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="portfolio-desc center pb-0">
                                                        <h3><a href="{{ route('event.details',['id'=>$all_event['id']]) }}">{{$all_event['title']}}</a></h3>
                                                        <span><a href="{{ route('event.details',['id'=>$all_event['id']]) }}">{{$all_event['location']}}</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <h3>No Event Found</h3>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="owl-nav disabled"><button type="button" role="presentation"
                                        class="owl-prev"><i class="icon-angle-left"></i></button><button type="button"
                                        role="presentation" class="owl-next"><i class="icon-angle-right"></i></button>
                                </div>
                                <div class="owl-dots">
                                    {{-- <button role="button" class="owl-dot active"><span></span></button> --}}
                                    {{-- <button role="button" class="owl-dot"><span></span></button></div> --}}
                            </div>
                        </div>



                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('page-js')
@endsection
