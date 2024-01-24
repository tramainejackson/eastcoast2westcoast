<!-- Trip Participants -->
<div class="trip_edit_div mb-9" id="trip_participants">

    <!-- Editable table -->
    <div class="card">
        <h3 class="card-header text-center fw-bold text-uppercase py-4 bg-yellow">Trip
            Participants</h3>

        <div class="card-body">

            <h4 class="h4 h4-responsive text-center coolText8 dark-grey-text">To add a particpant, go to
                their contact profile <a href="{{ route('contacts.index') }}" target="_blank">here</a>
                and select the
                trip you would like to add them to.</h4>

            <div id="table_wrapper_5" class="table-editable">

                {{--<span class="table-add mb-3 mr-2">--}}
                {{--<a href="#!" class="text-success"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>--}}
                {{--</span>--}}

                <table class="table table-bordered text-center table-responsive-md">

                    <tr class="firstTableRow">
                        <th colspan="2">Name</th>
                        <th colspan="4">Contact Info</th>
                    </tr>

                    <tr class="">
                        <th>First</th>
                        <th>Last</th>
                        <th>Notes</th>
                        <th>PIF</th>
                        <th>View</th>
                        <th>Remove</th>
                    </tr>

                    @if($getEventUsers->count() > 0)

                        @foreach($getEventUsers as $user)
                            <tr>
                                <td class="align-middle"><input type="text" name="first_name"
                                                                class="bg-transparent border-0 h-auto text-center w-100"
                                                                value="{{ $user->first_name }}"/></td>
                                <td class="align-middle"><input type="text" name="last_name"
                                                                class="bg-transparent border-0 h-auto text-center w-100"
                                                                value="{{ $user->last_name }}"/></td>
                                <td class="align-middle"><textarea name="notes"
                                                                   class="bg-transparent border-0 h-auto text-center w-100"
                                                                   placeholder="Enter Notes for Particpant">{{ $user->notes }}</textarea>
                                </td>
                                <td class="align-middle">
                                    <div class="btn-group">
                                        <button type="button"
                                                class="btn yesBtn{{ $user->paid_in_full == 'Y' ? ' btn-success active' : ' stylish-color' }}"
                                                style="">
                                            <input type="checkbox" name="pif" value="Y"
                                                   {{ $user->paid_in_full == 'Y' ? 'checked' : '' }} hidden/>Yes
                                        </button>
                                        <button type="button"
                                                class="btn noBtn{{ $user->paid_in_full == 'N' ? ' btn-danger active' : ' stylish-color' }}"
                                                style="">
                                            <input type="checkbox" name="pif" value="N"
                                                   {{ $user->paid_in_full == 'N' ? 'checked' : '' }} hidden/>No
                                        </button>
                                    </div>
                                <td class="align-middle">
                                    @if($user->contact != null)
                                        <span class="table-view"><a
                                                href="{{ route('contacts.edit', $user->contact->id) }}"
                                                type="button"
                                                class="btn btn-info btn-rounded btn-sm my-0">View</a></span>
                                    @else
                                        <span class="table-view"><a href="#" type="button"
                                                                    class="btn btn-info btn-rounded btn-sm my-0 disabled">View</a></span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                                    <span class="table-delete"><button type="button"
                                                                                       class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                                </td>
                                <td class="" hidden><input type="text" name="trip"
                                                                    value="{{ $showLocation->id }}"/>
                                </td>
                                <td class="" hidden><input type="text" name="trip_participants"
                                                                    value="true"></td>
                                <td class="" hidden><input type="text"
                                                                    name="participant_option"
                                                                    value="{{ $user->id }}"></td>
                            </tr>

                        @endforeach

                    @else

                        <tr class="blankParticipant">
                            <td colspan="6" rowspan="1" class="">No Participants Added Yet</td>
                        </tr>

                    @endif

                    <!-- This is our clonable table line -->
                    {{--<tr class="newParticipantRow hide">--}}

                    {{--<td class="align-middle"><input type="text" class="bg-transparent border-0 h-auto text-center w-100" name="first_name" placeholder="Enter First Name" /></td>--}}
                    {{--<td class="align-middle"><input type="text" class="bg-transparent border-0 h-auto text-center w-100" name="last_name" placeholder="Enter Last Name" /></td>--}}
                    {{--<td class="align-middle"><textarea class="bg-transparent border-0 h-auto text-center w-100" name="notes" placeholder="Enter Notes for Particpant"></textarea></td>--}}

                    {{--<td class="align-middle">--}}
                    {{--<div class="btn-group">--}}
                    {{--<button type="button" class="btn stylish-color yesBtn" style="">--}}
                    {{--<input type="checkbox" name="pif" value="Y" hidden />Yes--}}
                    {{--</button>--}}
                    {{--<button type="button" class="btn btn-danger active noBtn" style="">--}}
                    {{--<input type="checkbox" name="pif" value="N" checked hidden />No--}}
                    {{--</button>--}}
                    {{--</div>--}}
                    {{--</td>--}}
                    {{--<td class="align-middle">--}}
                    {{--<span class="table-save"><button type="button" class="btn btn-info btn-rounded btn-sm my-0">Save</button></span>--}}
                    {{--</td>--}}
                    {{--<td class="align-middle">--}}
                    {{--<span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>--}}
                    {{--</td>--}}
                    {{--<td class="" hidden><input type="text" name="trip" value="{{ $showLocation->id }}" /></td>--}}
                    {{--<td class="" hidden><input type="text" name="trip_participants" value="true"></td>--}}
                    {{--</tr>--}}
                </table>
            </div>
        </div>
    </div>
    <!-- Editable table -->
</div>
<!-- Trip Participants -->
