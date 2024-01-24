<x-app-layout>

    @section('title', 'Edit Trip - Eastcoast2Westcoast')

    <div id="" class="col-12 px-5">

        <div class="container my-3 pt-3" id="trips_links">
            <div class="row">
                <div id="" class="col-12 col-md-6">
                    <h1 class="pageTopicHeader text-center text-md-start">All Trips</h1>
                </div>

                <div class="col-12 col-md-6 text-center">
                    <x-button-link href="{{ route('location.create') }}" class="btn-primary ms-3">Create New Trip
                    </x-button-link>
                </div>
            </div>
        </div>

        <div class="row mb-5 pb-5">
            <div class="col">
                <ul class="list-unstyled">
                    @foreach($getLocations as $showLocations)
                        <li class="">
                            <div class="my-2">
                                <div class="d-flex align-items-center justify-content-start">
                                    <a href="/location/{{ $showLocations->id }}/edit"
                                       class="btn btn-primary mr-2">Edit</a>
                                    <h2 class="font-weight-bold mb-0 ms-3">{{ $showLocations->trip_location }}</h2>
                                    <h2 class="fst-italic fw-light mb-0 ms-3 text-muted">{{ $showLocations->trip_month }}/{{ $showLocations->trip_year }}</h2>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>

    </div>

</x-app-layout>
