<?php
require_once('conf.php');

if (isset($_GET['pid'])) {
    $package_id = $_GET['pid']; 
    $sql = "SELECT * FROM packages WHERE pid = $package_id"; 
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();  
    } else {
        echo "<p>Package not found.</p>";
        exit();
    }
} else {
    echo "<p>Package ID not provided.</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Details | CelebrEase</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<div class="container">
    <img src="images/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" class="package-image" style="width: 100px">
    <div class="package-details">
        <h1><?php echo htmlspecialchars($row['name']); ?></h1>
        <p><?php echo htmlspecialchars($row['description']); ?></p>
        <p><strong>Price: Rs. <?php echo htmlspecialchars($row['price']); ?> upwards</strong></p>
        <p>Additional costs may apply. Contact us for further details.</p>
    </div>
</div>

</div>

</body>
</html>
