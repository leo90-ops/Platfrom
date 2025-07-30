<?php
include 'db.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
$aktivitas = $_POST['aktivitas'];
$user_id = $_SESSION['user_id'];
$conn->query("INSERT INTO todo (user_id, aktivitas) VALUES ($user_id, '$aktivitas')");
header("Location: todo.php");
