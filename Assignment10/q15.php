<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_SESSION['user'] ?? 'Guest', ENT_QUOTES, 'UTF-8');
    $feedback = strip_tags($_POST['feedback'] ?? '');
    $to = "admin@vit.ac.in";
    $subject = "Student Feedback";
    $message = "Feedback from $name:\r\n\r\n" . $feedback;
    $headers = "From: noreply@vit.ac.in\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you, $name. Feedback sent!";
    } else {
        echo "Failed to send feedback.";
    }
}
?>
<form method="post">
    <textarea name="feedback" placeholder="Enter your feedback" required></textarea>
    <button type="submit">Send Feedback</button>
</form>
