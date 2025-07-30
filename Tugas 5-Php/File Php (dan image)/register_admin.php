<?php
include 'db.php';

$username = "admin";
$password = password_hash("235314083", PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
if ($conn->query($sql) === TRUE) {
    echo "Admin berhasil dibuat.";
} else {
    echo "Error: " . $conn->error;
}
?>
