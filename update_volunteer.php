<!-- update_volunteer.php -->
<?php
$conn = new mysqli("localhost", "root", "", "volunteer_db");

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$birthdate = $_POST['birthdate'];
$city = $_POST['city'];
$phone = $_POST['phone'];

$sql = "UPDATE volunteerss SET name=?, email=?, birthdate=?, city=?, phone=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $name, $email, $birthdate, $city, $phone, $id);
$stmt->execute();

$stmt->close();
$conn->close();

header("Location: index.php");
exit;
?>
