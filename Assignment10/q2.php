<?php
session_start();
$username = $_POST['user'] ?? '';
$password = $_POST['pass'] ?? '';
$validUser = 'admin';
$validPassHash = password_hash('1234', PASSWORD_DEFAULT);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($username === $validUser && password_verify($password, $validPassHash)) {
        session_regenerate_id(true);
        $_SESSION['user'] = $username;
        header('Location: welcome.php');
        exit;
    } else {
        echo 'Invalid credentials.';
    }
}
?>
