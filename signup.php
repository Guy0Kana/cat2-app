<?php
require 'config.php';
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = trim($_POST['username']); $e = trim($_POST['email']);
    $n = trim($_POST['full_name']); $p = $_POST['password'];
    $h = password_hash($p, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username,email,full_name,password_hash) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $u, $e, $n, $h);
    $msg = $stmt->execute() ? "User $u registered. <a href='login.php'>Login</a>" : "Error: " . $conn->error;
}
?>
<!DOCTYPE html><html><head><title>Sign Up</title>
<style>body{font-family:sans-serif;max-width:380px;margin:60px auto}input{width:100%;padding:8px;margin:6px 0}button{padding:10px;width:100%}</style></head>
<body><h2>Create your CNS account</h2><p><?= $msg ?></p>
<form method="POST">
<input name="username" placeholder="Username" required>
<input name="full_name" placeholder="Full name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit">Register</button></form>
<p>Have an account? <a href="login.php">Login</a></p></body></html>
