<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Email settings
    $to = 'brielmohoms@yahoo.com'; // Your email address
    $from = $email;
    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $from\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Email body
    $email_subject = "Contact Form Submission: $subject";
    $email_body = "<p><strong>Name:</strong> $name</p>";
    $email_body .= "<p><strong>Email:</strong> $email</p>";
    $email_body .= "<p><strong>Subject:</strong> $subject</p>";
    $email_body .= "<p><strong>Message:</strong><br>$message</p>";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<p>Thank you for your message. It has been sent.</p>";
    } else {
        echo "<p>Sorry, there was a problem sending your message. Please try again later.</p>";
    }
} else {
    echo "<p>Invalid request method.</p>";
}
?>