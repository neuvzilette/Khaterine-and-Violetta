<!-- add_volunteer.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Volunteer</title>
</head>
<body>
    <h1>Add New Volunteer</h1>
    <form action="save_volunteer.php" method="post">
        <label>Name:</label><input type="text" name="name" required><br>
        <label>Email:</label><input type="email" name="email" required><br>
        <label>Birthdate:</label><input type="date" name="birthdate" required><br>
        <label>City:</label><input type="text" name="city" required><br>
        <label>Phone:</label><input type="text" name="phone" required><br>
        <input type="submit" value="Add Volunteer">
    </form>
</body>
</html>
