<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Volunteer Data</title>
</head>
<body>
    <h1>Volunteer List</h1>
    <a href="add_volunteer.php">Add New Volunteer</a>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Birthdate</th>
            <th>City</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        <?php
        $conn = new mysqli("localhost", "root", "", "volunteer_db");
        $result = $conn->query("SELECT * FROM volunteerss");

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['birthdate']}</td>
                    <td>{$row['city']}</td>
                    <td>{$row['phone']}</td>
                    <td>
                        <a href='edit_volunteer.php?id={$row['id']}'>Edit</a> |
                        <a href='delete_volunteer.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                    </td>
                  </tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
