<x-app-layout>

    <div class="showTrip col-12 px-0 {{ Auth::check() ? 'mt-n5' : 'mt-5' }}"
         style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{ $tripLocation->trip_photo != null ? asset('storage/' . str_ireplace('public/', '', $tripLocation->trip_photo)) : '/images/skyline.jpg' }})">

        <div class="col pt-4 rgba-stylish-strong">

            <div class="container-fluid text-light position-relative" style="z-index:1;">

                <div class="row">

                    <div class="col-12 col-xl-2 d-flex align-items-center justify-content-center" id="">
                        {{--Display is absolute--}}
                        @if($tripLocation->flyer_name != "")
                            <a href="{{ asset('storage/' . str_ireplace('public/', '', $tripLocation->flyer_name)) }}"
                               class="btn btn-white btn-lg btn-rounded locationFlyer"
                               download="{{ str_ireplace(' ', '_', ucwords($tripLocation->trip_location)) . '_Flyer' }}">Download
                                Flyer</a>
                        @endif
                    </div>

                    <div class="col-12 col-xl-8" id="">
                        <h1 class="text-center display-2 locationName">{{ $tripLocation->trip_location }}</h1>
                    </div>

                    <div class="col-12 col-xl-2 d-flex align-items-center justify-content-center" id="">
                        {{--Display is absolute--}}
                        @if(Auth::check())
                            <a href="{{ route('location.edit', $tripLocation->id) }}"
                               class="btn btn-primary btn-lg btn-rounded">Back</a>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="vacationDescription my-4">
                            <h2 class="tripDescription">{{ $tripLocation->description != null ? $tripLocation->description : 'No description for the trip has been added yet.' }}</h2>
                        </div>
                    </div>
                </div>

                <div class="row my-5">

                    <div class="col-12 col-md-6 col-lg-4 mb-3">

                        <div class="align-items-center d-flex flex-column vacationItenerary">

                            <h2 class="text-center vacationIteneraryHeader w-100">Events For The Trip</h2>

                            <table class="table table-responsive table-sm termsItenery w-auto white-text">

                                @if($tripLocation->activities->count() > 0)

                                    @foreach($tripLocation->activities as $showActivity)

                                        <tr>
                                            @if($showActivity->show_activity == "Y")

                                                @php
                                                    //Format date
                                                    $activityDate = null;
                                                    $showActivity->activity_date !== null ? $activityDate = new Carbon\Carbon($showActivity->activity_date) : null;
                                                @endphp

                                                <td>
                                                    <i class="fas fa-map-marker-alt"></i> {{ $showActivity->trip_event }}
                                                </td>
                                                <td>
                                                    <i class='fas fa-calendar-day'></i> {{ $activityDate == null ? 'TBA' : $activityDate->format('m/d/Y') }}
                                                </td>

                                            @endif
                                        </tr>

                                    @endforeach

                                @else

                                    <tr>
                                        <td>Trip Itenerary not added yet</td>
                                    </tr>

                                @endif

                            </table>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 mb-3">

                        <div id="" class="vacationCost">
                            <h2 class="paymentHeaders text-center">Trip Cost</h2>

                            <ul class="termsCost list-unstyled text-center">

                                @if($tripLocation->costs != null)

                                    @if($tripLocation->costs->per_adult != null)
                                        <li>{{ '$' . $tripLocation->costs->per_adult . ' /per adult' }}</li>
                                    @endif

                                    @if($tripLocation->costs->per_child != null)
                                        <li>{{ '$' . $tripLocation->costs->per_child . '  /per child' }}</li>
                                    @endif

                                    @if($tripLocation->costs->single_occupancy != null)
                                        <li>{{ '$' . $tripLocation->costs->single_occupancy . ' /single occupancy' }}</li>
                                    @endif

                                    @if($tripLocation->costs->double_occupancy != null)
                                        <li>{{ '$' . $tripLocation->costs->double_occupancy . ' /double occupancy' }}</li>
                                    @endif

                                    @if($tripLocation->costs->triple_occupancy != null)
                                        <li>{{ '$' . $tripLocation->costs->triple_occupancy . ' /triple occupancy' }}</li>
                                    @endif

                                    @if($tripLocation->costs->package != null)
                                        <li>{{ $tripLocation->costs->package }}</li>
                                    @endif
                                @endif

                            </ul>
                        </div>

                    </div>

                    <div class="col-12 col-lg-4">

                        <div id="" class="vacationCost">
                            <h2 class="paymentHeaders text-center">Payment Options</h2>
                            <ul class="termsPayment list-unstyled text-center">
                                @if($tripLocation->payment_options != null)

                                    @foreach($tripLocation->payment_options as $payment_option)
                                        <li>{{ $payment_option->payment_description }}</li>
                                    @endforeach

                                @else
                                    <li>Trip Payment schedule not added yet</li>
                                @endif
                            </ul>
                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col">

                        <div class="container">

                            <div class="row">

                                <div class="col">
                                    <div id="page_terms_and_conditions">
                                        <p class="terms depositDate text-center" id="">Deposit is Due No Later Than
                                            <span
                                                class="text-warning">{{ $tripLocation->deposit_date != null ? $tripLocation->deposit_date->format('m/d/Y') : 'TBA' }}</span>
                                        </p>
                                    </div>
                                </div>

                                <div class="col">
                                    <div id="page_terms_and_conditions">
                                        <p class="terms balanceDueDate text-center" id="">Total Balance Must Be Paid In
                                            Full <span
                                                class="text-warning">{{ $tripLocation->due_date != null ? $tripLocation->due_date->format('m/d/Y') : 'TBA' }}</span>
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mx-auto progress-bar progress-bar-striped bg-secondary text-black py-5 rounded">

                    <div class="col-12">
                        <h1 class="text-center">Terms and Conditions</h1>
                    </div>

                    <div class="col-12">

                        @if($tripLocation->conditions->isNotEmpty())

                            @foreach($tripLocation->conditions as $conditionOption)
                                <p class="terms">{{ $conditionOption->description }}</p>
                            @endforeach

                        @else
                            <p class="terms">No Terms and Conditions Added Yet</p>
                        @endif

                    </div>

                </div>


                <div
                    class="row mx-auto progress-bar progress-bar-striped bg-info black-text py-5 rounded mt-2 flex-row">

                    <div class="col-12">
                        <h1 class="text-center">Contact Information</h1>
                    </div>

                    <div class="col-12">
                        <h3 class="text-center text-wrap">If you have any further questions in regards to this trip or
                            any
                            information listed, here is where we can be contacted</h3>
                    </div>

                    <div class="col-5">
                        <div class="card h-100" id="">
                            <div class="card-body">
                                <h4 class="card-title">Deborah Jackson</h4>
                                <p class="contact_email mb-1"><span class="font-weight-bold font-italic">Email:</span>&nbsp;<span><a
                                            href="mailto:jacksond1961@yahoo.com"
                                            class="">jacksond1961@yahoo.com</a></span>
                                </p>
                                <p class="contact_email"><span
                                        class="font-weight-bold font-italic">Phone:</span>&nbsp;<span>215-472-6036 (EST)</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-5">
                        <div class="card h-100" id="">
                            <div class="card-body">
                                <h4 class="card-title">Rhonda Lambert</h4>
                                <p class="contact_email mb-1"><span class="font-weight-bold font-italic">Email:</span>&nbsp;<span><a
                                            href="mailto:rhonda.lambert@sbcglobal.com" class="">rhonda.lambert@sbcglobal.com</a></span>
                                </p>
                                <p class="contact_email"><span
                                        class="font-weight-bold font-italic">Phone:</span>&nbsp;<span>707-208-7290 (PST)</span>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Add a divider/spacer -->
            <div class="divider"></div>

            <!-- Sign up for this trip form -->
            <div class="container-fluid position-relative pt-2 pb-4 mt-5" style="z-index:1;">

                <div class="row">

                    <div class="page_signup_form col-12 col-md-8 py-1 mx-auto">

                        <h3 class="text-center text-light">Sign Me Up</h3>

                        <form class="signupForm" id="" action="{{ route('contacts.store') }}" method="POST"
                              enctype="multipart/form-data">

                            @csrf

                            <table class="table">

                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="first_name" class="text-light">First Name:</label>
                                            <input class="form-control" type="text" name="first_name"
                                                   value="{{ old('first_name') }}"
                                                   placeholder="Enter First Name" {{ $errors->has('first_name') ? 'autofocus' : '' }} />

                                            @if($errors->has('first_name'))
                                                <span class="text-danger">First name cannot empty or more than 50 characters</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="last_name" class="text-light">Last Name:</label>
                                            <input class="form-control" type="text" name="last_name"
                                                   value="{{ old('last_name') }}"
                                                   placeholder="Enter Last Name" {{ $errors->has('last_name') ? 'autofocus' : '' }} />

                                            @if ($errors->has('last_name'))
                                                <span class="text-danger">Last name cannot empty or more than 50 characters</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="email" class="text-light">Email:</label>
                                            <input class="form-control" type="email" name="email"
                                                   value="{{ old('email') }}"
                                                   placeholder="Enter Email Address" {{ $errors->has('email') ? 'autofocus' : '' }} />

                                            @if($errors->has('email'))
                                                <span class="text-danger">Email address cannot empty or more than 100 characters</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2"><input type="submit" name="submit"
                                                           class="pageSubmit btn btn-success" value="Send Me Info"/>
                                    </td>
                                </tr>

                            </table>

                            <input type="number" name="trip_id" class="hidden" value="{{ $tripLocation->id }}" hidden/>

                            <div class="paymentInstructions text-light">
                                <p class="m-0 py-3">For everyone who has a PayPal account and would like to pay
                                    electronically, please send all payments to jacksond1961@yahoo.com by selecting the
                                    option to send money to friends and family. <a href="http://www.paypal.com"
                                                                                   target="_blank">Click here</a> to go
                                    to the PayPal website.</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
