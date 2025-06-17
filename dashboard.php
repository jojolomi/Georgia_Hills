<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit;
}

$user = $_SESSION['user'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $filename = basename($_FILES['file']['name']);
    $target = "uploads/" . $filename;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
        $conn = DB::connect();
        $stmt = $conn->prepare("INSERT INTO uploads (user_id, filename) VALUES (?, ?)");
        $stmt->execute([$user['id'], $filename]);
        $message = "File uploaded successfully.";
    } else {
        $message = "File upload failed.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Georgia Hills | Dashboard</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h1>Welcome, <?= htmlspecialchars($user['username']) ?></h1>
    <p>Email: <?= htmlspecialchars($user['email']) ?></p>

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <button type="submit">Upload File</button>
    </form>

    <?php if (isset($message)) echo "<p>$message</p>"; ?>

    <p><a href="logout.php">Logout</a></p>
</body>
</html>
