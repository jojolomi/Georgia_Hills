<?php
session_start();
$success = $_GET['success'] ?? '';
$error = $_GET['error'] ?? '';
$email = $_SESSION['user']['email'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Georgia Hills | Login</title>
  <link rel="stylesheet" href="style/index.css">
  <script type="module" src="header.js"></script>
</head>

<body id="login_body">
<my-header></my-header>

<div class="containercentr">
  <div class="container">
    <?php if ($success): ?>
      <p style="color:green;"><?= htmlspecialchars($success) ?></p>
    <?php elseif ($error): ?>
      <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if ($email): ?>
      <p>Welcome, <strong><?= htmlspecialchars($email) ?></strong>!</p>
      <form method="POST" action="logout.php">
        <button type="submit" id="form_button">Logout</button>
      </form>
    <?php else: ?>
      <form method="POST" action="login_handler.php">
        <fieldset>
          <legend>Login</legend>

          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>

          <label for="password">Password</label>
          <input type="password" id="password" name="password" required>

          <button type="submit" id="form_button">Login</button>
        </fieldset>
      </form>
    <?php endif; ?>

    <div class="toggle" onclick="location.href='register.php'">Don't have an account? Register</div>
  </div>
</div>
</body>
</html>
