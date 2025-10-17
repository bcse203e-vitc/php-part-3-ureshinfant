<?php
session_start();
$captcha = strval(rand(1000, 9999));
$_SESSION['captcha'] = $captcha;
$width = 80;
$height = 30;
$image = imagecreate($width, $height);
$bg = imagecolorallocate($image, 255, 255, 255);
$textColor = imagecolorallocate($image, 0, 0, 0);
for ($i = 0; $i < 50; $i++) {
    imagesetpixel($image, rand(0,$width-1), rand(0,$height-1), imagecolorallocate($image, rand(100,255), rand(100,255), rand(100,255)));
}
imagestring($image, 5, 10, 6, $captcha, $textColor);
header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);
?>
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userInput = $_POST['captcha'] ?? '';
    if (isset($_SESSION['captcha']) && $userInput === $_SESSION['captcha']) {
        echo "CAPTCHA verified.";
        unset($_SESSION['captcha']);
    } else {
        echo "CAPTCHA incorrect. Please try again.";
    }
}
?>
<form method="post">
    <img src="captcha.php" alt="captcha"><br>
    <input type="text" name="captcha" required>
    <button type="submit">Submit</button>
</form>
