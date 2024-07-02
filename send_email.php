<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Set your email address where you want to receive emails
    $to = "your-email@example.com";

    // Subject of the email
    $subject = "Message from Multiunite Studios Contact Form";

    // Email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Headers
    $headers = "From: $name <$email>";

    // Send email
    if (mail($to, $subject, $email_content, $headers)) {
        echo json_encode(array('status' => 'success', 'message' => 'Your message has been sent.'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Unable to send email. Please try again later.'));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request.'));
}
?>
