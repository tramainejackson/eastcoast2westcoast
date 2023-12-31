@extends('layouts.app')
	@section('additional_css')
		@include('function.bootstrap_css')
	@endsection

	@section('additional_scripts')
		@include('function.bootstrap_js')
	@endsection

	@section('content')
		<div id="admin_page">
			<h1 id="admin_page_header">Eastcoast to Westcoast Travel</h1>

			@include('layouts.admin_nav')

			@isset($error)
				@empty(!$error)
					<h4>{{ $error }}</h4>
				@endempty
			@endisset

			<div class="adminDiv" id="">
				<div id="pictures_page_header" class="">
					<h1 class="pageTopicHeader">Trip Pictures</h1>
				</div>
				@foreach($getLocations as $location)
					@php $getAllPictures = $location->pictures; @endphp
					<div class="currentPicturesDiv">
						<div class="text-white d-flex align-items-center">
							<h2 class="display-3">{{ $location->trip_location }}</h2>
							@if($getAllPictures->count() > 0)
								<a href="/pictures/{{$location->id}}/edit" class="btn btn-primary btn-lg ml-3">Edit</a>
							@endif
						</div>
						@if($getAllPictures->count() > 0)
							<div class="">
								<span class="text-light"><i>Total Pictures:</i> {{ $getAllPictures->count() }}</span>
							</div>
						@endif
						<div class="container-fluid">
							<div class="row">
								@if($getAllPictures->count() < 1)
									<div class="col">
										<div class="noPicturesDiv">
											<p class="noValueMessage text-light">There have been no pictures added yet for this location.&nbsp;<a href="{{ route('pictures.create') }}">Add New Pictures Now</a></p>
										</div>
									</div>
								@else
									@foreach($getAllPictures as $picture)
										@php $content = Storage::disk('local')->has($picture->picture_name); @endphp
										<div class="col-3">
											<div class="card my-2">
												<img src="{{ $content == true ? asset('storage/' . str_ireplace('public/', '', $picture->picture_name)) : '/images/no_image_lg.png' }}" class="card-img-top" style="" />
												<div class="card-footer">
													<span class="text-center">{{ $picture->picture_caption != null ? $picture->picture_caption : 'No Caption Added Yet' }}</span>
												</div>
											</div>
										</div>
									@endforeach
								@endif
							</div>
						</div>
						@if(!$loop->last)
							<div class="divider"></div>
						@endif
					</div>
				@endforeach
			</div>
		</div>
	@endsection
