<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_management_db"; // Replace with your database name
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO students (name, username, email, phone, password)
            VALUES ('$name', '$username', '$email', '$phone', '$hashedPassword')";
   if ($conn->query($sql) === TRUE) {
        header("Location: home.php"); // Redirect to the SMS home page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>