
<?php
require "db.php";

$projects = $pdo->query(
    "SELECT * FROM projects ORDER BY id DESC"
)->fetchAll();

$tasks = $pdo->query(
    "SELECT tasks.*, projects.name AS project_name
     FROM tasks
     JOIN projects ON tasks.project_id = projects.id
     ORDER BY tasks.id DESC"
)->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Project Management System</h1>
    <p>DBMS Mini Project | PHP and MySQL</p>
</header>

<main>
    <h2>Projects</h2>
    <table>
        <tr><th>ID</th><th>Project</th><th>Description</th><th>Status</th></tr>
        <?php foreach ($projects as $p): ?>
        <tr>
            <td><?= (int)$p['id'] ?></td>
            <td><?= htmlspecialchars($p['name']) ?></td>
            <td><?= htmlspecialchars($p['description'] ?? '') ?></td>
            <td><?= htmlspecialchars($p['status']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Tasks</h2>
    <table>
        <tr><th>ID</th><th>Task</th><th>Project</th><th>Priority</th><th>Status</th></tr>
        <?php foreach ($tasks as $t): ?>
        <tr>
            <td><?= (int)$t['id'] ?></td>
            <td><?= htmlspecialchars($t['task_name']) ?></td>
            <td><?= htmlspecialchars($t['project_name']) ?></td>
            <td><?= htmlspecialchars($t['priority']) ?></td>
            <td><?= htmlspecialchars($t['status']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</main>
</body>
</html>
