<?php
session_start();
$success = $_GET['success'] ?? '';
$error = $_GET['error'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Georgia Hills | Register</title>
  <link rel="stylesheet" href="index.css">
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

    <form method="POST" action="register_handler.php">
      <fieldset>
        <legend>Register</legend>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter a valid email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Create a password" required>

        <label for="confirm_password">Confirm Password</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password" required>

        <button type="submit" id="form_button">Register</button>
      </fieldset>
    </form>

    <div class="toggle" onclick="location.href='login.php'">Already have an account? Log In</div>
  </div>
</div>
</body>
</html>
