<!-- save_volunteer.php -->
<?php
$conn = new mysqli("localhost", "root", "", "volunteer_db");

$name = $_POST['name'];
$email = $_POST['email'];
$birthdate = $_POST['birthdate'];
$city = $_POST['city'];
$phone = $_POST['phone'];

$sql = "INSERT INTO volunteerss (name, email, birthdate, city, phone) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $name, $email, $birthdate, $city, $phone);
$stmt->execute();

$stmt->close();
$conn->close();

header("Location: index.php");
exit;
?>
