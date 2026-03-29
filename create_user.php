<?php
include 'db.php';

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table created or exists.\n";
} else {
    echo "Table error: " . mysqli_error($conn) . "\n";
}

$test_email = 'test@test.com';
$test_pass = '123';

$stmt = mysqli_prepare($conn, "INSERT IGNORE INTO users (email, password) VALUES (?, ?)");
mysqli_stmt_bind_param($stmt, "ss", $test_email, $test_pass);
if (mysqli_stmt_execute($stmt)) {
    echo "Test user created: $test_email / 123\n";
} else {
    echo "User exists or error: " . mysqli_stmt_error($stmt) . "\n";
}

mysqli_close($conn);
echo "Done. Test login with email=test@test.com, password=123";
?>

