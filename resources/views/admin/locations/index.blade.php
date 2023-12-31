<x-app-layout>

    @section('title', 'Edit Trip - Eastcoast2Westcoast')

    <div id="" class="col-12 px-5">

        <div class="newUserHeader">
            <h1 class="pageTopicHeader">Select A Trip</h1>
        </div>

        <div class="row" id="">
            <div class="col-12 py-4">
                <a href="{{ route('location.create') }}" class="btn btn-success">Add New Trip</a>
            </div>
        </div>

        <div class="">
            <ul class="list-unstyled">
                @foreach($getLocations as $showLocations)
                    <li>
                        <div class="">
                            <div class="d-flex align-items-center justify-content-start">
                                <a href="/location/{{ $showLocations->id }}/edit" class="btn btn-primary mr-2">Edit</a>
                                <h2 class="font-weight-bold">{{ $showLocations->trip_location }}</h2>
                                <h2 class="pl-3">{{ $showLocations->trip_month }}/{{ $showLocations->trip_year }}</h2>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>

        </div>

    </div>

</x-app-layout>
