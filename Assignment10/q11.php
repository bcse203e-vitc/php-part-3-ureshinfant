<?php
$width = 200;
$height = 200;
$img = imagecreate($width, $height);
for ($i = 0; $i < $width; $i++) {
    $r = intval($i * 255 / ($width - 1));
    $g = intval($i * 255 / ($width - 1));
    $b = 255;
    $col = imagecolorallocate($img, $r, $g, $b);
    imageline($img, $i, 0, $i, $height, $col);
}
header('Content-Type: image/png');
imagepng($img);
imagedestroy($img);
?>
