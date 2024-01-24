<!--- Trip Bio --->
<div class="trip_edit_div">

    {{--Trip Image--}}
    <img
        src="{{ \Illuminate\Support\Facades\Storage::exists($showLocation->trip_photo) ? asset('storage/' . str_ireplace('public/', '', $showLocation->trip_photo)) : '/images/skyline.jpg' }}"
        class="rounded newTripPhoto" height="300"/>

    {{--Change trip image--}}
    <div class="md-form">
        <div class="mb-2">
            <label class="form-label mb-0" for="trip_photo">Change Picture</label>

            <div class="input-group">
                <input type="file" name="trip_photo" class="tripPhotoChange form-control"
                       onchange="filePreview(this);"/>

                <div class="input-text" id="">
                    <button type="submit"
                            class="btn btn-lg btn-outline-info py-2 z-depth-0 saveNewPhotoBtn"
                            style="display: none; border-radius: 0px 5px 5px 0px;">Save New Image
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{--Change trip location--}}
    <div class="md-form form-outline" data-mdb-input-init>
        <input type="text" name="trip_location" id="trip_location"
               value="{{ $showLocation->trip_location }}" class="form-control"
               placeholder="Enter Destination Name"/>

        <label for="trip_location" class="form-label">Trip Location</label>
    </div>

    <div class="md-form form-outline" data-mdb-input-init>
        <textarea type="text" name="description" id="trip_description" class="md-textarea form-control"
                  placeholder="Enter Trip Description">{{ $showLocation->description }}</textarea>

        <label for="trip_description" class="form-label">Trip Description</label>
    </div>

    <div class="row" id="">
        <div class="md-form col-6">
            <select name="trip_month" id="trip_month" class="md-form mdb-select" data-mdb-select-init>
                @foreach($getMonth as $showMonth)
                    <option class=""
                            value="{{ $showMonth->month_id }}" {{ $showMonth->month_id == $showLocation->trip_month ? 'selected' : ''}}>{{ $showMonth->month_name }}</option>
                @endforeach
            </select>

            <label for="trip_month" class="select-label form-label">Trip Month</label>
        </div>

        <div class="md-form col-6">
            <select name="trip_year" id="trip_year" class="md-form mdb-select" data-mdb-select-init>
                @foreach($getYear as $showYear)
                    <option class=""
                            value="{{ $showYear->year_num }}" {{ $showYear->year_num == $showLocation->trip_year ? 'selected' : ''}}>{{ $showYear->year_num }}</option>
                @endforeach
            </select>

            <label for="trip_year" class="select-label form-label">Trip Year</label>
        </div>

    </div>

    <div class="row" id="">
        <div class="col-6">
            <div class="md-form form-outline" data-mdb-datepicker-init data-mdb-input-init>
                <input type="text" name="deposit_date" class="form-control" id="deposit_date"
                       data-value="{{ $showLocation->deposit_date != null ? $showLocation->deposit_date->format('Y/m/d') : '' }}"
                       placeholder="Enter Deposit Date"/>

                <label for="deposit_date" class="form-label">First Deposit Date</label>
            </div>
        </div>

        <div class="col-6">
            <div class="md-form form-outline" data-mdb-datepicker-init data-mdb-input-init>
                <input type="text" name="due_date" class="form-control" id="due_date"
                       data-value="{{ $showLocation->due_date != null ? $showLocation->due_date->format('Y/m/d') : '' }}"
                       placeholder="Enter Due Date"/>

                <label for="due_date" class="form-label">Total Balance Due</label>
            </div>
        </div>
    </div>

    <div class="text-start">
        <p class="mb-0 ms-1 text-black-50">Is Trip Completed?</p>

        <div class="btn-group" id=""
             role="group">
            <input type="radio"
                   class="btn-check trip_complete_btn"
                   name="trip_complete"
                   id="trip_complete_1"
                   value="Y"
                   onclick="radioSwitch(this)"
                   autocomplete="off" {{ $showLocation->trip_complete == 'Y' ? 'checked' : '' }}/>
            <label class="btn{{ $showLocation->trip_complete == 'N' ? ' btn-outline-success' : ' btn-success' }}"
                   for="trip_complete_1">Yes</label>

            <input type="radio"
                   class="btn-check trip_complete_btn"
                   name="trip_complete"
                   id="trip_complete_0"
                   value="N"
                   onclick="radioSwitch(this)"
                   autocomplete="off" {{ $showLocation->trip_complete == 'N' ? 'checked' : '' }} />
            <label class="btn{{ $showLocation->trip_complete == 'N' ? ' btn-danger' : ' btn-outline-danger' }}"
                   for="trip_complete_0">No</label>
        </div>
    </div>

    <div class="text-start mt-2">
        <p class="mb-0 ms-1 text-black-50">Show Trip?</p>

        <div class="btn-group" id=""
             role="group">
            <input type="radio"
                   class="btn-check show_trip_btn"
                   name="show_trip"
                   id="show_trip_1"
                   value="Y"
                   onclick="radioSwitch(this)"
                   autocomplete="off" {{ $showLocation->show_trip == 'Y' ? 'checked' : '' }}/>
            <label class="btn{{ $showLocation->show_trip == 'N' ? ' btn-outline-success' : ' btn-success' }}"
                   for="show_trip_1">Yes</label>

            <input type="radio"
                   class="btn-check show_trip_btn"
                   name="show_trip"
                   id="show_trip_0"
                   value="N"
                   onclick="radioSwitch(this)"
                   autocomplete="off" {{ $showLocation->show_trip == 'N' ? 'checked' : '' }} />
            <label class="btn{{ $showLocation->show_trip == 'N' ? ' btn-danger' : ' btn-outline-danger' }}"
                   for="show_trip_0">No</label>
        </div>
    </div>

    <div class="md-form" id="">
        <label class="form-label mb-0" for="flyer_name">Add New Flyer</label>

        <div class="input-group">
            <input type="file" name="flyer_name" class="flyerChange form-control" onchange="document.getElementsByClassName('saveNewFlyerBtn')[0].style.display = 'block';">

            <div class="input-text" id="">
                <button type="submit"
                        class="btn btn-lg btn-outline-info py-2 z-depth-0 saveNewFlyerBtn"
                        style="display: none; border-radius: 0px 5px 5px 0px;">Save New Flyer
                </button>
            </div>
        </div>
    </div>

    @if($showLocation->flyer_name != null)
        <div class="mt-3" id="">
            <div class="">
                <h3 class="">See Current Flyer</h3>
            </div>
            <a href="{{ asset('storage/' . str_ireplace('public/', '', $showLocation->flyer_name)) }}"
               class="btn btn-primary"
               download="{{ str_ireplace(' ', '_', ucwords($showLocation->trip_location)) . '_Flyer' }}">View
                Current Flyer</a>
        </div>
    @endif
</div>
<!--- Trip Bio --->
