<?php
// Copy this file to db.php and adjust the values if your setup is different.
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'student_records';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($host, $user, $pass, $db);
    $conn->set_charset('utf8mb4');
} catch (mysqli_sql_exception $e) {
    error_log($e->getMessage());
    die('Database connection failed.');
}
