<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | Georgia Hills</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h2>Register</h2>
    <form action="register.php" method="POST">
        <input type="text" name="username" placeholder="Username" required />
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <input type="password" name="confirm_password" placeholder="Confirm Password" required />
        <button type="submit">Register</button>
    </form>
    <p><a href="login.html">Already have an account? Login</a></p>

    <?php if (isset($_GET['error'])) echo "<p style='color:red'>" . htmlspecialchars($_GET['error']) . "</p>"; ?>
</body>
</html>
