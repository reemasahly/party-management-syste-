<?php 
session_start(); 
require_once('conf.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | CelebrEase</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="container">
        <header>
            <img src="small-logo.png" alt="CelebrEase Logo" class="logo">
            <nav>
                <ul>
                    <li><a href="home1.php">Home</a></li>
                    <li><a href="#home">Packages</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                    <?php if (isset($_SESSION['username'])): ?>
                        <li><a href="logout.php" class="logout-btn">Logout</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>

        <main id="home">
            <?php 
            if (isset($_SESSION['username'])): ?>
                <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>

                <div class="package-grid">
                <?php
                $sql = "SELECT * FROM packages"; // Adjust table name as needed
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='package-item'>";
                        echo "<img src='images/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "' class='package-image'>";
                        echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
                        echo "<p>" . substr(htmlspecialchars($row['description']), 0, 100) . "...</p>";
                        echo "<p><strong>Rs. " . htmlspecialchars($row['price']) . "</strong></p>";
                        echo "<a href='packageDetails.php?pid=" . htmlspecialchars($row['pid']) . "' class='btn'>View More</a>";
                        echo "</div>";
                    }
                    } else {
                        echo "<p>No packages available.</p>";
                    }
                    ?>
                </section>

            <?php else: ?>
                <h1>Welcome to CelebrEase, your one-stop solution for planning the perfect party!</h1>
                <p>We offer a range of services, from decoration to catering, all to make your event memorable.</p>
                <div class="call-to-action">
                    <a href="login.html" class="btn">Login</a>
                    <a href="signUp.html" class="btn">Sign Up</a>
                </div>
            <?php endif; ?>
        </main>
        
        <footer>
            <p>&copy; 2024 CelebrEase. All Rights Reserved.</p>
        </footer>
    </div>
</body>
</html>
