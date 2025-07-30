<?php
include 'db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM todo WHERE id = $id");
header("Location: todo.php");
