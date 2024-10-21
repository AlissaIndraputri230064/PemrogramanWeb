<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Mencegah SQL Injection
    $user = $conn->real_escape_string($user);
    $pass = $conn->real_escape_string($pass);

    // Query untuk memeriksa username dan password
    $sql = "SELECT * FROM users WHERE username='$user' AND password=SHA1('$pass')";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login berhasil, set session dan cookie
        $_SESSION['username'] = $user;
        if (isset($_POST['remember'])) {
            setcookie('username', $user, time() + (86400 * 30), "/"); // Cookie berlaku 30 hari
        }
        header("Location: index.php"); // Redirect ke dashboard
        exit();
    } else {
        // Login gagal
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login ke Website Dunia</h2>

    <form action="login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <input type="checkbox" name="remember"> Ingat saya<br><br>

        <input type="submit" value="Login">
    </form>

    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
</body>
</html>