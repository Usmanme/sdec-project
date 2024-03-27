<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{asset('app-assets')}}/client/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="{{asset('app-assets')}}/client/css/style.css" type="text/css" />
	<link rel="stylesheet" href="{{asset('app-assets')}}/client/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="{{asset('app-assets')}}/client/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="{{asset('app-assets')}}/client/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="{{asset('app-assets')}}/client/css/magnific-popup.css" type="text/css" />
	<link rel="stylesheet" href="{{asset('app-assets')}}/client/css/calendar.css" type="text/css" />
	<link rel="stylesheet" href="{{asset('app-assets')}}/client/css/custom.css" type="text/css" />

    @yield('page-css')
</head>
<body class="stretched">

    {{view('front-end.layout.header')}}

    @yield('content')

    {{view('front-end.layout.footer')}}

    <script src="{{asset('app-assets')}}/client/js/jquery.js"></script>
	<script src="{{asset('app-assets')}}/client/js/plugins.min.js"></script>
	<script src="{{asset('app-assets')}}/client/js/jquery.calendario.js"></script>
	<script src="{{asset('app-assets')}}/client/js/events-data.js"></script>
	<script src="{{asset('app-assets')}}/client/js/moment.js"></script>
    <script src="{{asset('app-assets')}}/client/js/functions.js"></script>
	<script src="https://maps.google.com/maps/api/js?key=YOUR-API-KEY"></script>
    @yield('page-js')
	<!-- Footer Scripts
	============================================= -->

	<script>
		var cal = $( '#calendar' ).calendario( {
			onDayClick : function( $el, $contentEl, dateProperties ) {

				for( var key in dateProperties ) {
					console.log( key + ' = ' + dateProperties[ key ] );
				}

			},
			caldata : canvasEvents
		} ),
		$month = $( '#calendar-month' ).html( cal.getMonthName() ),
		$year = $( '#calendar-year' ).html( cal.getYear() );

		$( '#calendar-next' ).on( 'click', function() {
			cal.gotoNextMonth( updateMonthYear );
		} );
		$( '#calendar-prev' ).on( 'click', function() {
			cal.gotoPreviousMonth( updateMonthYear );
		} );
		$( '#calendar-current' ).on( 'click', function() {
			cal.gotoNow( updateMonthYear );
		} );

		function updateMonthYear() {
			$month.html( cal.getMonthName() );
			$year.html( cal.getYear() );
		}
	</script>
</body>
</html>
