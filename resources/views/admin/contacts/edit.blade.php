<x-app-layout>

    @section('title', 'Edit Contact - Eastcoast2Westcoast')

    @section('additional_css')
        <style type="text/css">

            .chip.chip-md {
                height: 42px;
                line-height: 42px;
                border-radius: 21px;
            }

            .chip.chip-md img {
                height: 42px;
                width: 42px;
            }

            .chip.chip-md .close {
                height: 42px;
                line-height: 42px;
                border-radius: 21px;
            }

            .chip.chip-lg {
                height: 52px;
                line-height: 52px;
                border-radius: 26px;
            }

            .chip.chip-lg img {
                height: 52px;
                width: 52px;
            }

            .chip.chip-lg .close {
                height: 52px;
                line-height: 52px;
                border-radius: 26px;
            }

        </style>
    @endsection

    @section('additional_scripts')
        <script type="text/javascript">

            $('body').on('click', '.fa-check.close', function () {
                var trip = $(this).parent().attr('id').replace('trip_chip_', '');
                var trip_name = $(this).parent().text();
                var contact_id = $('.contactID').val();

                $.ajax({
                    method: "PATCH",
                    url: "/locations/add_contact/" + contact_id + "/" + trip,
                }).done(function (data) {

                    if (data == 'Successful') {
                        //Remove no trips message if there
                        if ($('.emtpyTrips').length > 0) {
                            $('.emtpyTrips').addClass('fadeOutUp');
                        }

                        // Create new button for the contacts trip
                        var newButton = '<a class="btn btn-default animated fadeInDown" href="/location/' + trip + '/edit" type="button">' + trip_name + '</a>';

                        // Append the new button to the contacts trip div
                        $('.contactsTrips').append(newButton);

                        // Display an alert with success message
                        toastr.success('User Added to ' + trip_name);
                    }
                });
            });
        </script>
    @endsection

    @include('modals.delete_contact')

    <div class="col-12 px-5" id="all_users">

        <form method="POST" action="{{ route('contacts.update', $contact->id) }}" name="">

            @csrf
            @method('PATCH')

            <div id="pictures_page_header" class="">
                <h1 class="pageTopicHeader">Edit Contact

                    <div class="d-inline-block ml-5">
                        <button data-target="#delete_contact" data-toggle="modal" type="button"
                                class="btn btn-danger ml-0">Remove Contact
                        </button>
                    </div>
                </h1>
            </div>

            <div class="newUser">

                <div class="md-form">
                    <input type="text" name="first_name" class="form-control" value="{{ $contact->first_name }}"
                           placeholder="Firstname"/>

                    @if ($errors->has('first_name'))
                        <span class="text-danger">First Name cannot be empty</span>
                    @endif

                    <label class="first_name">Firstname</label>
                </div>

                <div class="md-form">
                    <input type="text" name="last_name" class="form-control" value="{{ $contact->last_name }}"
                           placeholder="Lastname"/>

                    @if ($errors->has('last_name'))
                        <span class="text-danger">Last Name cannot be empty</span>
                    @endif

                    <label class="last_name">Lastname</label>
                </div>

                <div class="md-form">
                    <input type="email" name="email" class="form-control" value="{{ $contact->email }}"
                           placeholder="Enter An Email Address"/>

                    @if ($errors->has('email'))
                        <span class="text-danger">Email cannot be empty</span>
                    @endif

                    <label for="username">Email Address</label>
                </div>

                <div class="md-form">
                    <input type="text" name="phone" class="form-control" value="{{ $contact->phone }}"
                           placeholder="Enter A Phone Number"/>

                    @if ($errors->has('phone'))
                        <span class="text-danger">Phone number cannot be empty</span>
                    @endif

                    <label for="phone">Phone Number</label>
                </div>

                <div class="md-form">
                    <input type="text" name="family_size" class="form-control" value="{{ $contact->family_size }}"
                           placeholder="Enter A Family Size"/>

                    @if ($errors->has('family_size'))
                        <span class="text-danger">Family size must be numeric</span>
                    @endif

                    <label for="family_size">Family Size</label>
                </div>

                <div class="md-form input-with-post-icon datepicker">
                    <input type="text" name="dob" class="form-control" data-value="{{ $contact->dob }}"
                           placeholder="Select a DOB"/>

                    <label for="dob" class="">Date of Birth</label>
                    <i class="fas fa-calendar input-prefix" tabindex=0></i>
                </div>

                <div class="contactsTrips" id="">
                    <h3>Contacts Trips</h3>

                    @if($trips->count() > 0)
                        @foreach($trips as $contact_trip)
                            <a class='btn btn-default{{ $loop->first ? ' ms-0' : '' }}'
                               href="{{ route('location.edit', $contact_trip->trip_id) }}"
                               type='button'>{{ $contact_trip->trip->trip_location }}</a>
                        @endforeach
                    @else
                        <h4 class="h4 h4-responsive text-center emtpyTrips animated">This contact hasn't been added to
                            any trips yet</h4>
                    @endif
                </div>

                @if($missing_trips->count() > 0)
                    <div class="mt-5" id="">

                        <h3>Select A Trip To Add Contact To</h3>
                        @foreach($missing_trips as $trip)
                            <span id="trip_chip_{{ $trip->id }}" class='chip chip-md indigo lighten-4 indigo-text'>{{ $trip->trip_location }}<i
                                    class="close fas fa-check"></i></span>
                        @endforeach
                    </div>
                @endif

                <div class="">
                    <button class="btn btn-info ml-0" type="submit">Update Contact</button>
                    <input class="d-none hidden contactID" type="number" value="{{ $contact->id }}" hidden/>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>
