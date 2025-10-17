<?php
$count = 1;
if (isset($_COOKIE['visits'])) {
    $count = intval($_COOKIE['visits']) + 1;
}
setcookie('visits', (string)$count, [
    'expires' => time() + 3600,
    'path' => '/',
    'httponly' => true
]);
echo "Welcome! You have visited this page $count " . ($count === 1 ? "time." : "times.");
?>
