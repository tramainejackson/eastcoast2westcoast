<x-app-layout>

    <div class="showTrip col-12 px-0 position-relative {{ Auth::check() ? 'mt-n5' : 'mt-5' }}"
         style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{ $tripLocation->trip_photo != null ? asset('storage/' . str_ireplace('public/', '', $tripLocation->trip_photo)) : '/images/skyline.jpg' }})">

        <div class="col mt-4 pb-5">
            <div class="mask" style="background-color: rgba(62, 69, 81, 0.7)"></div>

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
                        <h1 class="text-center display-2 locationName pt-2">{{ $tripLocation->trip_location }}</h1>
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

                            <table class="table table-responsive table-sm termsItenery w-auto text-white"
                                   style="--mdb-table-bg:#00000000; --mdb-table-color: #fff;">

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

                <div class="row">
                    <div class="col-12 col-md-11 col-xxl-9 mx-auto">

                        <div class="progress rounded mt-5 d-block" id="trip_terms_info" style="height: initial;">

                            <div class="progress-bar progress-bar-striped bg-secondary">
                                <div class="row text-black py-5">

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
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-11 col-xxl-9 mx-auto">

                        <div class="progress rounded mt-2" id="trip_contact_info" style="height: initial;">

                            <div class="progress-bar progress-bar-striped bg-info">
                                <div class="row py-5 text-black">
                                    <div class="col-12">
                                        <h1 class="text-center">Contact Information</h1>
                                    </div>

                                    <div class="col-12">
                                        <h3 class="text-center text-wrap fw-light px-3">If you have any further
                                            questions in regards to this trip or any information listed, here is where
                                            we can be contacted</h3>
                                    </div>

                                    <div class="col-5 mx-auto">
                                        <div class="card h-100" id="">
                                            <div class="card-body">
                                                <h4 class="card-title">Deborah Jackson</h4>
                                                <p class="contact_email mb-1"><span
                                                        class="fw-bold fst-italic">Email:</span>&nbsp;<span><a
                                                            href="mailto:jacksond1961@yahoo.com"
                                                            class="">jacksond1961@yahoo.com</a></span>
                                                </p>
                                                <p class="contact_email"><span
                                                        class="fw-bold fst-italic">Phone:</span>&nbsp;<span>215-472-6036 (EST)</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-5 mx-auto">
                                        <div class="card h-100" id="">
                                            <div class="card-body">
                                                <h4 class="card-title">Rhonda Lambert</h4>
                                                <p class="contact_email mb-1"><span
                                                        class="fw-bold fst-italic">Email:</span>&nbsp;<span><a
                                                            href="mailto:rhonda.lambert@sbcglobal.com" class="">rhonda.lambert@sbcglobal.com</a></span>
                                                </p>
                                                <p class="contact_email"><span
                                                        class="fw-bold fst-italic">Phone:</span>&nbsp;<span>707-208-7290 (PST)</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
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

                    @include('components.forms.web_contact_create_form')
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
