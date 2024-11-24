<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'volunteers');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO volunteerss (name, email, birthdate, city, phone) 
            VALUES ('$name', '$email', '$birthdate', '$city', '$phone')";

    if ($conn->query($sql) === TRUE) {
        header("Location: volunteer_management.php"); // Redirect to the management page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
