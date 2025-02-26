/* FORM WIZARD RESERVATION SIGN UP ======================================== */

jQuery(function ($) {
    "use strict";

    $('form#custom').attr('action', 'phpmailer/reservation_phpmailer_template_smtp.php');

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


    $('#custom').validate({

        errorPlacement: function(error, element) {

            $('#custom .stepy-error').append(error);
        },
        rules: {
            'check_in': 'required',
            'adults': 'required',
            'room_type': 'required',
            'firstname': 'required',
            'lastname': 'required',
            'email': 'required',
            'telephone': 'required'
            //'terms': 'required' // BE CAREFUL: last has no comma
        },
        messages: {
            'check_in': { required: 'Anreisedatum / Anreisedatum ist erforderlich' },
            'adults': { required: 'Anzahl der Personen ist erforderlich' },
            'room_type': { required: 'Zimmertyp ist erforderlich' },
            'firstname': { required: 'Vorname ist erforderlich' },
            'lastname': { required: 'Nachname ist erforderlich' },
            'email': { required: 'Ungültige E-Mail!' },
            'telephone': { required: 'Geburtsdatum ist erforderlich' },
        },
        submitHandler: function(form){
            if ($('input#website').val().length == 0) {
                form.submit();
            }
        }
    });

});
			