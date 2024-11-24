<?php
include('db_connection.php'); // Use db_connection.php for the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['volunteer-name'];
    $email = $_POST['volunteer-email'];
    $gender = $_POST['volunteer-gender'];
    $message = $_POST['volunteer-message'];

    $sql = "INSERT INTO volunteers (name, email, gender, message) VALUES ('$name', '$email', '$gender', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>