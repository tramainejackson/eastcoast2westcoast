<x-app-layout>

    <div id="carousel_controls" class="carousel slide w-100 mobileCarousel" data-ride="carousel">

        <div class="carousel-inner">

            @if($inactiveTrips->count() > 0)

                @foreach($inactiveTrips as $trip)

                    @php $content = Storage::disk('local')->has($trip->trip_photo); @endphp
                    @php $tripsActivities = $trip->activities; @endphp
                    @php
                        $tripMonth = DB::table('vacation_month')->select('month_name')->where('month_id', $trip->trip_month)->first();
                    @endphp

                    <div id="" class="carousel-item{{ $loop->first ? ' active' : ''}}">
                        <div class="carouselImage"
                             id="{{ str_ireplace(' ', '_', strtolower($trip->trip_location)) . '_event' }}"
                             style="background:linear-gradient(#f2f2f2, rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25)), url({{ $content == true ? asset('storage/' . str_ireplace('public/', '', $trip->trip_photo)) : '/images/skyline.jpg' }});">
                            <div class="d-flex align-items-center justify-content-center flex-column">
                                <h1 class="text-center"
                                    style="margin-top: 0; padding-top: 50px;">{{ ucwords($trip->trip_location) }}</h1>
                                <h3 class="text-center">{{ $tripMonth->month_name . " " . $trip->trip_year }}</h3>

                                <p class="text-justify carouselTripDescription">{{ $trip->description != null ? $trip->description : 'Description not provided for trip' }}</p>

                                <div class="carousel-fixed-item mx-auto d-block pb-2">
                                    <a href="/photos" class="btn btn-secondary">Click Here For Photos</a>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

            @endif

        </div>

        <a class="carousel-control-prev" href="#carousel_controls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#carousel_controls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</x-app-layout>
