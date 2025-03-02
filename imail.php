<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    // Add branding to the email body (optional)
    $message = "<h2>Message from iMail</h2>" . nl2br($message);

    // Headers
    $headers = "From: no-reply@imail.com" . "\r\n" .
               "Reply-To: no-reply@imail.com" . "\r\n" .
               "X-Mailer: PHP/" . phpversion() . "\r\n" .
               "Content-Type: text/html; charset=UTF-8";

    // Check if email is valid
    if (filter_var($to, FILTER_VALIDATE_EMAIL)) {
        if (mail($to, $subject, $message, $headers)) {
            echo "Email sent successfully from iMail!";
        } else {
            echo "Sorry, your email could not be sent. Please try again.";
        }
    } else {
        echo "Invalid email address.";
    }
}
?>
