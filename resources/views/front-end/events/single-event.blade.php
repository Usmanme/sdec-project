@extends('front-end.layout.app')
@section('title','Home')
@section('description','Home Descripiton.')
@section('keywords','Home Keywords')
@section('page-css')
@endsection
@section('content')
<div class="content-wrap">
				<div class="container clearfix">
					<div class="single-event">

						<div class="row col-mb-50">
							<div class="col-md-8 col-lg-9">
								<div class="entry-image mb-0">
									<a href="#"><img src="{{ asset('app-assets') }}/Events/{{ $data['event']->event_logo }}" alt="Event Single"></a>
									<div class="entry-overlay d-flex align-items-center justify-content-center">
										<span class="d-none d-md-flex">Starts in: </span><div class="countdown d-block d-md-flex is-countdown" data-year="2020" data-month="12"><span class="countdown-row countdown-show3"><span class="countdown-section"><span class="countdown-amount">{{ remainingHourMinSec($data['event']->start_date_time)[0]  }}</span><span class="countdown-period">Hours</span></span><span class="countdown-section"><span class="countdown-amount">{{ remainingHourMinSec($data['event']->start_date_time)[1] }}</span><span class="countdown-period">Minutes</span></span><span class="countdown-section"><span class="countdown-amount">{{ remainingHourMinSec($data['event']->start_date_time)[2]  }}</span><span class="countdown-period">Seconds</span></span></span></div>
									</div>
								</div>
							</div>

							<div class="col-md-4 col-lg-3">
								<div class="card event-meta mb-3">
									<div class="card-header"><h5 class="mb-0">Event Info:</h5></div>
									<div class="card-body">
										<ul class="iconlist mb-0">
											<li><i class="icon-calendar3"></i> {{ dateConversion($data['event']->start_date_time) }}</li>
											<li><i class="icon-time"></i> <span>{{ timeConversion($data['event']->start_date_time) }} </span> - <span> {{ timeConversion($data['event']->end_date_time)}}</span></li>
											<li><i class="icon-map-marker2"></i>{{ $data['event']->location ?? '' }}</li>
											<li><i class="icon-euro"></i> <strong>{{ $data['event']->registration_fee }}</strong></li>
										</ul>
									</div>
								</div>
								<a href="#" class="btn btn-success w-100 btn-lg">Buy Tickets</a>
							</div>

							<div class="w-100"></div>

							<div class="col-md-8 col-lg-9">

								<h3>Details</h3>

								<p>{{ $data['event']->description ?? '' }}</p>

                                @if(count($data['inclusions'])>0)
                                    <h4>Inclusions</h4>
                                    <div class="row col-mb-30">
                                        <div class="col-md-12">
                                            <ul class="iconlist mb-0">
                                                @foreach($data['inclusions'] as $inclusion)
                                                    <li><i class="icon-ok"></i> {{ $inclusion }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif

							</div>

							<div class="col-md-4 col-lg-3">
								<h4>Location</h4>

								<div class="gmap max-vh-40 max-vh-md-none" style="height: 300px; position: relative; overflow: hidden;" data-address="Ibiza, Spain" data-zoom="10" data-markers="[{ address: &quot;Ibiza, Spain&quot; }]" data-scrollwheel="false"><div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"><div class="gm-err-container"><div class="gm-err-content"><div class="gm-err-icon"><img src="https://maps.gstatic.com/mapfiles/api-3/images/icon_error.png" alt="" draggable="false" style="user-select: none;"></div><div class="gm-err-title">Oops! Something went wrong.</div><div class="gm-err-message">This page didn't load Google Maps correctly. See the JavaScript console for technical details.</div></div></div></div></div>
							</div>

							<div class="w-100"></div>

							<div class="col-md-7">
								<h4>Events Timeline</h4>

								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Timings</th>
												<th>Location</th>
												<th>Events</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><span class="badge bg-danger"><span>{{ timeConversion($data['event']->start_date_time)}}</span> - <span>{{ timeConversion($data['event']->end_date_time)}}</span></span></td>
												<td>{{ $data['event']->location }}</td>
												<td>{{ $data['event']->title }}</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

					</div>

				</div>
			</div>
@endsection

@section('page-js')
@endsection
