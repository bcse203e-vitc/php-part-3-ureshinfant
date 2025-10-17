<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo "Upload error.";
        exit;
    }
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($file['tmp_name']);
    $allowed = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/gif' => 'gif'];
    if (!array_key_exists($mime, $allowed)) {
        echo "Invalid file type.";
        exit;
    }
    $uploadDir = __DIR__ . '/uploads';
    if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
    $basename = bin2hex(random_bytes(8));
    $extension = $allowed[$mime];
    $filename = $basename . "." . $extension;
    $destination = $uploadDir . '/' . $filename;
    if (move_uploaded_file($file['tmp_name'], $destination)) {
        echo "<img src='uploads/" . htmlspecialchars($filename, ENT_QUOTES, 'UTF-8') . "' width='200'>";
    } else {
        echo "Failed to move uploaded file.";
    }
}
?>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="file" accept="image/*" required>
    <button type="submit">Upload</button>
</form>
