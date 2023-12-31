<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E2W Registration</title>
	<style>
		@media (max-width: 576px) {
			
		}
	</style>
</head>
<body>
    <div id="app" class="container" style="min-height:100vh;">
		<div class="">
			<img src="{{ asset('/images/E2W_Header.png') }}" class="" style="max-width: 100%;" />
		</div>
		<div class="">
			<h1 class="">{{ $trip->trip_location }}</h1>
		</div>
		<div class="">
			<p class="">Thanks for signing up for the trip to {{ $trip->trip_location }}. We will keep you posted with any updates regarding this vacation. Below is the information that we have list for you. If you have any questions please feel free to reach out to us at any time.</p>
		</div>
		<div class="">
			<ul class="" style="list-style: none;">
				<li class="">Firstname: <em>{{ $firstname }}</em></li>
				<li class="">Lastname: <em>{{ $lastname }}</em></li>
				<li class="">Email Address: <em>{{ $email }}</em></li>
			</ul>
		</div>
		<div class="">
			<h2 class=""><u>Contacts</u></h2>
			<div class="">
				<p class="" style="display: inline;">Contact: Deborah Jackson</p>
				<p class="" style="display: inline;">Email: <em>jacksond1961@yahoo.com</em></p>
			</div>
			<div class="">
				<p class="" style="display: inline;">Contact: Rhonda Lambert</p>
				<p class="" style="display: inline;">Email: <em>rhonda.lambert@sbcglobal.com</em></p>
			</div>
		</div>
	</div>
</body>