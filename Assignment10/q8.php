<?php
$srcFile = __DIR__ . '/image.jpg';
$maxWidth = 200;
list($width, $height, $type) = getimagesize($srcFile);
$ratio = $width / $height;
$newWidth = $maxWidth;
$newHeight = intval($maxWidth / $ratio);
switch ($type) {
    case IMAGETYPE_JPEG:
        $src = imagecreatefromjpeg($srcFile);
        break;
    case IMAGETYPE_PNG:
        $src = imagecreatefrompng($srcFile);
        break;
    default:
        die('Unsupported image type.');
}
$dst = imagecreatetruecolor($newWidth, $newHeight);
if ($type === IMAGETYPE_PNG) {
    imagealphablending($dst, false);
    imagesavealpha($dst, true);
}
imagecopyresampled($dst, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
header('Content-Type: image/jpeg');
imagejpeg($dst, null, 85);
imagedestroy($src);
imagedestroy($dst);
?>
