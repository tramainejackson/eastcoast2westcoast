<x-app-layout>

    @section('title', 'Edit Trip - Eastcoast2Westcoast')

    @section('additional_scripts')
        <script type="text/javascript">
            let $BTN = document.getElementsByClassName('table-save');
            // let $EXPORT = $('<span></span>');
            let trip_id = document.getElementsByTagName('body')[0].querySelector('input[name="trip"]').value;
            //
            // // If trip payment occurrence checkbox is selected, remove checkbox from
            // // other checkbox option
            // $('body').on('click', '.oneTimeCheckBox, .reoccuringCheckBox', function () {
            //     $(this).parent().siblings().find('input').attr('checked', false);
            // });
            //
            // $('.table-add').click(function () {
            //     var indContentDiv = $(this).parent().parent().parent().parent();
            //     var table = $(this).parent().parent();
            //     var $clone = table.find('tr.hide').clone(true).removeClass('hide table-line');
            //
            //     // Remove blank placeholder row if one available
            //     table.find('table tr[class^="blank"]').remove();
            //
            //     if ($(indContentDiv).attr('id') == 'trip_payments') {
            //         // Add id attribute to input checkboxes and for attribute to label if trip payment table
            //         $clone.find('.reoccuringCheckBox').attr('id', 'materialInline' + (table.find('tr').length * 2));
            //         $clone.find('.reoccuringCheckBox').next().attr('for', 'materialInline' + (table.find('tr').length * 2));
            //         $clone.find('.oneTimeCheckBox').attr('id', 'materialInline' + ((table.find('tr').length * 2) + 1));
            //         $clone.find('.oneTimeCheckBox').next().attr('for', 'materialInline' + ((table.find('tr').length * 2) + 1));
            //     }
            //
            //     if ($(indContentDiv).attr('id') == 'trip_activities') {
            //         // Initialize the new date field
            //         $clone.removeClass('newActivityRow').find('.new_activity_date').addClass('md-form input-with-post-icon datepicker');
            //
            //         // Append the cloned row to the table
            //         table.find('table').append($clone).find('.datepicker').datepicker({
            //             format: 'mm/dd/yyyy',
            //             formatSubmit: 'yyyy/mm/dd',
            //             selectMonths: true,
            //             selectYears: true
            //         });
            //     } else {
            //         // Append the cloned row to the table
            //         table.find('table').append($clone);
            //     }
            // });
            //
            // // Remove unsaved row
            // $('.table-remove').click(function () {
            //     $(this).parents('tr').detach();
            // });
            //
            // // Remove save data row
            // $('body').on('click', '.table-delete', function () {
            //     var row = $(this).parents('tr');
            //     var $values = $(row).find('input, textarea').serialize();
            //
            //     $.ajax({
            //         method: "DELETE",
            //         url: "/locations/ajax_delete",
            //         data: {trip_id: trip_id, trip_deletions: $values}
            //     }).done(function (data) {
            //         toastr.success(data);
            //
            //         // Remove Save Button
            //         row.addClass('animated fadeOutUp');
            //
            //         setTimeout(function () {
            //             row.remove();
            //         }, 2000);
            //     });
            // });
            //
            // // Save new rows
            // $BTN.on('click', function () {
            //     var saveBtn = $(this);
            //     var removeBtn = $(this).next();
            //     var row = $(this).parents('tr');
            //     var $values = $(row).find('input, textarea').serialize();
            //     var $parsedValues = $values.split('&');
            //     var updateDiv = '#';
            //     var updateOption = '';
            //
            //     $.ajax({
            //         method: "POST",
            //         url: "/locations/ajax_add",
            //         data: {trip_id: trip_id, trip_additions: $values}
            //     }).done(function (data) {
            //
            //         for (var i = 0; i < $parsedValues.length; i++) {
            //             if ($parsedValues[i].indexOf('trip_') > -1) {
            //                 var parseValue = $parsedValues[i].split('=');
            //
            //                 // Div that is being updated
            //                 updateDiv += parseValue[0];
            //
            //                 // Get the table row to remove
            //                 updateRow = $(updateDiv + ' .card table tr:last');
            //
            //                 // Append new row to end of table
            //                 if (parseValue[0].replace('trip_', '') == 'payments') {
            //                     updateOption = 'payment_option';
            //                 } else if (parseValue[0].replace('trip_', '') == 'includes') {
            //                     updateOption = 'inclusion_option';
            //                 } else if (parseValue[0].replace('trip_', '') == 'conditions') {
            //                     updateOption = 'condition_option';
            //                 } else if (parseValue[0].replace('trip_', '') == 'activities') {
            //                     updateRow = $('#trip_activities').find('#trip_activities_table tr:last');
            //                     updateOption = 'activity_option';
            //                 }
            //
            //                 $('<td class="pt-3-half" hidden=""><input type="text" name="' + updateOption + '" value="' + data.id + '"></td>').appendTo(updateRow);
            //
            //                 // Add success message
            //                 toastr.success(updateOption.substr(0, 1).toUpperCase() + updateOption.substr(1).replace('_', ' ') + ' added successfully');
            //
            //                 // Remove Save Button
            //                 saveBtn.addClass('animated fadeOutUp');
            //
            //                 // Change the class value of the remove button
            //                 removeBtn.attr('class', 'table-delete');
            //
            //                 setTimeout(function () {
            //                     saveBtn.remove();
            //                 }, 2000);
            //             }
            //         }
            //     });
            // });
            //
            // // Update current rows
            // $('tr input, tr textarea').on('change', function () {
            //     var $values = $(this).parents('tr').find('input, textarea').serialize();
            //     var $optionCheck = $(this).parents('tr').find('input, textarea').serializeArray();
            //     var isOption = false;
            //
            //     $($optionCheck).each(function () {
            //         if ($(this)[0]['name'].search('option') > 0) {
            //             isOption = true;
            //         }
            //     });
            //
            //     //Only update if the option is part of the query string
            //     //Will determine if this is a new row or a row to be updated
            //     if (isOption) {
            //         $.ajax({
            //             method: "PATCH",
            //             url: "/locations/ajax_update",
            //             data: {trip_id: trip_id, trip_updates: $values}
            //         }).done(function (data) {
            //             toastr.success(data);
            //         });
            //     }
            // });
            //
            // // Update current rows
            // $('.md-form input, .md-form select, .md-form textarea').on('change', function () {
            //     var $values = $(this).serialize().replace(/%.{2}/g, ' ');
            //     var skipAjax = false;
            //
            //     if ($values.search('deposit_date') > -1) {
            //         var deposit_date = $('.md-form input[name="deposit_date"]');
            //         $values = 'deposit_date=' + deposit_date.val();
            //     } else if ($values.search('due_date') > -1) {
            //         var due_date = $('.md-form input[name="due_date"]');
            //         $values = 'due_date=' + due_date.val();
            //     } else if ($(this).parents('.terms_cost_div').length > 0) {
            //         $values = 'trip_cost_' + $(this).attr('name') + '=' + $(this).val();
            //     } else if ($(this).hasClass('tripPhotoChange') || $(this).hasClass('flyerChange')) {
            //         skipAjax = true;
            //
            //         if ($(this).hasClass('tripPhotoChange')) {
            //             $('.saveNewPhotoBtn').fadeIn();
            //         } else {
            //             $('.saveNewFlyerBtn').fadeIn();
            //         }
            //     }
            //
            //     if (skipAjax == false) {
            //         $.ajax({
            //             method: "PATCH",
            //             url: "/locations/ajax_update",
            //             data: {trip_id: trip_id, trip_updates: $values}
            //         }).done(function (data) {
            //             toastr.success(data);
            //         });
            //     }
            //
            // });
            //
            // $('input[name="trip_complete"], input[name="show_trip"]').parent().on('click', function (e) {
            //     var $values = $(e.target.children)[0].name + "=" + $(e.target.children)[0].value;
            //
            //     $.ajax({
            //         method: "PATCH",
            //         url: "/locations/ajax_update",
            //         data: {trip_id: trip_id, trip_updates: $values}
            //     }).done(function (data) {
            //         toastr.success(data);
            //     });
            // });

        </script>

    @endsection

    <div class="col-12 px-5">
        <div class="container my-3 pt-3" id="admin_trips_links">
            <div class="row">
                <div id="" class="col-12 col-md-6">
                    <h1 class="pageTopicHeader text-center text-md-start">Edit Trip</h1>
                </div>

                <div class="col-12 col-md-6 text-center">
                    <x-button-link href="{{ route('location.index') }}" class="btn-primary ms-3">See All Trips
                    </x-button-link>
                </div>
            </div>

            <div class="pt-4">
                <h3 class="display-2">{{ $showLocation->trip_location }}</h3>

                <div class="">
                    <div class="d-inline-block">
                        <a href="{{ route('location.show', $showLocation->id) }}" type="button"
                           class="btn btn-info ms-0">Review Trip</a>
                    </div>
                    <div class="d-inline-block ms-2">
                        <button data-target="#delete_trip" data-toggle="modal" type="button"
                                class="btn btn-danger ml-0">Remove Trip
                        </button>
                    </div>
                </div>
            </div>

            {{--Update Form--}}
            @include('components.forms.trip_update_form')
        </div>
    </div>

    @include('modals.delete_trip')

</x-app-layout>
