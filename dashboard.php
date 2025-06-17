<?php
require_once 'classes/User.php';
$user = new User();

if (!$user->isLoggedIn()) {
    header("Location: login.html");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $filename = basename($_FILES['file']['name']);
    $target = "uploads/" . $filename;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
        $conn = DB::connect();
        $stmt = $conn->prepare("INSERT INTO uploads (user_id, filename) VALUES (?, ?)");
        $stmt->execute([$user->getUser()['id'], $filename]);
        echo "File uploaded.";
    } else {
        echo "Upload failed.";
    }
}
?>

<h1>Welcome, <?= htmlspecialchars($user->getUser()['username']) ?></h1>
<p>Email: <?= htmlspecialchars($user->getUser()['email']) ?></p>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="file" required>
    <button type="submit">Upload File</button>
</form>

<a href="logout.php">Logout</a>