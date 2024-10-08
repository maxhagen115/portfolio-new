<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    $to = "maxhagen115@gmail.com";
    $subject = "Maxhagen.nl: $name";

    $body = "You have received a new message from your website contact form:\n\n";
    $body .= "Naam: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Bericht:\n$message\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        header("Location: /portfolio/index.html?status=success#contact");
        exit();
    } else {
        header("Location: /portfolio/index.html?status=error#contact");
        exit();
    }
}
?>