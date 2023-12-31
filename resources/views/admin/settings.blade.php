@extends('layouts.app')	@section('title', 'Settings For Administrators - Eastcoast2Westcoast')	@section('content')		@include('modals.delete_question')		<div class="col-12 px-5">			<div class="" id="questions_page">				<h1 class="pageTopicHeader">Received Questions</h1>				<table id="questions_table_admin" class="table table-striped table-responsive-sm" cellspacing="0" width="100%">					<thead>						<tr class="">							<th class="th-sm">Last Name</th>							<th class="th-sm">First Name</th>							<th class="th-sm">Question</th>							<th class="th-sm">Users Email</th>							<th class="th-sm">Date Received</th>							<th class="th-sm">Delete</th>						</tr>					</thead>					<tbody>						@foreach($getQuestionInfo as $showQuestion)							<tr class="">								<td class="align-middle">{{ $showQuestion->last_name != null ? $showQuestion->last_name : 'No Name Entered' }}</td>								<td class="align-middle">{{ $showQuestion->first_name != null ? $showQuestion->first_name : 'No Name Entered' }}</td>								<td class="align-middle">{{ $showQuestion->user_question != null ? $showQuestion->user_question : 'No Question Entered' }}</td>								<td class="align-middle">{{ $showQuestion->user_email != null ? $showQuestion->user_email : 'No Email Address Entered' }}</td>								<td class="align-middle">{{ $showQuestion->created_at->format("F d, Y") }}</td>								<td class="">									<button data-target="#delete_question" data-toggle="modal" type="button" class="btn btn-danger ml-0 deleteQuestionBtn">Remove</button>									<input type="number" class="hidden" value="{{ $showQuestion->id }}" hidden />								</td>							</tr>						@endforeach					</tbody>				</table>			</div>		</div>	@endsection