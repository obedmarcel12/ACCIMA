<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    $to = "accima247@gmail.com"; // 🔥 change if needed

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    $fullMessage = "You have received a new message from your website:\n\n";
    $fullMessage .= "Name: $name\n";
    $fullMessage .= "Email: $email\n\n";
    $fullMessage .= "Message:\n$message";

    if (mail($to, $subject, $fullMessage, $headers)) {
        echo "<script>alert('Message sent successfully'); window.location.href='contact.html';</script>";
    } else {
        echo "<script>alert('Failed to send message'); window.location.href='contact.html';</script>";
    }

}

?>