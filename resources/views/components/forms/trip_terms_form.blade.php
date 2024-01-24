<!--- Terms and Conditions --->
<div class="trip_edit_div" id="trip_conditions">

    <!-- Editable table -->
    <div class="card">
        <h3 class="card-header text-center fw-bold text-uppercase py-4 bg-yellow">Terms and Conditions</h3>

        <div class="card-body">
            <span class="table-add mb-3 me-2">
                <a href="#!" class="text-success btn btn-rounded btn-secondary mb-2" onclick="addRow(this);">
                Add A Term/Condition&nbsp;<i class="fa fa-plus" aria-hidden="true"></i></a>
            </span>

            <table class="table table-bordered text-center table-responsive-sm">

                <tr>
                    <th class="text-center">Description</th>
                    <th class="text-center">Remove</th>
                </tr>

                @if($getConditions->count() > 0)

                    @foreach($getConditions as $condition)

                        <tr>
                            <td class="align-middle"><textarea
                                    class="bg-transparent border-0 h-auto form-control text-center w-100"
                                    name="description"
                                    placeholder="Enter Description">{{ $condition->description }}</textarea>
                            </td>
                            <td class="align-middle">
                                <span class="table-delete">
                                    <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
                                </span>
                            </td>
                            <td class=" align-middle" hidden>
                                <input type="text" name="trip" value="{{ $showLocation->id }}"/>
                            </td>
                            <td class=" align-middle" hidden>
                                <input type="text" name="trip_conditions"
                                       value="true">
                            </td>
                            <td class=" align-middle" hidden>
                                <input type="text" name="condition_option" value="{{ $condition->id }}">
                            </td>
                        </tr>

                    @endforeach

                @else

                    <tr class="blankActivity">
                        <td colspan="2" rowspan="1" class=" align-middle">No Conditions Added Yet
                        </td>
                    </tr>

                @endif

                <!-- This is our clonable table line -->
                <tr class="hide">
                    <td class="align-middle"><textarea
                            class="bg-transparent border-0 h-auto form-control text-center w-100"
                            name="description" placeholder="Enter Description"></textarea>
                    </td>
                    <td class="align-middle">
                        <span class="table-save">
                            <button type="button" class="btn btn-info btn-rounded btn-sm my-0">Save</button>
                        </span>

                        <span class="table-remove">
                            <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
                        </span>
                    </td>
                    <td class="" hidden><input type="text" name="trip"
                                                        value="{{ $showLocation->id }}"/>
                    </td>
                    <td class="" hidden><input type="text" name="trip_conditions"
                                                        value="true">
                    </td>
                </tr>

            </table>
        </div>
    </div>
    <!-- Editable table -->
</div>
<!--- Terms and Conditions --->
