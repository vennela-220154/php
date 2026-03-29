<?php
include "db.php";

function registerUser() {
    global $conn;       
    static $count = 0;   

    if (!isset($_POST['username'], $_POST['email'], $_POST['password'])) {
        die("Form data not received");
    }

    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $success = false;    

    $sql = "INSERT INTO users (username, email, password)
            VALUES ('$username', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        $count++;
        $success = true;
        echo "Registration Successful<br>";
        echo "Registrations in this request: $count";
    } else {
        die("Insert Failed: " . mysqli_error($conn));
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    registerUser();
} else {
    echo "Please submit the registration form";
}
?>





