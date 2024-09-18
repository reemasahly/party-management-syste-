<?php 
session_start(); 
require_once('conf.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | CelebrEase</title>
    <link rel="stylesheet" href="style1.css">
    <script src="validate.js" type="text/javascript"></script>
</head>
<body>
    <div class="container">
        <main>

            <h1>Admin Dashboard</h1>
            <a href="addPackage.php" class="btn">Add New Package</a>
            
            <h2>Manage Packages</h2>
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                    $sql = "SELECT * FROM packages";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td><img src='images/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "' class='package-image' style='width: 100px;'></td>";
                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                            echo "<td>" . substr(htmlspecialchars($row['description']), 0, 100) . "...</td>";
                            echo "<td>Rs. " . htmlspecialchars($row['price']) . "</td>";
                            echo "<td>
                                    <a href='updatePackage.php?pid=" . htmlspecialchars($row['pid']) . "' class='btn'>Update</a>
                                    <a href='deletePackage.php?pid=" . htmlspecialchars($row['pid']) . "' class='btn' onclick='confirmDelete(event)'>Delete</a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No packages available.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>
