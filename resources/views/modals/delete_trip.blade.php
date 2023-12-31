<div class="modal fade" id="delete_trip" tabindex="-2" role="dialog" aria-labelledby="deleteTrip" aria-hidden="true" data-backdrop="true">
	<div class="modal-dialog modal-lg modal-notify modal-danger">
		<div class="modal-content text-center">
			<!--Header-->
			<div class="modal-header d-flex justify-content-center">
				<h3 class="heading font-weight-bold">Are you sure?</h3>
			</div>
			<div class="modal-body">
				<!-- Delete Form -->
				<form method="POST" action="{{ route('location.destroy', $showLocation->id) }}" name="">

                    @csrf
                    @method('DELETE')

					<div class="">
						<p class="">Deleting this trip will remove them completely.<br/>Are you sure you want to delete this trip?</p>

						<div class="d-flex justify-content-between align-items-center">
							<button type="submit" class="btn btn-success">Confirm</button>
							<button type="button" class="btn btn-warning" data-dismiss="modal" aria-label="Close">Cancel</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
