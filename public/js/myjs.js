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
            noLabel.classList.remove('btn-success');
            noLabel.classList.add('btn-outline-success');
        }
    } else {
        if (!btn.hasAttribute('checked')) {
            noBtn.setAttribute('checked', 'true');
            noLabel.classList.add('btn-success');
            noLabel.classList.remove('btn-outline-success');

            yesBtn.removeAttribute('checked');
            yesLabel.classList.remove('btn-success');
            yesLabel.classList.add('btn-outline-success');
        }
    }
}

function updateReview(parent) {
    let formData = new FormData();
    let yesBtn = parent.children[0];
    let noBtn = parent.children[2];
    let showReview = null;

    if (yesBtn.hasAttribute('checked')) {
        showReview = 1;
    } else if (noBtn.hasAttribute('checked')) {
        showReview = 0;
    }

    if (showReview !== null) {
        formData.append('show_review', showReview);
        formData.append('_method', "PUT");
        formData.append('review_id', parent.getAttribute('id'));

        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementsByClassName('alertBody')[0].innerHTML = this.responseText;
                mdb.Alert.getInstance(document.getElementById('return-data-alert')).show();
            }
        }

        xhttp.open("POST", "/reviews/" + parent.getAttribute('id').replace("review_num_", ""), true);
        xhttp.setRequestHeader("X-CSRF-TOKEN", document.getElementsByName('csrf-token')[0].getAttribute('content'));
        xhttp.send(formData);
    }
}

function updateAppointments(eventData, apptType) {
    var formData = new FormData();

    formData.append('add_appointment', 'true');
    formData.append('appointment_type', apptType);
    formData.append('uuid', eventData);
    console.log(eventData);

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            location.reload();
        }
    }

    xhttp.open("POST", "/create-calendly-session", true);
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.getElementsByName('csrf-token')[0].getAttribute('content'));
    xhttp.send(formData);
}

function addDeleteMessagesBtn() {
    const paginationDiv = document.getElementsByClassName('datatable-pagination')[0];
    const paginationWrapper = document.getElementsByClassName('datatable-select-wrapper')[0];
    let deleteBtn = document.createElement("button");
    let checkBoxesCount = document.getElementsByClassName('form-check-input').length;
    let checkedCount = 0;

    if (checkBoxesCount >= 1 && document.getElementsByClassName('removeMessagesBtn').length === 0) {
        const animate = new mdb.Animate(deleteBtn, {
            animation: 'fly-in',
        });

        deleteBtn.id = "remove-message-btn";
        deleteBtn.className = "btn btn-danger me-auto removeMessagesBtn";
        deleteBtn.innerHTML = "Remove Selected Messages";
        deleteBtn.setAttribute('type', 'submit');
        deleteBtn.setAttribute('onclick', 'event.preventDefault(); document.getElementById(\'messages-remove-form\').submit();');
        paginationDiv.insertBefore(deleteBtn, paginationWrapper);

        animate.init();
        animate.startAnimation();
    } else {
        const element = document.getElementById('remove-message-btn');
        const animate = new mdb.Animate(element, {
            animation: 'fly-out',
            onEnd: function () {
                element.remove();
            }
        });
        let x = 0;

        for (x; x < document.getElementsByClassName('form-check-input').length; x++) {
            if (document.getElementsByClassName('form-check-input')[x].checked) {
                checkedCount++;
            }
        }

        if (checkedCount === 0 && document.getElementsByClassName('removeMessagesBtn').length === 1) {
            animate.init();
            animate.startAnimation();
        }
    }
}

function loginOption(actionBtn) {
    let password_field = document.getElementById('password');

    if(actionBtn.id == 'customer_login_btn') {
        let admin_btn = document.getElementById('admin_login_btn');
        let actionBtn = document.getElementById('customer_login_btn');

        password_field.setAttribute('value', 'customer');
        password_field.classList.add('text-light');

        actionBtn.classList.add('btn-secondary');
        actionBtn.classList.remove('btn-outline-third');
        actionBtn.firstElementChild.removeAttribute('disabled');

        admin_btn.classList.add('btn-outline-third');
        admin_btn.classList.remove('btn-secondary');
        admin_btn.firstElementChild.setAttribute('disabled', 'disabled');

    } else if(actionBtn.id == 'admin_login_btn') {
        let customer_btn = document.getElementById('customer_login_btn');
        let actionBtn = document.getElementById('admin_login_btn');

        password_field.removeAttribute('value');
        password_field.classList.remove('text-light');

        actionBtn.classList.add('btn-secondary');
        actionBtn.classList.remove('btn-outline-third');
        actionBtn.firstElementChild.removeAttribute('disabled');

        customer_btn.classList.add('btn-outline-third');
        customer_btn.classList.remove('btn-secondary');
        customer_btn.firstElementChild.setAttribute('disabled', 'disabled');

    }
}