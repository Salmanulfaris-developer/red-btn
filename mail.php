<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $place = $_POST["place"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $phone = $_POST["phone"];
    $interests = isset($_POST["interest"]) ? implode(", ", $_POST["interest"]) : "No interests selected";

    // Set the recipient email address
    $to = "salmantechy406@gmail.com"; // Replace with the actual email address where you want to receive the form data.

    // Set the subject of the email
    $subject = "Contact Form Submission from $name";

    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    // Compose the email body
    $email_body = "Name: $name\n";
    $email_body .= "Place: $place\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Phone Number: $phone\n";
    $email_body .= "Interests: $interests\n\n";
    $email_body .= "Message:\n$message\n";

    // Send the email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "Thank you for your submission. Your form has been sent.";
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
}
?>
