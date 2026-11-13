<?php
require 'config.php';
if (!isset($_SESSION['user'])) { header('Location: login.php'); exit; }
?>
<!DOCTYPE html><html><head><title>Dashboard</title></head>
<body style="font-family:sans-serif;max-width:600px;margin:60px auto">
<h2>Welcome, <?= htmlspecialchars($_SESSION['user']) ?>!</h2>
<p><a href="feedback.php">Feedback form</a> | <a href="logout.php">Logout</a></p></body></html>
