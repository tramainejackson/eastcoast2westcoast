@extends('mobile.layouts.app')
	@section('additional_css')
		@include('function.materialize_css')
	@endsection

	@section('additional_scripts')
		@include('function.materialize_js')
	@endsection

	@section('content')
		<div id="" class="carousel carousel-slider full-height" data-indicators="true">
			@if($inactiveTrips->count() > 0)
				@foreach($inactiveTrips as $trip)
					@php $content = Storage::disk('local')->has($trip->trip_photo); @endphp
					@php $tripsActivities = $trip->activities; @endphp
					<div id="" class="carousel-item">
						<div class="mobile-carousel-slider-item" id="{{ str_ireplace(' ', '_', strtolower($trip->trip_location)) . '_event' }}" style="background-image:url({{ $content == true ? asset('storage/' . str_ireplace('public/', '', $trip->trip_photo)) : '/images/skyline.jpg' }})">

							<h1 class="center white-text" style="margin-top: 0; padding-top: 50px;">{{ ucwords($trip->trip_location) }}</h1>
							<h3 class="center white-text">{{ $trip->trip_month . " ". $trip->trip_year }}</h3>

							@if($tripsActivities->count() > 0)
								<table class="striped highlight centered">
									<thead>
										<tr>
											<th>Date</th>
											<th>Location</th>
											<th>Event</th>
										</tr>
									<thead>

									<tbody>
										@foreach($tripsActivities as $activity)
											@if($activity->show_activity == "Y")
												<tr>
													<td>{{ $activity->activity_date }}</td>
													<td>{{ $activity->activity_location }}</td>
													<td>{{ $activity->trip_event }}</td>
												</tr>
											@endif
										@endforeach
									<tbody>
								</table>
							@else
								<div class="container">
									<div class="row">
										<div class="col s12">
											<p class="">No activities were added for this trip</p>
										</div>
									</div>
								</div>
							@endif
						</div>
					</div>
				@endforeach
			@endif
		</div>
	@endsection
