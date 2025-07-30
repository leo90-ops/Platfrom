<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Tugas To Do List </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <header class="login-header">
            <div class="logo">
                <img src="BarcachilGuy.jpg" alt="Logo">
            </div>
            <h1>Tugas To Do List</h1>
        </header>

        <main class="login-form">
            <h2>Login</h2>
            <form action="" method="post">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button type="submit" name="submit" class="login-btn">Login</button>
            </form>

            <?php
            if (isset($_POST['submit'])) {
                session_start();
                $username = $_POST['username'];
                $password = $_POST['password'];

                $username = $conn->real_escape_string($username);

                $result = $conn->query("SELECT * FROM users WHERE username = '$username'");

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    if (password_verify($password, $row['password'])) {
                        $_SESSION['user_id'] = $row['id'];
                        header("Location: todo.php");
                        exit;
                    } else {
                        echo "<div class='error-message'>Password salah!</div>";
                    }
                } else {
                    echo "<div class='error-message'>Username tidak ditemukan.</div>";
                }
            }
            ?>
        </main>
    </div>
</body>
</html>