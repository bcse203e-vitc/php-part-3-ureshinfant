<?php
$img = imagecreate(200, 200);
$bg = imagecolorallocate($img, 255, 255, 255);
$red = imagecolorallocate($img, 255, 0, 0);
imagerectangle($img, 50, 50, 150, 150, $red);
$blue = imagecolorallocate($img, 0, 0, 255);
imagefilledellipse($img, 100, 100, 80, 80, $blue);
header('Content-Type: image/png');
imagepng($img);
imagedestroy($img);
?>
