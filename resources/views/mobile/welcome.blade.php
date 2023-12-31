@extends('mobile.layouts.app')
	@section('additional_css')
		@include('function.materialize_css')
	@endsection

	@section('additional_scripts')
		@include('function.materialize_js')
	@endsection

	@section('content')
		<div id="" class="carousel carousel-slider full-height" data-indicators="true">
			@foreach($activeTrips as $trip)
				@php $content = Storage::disk('local')->has($trip->trip_photo); @endphp
				@php $tripsActivities = $trip->activities; @endphp
				<div id="" class="carousel-item">
					<div class="mobile-carousel-slider-item" id="{{ str_ireplace(' ', '_', strtolower($trip->trip_location)) . '_event' }}" style="background:linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url({{ $content == true ? asset('storage/' . str_ireplace('public/', '', $trip->trip_photo)) : '/images/skyline.jpg' }});">
						<h1 class="center white-text" style="margin-top: 0; padding-top: 50px;">{{ ucwords($trip->trip_location) }}</h1>
						<h3 class="center white-text">{{ $trip->trip_month . " ". $trip->trip_year }}</h3>

						@if($tripsActivities->count() > 0)
							<table class="west_calendar">
								<tr>
									<th class="header_data" id="date_data">Date</th>
									<th class="header_data" id="middle_th_data">Location</th>
									<th class="header_data" id="event_data">Event</th>
								</tr>

								@foreach($tripsActivities as $activity)
									@if($activity->show_activity == "Y")
										<tr>
											<td>{{ $activity->activity_date }}</td>
											<td class="middle_data">{{ $activity->activity_location }}</td>
											<td>{{ $activity->trip_event }}</td>
										</tr>
									@endif
								@endforeach
							</table>
						@endif
						<div class="carousel-fixed-item center">
							<a href="/location/{{ $trip->id }}" class="btn waves-effect white grey-text darken-text-2">Click For More Information</a>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	@endsection
