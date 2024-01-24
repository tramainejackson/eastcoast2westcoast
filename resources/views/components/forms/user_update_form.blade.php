<!-- Users Form -->
<form name="update_user" class="" action="{{ route('admin.edit', $user->id) }}" method="POST">

    @csrf
    @method('PATCH')

    <div class="updateUser">

        <div class="md-form form-outline" data-mdb-input-init>
            <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}"
                   placeholder="Firstname"/>

            @if ($errors->has('first_name'))
                <span class="text-danger">First Name cannot be empty</span>
            @endif

            <label class="form-label">Firstname</label>
        </div>

        <div class="md-form form-outline" data-mdb-input-init>
            <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}"
                   placeholder="Lastname"/>

            @if ($errors->has('last_name'))
                <span class="text-danger">Last Name cannot be empty</span>
            @endif

            <label class="form-label">Lastname</label>
        </div>

        <div class="md-form form-outline" data-mdb-input-init>
            <input type="text" name="email" class="form-control" value="{{ $user->email }}"
                   placeholder="Enter A Username"/>

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

            <div class="btn-group" id="user_{{ $user->id }}"
                 role="group">
                <input type="radio"
                       class="btn-check active_user_btn"
                       name="active"
                       id="active_user_1"
                       value="Y"
                       onclick="radioSwitch(this)"
                       autocomplete="off" {{ $user->active == 'Y' ? 'checked' : '' }} />
                <label class="btn{{ $user->active == 'N' ? ' btn-outline-success' : ' btn-success' }}"
                       for="active_user_1">Yes</label>

                <input type="radio"
                       class="btn-check active_user_btn"
                       name="active"
                       id="active_user_0"
                       value="N"
                       onclick="radioSwitch(this)"
                       autocomplete="off" {{ $user->active == 'N' ? 'checked' : '' }} />
                <label class="btn{{ $user->active == 'N' ?  ' btn-danger' : ' btn-outline-danger' }}"
                       for="active_user_0">No</label>
            </div>
        </div>

        <div class="mt-4 mb-5 pb-5">
            <div class="row justify-content-center align-items-center">
                <div class="col text-end">
                    <button class="btn btn-info ms-md-0" type="submit">Update User</button>
                </div>

                <div class="col text-start">
                    <button type="button" class="btn btn-danger ms-0" data-mdb-ripple-init data-mdb-modal-init
                            data-mdb-target="#delete_user">Remove User
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
