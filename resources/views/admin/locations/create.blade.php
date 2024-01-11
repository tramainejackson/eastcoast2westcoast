<x-app-layout>

    @section('title', 'Create A New Vacation - Eastcoast2Westcoast')

    <div class="col-12 px-5">

        <div class="col-12 col-xl-8">
            <h1 class="pageTopicHeader">Add New Trip</h1>
        </div>

        <div class="col-12 py-4">
            <a href="{{ route('location.index') }}" class="btn btn-success ms-0">All Trips</a>
        </div>

        <div class="col-12 col-xl-8">
            <form name="" id="" class="" action="/location" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="form-outline mb-3" data-mdb-input-init>
                    <input type="text" name="trip_name" class="form-control" placeholder="Enter The Destination Name"/>

                    @if ($errors->has('trip_name'))
                        <span class="text-danger">Location name already exist or is blank. Please enter a new location name.</span>
                    @endif

                    <label for="trip_name" class="form-label">New Location</label>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <select name="trip_month" class="" data-mdb-select-init>
                            @foreach($getMonth as $showMonth)
                                <option class=""
                                        value="{{ $showMonth->month_id }}">{{ $showMonth->month_name }}</option>
                            @endforeach
                        </select>

                        <label for="trip_month" class="form-label select-label">Trip Month</label>
                    </div>

                    <div class="col-12 col-md-6">
                        <select name="trip_year" class="" data-mdb-select-init>
                            @foreach($getYear as $showYear)
                                <option class="" value="{{ $showYear->year_num }}">{{ $showYear->year_num }}</option>
                            @endforeach
                        </select>

                        <label for="trip_year" class="form-label select-label">Trip Year</label>
                    </div>
                </div>

                {{--                <div id="dnd" class="file-upload-wrapper">--}}
                {{--                    <input--}}
                {{--                        id="file-upload"--}}
                {{--                        type="file"--}}
                {{--                        data-mdb-file-upload-init--}}
                {{--                        class="file-upload-input"--}}
                {{--                        data-mdb-main-error="Ooops, error here"--}}
                {{--                        data-mdb-format-error="Bad file format (correct format ~~~)"--}}
                {{--                    />--}}
                {{--                </div>--}}

                <div class="my-3">
                    <div id="" class="file-upload-wrapper">
                        <input type="file" name="trip_photo" id="trip_photo" class="file-upload-input"
                               data-mdb-file-upload-init
                               data-mdb-file-upload="file-upload"
                               data-mdb-default-msg="custom message"
                                placeholder="Add Trip Image" />
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
