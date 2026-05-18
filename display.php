<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "munawar";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM patients ORDER BY id DESC";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patients - Hospital Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <h1 class="logo">MUNAWAR</h1>
            <a href="home.html" class="back-link">← Back to Home</a>
        </div>

        <div class="display-container">
            <div class="display-header">
                <h2>Registered Patients Database</h2>
                <p>Total Records: <strong><?php echo $result->num_rows; ?></strong></p>
            </div>

            <?php if ($result->num_rows > 0): ?>
                <div class="table-wrapper">
                    <table class="students-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Patient Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Disease</th>
                                <th>Symptoms</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                                    <td><?php echo htmlspecialchars($row['patient_name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['age']); ?></td>
                                    <td><?php echo htmlspecialchars($row['gender']); ?></td>
                                    <td><?php echo htmlspecialchars($row['disease']); ?></td>
                                    <td><?php echo htmlspecialchars($row['symptoms']); ?></td>
                                    <td><?php echo htmlspecialchars($row['contact']); ?></td>
                                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                                    <td><?php echo htmlspecialchars($row['form_type']); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="no-data">
                    <p>No records found.</p>
                    <a href="register.html" class="btn btn-primary">Register First</a>
                </div>
            <?php endif; ?>

            <div class="display-actions">
                <a href="register.html" class="btn btn-primary">Register New</a>
                <a href="home.html" class="btn btn-secondary">Back Home</a>
            </div>
        </div>

        <footer>
            <p>&copy; 2026 Hospital Management System. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>

<?php $conn->close(); ?>