<?php
$conn = new mysqli("localhost", "root", "", "todo_db");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
session_start();
?>
