<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | CelebrEase</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="container">
        <header>
            <img src="small-logo.png" alt="CelebrEase Logo" class="logo">
            <nav>
                <ul>
                    <li><a href="home1.php">Home</a></li>
                    <li><a href="home1.php#home">Packages</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                    <?php if (isset($_SESSION['username'])): ?>
                        <li><a href="logout.php" class="logout-btn">Logout</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>

        <main>
            <h1>Contact Us</h1>
            <p>We are committed to providing our customers with exceptional service! Drop us a message or email (24x7 support).</>
            <p>Phone: 123-456-7890</p>
            <p>Email: info@celebrease.com</p>
        </main>
        
        <footer>
            <p>&copy; 2024 CelebrEase. All Rights Reserved.</p>
        </footer>
    </div>
</body>
</html>
