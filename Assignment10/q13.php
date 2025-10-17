<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['name'])) {
    $_SESSION['name'] = strip_tags($_POST['name']);
}
if (!isset($_SESSION['name'])) {
    $_SESSION['name'] = "Student";
}
echo "Hello, " . htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'UTF-8') . "! Welcome to the PHP lab.";
?>
<form method="post">
    <label>Your name: <input type="text" name="name"></label>
    <button type="submit">Set name</button>
</form>
