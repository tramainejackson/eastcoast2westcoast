$(document).ready(function() {
	$.ajaxSetup({
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')	},
		cache: false
	});

	// Commonly user variables
	var documentHeight = $(document).height();
	var winHeight = window.innerHeight;
	var winWidth = window.innerWidth;
	var screenHeight = screen.height;
	var screenWidth = screen.width;

	//Initialize sidenav if available
    if($('.button-collapse').length > 0) {
        // SideNav Button Initialization
        $(".button-collapse").sideNav();
        // SideNav Scrollbar Initialization
        var sideNavScrollbar = document.querySelector('.custom-scrollbar');
        var ps = new PerfectScrollbar(sideNavScrollbar);
    }

    //Initialize DataTable if available
    if($('#questions_table_admin').length > 0) {
        $('#questions_table_admin').DataTable();
        $('.dataTables_length').addClass('bs-select');
    }
    if($('#contacts_table_admin').length > 0) {
        $('#contacts_table_admin').DataTable();
        $('.dataTables_length').addClass('bs-select');
    }

	if($('.adminNav').length > 0) {
        if (window.location.pathname.includes('location')) {
            $('.collapsible-header').first().parent().addClass('active');
            $('.collapsible-header').first().siblings().css('display', 'block');
            $('.collapsible-header').first().addClass('active');
        } else if (window.location.pathname.includes('picture')) {
            $('.collapsible-header').eq(1).parent().addClass('active');
            $('.collapsible-header').eq(1).siblings().css('display', 'block');
            $('.collapsible-header').eq(1).addClass('active');
        } else if (window.location.pathname.includes('contacts')) {
            $('.collapsible-header').eq(2).parent().addClass('active');
            $('.collapsible-header').eq(2).siblings().css('display', 'block');
            $('.collapsible-header').eq(2).addClass('active');
        } else if (window.location.pathname.includes('admin')) {
            $('.collapsible-header').last().parent().addClass('active');
            $('.collapsible-header').last().siblings().css('display', 'block');
            $('.collapsible-header').last().addClass('active');
        }
    }

    // Material Select Initialization
	$('.mdb-select').materialSelect();

	// Data Picker Initialization
    $('.datepicker').datepicker({
        format: 'mm/dd/yyyy',
        formatSubmit: 'yyyy/mm/dd',
        selectMonths: true,
        selectYears: true
    });

	// Make carousel items a minimum height of the document window
	$('.carousel').css({'maxHeight': (winHeight)});

	// Add loading modal when user signing up for trip
	$('.signupForm').on('submit', function() {
		$('.loadingSpinner p').text('Sending Information');
		$('.loadingSpinner').modal('show');
	});

	// ScrollSpy
    $('body').scrollspy({
        target: '.dotted-scrollspy'
    });

    // Delete the player from the team
    $('body').on('click', '.deleteQuestionBtn', function() {
        var questionID = $(this).next().val();
        var deleteURL = window.location.protocol + '//' + window.location.hostname  + ':' + window.location.port + '/questions/' + questionID;

        $('#delete_question form').attr('action', deleteURL);
    });

	// Change input button when input has been changed
	$("body").on('change', '.locationEditForm input, .locationEditForm textarea, .locationEditForm select, #add_picture_form input', function() {
		$('.locationEditForm input[type="submit"], #add_picture_form input[type="submit"]').addClass('btn-success btn-lg').removeClass('btn-secondary');
	});
	
	// Add an additional input row when plus sign selected
	$("body").on("click", ".oi-plus", function() {
		var inputDiv = $(this).next().clone();
		var minusBtn = "<span class='oi oi-minus text-danger rounded-circle' title='io-minus' aria-hidden='true'></span>";
		var iteration = $(this).parent().find('div').length;
		$(minusBtn).prependTo($(inputDiv));
		$(inputDiv).find('input').val("");
		
		if(iteration > 1) {
			$(inputDiv).removeClass("d-inline");
		}
		
		$(inputDiv).addClass("addInput w-100").appendTo($(this).parent());
	});
	
	$("body").on("click", ".oi-minus", function(e) {
		console.log(e.target);
		$(e.target).parent().fadeOut(function() {
			$(e.target).parent().remove();
		});
	});
	
	// Add a blank activity row to the current location edit form
	$("body").on("click", ".newActivityBtn", function() {
		var newActivityRow = $(".newActivityRow").clone();
		$(".blankActivity").remove();

		$(newActivityRow)
			.removeClass("newActivityRow")
			.appendTo($(".tripEvents table"))
			.fadeIn()
			.find("input").focus();
	});
	
	// Add a blank activity row to the current location edit form (mobile)
	$("body").on("click", ".newActivityBtnMobile", function() {
		var newActivityRow = $(".newActivityRowMobile").clone();
		var newDivider = ('<div class="divider"></div>');
		$(".blankActivity").remove();

		$(newDivider).insertBefore($(".newActivityRowMobile"));
		$(newActivityRow)
			.removeClass("newActivityRowMobile")
			.insertBefore($(".newActivityRowMobile"))
			.fadeIn()
			.find("input").focus();
	});
	
	// Add an blank participant row to the current location edit form
	$("body").on("click", ".newParticipantBtn", function() {
		var newParticipantRow = $(".newParticipantRow").clone();
		$(".blankParticipant").remove();

		$(newParticipantRow)
			.removeClass("newParticipantRow")
			.appendTo($(".tripUsers table"))
			.fadeIn()
			.find("input").focus();
	});
	
	// Add an blank participant row to the current location edit form (mobile)
	$("body").on("click", ".newParticipantBtnMobile", function() {
		var newParticipantList = $(".newParticipantRowMobile").clone();
		var newDivider = ('<div class="divider"></div>');
		$(".blankParticipant").slideUp();

		$(newDivider).insertBefore($(".newParticipantRowMobile"));
		$(newParticipantList)
			.removeClass("newParticipantRowMobile")
			.insertBefore($(".newParticipantRowMobile"))
			.fadeIn()
			.find("input").focus();
	});
	
	//Bring up already signed up users for specific trip
	$("body").on("change", "#select_trip_for_new_user, #select_trip_for_new_activity, #select_trip_for_edit", function(e) {
		var newValue = $(this).val();
		console.log($(this).attr("class"));
		if($(this).hasClass("personSelect")) {
			// window.open("locations.php?add_person=true&event_users="+newValue, "_self");	
		} else if($(this).hasClass("activitySelect")) {
			// window.open("locations.php?trip_activities=true&all_activities="+newValue, "_self");
		} else {
			// window.open("locations.php?edit_trip="+newValue, "_self");
		}
	});
	
	//Toggle value for checked item
	$("body").on("change", ".pifSwitch", function(e) {
		console.log($(this).val());
		if($(this).val() == "Y") {
			$(this).val("N");
		} else {
			$(this).val("Y");
		}
	});
	
	//Bring up pictures to see before deleting or bring up all pictures
	$("body").on("change", "#select_trip_for_remove_pictures, #select_trip_for_new_pictures, #select_trip_for_pictures", function(e) {
		var newValue = $(this).val();
		if($(this).attr("id") == "select_trip_for_remove_pictures") {
			// window.open("pictures.php?remove_pictures=true&location="+newValue, "_self");	
		} else if($(this).attr("id") == "select_trip_for_new_pictures") {
			// window.open("pictures.php?add_pictures=&location="+newValue, "_self");
		} else {
			// window.open("pictures.php?location="+newValue, "_self");
		}
	});
	
	//Remove message from screen after 10 seconds
	if($(".errors").length > 0 || $(".message").length > 0) {
		setTimeout(function() {
			$(".errors").fadeOut();
			$(".message").fadeOut();
		}, 10000)
	}

	// Button toggle Yes/No switch
	$('body').on("click", "button", function(e) {
		if($(this).hasClass('yesBtn') || $(this).hasClass('noBtn')) {
			if($(this).hasClass('yesBtn')) {
                if($(this).hasClass('stylish-color')) {
					//Add a change event to the input when the button is changed
                    $(this).children('input').change();
                }

				// Yes Button
				$(this).addClass('active btn-success')
                    .removeClass('stylish-color active')
					.children()
					.attr("checked", true);

				// No Button
				$(this).siblings()
					.removeClass('active btn-danger')
					.addClass('stylish-color')
					.children()
					.removeAttr("checked");

			} else if($(this).hasClass('noBtn')) {
                if($(this).hasClass('stylish-color')) {
                    //Add a change event to the input when the button is changed
                    $(this).children('input').change();
                }

                // Yes Button
                $(this).siblings()
					.removeClass('active btn-success')
                    .addClass('stylish-color')
					.children()
					.removeAttr("checked");

                // No Button
                $(this).addClass('active btn-danger')
                    .removeClass('stylish-color active')
					.children()
					.attr("checked", true);
            }
		}
	});

	//Add loading GIF when form is submitted. Will remove once form is submitted to next pageX
	$("body").on("submit", "#add_picture_form", function(e) {
		if($(".pictureSelect option:selected").val() == "blank") {
			e.preventDefault();
			$(".noLocationSelected").fadeIn("slow");
			console.log("Form Not Submitted. No Trip Selected");
		} else {
			$('.loadingSpinner p').text('Adding Images....');
			$('.loadingSpinner').modal('show');
		}
	});
	
	// Call function for file preview when uploading new images
	$("#upload_photo_input, #trip_photo").change(function () {
		filePreview(this);
	});
	
	// Call function for file preview when uploading new photo for a current trip
	$(".tripPhotoChange").change(function () {
		filePreview2(this);
	});
});

// Send question form
function sendQuestion() {
	var errors = 0;
	var form = $('#question_form1');
	var inputs = $('#question_form1 input');
	var textarea = $('#question_form1 textarea');
	
	// Check for empty fields
	$(inputs).each(function(e) {
		if($(this).val() == "") {
			$(this).prop('placeholder', 'Field Cannot be Empty');
			errors++;
		}
	});
	
	if($(textarea).val() == "") {
		$(textarea).prop('placeholder', 'Field Cannot be Empty');
		errors++;
	}
	
	if(errors < 1) {
		return true;
	} else {
		return false;
	}
}

// Send suggestion form
function sendSuggestion() {
	var errors = 0;
	
	if($('#suggestion_form1 input:checked').length < 1) {
		event.preventDefault();
	}
}

// Preview images before being uploaded on images page and new location page
function filePreview(input) {
    if (input.files && input.files[0]) {
		if(input.files.length > 1) {
			var imgCount = input.files.length
			$('.imgPreview').remove();
			
			for(x=0; x < imgCount; x++) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('<img class="imgPreview img-thumbnail m-1" src="' + e.target.result + '" width="350" height="200"/>').appendTo('.uploadsView');
				}
				reader.readAsDataURL(input.files[x]);
			}			
		} else {
			var reader = new FileReader();
			$('.imgPreview').remove();
			
			reader.onload = function (e) {
				$('<img class="imgPreview img-thumbnail" src="' + e.target.result + '" width="450" height="300"/>').appendTo('.uploadsView');
			}
			reader.readAsDataURL(input.files[0]);
		}
    }
}

// Preview images before being uploaded on edit location page
function filePreview2(input) {
    if (input.files && input.files[0]) {
		var reader = new FileReader();		
		reader.onload = function (e) {
			$('.newTripPhoto').attr('src', e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
    }
}
// Remove individual image via ajax request
function removePicture(id) {
	$.ajax({
	  method: "DELETE",
	  url: "/pictures/" + id
	})
	
	.fail(function() {	
		alert("Fail");
	})
	
	.done(function(data) {
		var deleteCard = $('#edit_picture_form input[value="' + id + '"]').parent().parent().parent();
        deleteCard.addClass('zoomOutLeft');

        // Display a success toast
        toastr.error('Image Removed');

        // Delete Card After Animation Is Finished
        setTimeout(function() {
            deleteCard.remove();
		}, 1000);

	});
}

//Check for missing information or errors on question form
function checkErrors() {
	var firstname = $("input#first_name");
	var lastname = $("input#last_name");
	var email = $("input#email_address");
	var question =  $("textarea#question_text");
	var errorMsg = "";
	errors = 0;
	$("input").removeClass("errorBorder");
	$("textarea").removeClass("errorBorder");
	if((firstname.val() == "") || (firstname.val() == null)){
		errors++;
		$(firstname).addClass("errorBorder");
		errorMsg += errors + ". First name cannot be blank.<br/>";
	}
	if((lastname.val() == "") || (lastname.val() == null)){
		errors++;
		$(lastname).addClass("errorBorder");
		errorMsg += errors + ". Last name cannot be blank.<br/>";
	}
	if((email.val() == "") || (email.val() == null)){
		errors++;
		$(email).addClass("errorBorder");
		errorMsg += errors + ". Email address cannot be blank.<br/>";
	}
	if((question.val() == "") || (question.val() == null)){
		errors++;
		$(question).addClass("errorBorder");
		errorMsg += errors + ". Question cannot be blank.<br/>"; 
	}
	$(".error_modal_content").append(errorMsg);
return errors;	
}
	
//Check for errors on sign up form
function checkRegistration() {
	var firstname = $("input.first_name_input");
	var lastname = $("input.last_name_input");
	var email = $("input.email_input");
	var errorMsg = "";
	errors = 0;
	$("input").removeClass("errorBorder");
	if((firstname.val() == "") || (firstname.val() == null)){
		errors++;
		$(firstname).addClass("errorBorder");
		errorMsg += "First name cannot be blank.<br/>";
	}
	if((lastname.val() == "") || (lastname.val() == null)){
		errors++;
		$(lastname).addClass("errorBorder");
		errorMsg += "Last name cannot be blank.<br/>";
	}
	if((email.val() == "") || (email.val() == null)){
		errors++;
		$(email).addClass("errorBorder");
		errorMsg += "Email address cannot be blank.<br/>";
	}
	$(".error_modal_content").append(errorMsg);
return errors;	
}
	
//Caitalize each word
function capitalizeWords(stringToCapitalize) {
	var $strToArray = stringToCapitalize.split("_");
	var newString = "";
	$($strToArray).each(function(){
		var capitalizeLetter = this.charAt(0).toUpperCase();
		var resWord = this.substring(1);
		newString += capitalizeLetter + resWord + "%20";
	});
	var newStringLength = newString.length;
	newString = newString.substring(0, newStringLength);
	return newString;
}

// Initialize tooltip
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

// MDB Lightbox Init
$(function () {
    $("#mdb-lightbox-ui").load("/addons/mdb-lightbox-ui.html");
});