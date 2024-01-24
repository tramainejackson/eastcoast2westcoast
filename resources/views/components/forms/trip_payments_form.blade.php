<!--- Trip Payments --->
<div class="trip_edit_div" id="trip_payments">

    <!-- Editable table -->
    <div class="card">
        <h3 class="card-header text-center fw-bold text-uppercase py-4 bg-yellow">Trip Payment</h3>

        <div class="card-body">

            <span class="table-add float-right mb-3 me-2">
                <a href="#!" class="text-success btn btn-rounded btn-secondary mb-2" onclick="addRow(this);">
                    Add Payment Option&nbsp;<i class="fa fa-plus" aria-hidden="true"></i>
                </a>
            </span>

            <table class="table table-bordered text-center table-responsive-sm table-editable">

                <tr>
                    <th class="text-center">Description</th>
                    <th class="text-center">Occurrence</th>
                    <th class="text-center">Remove</th>
                </tr>

                @if($getPaymentOptions->count() > 0)

                    @foreach($getPaymentOptions as $payment)

                        <tr>
                            <td class="align-middle">
                                <textarea
                                    class="bg-transparent border-0 h-auto md-textarea text-center w-100 form-control"
                                    name="description"
                                    placeholder="Enter Description">{{ $payment->payment_description }}</textarea>
                            </td>

                            <td class="align-middle">
                                <div class="" id="">
                                    <!-- Material inline 1 -->
                                    <div class="form-check form-check-inline col-auto">
                                        <input type="radio"
                                               name="occurrence{{($loop->iteration*2)}}"
                                               class="form-check-input reoccuringCheckBox"
                                               value="reoccurring"
                                               id="materialInline{{($loop->iteration*2)}}"{{$payment->occurrence == "reoccurring" ? ' checked' : ''}}>
                                        <label class="form-check-label"
                                               for="materialInline{{($loop->iteration*2)}}">Reoccurring</label>
                                    </div>

                                    <!-- Material inline 2 -->
                                    <div class="form-check form-check-inline col-auto">
                                        <input type="radio"
                                               name="occurrence{{($loop->iteration*2)}}"
                                               class="form-check-input oneTimeCheckBox"
                                               value="one_time"
                                               id="materialInline{{($loop->iteration*2) +1}}"{{$payment->occurrence == "one_time" ? ' checked' : ''}}>
                                        <label class="form-check-label"
                                               for="materialInline{{($loop->iteration*2) +1}}">One
                                            Time</label>
                                    </div>
                                </div>
                            </td>

                            <td class="align-middle">
                                    <span class="table-delete">
                                        <button type="button"
                                                class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
                                    </span>
                            </td>
                            <td class="" hidden>
                                <input type="text" name="trip" value="{{ $showLocation->id }}"/>
                            </td>
                            <td class="" hidden>
                                <input type="text" name="trip_payments" value="true">
                            </td>
                            <td class="" hidden>
                                <input type="text" name="payment_option" value="{{ $payment->id }}"/>
                            </td>
                        </tr>

                    @endforeach

                @else

                    <tr class="blankActivity">
                        <td colspan="3" rowspan="1" class="align-middle">No Payment Options Added
                            Yet
                        </td>
                    </tr>

                @endif

                <!-- This is our clonable table line -->
                <tr class="hide">
                    <td class="align-middle">
                        <textarea
                            class="bg-transparent border-0 h-auto form-control text-center w-100"
                            name="description" placeholder="Enter Description"></textarea></td>
                    <td class=" align-middle">
                        <!-- Material inline 1 -->
                        <div class="form-check form-check-inline col-auto">
                            <input type="radio" class="form-check-input reoccuringCheckBox"
                                   name="occurrence" value="reoccurring" id="">
                            <label class="form-label" for="">Reoccurring</label>
                        </div>

                        <!-- Material inline 2 -->
                        <div class="form-check form-check-inline col-auto">
                            <input type="radio" class="form-check-input oneTimeCheckBox"
                                   name="occurrence" value="one_time" id="">
                            <label class="form-check-label" for="">One Time</label>
                        </div>
                    </td>
                    <td class="align-middle">
                        <span class="table-save"><button type="button"
                                                         class="btn btn-info btn-rounded btn-sm my-0">Save</button></span>
                        <span class="table-remove"><button type="button"
                                                           class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                    </td>
                    <td class="" hidden><input type="text" name="trip"
                                                        value="{{ $showLocation->id }}"/></td>
                    <td class="" hidden><input type="text" name="trip_payments"
                                                        value="true"></td>
                </tr>
            </table>
        </div>
    </div>
    <!-- Editable table -->
</div>
<!--- Trip Payments --->
