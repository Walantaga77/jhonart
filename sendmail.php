<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);
    $people = htmlspecialchars($_POST['people']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'ramadani45697@gmail.com'; // SMTP username
        $mail->Password = 'yourpass'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('ramadani45697@gmail.com', 'Mailer');
        $mail->addAddress('ikowismo456@gmail.com', 'Ikow'); // Add a recipient

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Table Reservation';
        $mail->Body = "Name: $name<br>Email: $email<br>Phone: $phone<br>Date: $date<br>Time: $time<br>Number of People: $people<br>Message: $message";
        $mail->AltBody = "Name: $name\nEmail: $email\nPhone: $phone\nDate: $date\nTime: $time\nNumber of People: $people\nMessage: $message";

        $mail->send();
        echo 'Thank you! Your reservation has been sent.';
    } catch (Exception $e) {
        echo "Sorry, there was an error sending your reservation. Please try again later.";
    }
}