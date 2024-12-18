<?php
// Mulai session
session_start();

// Hancurkan session
session_unset();
session_destroy();

// Redirect ke halaman login setelah logout
header("Location: login.php");
exit();
?>
