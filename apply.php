<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $business = htmlspecialchars($_POST["business"]);
    $category = htmlspecialchars($_POST["category"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $message = htmlspecialchars($_POST["message"]);

    $to = "accima247@gmail.com"; // your email

    $subject = "New Membership Application";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    $fullMessage = "New Membership Application:\n\n";
    $fullMessage .= "Name: $name\n";
    $fullMessage .= "Email: $email\n";
    $fullMessage .= "Business: $business\n";
    $fullMessage .= "Category: $category\n";
    $fullMessage .= "Phone: $phone\n\n";
    $fullMessage .= "Additional Info:\n$message";

    if (mail($to, $subject, $fullMessage, $headers)) {
        echo "<script>alert('Application submitted successfully'); window.location.href='apply.html';</script>";
    } else {
        echo "<script>alert('Failed to submit application'); window.location.href='apply.html';</script>";
    }

}

?>