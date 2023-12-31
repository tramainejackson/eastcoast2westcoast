<x-app-layout>

    <div class="col-12 px-5" id="all_users">

        <div id="users_page_header" class="">
            <h1 class="pageTopicHeader">Add New Contact</h1>
        </div>

        <div class="py-4">
            <a href="{{ route('participants.index') }}" class="btn btn-success ml-0">Edit Contacts</a>
        </div>

        <div class="newUser">

            <form method="POST" action="{{ route('contacts.store') }}" name="">

                @csrf

                <div class="md-form">
                    <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}"
                           placeholder="Enter Firstname"/>

                    @if ($errors->has('first_name'))
                        <span class="text-danger">First Name cannot be empty</span>
                    @endif

                    <label for="first_name" class="">First Name</label>
                </div>

                <div class="md-form">
                    <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}"
                           placeholder="Enter Lastname"/>

                    @if ($errors->has('last_name'))
                        <span class="text-danger">Last Name cannot be empty</span>
                    @endif

                    <label for="last_name" class="">Last Name</label>
                </div>

                <div class="md-form">
                    <input type="text" name="email" class="form-control" value="{{ old('email') }}"
                           placeholder="Enter Email Address"/>

                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif

                    <label for="email" class="">Email Address</label>
                </div>

                <div class="md-form">
                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}"
                           placeholder="Enter Phone Number"/>

                    @if($errors->has('phone'))
                        <span class="text-danger">Phone number doesn't have enough numbers</span>
                    @endif

                    <label for="phone" class="">Phone Number</label>
                </div>

                <div class="md-form">
                    <input type="number" name="family_size" class="form-control" value="{{ old('family_size') }}"
                           placeholder="Enter Family Size"/>

                    @if($errors->has('family_size'))
                        <span class="text-danger">Family Size Must Be Numeric</span>
                    @endif

                    <label for="family_size" class="">Family Size</label>
                </div>

                <div class="md-form input-with-post-icon datepicker">
                    <input type="text" name="dob" class="form-control" id="input_dob" value="{{ old('dob') }}"
                           placeholder="Select DOB"/>

                    <label for="dob" class="">Date of Birth</label>
                    <i class="fas fa-calendar input-prefix" tabindex=0></i>
                </div>

                <div class="newAdminInput">
                    <button type="submit" class="btn btn-info ml-0">Add Contact</button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
