<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to = "example@domain.com";
    $sub = "Contact Form Message";
    $from = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL) ?: 'noreply@example.com';
    $msg = strip_tags($_POST['message'] ?? 'This is a test message.');
    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $from\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    if (mail($to, $sub, $msg, $headers)) {
        echo "Mail Sent!";
    } else {
        echo "Mail failed.";
    }
}
?>
<form method="post">
    <input type="email" name="email" placeholder="Your email" required>
    <textarea name="message" placeholder="Message" required></textarea>
    <button type="submit">Send</button>
</form>
