<x-app-layout>

    @section('title', 'Create A New Vacation - Eastcoast2Westcoast')

    <div class="col-12 px-5">

        <div class="col-12 col-xl-8">
            <h1 class="pageTopicHeader">Add New Trip</h1>
        </div>

        <div class="col-12 py-4">
            <a href="{{ route('location.index') }}" class="btn btn-success ml-0">All Trips</a>
        </div>

        <div class="col-12 col-xl-8">
            <form name="" id="" class="" action="/location" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="md-form">
                    <input type="text" name="trip_name" class="form-control" placeholder="Enter The Destination Name"/>

                    @if ($errors->has('trip_name'))
                        <span class="text-danger">Location name already exist or is blank. Please enter a new location name.</span>
                    @endif

                    <label for="trip_name" class="">New Location</label>
                </div>

                <div class="md-form">
                    <select name="trip_month" class="mdb-select md-form">
                        @foreach($getMonth as $showMonth)
                            <option class="" value="{{ $showMonth->month_id }}">{{ $showMonth->month_name }}</option>
                        @endforeach
                    </select>

                    <label for="trip_month" class="active mdb-main-label">Trip Month</label>
                </div>

                <div class="md-form">
                    <select name="trip_year" class="mdb-select md-form">
                        @foreach($getYear as $showYear)
                            <option class="" value="{{ $showYear->year_num }}">{{ $showYear->year_num }}</option>
                        @endforeach
                    </select>

                    <label for="trip_year" class="active">Trip Year</label>
                </div>

                <div class="md-form">

                    <div class="file-field">
                        <div class="btn btn-primary btn-sm float-left">
                            <span>Choose trip photo</span>
                            <input type="file" name="trip_photo" id="trip_photo">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Upload Trip Photo">
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-secondary btn-lg ml-0">Create Trip</button>

            </form>

        </div>

        <div class="col-0 col-xl-4 d-flex align-items-stretch">
            <div class="uploadsView d-flex align-items-center"></div>
        </div>

    </div>

</x-app-layout>
