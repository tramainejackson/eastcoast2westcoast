//Zoom-In/Zoom-Out Animation
// const registerTextEl = document.getElementById('register_training_text');
// const registerBtn = document.getElementById('register_training');
// const purchaseTextEl = document.getElementById('purchase_manual_text');
// const purchaseBtn = document.getElementById('purchase_manual');
//
// let animation1 = 'zoom-in';
// let animation2 = 'zoom-out';
//
// if (typeof (registerBtn) != 'undefined' && registerBtn != null) {
//     const changeAnimation1 = new mdb.Animate(registerTextEl, {
//         animation: animation1,
//         animationStart: 'onLoad',
//         animationDuration: 1000,
//         animationRepeat: false,
//         onShow: () => {
//             purchaseTextEl.style.zIndex = '-1';
//         }
//     });
//
//     const changeAnimation2 = new mdb.Animate(purchaseTextEl, {
//         animation: animation2,
//         animationStart: 'onLoad',
//         animationDuration: 1000,
//         animationRepeat: false,
//     });
//
//     changeAnimation1.init();
//     changeAnimation2.init();
//
//     registerBtn.addEventListener('click', () => {
//         if (animation2 === 'zoom-in') {
//             animation2 = 'zoom-out';
//
//             purchaseBtn.classList.remove('btn-third');
//             purchaseBtn.classList.add('btn-outline-third');
//
//             changeAnimation2.stopAnimation();
//             changeAnimation2.changeAnimationType(animation2);
//             changeAnimation2.startAnimation();
//         }
//
//         registerBtn.classList.remove('btn-outline-sixth');
//         registerBtn.classList.add('btn-sixth');
//         purchaseTextEl.style.zIndex = '-1';
//
//         animation1 = 'zoom-in';
//
//         changeAnimation1.stopAnimation();
//         changeAnimation1.changeAnimationType(animation1);
//         changeAnimation1.startAnimation();
//     });
//
//     purchaseBtn.addEventListener('click', () => {
//         if (animation1 === 'zoom-in') {
//             animation1 = 'zoom-out';
//
//             registerBtn.classList.remove('btn-sixth');
//             registerBtn.classList.add('btn-outline-sixth');
//
//             changeAnimation1.stopAnimation();
//             changeAnimation1.changeAnimationType(animation2);
//             changeAnimation1.startAnimation();
//         }
//
//         animation2 = 'zoom-in';
//
//         purchaseBtn.classList.remove('btn-outline-third');
//         purchaseBtn.classList.add('btn-third');
//         purchaseTextEl.style.zIndex = '1';
//
//         changeAnimation2.stopAnimation();
//         changeAnimation2.changeAnimationType(animation2);
//         changeAnimation2.startAnimation();
//     });
// }

function radioSwitch(btn) {
    let btnParent = btn.parentElement;
    let yesBtn = btnParent.children[0];
    let yesLabel = btnParent.children[1];
    let noBtn = btnParent.children[2];
    let noLabel = btnParent.children[3];

    if (btn === yesBtn) {
        if (!btn.hasAttribute('checked')) {
            yesBtn.setAttribute('checked', true);
            yesLabel.classList.add('btn-success');
            yesLabel.classList.remove('btn-outline-success');

            noBtn.removeAttribute('checked');
            noLabel.classList.remove('btn-danger');
            noLabel.classList.add('btn-outline-danger');
        }
    } else {
        if (!btn.hasAttribute('checked')) {
            noBtn.setAttribute('checked', 'true');
            noLabel.classList.add('btn-danger');
            noLabel.classList.remove('btn-outline-danger');

            yesBtn.removeAttribute('checked');
            yesLabel.classList.remove('btn-success');
            yesLabel.classList.add('btn-outline-success');
        }
    }
}

function updateSelectedTrips(trip, contact, trip_name) {
    let formData = new FormData();
    const empty_trips_div = document.getElementById('emtpy_trips');

    formData.append('contact', contact);
    formData.append('trip', trip);
    formData.append('_method', "PATCH");

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementsByClassName('alertBody')[0].innerHTML = this.responseText;
            mdb.Alert.getInstance(document.getElementById('return-data-alert')).show();

            //Remove no trips message if there
            if (typeof (empty_trips_div) != 'undefined' && empty_trips_div != null) {
                const animate = new mdb.Animate(empty_trips_div, {
                    animation: "fade",
                    animationStart: "onLoad",
                    animationDelay: 0,
                    animationDuration: 2000,
                    animationReverse: false,
                    animationRepeat: false,
                    animationInterval: 0,
                });
                animate.init();
            }

            // Create new button for the contacts trip
            let newButton = document.createElement('a');
            newButton.className = "btn btn-secondary btn-lg me-2 animated";
            newButton.innerHTML = trip_name;
            newButton.setAttribute('type', 'button');
            newButton.setAttribute('href', '/location/' + trip + '/edit');

            // Append the new button to the contacts trip div
            document.getElementById('contactsTrips').insertBefore(newButton, null);

            // Remove the selected trip from available trips
            let tripChip = document.getElementById('availableTrips').querySelector('#' + trip_name.replace(/(\s|\.|,)/g, '_').toLowerCase());
            tripChip.parentElement.remove();
        }
    }

    xhttp.open("POST", "/locations/add_contact", true);
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.getElementsByName('csrf-token')[0].getAttribute('content'));
    xhttp.send(formData);
}

// Preview images before being uploaded on edit location page
function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        if (document.getElementsByClassName('newTripPhoto')[0] != null && document.getElementsByClassName('newTripPhoto')[0] != undefined) {
            reader.onload = function (e) {
                document.getElementsByClassName('newTripPhoto')[0].setAttribute('src', e.target.result);
            }
        }

        if (document.getElementsByClassName('uploadsView')[0] != null && document.getElementsByClassName('uploadsView')[0] != undefined) {
            reader.onload = function (e) {
                document.getElementsByClassName('uploadsView')[0].firstElementChild.nextElementSibling.setAttribute('src', e.target.result);
            }
            document.getElementsByClassName('uploadsView')[0].classList.remove('d-none');
            document.getElementsByClassName('uploadsView')[0].classList.add('d-flex');
        }

        reader.readAsDataURL(input.files[0]);

        if (input.classList.contains('tripPhotoChange')) {
            document.getElementsByClassName('saveNewPhotoBtn')[0].style.display = 'block';
        }
    }
}

// Add a new row to the edit trip form
function addRow(addBtn) {
    let indContentDiv = addBtn.parentElement.parentElement.parentElement.parentElement;
    let table = addBtn.parentElement.parentElement;
    let $clone = table.querySelector('tr.hide').cloneNode(true);
    console.log(indContentDiv);

    // Remove blank placeholder row if one available
    if (table.querySelector('table tr[class^="blank"]') != null && table.querySelector('table tr[class^="blank"]') != undefined) {
        table.querySelector('table tr[class^="blank"]').remove();
    }

    if (indContentDiv.getAttribute('id') === 'trip_payments') {
        // Add id attribute to input checkboxes and for attribute to label if trip payment table
        $clone.querySelector('.reoccuringCheckBox').setAttribute('id', 'materialInline' + (table.querySelector('tr').length * 2));
        $clone.querySelector('.reoccuringCheckBox').nextElementSibling.setAttribute('for', 'materialInline' + (table.querySelector('tr').length * 2));
        $clone.querySelector('.oneTimeCheckBox').setAttribute('id', 'materialInline' + ((table.querySelector('tr').length * 2) + 1));
        $clone.querySelector('.oneTimeCheckBox').nextElementSibling.setAttribute('for', 'materialInline' + ((table.querySelector('tr').length * 2) + 1));
    }

    if (indContentDiv.getAttribute('id') === 'trip_activities') {
        // Initialize the new date field
        const options = {
            format: 'mm/dd/yyyy'
        }
        const myDatepicker = new mdb.Datepicker($clone.querySelector('.new_activity_date'), options);

        // Append the cloned row to the table
        $clone.classList.remove('newActivityRow', 'hide');
        table.querySelector('table tbody').append($clone);

        // Find the lone hidden activity row and update the show activity toggle id's
        let totalRows = table.querySelectorAll('tr').length;
        let loneNewRow = table.querySelector('.newActivityRow.hide');
        let btnGrp = loneNewRow.querySelector('.btn-group');
        btnGrp.querySelectorAll('input')[0].id = 'show_activity_' + ((totalRows * 2) - 1);
        btnGrp.querySelectorAll('input')[0].nextElementSibling.setAttribute('for', 'show_activity_' + ((totalRows * 2) - 1));
        btnGrp.querySelectorAll('input')[1].id = 'show_activity_' + (totalRows * 2);
        btnGrp.querySelectorAll('input')[1].nextElementSibling.setAttribute('for', 'show_activity_' + (totalRows * 2));

    } else {
        // Append the cloned row to the table
        $clone.setAttribute('class', '');
        table.querySelector('table tbody').append($clone);
    }
}

// function updateAppointments(eventData, apptType) {
//     var formData = new FormData();
//
//     formData.append('add_appointment', 'true');
//     formData.append('appointment_type', apptType);
//     formData.append('uuid', eventData);
//     console.log(eventData);
//
//     const xhttp = new XMLHttpRequest();
//     xhttp.onload = function () {
//         if (this.readyState == 4 && this.status == 200) {
//             console.log(this.responseText);
//             location.reload();
//         }
//     }
//
//     xhttp.open("POST", "/create-calendly-session", true);
//     xhttp.setRequestHeader("X-CSRF-TOKEN", document.getElementsByName('csrf-token')[0].getAttribute('content'));
//     xhttp.send(formData);
// }

// function addDeleteMessagesBtn() {
//     const paginationDiv = document.getElementsByClassName('datatable-pagination')[0];
//     const paginationWrapper = document.getElementsByClassName('datatable-select-wrapper')[0];
//     let deleteBtn = document.createElement("button");
//     let checkBoxesCount = document.getElementsByClassName('form-check-input').length;
//     let checkedCount = 0;
//
//     if (checkBoxesCount >= 1 && document.getElementsByClassName('removeMessagesBtn').length === 0) {
//         const animate = new mdb.Animate(deleteBtn, {
//             animation: 'fly-in',
//         });
//
//         deleteBtn.id = "remove-message-btn";
//         deleteBtn.className = "btn btn-danger me-auto removeMessagesBtn";
//         deleteBtn.innerHTML = "Remove Selected Messages";
//         deleteBtn.setAttribute('type', 'submit');
//         deleteBtn.setAttribute('onclick', 'event.preventDefault(); document.getElementById(\'messages-remove-form\').submit();');
//         paginationDiv.insertBefore(deleteBtn, paginationWrapper);
//
//         animate.init();
//         animate.startAnimation();
//     } else {
//         const element = document.getElementById('remove-message-btn');
//         const animate = new mdb.Animate(element, {
//             animation: 'fly-out',
//             onEnd: function () {
//                 element.remove();
//             }
//         });
//         let x = 0;
//
//         for (x; x < document.getElementsByClassName('form-check-input').length; x++) {
//             if (document.getElementsByClassName('form-check-input')[x].checked) {
//                 checkedCount++;
//             }
//         }
//
//         if (checkedCount === 0 && document.getElementsByClassName('removeMessagesBtn').length === 1) {
//             animate.init();
//             animate.startAnimation();
//         }
//     }
// }
