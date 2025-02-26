/* FORM WIZARD RESERVATION SIGN UP ======================================== */

jQuery(function ($) {
    "use strict";

    // Chose here which method to send the email, available:
    // Simple phpmail text/plain > reservation_send.php (default)
    // Phpmaimer text/html > phpmailer/reservation_phpmailer.php
    // Phpmaimer text/html SMPT > phpmailer/reservation_phpmailer_smtp.php
    // PHPmailer with html template > phpmailer/reservation_phpmailer_template.php
    // PHPmailer with html template SMTP> phpmailer/reservation_phpmailer_template_smtp.php

    $('form#custom').attr('action', 'phpmailer/reservation_phpmailer_smtp_TR.php');

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
            'check_in': { required: 'Giriş - Çıkış Tarihleri zorunludur' },
            'adults': { required: 'Kişi Sayısı zorunludur' },
            'room_type': { required: 'Oda Tipi zorunludur' },
            'firstname': { required: 'Ad Zorunludur' },
            'lastname': { required: 'Soyad Zorunludur' },
            'email': { required: 'Geçersiz E-Posta!' },
            'telephone': { required: 'Doğum Tarihi zorunludur' },
        },
        submitHandler: function(form){
            if ($('input#website').val().length == 0) {
                form.submit();
            }
        }
    });

});
			