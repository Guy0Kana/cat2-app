<?php
require 'config.php';
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("SELECT id, username, password_hash FROM users WHERE username=?");
    $stmt->bind_param("s", $_POST['username']);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();
    if ($row && password_verify($_POST['password'], $row['password_hash'])) {
        $_SESSION['user'] = $row['username'];
        header('Location: dashboard.php'); exit;
    }
    $msg = 'Invalid username or password';
}
?>
<!DOCTYPE html><html><head><title>Login</title>
<style>body{font-family:sans-serif;max-width:380px;margin:60px auto}input{width:100%;padding:8px;margin:6px 0}button{padding:10px;width:100%}</style></head>
<body><h2>Login</h2><p style="color:red"><?= $msg ?></p>
<form method="POST">
<input name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit">Login</button></form>
<p>No account? <a href="signup.php">Sign up</a></p></body></html>
