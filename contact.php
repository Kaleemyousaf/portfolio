<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data safely
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $subject = htmlspecialchars(trim($_POST["subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Your receiving email
    $to = "kaleemmansha67@gmail.com";

    // Email subject
    $email_subject = "New Message from Portfolio: " . $subject;

    // Email content
    $email_body = "You have received a new message from your website contact form.\n\n" .
                  "Here are the details:\n" .
                  "Name: $name\n" .
                  "Email: $email\n" .
                  "Subject: $subject\n" .
                  "Message:\n$message\n";

    // Headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Try to send
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<script>alert('✅ Message sent successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('❌ Error: Message could not be sent. Please try again later.'); window.location.href='index.html';</script>";
    }
}
?>
