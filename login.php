<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Georgia Hills</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <input type="text" name="username" placeholder="Username" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit">Login</button>
    </form>
    <p><a href="registration.html">Don't have an account? Register</a></p>

    <?php if (isset($_GET['error'])) echo "<p style='color:red'>" . htmlspecialchars($_GET['error']) . "</p>"; ?>
    <?php if (isset($_GET['success'])) echo "<p style='color:green'>" . htmlspecialchars($_GET['success']) . "</p>"; ?>
</body>
</html>
