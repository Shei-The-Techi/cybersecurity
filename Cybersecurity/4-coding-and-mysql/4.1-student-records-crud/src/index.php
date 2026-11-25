<?php
require __DIR__ . '/db.php';
$result = $conn->query('SELECT id, name, age, email FROM students ORDER BY id');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Records</title>
</head>
<body>
    <h1>Student Records</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr><th>ID</th><th>Name</th><th>Age</th><th>Email</th><th>Actions</th></tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= (int)$row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= (int)$row['age'] ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td>
                <a href="update.php?id=<?= (int)$row['id'] ?>">Update</a> |
                <form method="post" action="delete.php" style="display:inline"
                      onsubmit="return confirm('Delete this student?');">
                    <input type="hidden" name="id" value="<?= (int)$row['id'] ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
