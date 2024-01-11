<x-app-layout>

    <div class="col-12" id="">
        <div class="col-12 col-md-6 px-0 mx-auto" id="">

            <div class="text-center mt-4" id="">
                <span class="display-3 py-3 coolText1"><i class="fas fa-plane-departure"></i></span>
                <h2 class="display-3 pb-3 coolText1">Upcoming Trips</h2>
            </div>

            @if($activeTrips->count() > 0)

                @foreach($activeTrips as $trip)

                    @php $tripMonth = DB::table('vacation_month')->select('month_name')->where('month_id', $trip->trip_month)->first(); @endphp

                        <!-- Card -->
                    <div class="card card-cascade wider reverse mb-5">

                        <!-- Card image -->
                        <div class="view view-cascade overlay">
                            <img class="card-img-top"
                                 src="{{ Storage::disk('local')->has($trip->trip_photo) ? asset('storage/' . str_ireplace('public/', '', $trip->trip_photo)) : '/images/skyline.jpg' }}"
                                 alt="Card image cap">

                            <a href="{{ route('location.show', $trip->id) }}" style="display:initial;">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>

                        <!-- Card content -->
                        <div class="card-body card-body-cascade text-center">

                            <!-- Title -->
                            <h4 class="card-title"><strong>{{ ucwords($trip->trip_location) }}</strong></h4>
                            <!-- Subtitle -->
                            <h6 class="font-weight-bold indigo-text py-2">{{ $tripMonth->month_name . " ". $trip->trip_year }}</h6>
                            <!-- Text -->
                            <p class="card-text">{{ $trip->description == null ? 'No futher information at this time' : $trip->description }}</p>

                            <a href="{{ route('location.show', $trip->id) }}"
                               class="btn btn-primary btn-rounded btn-lg">Click for more information</a>

                        </div>
                    </div>
                    <!-- Card -->
                @endforeach
            @else
                <div class="text-center my-5" id="">
                    <h1 class="">We do not have any upcoming trips scheduled right now. Please check with us to find out
                        if we have any plans for future vacation or give us some ideas.</h1>
                </div>
            @endif
        </div>
    </div>

    <div class="divider" id=""></div>

    <div class="col-12 px-0 mt-5 mx-auto" id="">

        <div class="text-center mt-4" id="">
            <span class="display-3 py-3 coolText1"><i class="fas fa-plane-arrival"></i></span>
            <h2 class="display-3 pb-3 coolText1">Past Trips</h2>
        </div>

        <div class="">
            <div class="" id="">
                <p class="text-center mb-5" style="font-size: 24px;">We get around quite a bit and have plenty more
                    destinations in the works. Take a look at some of the places we've already been</p>
            </div>
        </div>

        @if($inactiveTrips->count() > 0)

            <div class="col-11 px-0 mx-auto" id="">

                @foreach($inactiveTrips as $trip)

                    @php $tripMonth = DB::table('vacation_month')->select('month_name')->where('month_id', $trip->trip_month)->first(); @endphp

                    @if($loop->first || $loop->iteration % 3 == 1)
                        <!-- Card deck -->
                        <div class="card-deck">
                            @endif

                            <!-- Card -->
                            <div class="card mb-4">

                                <!--Card image-->
                                <div class="view overlay">
                                    <img class="card-img-top"
                                         src="{{ Storage::disk('local')->has($trip->trip_photo) ? asset('storage/' . str_ireplace('public/', '', $trip->trip_photo)) : '/images/skyline.jpg' }}"
                                         alt="Card image cap">
                                    <a href="{{ route('location.show', $trip->id) }}">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>

                                <!--Card content-->
                                <div class="card-body">

                                    <!--Title-->
                                    <h3 class="card-title">{{ ucwords($trip->trip_location) }}</h3>

                                    <!--Sub Title-->
                                    <h5 class="card-title">{{ ucwords($tripMonth->month_name) . ' ' . $trip->trip_year }}</h5>

                                    <!--Text-->
                                    <p class="card-text">{{ ucwords($trip->description) }}</p>

                                    <!-- Read more button -->
                                    <a class="btn btn-success btn-md" href="{{ route('location.show', $trip->id) }}">View
                                        More</a>
                                </div>
                            </div>
                            <!-- Card -->

                            @if($loop->iteration % 3 == 0)
                        </div>
                        <!-- Card deck -->
                    @endif
                @endforeach
            </div>
        @else
            <div class="text-center my-5" id="">
                <h1 class="">We do not have any past trips yet. Hopefully we'll get going somewhere soon because I know
                    I need a vacation.</h1>
            </div>
        @endif
    </div>

</x-app-layout>
