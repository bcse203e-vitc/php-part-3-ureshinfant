<?php
$srcPath = __DIR__ . '/sample.jpg';
$img = imagecreatefromjpeg($srcPath);
$color = imagecolorallocate($img, 0, 0, 255);
$fontFile = __DIR__ . '/fonts/arial.ttf';
if (file_exists($fontFile)) {
    $text = "VIT Chennai";
    $fontSize = 14;
    imagettftext($img, $fontSize, 0, 10, 30, $color, $fontFile, $text);
}
header('Content-Type: image/jpeg');
imagejpeg($img);
imagedestroy($img);
?>
