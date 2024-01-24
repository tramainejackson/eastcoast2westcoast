<!-- Contacts Form -->
<form method="POST" action="{{ route('contacts.update', $contact->id) }}" name="">

    @csrf
    @method('PATCH')

    <div class="updateContact">

        <div class="md-form form-outline" data-mdb-input-init>
            <input type="text" name="first_name" class="form-control" value="{{ $contact->first_name }}"
                   placeholder="Firstname"/>

            @if ($errors->has('first_name'))
                <span class="text-danger">First Name cannot be empty</span>
            @endif

            <label for="first_name" class="form-label">Firstname</label>
        </div>

        <div class="md-form form-outline" data-mdb-input-init>
            <input type="text" name="last_name" class="form-control" value="{{ $contact->last_name }}"
                   placeholder="Lastname"/>

            @if ($errors->has('last_name'))
                <span class="text-danger">Last Name cannot be empty</span>
            @endif

            <label for="last_name" class="form-label">Lastname</label>
        </div>

        <div class="md-form form-outline" data-mdb-input-init>
            <input type="email" name="email" class="form-control" value="{{ $contact->email }}"
                   placeholder="Enter An Email Address"/>

            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors('email') }}</span>
            @endif

            <label for="username" class="form-label">Email Address</label>
        </div>

        <div class="md-form form-outline" data-mdb-input-init>
            <input type="tel" name="phone" class="form-control" value="{{ $contact->phone }}"
                   placeholder="Enter A Phone Number"/>

            @if ($errors->has('phone'))
                <span class="text-danger">Phone number cannot be empty</span>
            @endif

            <label for="phone" class="form-label">Phone Number</label>
        </div>

        <div class="md-form form-outline" data-mdb-input-init>
            <input type="number" name="family_size" class="form-control" value="{{ $contact->family_size }}"
                   placeholder="Enter A Family Size"/>

            @if ($errors->has('family_size'))
                <span class="text-danger">Family size must be numeric</span>
            @endif

            <label for="family_size" class="form-label">Family Size</label>
        </div>

        <div class="md-form form-outline" data-mdb-datepicker-init data-mdb-input-init>
            <input type="text" name="dob" class="form-control" data-value="{{ $contact->dob }}"
                   placeholder="Select DOB"/>

            @if ($errors->has('dob'))
                <span class="text-danger">DOB Must Be Date</span>
            @endif

            <label for="dob" class="form-label">Date of Birth</label>
        </div>

        <hr class="hr hr-blurry my-5"/>

        <div class="" id="contactsTrips">
            <h3 class="h3">Contacts Trips</h3>
            <div class="">
                <i class="fas fa-circle-info pe-2"></i>
                <p class="text-danger-emphasis d-inline">Here is the trips that this contact has attended or has signed up to attend.</p>
            </div>

            @if($trips->count() > 0)
                @foreach($trips as $contact_trip)
                    <a class='btn btn-secondary btn-lg me-2'
                       href="{{ route('location.edit', $contact_trip->trip_id) }}"
                       type='button'>{{ $contact_trip->trip->trip_location }}</a>
                @endforeach
            @else
                <h4 id="emtpy_trips"
                    class="h4 h4-responsive text-center animated"
                    data-mdb-animation-init
                    data-mdb-animation-reset="true">
                    {{ 'This contact hasn\'t been added to any trips yet' }}
                </h4>
            @endif
        </div>

        @if($missing_trips->count() > 0)
            <div class="mt-5" id="availableTrips">

                <h3>Select A Trip To Add Contact To</h3>
                <div class="">
                    <i class="fas fa-circle-info pe-2"></i>
                    <p class="text-warning-emphasis d-inline">Here are the available trips that this contact can be
                        added to.</p>
                </div>

                @foreach($missing_trips as $trip)
                    <div id="trip_chip_{{ $loop->iteration }}"
                         class='chip chip-lg d-inline-flex'
                         onclick="updateSelectedTrips({{ $trip->id }}, {{ $contact->id }}, '{{ $trip->trip_location }}')"
                         data-mdb-chip-init
                         data-mdb-ripple-init><span id="{{ str_ireplace([' ', '.'], '_', strtolower($trip->trip_location)) }}">{{ $trip->trip_location }}</span>
                        <i class="fas fa-check float-end ps-2"></i>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-4 mb-5 pb-5">
            <div class="row justify-content-center align-items-center">
                <div class="col text-end">
                    <button class="btn btn-info ms-md-0" type="submit">Update Contact</button>
                </div>

                <div class="col text-start">
                    <button data-mdb-target="#delete_contact" type="button" data-mdb-ripple-init data-mdb-modal-init
                            class="btn btn-danger ms-0">Remove Contact
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
