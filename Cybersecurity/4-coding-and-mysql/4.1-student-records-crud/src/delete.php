<?php
require __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    die('Method not allowed.');
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if (!$id) { die('Invalid student ID.'); }

$stmt = $conn->prepare('DELETE FROM students WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();

$msg = $stmt->affected_rows > 0
    ? 'Student deleted successfully!'
    : 'No student found with that ID.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Student</title>
</head>
<body>
    <p><?= $msg ?> <a href="index.php">Back to Records</a></p>
</body>
</html>
