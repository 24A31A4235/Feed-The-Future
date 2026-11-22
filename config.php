<?php
// Database credentials live in db_config.php (on the host only, never committed).
// Copy db_config.example.php to db_config.php and fill in the real values.
require_once __DIR__ . '/db_config.php';

// On PHP 8.1+ mysqli throws mysqli_sql_exception on connection failure
// instead of setting $conn->connect_error, so catch the exception and
// show a readable error page.
try {
    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
} catch (mysqli_sql_exception $e) {
    http_response_code(500);
    echo "<h2>Database connection failed</h2>"
        . "<p>Could not connect to the MySQL database '<b>" . htmlspecialchars($DB_NAME) . "</b>'. "
        . "Make sure MySQL is running and the database exists "
        . "(import <code>schema.sql</code> once).</p>"
        . "<p><small>Error: " . htmlspecialchars($e->getMessage()) . "</small></p>";
    exit;
}
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
