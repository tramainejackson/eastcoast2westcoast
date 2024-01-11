<!-- Users Form -->
<form name="new_admin_user" class="" action="{{ route('admin.store') }}" method="POST">

    @csrf

    <div class="createUser">

        <div class="md-form form-outline" data-mdb-input-init>
            <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}"
                   placeholder="Enter Firstname"/>

            @if ($errors->has('first_name'))
                <span class="text-danger">First Name cannot be empty</span>
            @endif

            <label class="form-label">Firstname</label>
        </div>

        <div class="md-form form-outline" data-mdb-input-init>
            <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}"
                   placeholder="Enter Lastname"/>

            @if ($errors->has('last_name'))
                <span class="text-danger">Last Name cannot be empty</span>
            @endif

            <label class="form-label">Lastname</label>
        </div>

        <div class="md-form form-outline" data-mdb-input-init>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}"
                   placeholder="Enter Email Address"/>

            @if ($errors->has('email'))
                <span class="text-danger">Email cannot be empty</span>
            @endif

            <label class="form-label">Email Address</label>
        </div>

        <div class="md-form form-outline" data-mdb-input-init>
            <input type="text" name="password" class="form-control" value=""
                   placeholder="Enter A New Password"/>

            @if ($errors->has('password'))
                <span class="text-danger">Password must be at least 7 characters long</span>
            @endif

            <label class="form-label">New Password</label>
        </div>

        <div class="text-start">
            <p class="mb-0 ms-1 text-black-50">Active User?</p>

            <div class="btn-group" id=""
                 role="group">
                <input type="radio"
                       class="btn-check active_user_btn"
                       name="active"
                       id="active_user_1"
                       value="Y"
                       onclick="radioSwitch(this)"
                       autocomplete="off" />
                <label class="btn btn-outline-success"
                       for="active_user_1">Yes</label>

                <input type="radio"
                       class="btn-check active_user_btn"
                       name="active"
                       id="active_user_0"
                       value="N"
                       onclick="radioSwitch(this)"
                       autocomplete="off" checked />
                <label class="btn btn-success"
                       for="active_user_0">No</label>
            </div>
        </div>

        <div class="mt-3">
            <div class="row justify-content-center align-items-center">
                <div class="col text-start">
                    <button class="btn btn-info btn-lg ms-md-0" type="submit">Add User</button>
                </div>
            </div>
        </div>
    </div>
</form>
