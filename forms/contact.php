<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path as necessary

$mail = new PHPMailer(true);

try {

    $mail->isSMTP();
    $mail->Host = 'smtp.example.com'; // Set the SMTP server to send through
    $mail->SMTPAuth = true;
    $mail->Username = 'your_email@example.com'; // SMTP username
    $mail->Password = 'your_password'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
    $mail->Port = 587; // TCP port to connect to

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer'); // Sender's email and name
    $mail->addAddress($receiving_email_address); // Add a recipient

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = $_POST['subject']; // Email subject
    $mail->Body    = $_POST['message']; // Email body

    $mail->send(); // Send the email
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; // Error message
}
?>