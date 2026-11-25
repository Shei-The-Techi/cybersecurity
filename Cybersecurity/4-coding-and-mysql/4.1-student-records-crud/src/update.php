<?php
require __DIR__ . '/db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)
   ?: filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if (!$id) { die('Invalid student ID.'); }

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Please enter a valid email address.';
    } else {
        $stmt = $conn->prepare('UPDATE students SET email = ? WHERE id = ?');
        $stmt->bind_param('si', $email, $id);
        $stmt->execute();
        header('Location: index.php');
        exit;
    }
}

$stmt = $conn->prepare('SELECT name, email FROM students WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$student = $stmt->get_result()->fetch_assoc();
if (!$student) { die('Student not found.'); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Student Email</title>
</head>
<body>
    <h1>Update Student Email</h1>
    <p>Student: <?= htmlspecialchars($student['name']) ?></p>
    <?php if ($message): ?>
        <p style="color:red"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>
    <form method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <label>New Email:
            <input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" required>
        </label>
        <p><button type="submit">Update</button></p>
    </form>
    <a href="index.php">Back to Records</a>
</body>
</html>
