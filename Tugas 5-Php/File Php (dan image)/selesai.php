<?php
include 'db.php';
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Basic security: validate the id is numeric
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $user_id = $_SESSION['user_id']; // Get the current user's ID
    
    // Add user ID to WHERE clause for security (prevents users from modifying other users' tasks)
    $conn->query("UPDATE todo SET selesai = 1 WHERE id = $id AND user_id = $user_id");
}

header("Location: todo.php");
exit;