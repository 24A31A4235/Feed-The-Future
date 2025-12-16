<?php
$DB_HOST = "localhost";
$DB_USER = "root";    // default XAMPP user
$DB_PASS = "";        // default XAMPP password (empty unless you set one)
$DB_NAME = "donation_db";

$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
