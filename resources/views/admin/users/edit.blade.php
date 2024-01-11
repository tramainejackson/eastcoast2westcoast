<x-app-layout>

    @include('modals.delete_user')

    <div class="col-12 px-5" id="all_users">

        <form name="update_user" class="" action="{{ route('admin.edit', $user->id) }}" method="POST">

            @csrf
            @method('PATCH')

            <div id="pictures_page_header" class="">
                <h1 class="pageTopicHeader">Edit Admin</h1>
            </div>

            <div class="newUser">

                <div class="md-form form-outline" data-mdb-input-init>
                    <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}"
                           placeholder="Firstname"/>

                    @if ($errors->has('first_name'))
                        <span class="text-danger">First Name cannot be empty</span>
                    @endif

                    <label class="first_name form-label">Firstname</label>
                </div>

                <div class="md-form form-outline" data-mdb-input-init>
                    <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}"
                           placeholder="Lastname"/>

                    @if ($errors->has('last_name'))
                        <span class="text-danger">Last Name cannot be empty</span>
                    @endif

                    <label class="last_name form-label">Lastname</label>
                </div>

                <div class="md-form form-outline" data-mdb-input-init>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}"
                           placeholder="Enter A Username"/>

                    @if ($errors->has('email'))
                        <span class="text-danger">Email cannot be empty</span>
                    @endif

                    <label class="username form-label">Email Address</label>
                </div>

                <div class="md-form form-outline">
                    <input type="text" name="password" class="form-control" value=""
                           placeholder="Enter A New Password"/>

                    @if ($errors->has('password'))
                        <span class="text-danger">Password must be at least 7 characters long</span>
                    @endif

                    <label class="password form-label">New Password</label>
                </div>

                <div class="md-form">

                    <div class="btn-group mt-2">
                        <button type="button"
                                class="btn yesBtn{{ $user->active == 'Y' ? ' btn-success active' : ' stylish-color' }}">
                            <input type="checkbox" name="active" value="Y"
                                   {{ $user->active == 'Y' ? 'checked' : '' }} hidden/>Yes
                        </button>

                        <button type="button"
                                class="btn noBtn{{ $user->active == 'N' ? ' btn-danger active' : ' stylish-color' }}">
                            <input type="checkbox" name="active" value="N"
                                   {{ $user->active == 'N' ? 'checked' : '' }} hidden/>No
                        </button>
                    </div>

                    <label class="active">Active User</label>
                </div>

                <div class="md-form" id="">
                    <div class="form-row justify-content-center align-items-center">
                        <div class="newAdminInput mr-md-5">
                            <button class="btn btn-info ml-md-0" type="submit">Update User</button>
                        </div>

                        <div class="">
                            <button data-target="#delete_user" data-toggle="modal" type="button"
                                    class="btn btn-danger ml-0">Remove User
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>
