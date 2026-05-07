<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"] ?? ""));
    $email = htmlspecialchars(trim($_POST["email"] ?? ""));
    $phone = htmlspecialchars(trim($_POST["phone"] ?? ""));
    $business = htmlspecialchars(trim($_POST["business"] ?? ""));
    $address = htmlspecialchars(trim($_POST["address"] ?? ""));
    $sector = htmlspecialchars(trim($_POST["sector"] ?? ""));
    $category = htmlspecialchars(trim($_POST["category"] ?? ""));
    $message = htmlspecialchars(trim($_POST["message"] ?? ""));

    if (
        empty($name) ||
        empty($email) ||
        empty($phone) ||
        empty($business) ||
        empty($sector) ||
        empty($category)
    ) {
        echo "<script>alert('Please fill all required fields'); window.location.href='apply.html';</script>";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Please enter a valid email address'); window.location.href='apply.html';</script>";
        exit;
    }

    $to = "accima247@gmail.com";
    $subject = "New ACCIMA Membership Application";

    $headers = "From: ACCIMA Website <no-reply@accima.org>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $fullMessage = "New ACCIMA Membership Application\n\n";
    $fullMessage .= "Full Name: $name\n";
    $fullMessage .= "Email Address: $email\n";
    $fullMessage .= "Phone Number: $phone\n";
    $fullMessage .= "Business Name: $business\n";
    $fullMessage .= "Business Address: $address\n";
    $fullMessage .= "Business Sector: $sector\n";
    $fullMessage .= "Membership Category: $category\n\n";
    $fullMessage .= "Business / Additional Information:\n$message\n";

    if (mail($to, $subject, $fullMessage, $headers)) {
        echo "<script>alert('Application submitted successfully. ACCIMA will contact you soon.'); window.location.href='apply.html';</script>";
    } else {
        echo "<script>alert('Failed to submit application. Please try again later.'); window.location.href='apply.html';</script>";
    }
} else {
    header("Location: apply.html");
    exit;
}

?>
