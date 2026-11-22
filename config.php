<?php
$DB_HOST = "localhost";
$DB_USER = "root";    // default XAMPP user
$DB_PASS = "";        // default XAMPP password (empty unless you set one)
$DB_NAME = "donation_db";

// On PHP 8.1+ mysqli throws mysqli_sql_exception on connection failure
// instead of setting $conn->connect_error, so the old die() check below
// never ran — the page died with an uncaught 500 instead. Catch the
// exception and show a readable error page.
try {
    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
} catch (mysqli_sql_exception $e) {
    http_response_code(500);
    echo "<h2>Database connection failed</h2>"
       . "<p>Could not connect to the MySQL database '<b>" . htmlspecialchars($DB_NAME) . "</b>'. "
       . "Make sure MySQL is running and the database exists "
       . "(import <code>schema.sql</code> once: <code>mysql -u root &lt; schema.sql</code>).</p>"
       . "<p><small>Error: " . htmlspecialchars($e->getMessage()) . "</small></p>";
    exit;
}

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
