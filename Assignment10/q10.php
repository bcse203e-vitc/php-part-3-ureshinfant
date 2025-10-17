<?php
$to = 'receiver@example.com';
$subject = 'Test Email with Attachment';
$message = "This is a test email with attachment.";
$filePath = __DIR__ . '/document.pdf';
$from = 'admin@example.com';
$fromName = 'Admin';
$fileData = chunk_split(base64_encode(file_get_contents($filePath)));
$filename = basename($filePath);
$boundary = md5(time());
$headers = "From: $fromName <$from>\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n\r\n";
$body  = "--$boundary\r\n";
$body .= "Content-Type: text/plain; charset=UTF-8\r\n";
$body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$body .= $message . "\r\n\r\n";
$body .= "--$boundary\r\n";
$body .= "Content-Type: application/octet-stream; name=\"$filename\"\r\n";
$body .= "Content-Transfer-Encoding: base64\r\n";
$body .= "Content-Disposition: attachment; filename=\"$filename\"\r\n\r\n";
$body .= $fileData . "\r\n\r\n";
$body .= "--$boundary--";
if (mail($to, $subject, $body, $headers)) {
    echo 'Mail sent successfully.';
} else {
    echo 'Mail failed.';
}
?>
