<!-- Users Form -->
<form name="new_contact_user" class="" action="{{ route('contacts.store') }}" method="POST">

    @csrf

    <div class="createContact">

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
            <input type="tel" name="phone" class="form-control" value="{{ old('phone') }}"
                   placeholder="Enter Phone Number"/>

            @if ($errors->has('phone'))
                <span class="text-danger">Phone number doesn't have enough numbers</span>
            @endif

            <label class="form-label">Phone Number</label>
        </div>

        <div class="md-form form-outline" data-mdb-input-init>
            <input type="number" name="family_size" class="form-control" value="{{ old('family_size') }}"
                   placeholder="Enter Family Size"/>

            @if ($errors->has('family_size'))
                <span class="text-danger">Family Size Must Be Numeric</span>
            @endif

            <label class="form-label">Family Size</label>
        </div>

        <div class="md-form form-outline" data-mdb-datepicker-init data-mdb-input-init>
            <input type="text" name="dob" class="form-control" value="{{ old('dob') }}"
                   placeholder="Select Date"/>

            @if ($errors->has('dob'))
                <span class="text-danger">DOB Must Be Date</span>
            @endif

            <label class="form-label">Date of Birth</label>
        </div>

        <div class="mt-3">
            <div class="row justify-content-center align-items-center">
                <div class="col text-start">
                    <button class="btn btn-info btn-lg ms-md-0" type="submit">Add Contact</button>
                </div>
            </div>
        </div>
    </div>
</form>
