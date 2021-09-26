<?php
# Code so that emailing will work
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "phpmailer/src/Exception.php";
require "phpmailer/src/PHPMailer.php";
require "phpmailer/src/SMTP.php";

# Mailing function
function mailing($recp,$recp_name,$body,$alt_body){
    # Mail instance
    $mail = new PHPMailer(true);
    # Settings
    try {
        # Server settings
        $mail->isSMTP();
        $mail->Host = "host"; #change
        $mail->SMTPAuth = true;
        $mail->Username = "username";  #change
        $mail->Password = "password"; #change 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        # Recipient
        $mail->setFrom("your-email", "NAME"); #change 
        $mail->addAddress($recp, $recp_name);
        $mail->addReplyTo("your-email", "NAME"); #change

        # Content
        $mail->isHTML(true);
        $mail->Subject = "Table Reservation";
        $mail->Body = $body;
        $mail->AltBody = $alt_body;

        # Send email
        $mail->send();
        $msg = "The confirmation email has been sent.";
    } catch (Exception $e) {
        $msg = "The email could not be sent.\n Mailer error {$mail->ErrorInfo}";
    }
};