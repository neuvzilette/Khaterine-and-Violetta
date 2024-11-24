<!-- edit_volunteer.php -->
<?php
$conn = new mysqli("localhost", "root", "", "volunteer_db");

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM volunteerss WHERE id=$id");
$row = $result->fetch_assoc();

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Volunteer</title>
</head>
<body>
    <h1>Edit Volunteer</h1>
    <form action="update_volunteer.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>Name:</label><input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
        <label>Email:</label><input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
        <label>Birthdate:</label><input type="date" name="birthdate" value="<?php echo $row['birthdate']; ?>" required><br>
        <label>City:</label><input type="text" name="city" value="<?php echo $row['city']; ?>" required><br>
        <label>Phone:</label><input type="text" name="phone" value="<?php echo $row['phone']; ?>" required><br>
        <input type="submit" value="Update Volunteer">
    </form>
</body>
</html>
