@if($getPictures->count() > 0)
	<div class="picture_modal_content" style="display:none">
		<div id="trip_location_pictures">
			@foreach($getPictures as $showPicture)
				@php $content = Storage::disk('local')->has($showPicture->picture_name); @endphp
				<a href="{{ $content == true ? asset('storage/' . str_ireplace('public/', '', $showPicture->picture_name)) : '/images/no_image_lg.png' }}" alt="{{ $showPicture->picture_caption }}" id="{{ $showPicture->picture_id }}" class="tripPictures" title="{{ $showPicture->picture_caption }}"></a>
			@endforeach
		</div>
	</div>
@else
	<div class="modal fade noContentReturned" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">{{ $trip->trip_location }}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div id="trip_location_pictures">
						<h2>No pictures have been added yet for this trip</h2>
					</div>
				</div>
				<div class="modal-footer">
					<p class="additionalPictures">If you have any pictures or videos that you want posted, please send them to <a class="mailToLink" href="mailto:jacksond1961@yahoo.com?cc=rhonda.lambert@sbcglobal.com&subject=Trip%20Pictures">jacksond1961@yahoo.com</a></p>
				</div>
			</div>	
		</div>	
	</div>	
@endif