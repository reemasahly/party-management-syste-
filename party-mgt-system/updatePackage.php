<?php
require_once('conf.php');

if (isset($_GET['pid'])) {
    $package_id = $_GET['pid'];
    
    // Fetch the package details
    $sql = "SELECT * FROM packages WHERE pid = $package_id";
    $result = $conn->query($sql);
    $package = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Update package details
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_POST['image']; 

        $sql = "UPDATE packages SET name = '$name', description = '$description', price = $price ,
                image = '$image' WHERE pid = $package_id";
        if ($conn->query($sql)) {
            echo "<script>
                alert('Package updated successfully');
                window.location.href = 'adminContent.php';
            </script>";
        } else {
            echo "Error updating package.";
        }
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Package | CelebrEase</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <div class="login-container">
<h2>Update Package</h2>
<form method="POST" action="">
    Name:
    <input type="text" name="name" value="<?php echo htmlspecialchars($package['name']); ?>" required>
    
    Description:
    <textarea name="description" rows="5" cols="50" class="textarea" required><?php echo htmlspecialchars($package['description']); ?></textarea>
    
    Price:
    <input type="text" name="price" value="<?php echo htmlspecialchars($package['price']); ?>" required>
    Image Path:
    <input type="text" name="image" value="<?php echo htmlspecialchars($package['image']); ?>" placeholder="Enter image path" required>
    <img src="images/<?php echo htmlspecialchars($package['image']); ?>" alt="Current Image" class="package-image" style="width: 100px; height: auto;">
    <input type="submit" value="Update" name="update">
</form>
</div>
</body>
</html>
