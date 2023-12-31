@extends('mobile.layouts.app')
	@section('additional_css')
		@include('function.materialize_css')
	@endsection

	@section('additional_scripts')
		@include('function.materialize_js')
	@endsection

	@section('content')
	<div class="container">
		<div class="full-height">
			<div class="row">
				<div class="col s12">
					<h2 class="white-text center" style="margin-top: 0; padding-top: 50px;">About Us</h2>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<p id="" class="white-text black">
						Here at EastCoast to WestCoast Travel, we have the ultimate family oriented experience because that's how we got started.  A group of friends decided that we wanted to travel and see the world. And who better to do that with than the closest people to you. So tell a brother, sister, cousin, friend, co-worker or whoever you think you would have the most fun with. And we're never short of activities. Check out the upcoming trips we have on the East and West coast and see what activites we have planned for each trip. Don't forget to sign up for the one you would be most interested in. Hope you decide to come along for the ride.
					</p>
				</div>
			</div>
		</div>
	</div>
	@endsection
