<!-- Users Form -->
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
        <div class="col-12 col-md-6 md-form">
            <select name="trip_month" class="" data-mdb-select-init>
                @foreach($getMonth as $showMonth)
                    <option class=""
                            value="{{ $showMonth->month_id }}">{{ $showMonth->month_name }}</option>
                @endforeach
            </select>

            <label for="trip_month" class="form-label select-label">Trip Month</label>
        </div>

        <div class="col-12 col-md-6 md-form">
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
            <input type="file" name="trip_photo" id="trip_photo" class="form-control"
                   data-mdb-file-upload-init
                   data-mdb-file-upload="file-upload"
                   placeholder="Add Trip Image"
                   onchange="filePreview(this);" />
        </div>
    </div>

    <div class="mt-3">
        <div class="row justify-content-center align-items-center">
            <div class="col text-start">
                <button type="submit" class="btn btn-info btn-lg ms-md-0">Create Trip</button>
            </div>
        </div>
    </div>

</form>
