<?php
// Include database config
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company_name = trim($_POST['company_name']);
    $quantity     = intval($_POST['quantity']);
    $address      = trim($_POST['address']);
    $mobile       = trim($_POST['mobile']);

    // Validation
    if (empty($company_name) || $quantity <= 0 || empty($address) || !preg_match("/^[0-9]{10}$/", $mobile)) {
        echo "<script>alert('⚠️ Please fill all fields correctly.'); window.history.back();</script>";
        exit;
    }

    // Insert donation into database
    $stmt = $conn->prepare("INSERT INTO donations (company_name, quantity, address, mobile) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $company_name, $quantity, $address, $mobile);

    if ($stmt->execute()) {
        header("Location: thankyou.php"); // ✅ redirect to thankyou page
        exit;
    } else {
        error_log("DB Error: " . $stmt->error);
        echo "<script>alert('❌ Error: Could not save donation.'); window.history.back();</script>";
    }

    $stmt->close();
}
$conn->close();
?>
