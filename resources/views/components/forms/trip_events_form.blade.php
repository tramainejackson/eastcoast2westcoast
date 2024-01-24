<!-- Trip Events -->
<div class="trip_edit_div" id="trip_activities">

    <!-- Editable table -->
    <div class="card table-responsive">
        <h3 class="card-header text-center fw-bold text-uppercase py-4 bg-yellow">Trip Events</h3>

        <div class="card-body">
            <span class="table-add mb-3 me-2">
                <a href="#!" class="text-success btn btn-rounded btn-secondary mb-2" onclick="addRow(this);">
                    Add Trip Event&nbsp;<i class="fa fa-plus" aria-hidden="true"></i>
                </a>
            </span>

            <table class="table table-bordered text-center"
                   id="trip_activities_table">

                <tr class="">
                    <th scope="col">Activity Name</th>
                    <th scope="col">Activity Location</th>
                    <th scope="col">Activity Date</th>
                    <th scope="col">Show Activity</th>
                    <th scope="col" class="text-center">Remove</th>
                    <th class="" hidden>trip</th>
                    <th class="" hidden>trip_activities</th>
                </tr>

                @if($getCurrentEvents->count() > 0)

                    @foreach($getCurrentEvents as $activity)
                        <tr>

                            <td class="align-middle">
                                <input type="text" class="bg-transparent border-0 h-auto text-center w-100"
                                       name="activity_event" value="{{ $activity->trip_event }}"
                                       placeholder="Enter Activity/Event"/>
                            </td>
                            <td class="align-middle">
                                <input type="text" class="bg-transparent border-0 h-auto text-center w-100"
                                       name="activity_location" value="{{ $activity->activity_location }}"
                                       placeholder="Enter Activity Location"/>
                            </td>
                            <td class="align-middle">
                                <div class="md-form form-outline" data-mdb-datepicker-init data-mdb-input-init>
                                    <input type="text"
                                           class="bg-transparent border-0 h-auto text-center w-100 form-control"
                                           data-value="{{ $activity->activity_date }}" name="activity_date"
                                           placeholder="Select A Date"/>
                                    <i class="fas fa-calendar input-prefix" tabindex=0></i>
                                </div>
                            </td>
                            <td class="align-middle">
                                <div class="text-start">
                                    <p class="mb-0 ms-1 text-black-50">Show Activity?</p>

                                    <div class="btn-group" id=""
                                         role="group">
                                        <input type="radio"
                                               class="btn-check show_activity_btn"
                                               name="show_activity[]"
                                               id="show_activity_1"
                                               value="Y"
                                               onclick="radioSwitch(this)"
                                               autocomplete="off" {{ $activity->show_activity == 'Y' ? 'checked' : '' }} />
                                        <label
                                            class="btn{{ $activity->show_activity == 'N' ? ' btn-outline-success' : ' btn-success' }}"
                                            for="show_activity_1">Yes</label>

                                        <input type="radio"
                                               class="btn-check show_activity_btn"
                                               name="show_activity[]"
                                               id="show_activity_0"
                                               value="N"
                                               onclick="radioSwitch(this)"
                                               autocomplete="off" {{ $activity->show_activity == 'N' ? 'checked' : '' }} />
                                        <label
                                            class="btn{{ $activity->show_activity == 'N' ?  ' btn-danger' : ' btn-outline-danger' }}"
                                            for="show_activity_0">No</label>
                                    </div>
                                </div>

                                {{--                                <div class="btn-group">--}}
                                {{--                                    <button type="button"--}}
                                {{--                                            class="btn yesBtn{{ $activity->show_activity == 'Y' ? ' btn-success active' : ' stylish-color' }}">--}}
                                {{--                                        <input type="checkbox" name="show_activity" value="Y"--}}
                                {{--                                               {{ $activity->show_activity == 'Y' ? 'checked' : '' }} hidden/>Yes--}}
                                {{--                                    </button>--}}
                                {{--                                    <button type="button"--}}
                                {{--                                            class="btn noBtn{{ $activity->show_activity == 'N' ? ' btn-danger active' : ' stylish-color' }}">--}}
                                {{--                                        <input type="checkbox" name="show_activity" value="N"--}}
                                {{--                                               {{ $activity->show_activity == 'N' ? 'checked' : '' }} hidden/>No--}}
                                {{--                                    </button>--}}
                                {{--                                </div>--}}
                            </td>
                            <td class="align-middle">
                                <span class="table-delete">
                                    <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
                                </span>
                            </td>

                            <td class="" hidden>
                                <input type="text" name="trip" value="{{ $showLocation->id }}"/>
                            </td>
                            <td class="" hidden>
                                <input type="text" name="trip_activities" value="true">
                            </td>
                            <td class="" hidden>
                                <input type="text" name="activity_option" value="{{ $activity->id }}">
                            </td>
                        </tr>
                    @endforeach

                @else

                    <tr class="blankActivity">
                        <td colspan="5" rowspan="1" class="align-middle">No Activities Added Yet
                        </td>
                    </tr>

                @endif

                <!-- This is our clonable table line -->
                <tr class="newActivityRow hide">

                    <td class="align-middle">
                        <input type="text" class="bg-transparent border-0 h-auto text-center w-100"
                               name="activity_event" placeholder="Enter Activity Name"/>
                    </td>

                    <td class="align-middle">
                        <input type="text" class="bg-transparent border-0 h-auto text-center w-100"
                               name="activity_location" placeholder="Enter Activity Location"/>
                    </td>

                    <td class="align-middle">
                        <div class="md-form form-outline new_activity_date" data-mdb-datepicker-init
                             data-mdb-input-init>
                            <input type="text" class="bg-transparent border-0 h-auto text-center w-100 form-control"
                                   id="" name="activity_date" placeholder="Select A Date"/>
                            <label class="form-label">Activity Date</label>
                        </div>
                    </td>

                    <td class="align-middle">
                        <div class="text-start">
                            <p class="mb-0 ms-1 text-black-50">Show Activity?</p>

                            <div class="btn-group" id=""
                                 role="group">
                                <input type="radio"
                                       class="btn-check show_activity_btn"
                                       name="show_activity[]"
                                       id="show_activity_1"
                                       value="Y"
                                       onclick="radioSwitch(this)"
                                       autocomplete="off"/>
                                <label class="btn btn-outline-success"
                                       for="show_activity_1">Yes</label>

                                <input type="radio"
                                       class="btn-check show_activity_btn"
                                       name="show_activity[]"
                                       id="show_activity_0"
                                       value="N"
                                       onclick="radioSwitch(this)"
                                       autocomplete="off" checked/>
                                <label class="btn btn-danger"
                                       for="show_activity_0">No</label>
                            </div>
                        </div>
                    </td>

                    <td class="align-middle">
                        <div class="">
                            <span class="table-save d-block mb-2">
                                <button type="button" class="btn btn-info btn-block btn-rounded btn-sm my-0">Save</button>
                            </span>

                            <span class="table-remove d-block">
                                <button type="button" class="btn btn-danger btn-block btn-rounded btn-sm my-0">Remove</button>
                            </span>
                        </div>
                    </td>

                    <td class="" hidden>
                        <input type="text" name="trip" value="{{ $showLocation->id }}"/>
                    </td>
                    <td class="" hidden>
                        <input type="text" name="trip_activities" value="true">
                    </td>
                </tr>

            </table>
        </div>
    </div>
    <!-- Editable table -->
</div>
<!-- Trip Events -->
