<?php 
session_start(); 
require_once('conf.php');

// Check if the user is an admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: home1.php");
    exit();
}
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
        <header>
            <img src="small-logo.png" alt="CelebrEase Logo" class="logo">
            <nav>
                <ul>
                    <li><a href="admin.php">Admin</a></li>
                    <li><a href="admin.php">Home</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                    <?php if (isset($_SESSION['username'])): ?>
                        <li><a href="logout.php" class="logout-btn">Logout</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>

        <main>
             <iframe id="content-frame" name="content-frame" src="adminContent.php" 
              style="width: 100%; height: 600px; border: none;"></iframe>
        </main>
        
        <footer>
            <p>&copy; 2024 CelebrEase. All Rights Reserved.</p>
        </footer>
    </div>
</body>
</html>
