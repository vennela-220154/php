
<?php
include "db.php";

function loginUser() {
    global $conn;

    if (!isset($_POST['email'], $_POST['password'])) {
        die("Form data not received");
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        print "Login Successful";
    } else {
        print "Invalid Email or Password";
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    loginUser();
} else {
    echo "Please submit the login form";
}
?>
