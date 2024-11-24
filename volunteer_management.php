<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'volunteers');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete action
if (isset($_GET['delete'])) {
    $name = $_GET['delete'];
    $conn->query("DELETE FROM volunteerss WHERE name='$name'");
    header("Location: volunteer_management.php");
    exit();
}

// Handle update action
if (isset($_POST['update'])) {
    $old_name = $_POST['old_name'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];

    $conn->query("UPDATE volunteerss SET name='$name', email='$email', birthdate='$birthdate', city='$city', phone='$phone' WHERE name='$old_name'");
    header("Location: volunteer_management.php");
    exit();
}

// Fetch all records
$result = $conn->query("SELECT * FROM volunteerss");
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Tzu Chi Indonesia</title>

        <!-- CSS FILES -->        
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/templatemo-kind-heart-charity.css" rel="stylesheet">
<!--

TemplateMo 581 Kind Heart Charity

https://templatemo.com/tm-581-kind-heart-charity

-->

    </head>
    
    <body id="section_1">

        <header class="site-header">
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-8 col-12 d-flex flex-wrap">
                        <p class="d-flex me-4 mb-0">
                            <i class="bi-geo-alt me-2"></i>
                            Tzu Chi Center Tower. Jl. Pantai Indah Kapuk (PIK) Boulevard, Jakarta Utara 14470
                        </p>

                        <p class="d-flex mb-0">
                            <i class="bi-envelope me-2"></i>

                            <a href="mailto:info@company.com">
                                tzuchiindo@tzuchi.or.id
                            </a>
                        </p>
                    </div>

                    <div class="col-lg-3 col-12 ms-auto d-lg-block d-none">
                        <ul class="social-icon">
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-twitter"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-facebook"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-instagram"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-youtube"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-whatsapp"></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </header>

        <nav class="navbar navbar-expand-lg bg-light shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="images/logo tzu chi.jpg" class="logo img-fluid" alt="Kind Heart Charity">
                    <span>
                        Tzu Chi Indonesia (慈济)
                        <small>Yayasan Sosial Tzu Chi Indonesia</small>
                    </span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="index.html">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="index.html">About</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="index.html">Causes</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link click-scroll dropdown-toggle" href="#section_5" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">News & Volunteers</a>

                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="news.html">News Listing</a></li>

                                <li><a class="dropdown-item" href="volunteer_management.php">Recap Volunteer</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                     
                        </li>

                       

                        <li class="nav-item ms-3">
                            <a class="nav-link custom-btn custom-border-btn btn" href="volunteer.html">Join Volunteer</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>

        <title>Volunteer Management</title>

        <!-- CSS FILES -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link href="css/templatemo-kind-heart-charity.css" rel="stylesheet">
    </head>
    <body>
   

        

        <main class="py-5">
            <div class="container">
                <h2 class="mb-4 text-center">Volunteer Management</h2>
                <p class="text-center mb-5">Manage your registered volunteers efficiently.</p>

                <!-- Data Table -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Birthdate</th>
                            <th>City</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['birthdate'] ?></td>
                                <td><?= $row['city'] ?></td>
                                <td><?= $row['phone'] ?></td>
                                <td>
                                    <a href="?delete=<?= $row['name'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                    <button class="btn btn-primary btn-sm" onclick="editRow(<?= htmlspecialchars(json_encode($row)) ?>)">Edit</button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

                <!-- Edit Form -->
                <div id="editForm" style="display: none;" class="mt-4">
                    <h4>Edit Volunteer</h4>
                    <form method="post" action="">
                        <input type="hidden" name="old_name" id="editOldName">
                        <div class="form-group mb-3">
                            <label for="editName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="editName" name="name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail" name="email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="editBirthdate" class="form-label">Birthdate</label>
                            <input type="date" class="form-control" id="editBirthdate" name="birthdate" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="editCity" class="form-label">City</label>
                            <input type="text" class="form-control" id="editCity" name="city" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="editPhone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="editPhone" name="phone" required>
                        </div>
                        <button type="submit" name="update" class="btn btn-success">Update</button>
                        <button type="button" class="btn btn-secondary" onclick="hideEditForm()">Cancel</button>
                    </form>
                </div>
            </div>
        </main>

        <footer class="site-footer">
            <div class="container">
                <p class="text-center">Copyright © 2036 Tzu Chi Indonesia. Designed by TemplateMo</p>
            </div>
        </footer>

        <!-- Scripts -->
        <script>
            function editRow(row) {
                document.getElementById('editForm').style.display = 'block';
                document.getElementById('editOldName').value = row.name;
                document.getElementById('editName').value = row.name;
                document.getElementById('editEmail').value = row.email;
                document.getElementById('editBirthdate').value = row.birthdate;
                document.getElementById('editCity').value = row.city;
                document.getElementById('editPhone').value = row.phone;
            }

            function hideEditForm() {
                document.getElementById('editForm').style.display = 'none';
            }
        </script>
    </body>
</html>
