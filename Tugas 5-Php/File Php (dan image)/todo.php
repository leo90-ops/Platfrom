<?php
include 'db.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
$id_user = $_SESSION['user_id'];
$todos = $conn->query("SELECT * FROM todo WHERE user_id = $id_user ORDER BY selesai ASC, id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tugas To Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="todo-container">
    <div class="profile-header">
        <div class="profile-pic">
            <img src="BarcachilGuy.jpg">
        </div>
        <h1>Lionel Messi Mambrasar</h1>
        <div class="user-id">235314083</div>
    </div>

    <div class="form-container">
        <h3>To Do List</h3>
        <form action="tambah.php" method="post">
            <input type="text" name="aktivitas" placeholder="Tambahkan aktivitas baru" required>
            <button type="submit">Tambah</button>
        </form>
        
        <ul>
            <?php while ($todo = $todos->fetch_assoc()): ?>
                <li class="<?= $todo['selesai'] ? 'completed' : '' ?>">
                    <span class="task-text"><?= htmlspecialchars($todo['aktivitas']) ?></span>
                    <div class="task-actions">
                        <?php if (!$todo['selesai']): ?>
                            <a href="selesai.php?id=<?= $todo['id'] ?>">Selesai</a>
                        <?php endif; ?>
                        <a href="hapus.php?id=<?= $todo['id'] ?>">Hapus</a>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
        
        <div class="divider"></div>
        <div class="btn-container">
            <a href="logout.php" class="btn">Logout</a>
        </div>
    </div>
</div>
</body>
</html>