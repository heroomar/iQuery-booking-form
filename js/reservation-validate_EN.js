/* FORM WIZARD RESERVATION SIGN UP ======================================== */
let validat = '';
jQuery(function ($) {
    "use strict";

    // Chose here which method to send the email, available:
    // Simple phpmail text/plain > reservation_send.php (default)
    // Phpmaimer text/html > phpmailer/reservation_phpmailer.php
    // Phpmaimer text/html SMPT > phpmailer/reservation_phpmailer_smtp.php
    // PHPmailer with html template > phpmailer/reservation_phpmailer_template.php
    // PHPmailer with html template SMTP> phpmailer/reservation_phpmailer_template_smtp.php

    $('form#custom').attr('action', 'phpmailer/reservation_phpmailer_smtp_EN.php');

    $('#custom').stepy({
        backLabel: 'Previous',
        block: true,
        errorImage: false,
        nextLabel: 'Next',
        titleClick: true,
        description: true,
        legend: false,
        validate: true
    });


    validat = $('#custom').validate({

        errorPlacement: function(error, element) {

            $('#custom .stepy-error').append(error);
        },
        rules: {
            'check_in': 'required',
            'adults': {
                        required: true,
                        min: 1,
                        number: true
                    },
            'room_type': 'required',
            'firstname': 'required',
            'firstname2': 'required',
            'firstname3': 'required',
            'firstname4': 'required',
            'lastname': 'required',
            'lastname2': 'required',
            'lastname3': 'required',
            'lastname4': 'required',
            'email': 'required',
            'telephone': 'required',
            'telephone2': 'required',
            'telephone3': 'required',
            'telephone4': 'required',
            //'terms': 'required' // BE CAREFUL: last has no comma
        },
        messages: {
            'check_in': { required: 'Chech-In and Check-Out is required' },
            'adults': { required: 'Total People i required' },
            'room_type': { required: 'Room Type is required' },
            'firstname': { required: '1.Person First Name is required' },
            'firstname2': { required: '2.Guest First Name is required' },
            'firstname3': { required: '3.Guest First Name is required' },
            'firstname4': { required: '4.Guest First Name is required' },
            'lastname': { required: '1.Person Last Name is required' },
            'lastname2': { required: '2.Guest Last Name is required' },
            'lastname3': { required: '3.Guest Last Name is required' },
            'lastname4': { required: '4.Guest Last Name is required' },
            'email': { required: 'Invalid E-Mail!' },
            'telephone': { required: '1.Person Birthdate is required' },
            'telephone2': { required: '2.Guest Birthdate is required' },
            'telephone3': { required: '3.Guest Birthdate is required' },
            'telephone4': { required: '4.Guest Birthdate is required' },
        },
        submitHandler: function(form){
            if ($('input#website').val().length == 0) {
                form.submit();
            }
        }
    });

});
			