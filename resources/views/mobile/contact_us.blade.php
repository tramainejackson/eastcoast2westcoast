@extends('mobile.layouts.app')
	@section('additional_css')
		@include('function.materialize_css')
	@endsection

	@section('additional_scripts')
		@include('function.materialize_js')
	@endsection

	@section('content')
		<div id="" class="container">
			<div class="row">
				<div class="col s12">
					<h2 class="white-text center" style="margin-top: 0; padding-top: 50px;">Contact Us</h2>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					<div class="card" id="">
						<div class="card-image">
							<img class="" src="/images/holly13.jpg" />
							<span class="card-title">Deborah Jackson</span>
						</div>
						<!-- <div class="card-content">
							<p class="contact_name"></p>
						</div> -->
						<div class="card-action">
							<p class="contact_email">Email: <a href="mailto:jacksond1961@yahoo.com" class="">jacksond1961@yahoo.com</a></p>
						</div>
					</div>
				</div>
				<div class="col s12">
					<div class="card" id="">
						<div class="card-image">
							<img class="card-img-top" src="/images/RhondaLambert3.png" />
							<span class="card-title">Rhonda Lambert</span>
						</div>
						<!-- <div class="card-content">
							<p class="contact_name"></p>
						</div> -->
						<div class="card-action">
							<p class="contact_email">Email: <a href="mailto:rhonda.lambert@sbcglobal.com" class="">rhonda.lambert@sbcglobal.com</a></p>
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="margin-bottom: 0px;">
				<div class="col s12">
					<form id="question_form1" action="/questions" method="POST">

						{{ method_field('POST') }}
						{{ csrf_field() }}

						<div class="row">
							<div class="col s12 input-field">
								<label for="first_name">First Name:</label>
								<input class="form-control" type="text" id="first_name" name="first_name" required />
							</div>
						</div>
						<div class="row">
							<div class="col s12 input-field">
								<label for="last_name">Last Name:</label>
								<input class="form-control" type="text" id="last_name" name="last_name" required />
							</div>
						</div>
						<div class="row">
							<div class="col s12 input-field">
								<label for="email_address">Email Address:</label>
								<input class="form-control" type="email" id="email_address" name="email_address" required />
							</div>
						</div>
						<div class="row">
							<div class="col s12 input-field">
								<label for="question_text">Question:</label>
								<textarea class="" id="question_text" name="question_text" rows="5" cols="15"required></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col s12 input-field">
								<button type="submit" name="submit" id="" class="btn waves-effect waves-light" value="Send Question">Send <i class="material-icons right">send</i></button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	@endsection
