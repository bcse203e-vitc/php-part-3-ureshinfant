<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    if (!empty($username) && isset($_POST['remember'])) {
        setcookie('username', $username, [
            'expires' => time() + 60 * 60 * 24 * 30,
            'path' => '/',
            'httponly' => true,
            'samesite' => 'Lax'
        ]);
    } else {
        setcookie('username', '', time() - 3600, '/');
    }
}
$display = htmlspecialchars($_COOKIE['username'] ?? 'Guest', ENT_QUOTES, 'UTF-8');
echo "Welcome " . $display;
?>
