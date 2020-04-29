<?php

/* Namespace alias. */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\wamp64\www\profileringsfonds1\composer\vendor\autoload.php';

$mail = new PHPMailer(TRUE);

try {
    $mail->setFrom('profileringsfondsnhlstenden@gmail.com');
    $mail->addAddress('', '');
    $mail->Subject = 'profileringsfonds';
    $mail->Body = 'There is a great disturbance in the Force.';

    /* SMTP parameters. */

    /* Tells PHPMailer to use SMTP. */
    $mail->isSMTP();

    /* SMTP server address. */
    $mail->Host = 'smtp.gmail.com';

    /* Use SMTP authentication. */
    $mail->SMTPAuth = TRUE;

    /* Set the encryption system. */
    $mail->SMTPSecure = 'ssl';

    /* SMTP authentication username. */
    $mail->Username = 'profileringsfondsnhlstenden@gmail.com';

    /* SMTP authentication password. */
    $mail->Password = 'TestPswdNhlstenden!';

    /* Set the SMTP port. */
    $mail->Port = 465;

    /* Finally send the mail. */
    $mail->send();
} catch (Exception $e) {
    echo $e->errorMessage();
} catch (\Exception $e) {
    echo $e->getMessage();
}