<x-app-layout>

		<div class="col-12 px-5" id="all_users">

			<div id="users_page_header" class="">
				<h1 class="pageTopicHeader">Add New Admins</h1>
			</div>

			<div class="col py-4 pl-0">
				<a href="{{ route('admin.index') }}" class="btn btn-success ml-0">Edit Users</a>
			</div>

			<div class="newUser">

				<form name="new_admin_user" class="" action="/admin" method="POST">

					{{ method_field('POST') }}
					{{ csrf_field() }}

					<div class="md-form">
						<input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" placeholder="Enter Firstname" />

						@if ($errors->has('first_name'))
							<span class="text-danger">First Name cannot be empty</span>
						@endif

						<label for="first_name" class="">First Name</label>
					</div>

					<div class="md-form">
						<input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" placeholder="Enter Lastname" />

						@if ($errors->has('last_name'))
							<span class="text-danger">Last Name cannot be empty</span>
						@endif

						<label for="last_name" class="">Last Name</label>
					</div>

					<div class="md-form">
						<input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter Email Address" />

						@if ($errors->has('email'))
							<span class="text-danger">Email Address cannot be empty</span>
						@endif

						<label for="email" class="">Email Address</label>
					</div>

					<div class="md-form">
						<input type="text" name="password" class="form-control" placeholder="Enter Password" />

						@if ($errors->has('password'))
							<span class="text-danger">Password cannot be empty</span>
						@endif

						<label for="password" class="text-light">Password</label>
					</div>

					<div class="md-form">

						<div class="btn-group mt-2">
							<button type="button" class="btn stylish-color yesBtn">
								<input type="checkbox" name="active" value="Y" hidden />Yes
							</button>

							<button type="button" class="btn btn-danger noBtn active">
								<input type="checkbox" name="active" value="N" checked hidden />No
							</button>
						</div>

						<label for="active" class="active">Active User</label>
					</div>

					<div class="newAdminInput">
						<button type="submit" class="btn btn-info ml-0">Add User</button>
					</div>

				</form>
			</div>
		</div>

    </x-app-layout>
