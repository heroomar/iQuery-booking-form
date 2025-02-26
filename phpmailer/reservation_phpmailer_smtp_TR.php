 <!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Oleander Hotel Booking Form">
    <meta name="author" content="aryata | creative">
    <title>Oleander Hotel</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
	<link href="../css/responsive.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="../css/custom.css" rel="stylesheet">
    
	<script type="text/javascript">
    function delayedRedirect(){
        window.location = "https://www.oleanderhotel.com"
    }
    </script>

</head>
<body onLoad="setTimeout('delayedRedirect()', 5000)" style="background:#fff;">
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$mail = new PHPMailer(true);

try {

    //Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.yandex.ru';                           // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'webreservation@oleanderhotel.com';                             // SMTP username
    $mail->Password   = 'Olea4444';                             // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients - main edits
    $mail->setFrom('webreservation@oleanderhotel.com', 'Oleander Hotel');                 // Email Address and Name FROM
    $mail->addAddress('webreservation@oleanderhotel.com', 'Oleander Hotel');                           // Email Address and Name TO - Name is optional
    $mail->addReplyTo('webreservation@oleanderhotel.com', 'Oleander Hotel');           // Email Address and Name NOREPLY
    $mail->isHTML(true);                                                       
    $mail->Subject = 'Website Reservation Form | Oleander Hotel';                                     // Email Subject

    //The email body message
	
    $message = "<strong>Reservation Form Details</strong><br /><br />";
    $message .= "<strong>Check-In / Check-Out:</strong> " . $_POST['check_in'] . "<br />";
    $message .= "<strong>Room type:</strong> " . $_POST['room_type'] . "<br />";
    $message .= "<strong>Person:</strong> " . $_POST['adults'] . "<br />";

    $message .= "<br /><strong>First name:</strong> " . $_POST['firstname'] . "<br />";
    $message .= "<strong>Last name:</strong> " . $_POST['lastname'] . "<br />";
	$message .= "<strong>Birthday:</strong> " . $_POST['telephone'] . "<br />";
    $message .= "<strong>Email:</strong> " . $_POST['email'] . "<br />";
    $message .= "<br /><strong>Message:</strong><br />" . $_POST['additional_message'] . "<br /><br />";
	
	$message .= "<strong>Guest 2</strong><br />";
	$message .= "<strong>First name:</strong> " . $_POST['firstname2'] . "<br />";
    $message .= "<strong>Last name:</strong> " . $_POST['lastname2'] . "<br />";
	$message .= "<strong>Birthday:</strong> " . $_POST['telephone2'] . "<br /><br />";
	
	$message .= "<strong>Guest 3</strong><br />";
	$message .= "<strong>First name:</strong> " . $_POST['firstname3'] . "<br />";
    $message .= "<strong>Last name:</strong> " . $_POST['lastname3'] . "<br />";
	$message .= "<strong>Birthday:</strong> " . $_POST['telephone3'] . "<br /><br />";
	
	$message .= "<strong>Guest 4</strong><br />";
	$message .= "<strong>First name:</strong> " . $_POST['firstname4'] . "<br />";
    $message .= "<strong>Last name:</strong> " . $_POST['lastname4'] . "<br />";
	$message .= "<strong>Birthday:</strong> " . $_POST['telephone4'] . "<br />";

	$mail->Body = "" . $message . "";

    $mail->CharSet = 'UTF-8'; //Force UTF for special characters

    $mail->send();

    // Confirmation/autoreplay email send to who fill the form
    $mail->ClearAddresses();
    $mail->isSMTP();
    $mail->addAddress($_POST['email']); // Email address entered on form
    $mail->isHTML(true);
    $mail->Subject    = 'Web Reservation Form'; // Custom subject
    $mail->Body = "" . $message . "";

    $mail->CharSet = 'UTF-8'; //Force UTF for special characters

    $mail->Send();

    echo '<div id="success">
            <div class="icon icon--order-success svg">
                 <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
                  <g fill="none" stroke="#8EC343" stroke-width="2">
                     <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                     <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                  </g>
                 </svg>
             </div>
            <h4><span>Rezervasyon Formunuz Gönderildi.</span>Teşekkür ederiz.</h4>
            <small>5 saniye içerisinde ana sayfaya yönlendirileceksiniz.</small>
        </div>';
	} catch (Exception $e) {
	    echo "Mesajınız Gönderilemedi!. Mailer Error: {$mail->ErrorInfo}";
	}
	
?>
<!-- END SEND MAIL SCRIPT -->   

</body>
</html>