<?php
$img = imagecreate(250, 250);
$bg = imagecolorallocate($img, 255, 255, 255);
for ($i = 0; $i < 10; $i++) {
    $r = rand(0, 255);
    $g = rand(0, 255);
    $b = rand(0, 255);
    $color = imagecolorallocate($img, $r, $g, $b);
    imagefilledellipse($img, rand(20, 230), rand(20, 230), 50, 50, $color);
}
header('Content-Type: image/png');
imagepng($img);
imagedestroy($img);
?>
