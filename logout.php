<?php
session_start();
session_destroy();
setcookie('username', '', time() - 3600, "/");
header("Location: login.php?success=Logged out successfully");
exit;
