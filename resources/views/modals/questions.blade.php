<div class="modal fade questionModal" id="questionModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<p>Got a question? Fill in your email address and your question and we&rsquo;ll get back to you as soon as possible.</p>
			</div>
			<div class="modal-body">
				<form id="question_form1" action="/questions" method="POST">
				
					{{ method_field('POST') }}
					{{ csrf_field() }}
						
					<div class="md-form">
						<label for="first_name">First Name:</label>
						<input class="form-control" type="text" id="first_name" name="first_name" required />
					</div>
					<div class="md-form">
						<label for="last_name">Last Name:</label>
						<input class="form-control" type="text" id="last_name" name="last_name" required />
					</div>
					<div class="md-form">
						<label for="email_address">Email Address:</label>
						<input class="form-control" type="email" id="email_address" name="email_address" required />
					</div>
					<div class="md-form">
						<label for="question_text">Question:</label>
						<textarea class="form-control" id="question_text" name="question_text" rows="5" cols="15"required></textarea>
					</div>
					<div class="md-form">
						<input type="submit" id="submit_question" class="btn w-100" onclick="sendQuestion();" value="Send Question" />
					</div>
				</form>
			</div>
		</div>
	</div>
</div>