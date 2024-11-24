<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- Add your Bootstrap CSS if available -->
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Volunteer Management Dashboard</h1>

    <!-- Link to Add New Volunteer -->
    <div class="text-end mb-3">
        <a href="create_volunteer.php" class="btn btn-success">Add New Volunteer</a>
    </div>

    <!-- Display Volunteers Table -->
    <?php
    include('db_connection.php'); // Make sure to include your database connection here

    $sql = "SELECT * FROM volunteers";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered'>";
        echo "<thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Gender</th><th>Message</th><th>Actions</th></tr></thead>";
        echo "<tbody>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["name"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td>".$row["gender"]."</td>";
            echo "<td>".$row["message"]."</td>";
            echo "<td>
                    <a href='update_volunteer.php?id=".$row["id"]."' class='btn btn-primary btn-sm'>Edit</a>
                    <a href='delete_volunteer.php?id=".$row["id"]."' class='btn btn-danger btn-sm'>Delete</a>
                  </td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p class='text-center'>No volunteers found.</p>";
    }

    $conn->close();
    ?>
</div>

</body>
</html>