<div class="modal fade suggestionModal" id="suggestionModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<p>Where to Next? Help us decide where our next travel location should be!</p>
			</div>
			<div class="modal-body">
				<form id="suggestion_form1" action="/suggestions" method="POST">
				
					{{ method_field('POST') }}
					{{ csrf_field() }}
						
						<div class="custom-control custom-radio">
							<input class="nextLocation custom-control-input" id="niagra_falls" type="radio" name="next_location" value="Niagra Falls" />
							<label class="custom-control-label" for="niagra_falls">Niagra Falls</label>
						</div>
						<div class="custom-control custom-radio">
							<input class="nextLocation custom-control-input" id="Toronto" type="radio" name="next_location" value="Toronto" />
							<label class="custom-control-label" for="Toronto">Toronto</label>
						</div>
						<div class="custom-control custom-radio">
							<input class="nextLocation custom-control-input" id="DC" type="radio" name="next_location" value="DC" />
							<label class="custom-control-label" for="DC">Washington D.C.</label>
						</div>
						<div class="custom-control custom-radio">
							<input class="nextLocation custom-control-input" id="Miami" type="radio" name="next_location" value="Miami" />
							<label class="custom-control-label" for="Miami">Miami</label>
						</div>
						<div class="custom-control custom-radio">
							<input class="nextLocation custom-control-input" id="Houston" type="radio" name="next_location" value="Houston" />
							<label class="custom-control-label" for="Houston">Houston</label>
						</div>
						<div class="custom-control custom-radio">
							<input class="nextLocation custom-control-input" id="other_option" type="radio" name="next_location" value="Other" />
							<label class="custom-control-label" for="other_option">Other</label>
						</div>
						<div class="">
							<input type="text" name="other_location" class="d-block rounded ml-3 mb-3 p-1" id="other_location2" placeholder="Example: Disney Land" disabled />
						</div>

					<input type="submit" id="submit_suggestion" class="btn w-100" value="Send Suggestion" onclick="sendSuggestion();" />
				</form>
			</div>
		</div>
	</div>
</div>