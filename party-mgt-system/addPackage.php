<?php
require_once('conf.php'); 

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $sql = "INSERT INTO packages (name, description, price, image) VALUES ('$name', '$description', '$price', '$image')";
        if ($conn->query($sql)) {
            echo "<script>
                alert('Package added successfully');
                window.location.href = 'adminContent.php';
            </script>";
        } else {
            echo "Error adding package.";
        }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <div class="login-container">
<h2>Add Package</h2>
<form method="POST" action="">
    Name:
    <input type="text" name="name" required>
    
    Description:
    <textarea name="description" rows="5" cols="50" class="textarea" required></textarea>
    
    Price:
    <input type="text" name="price" required>
    Image Path:
    <input type="text" name="image" required>
    <input type="submit" value="Add" name="add">
</form>
</div>
</body>
</html>
