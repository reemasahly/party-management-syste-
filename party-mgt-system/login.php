<?php  
session_start();
require_once('conf.php'); 

// Create default ordinary user if not exists
$default_username = 'ucsc';
$default_password = 'ucsc'; 
$default_role = 'ordinary'; 

// Check if the default user exists
$check_default_user_sql = "SELECT * FROM user WHERE username='$default_username'";
$default_user_result = $conn->query($check_default_user_sql);

// If the default user does not exist, insert it
if ($default_user_result->num_rows == 0) {
    $insert_default_user_sql = "INSERT INTO user (username, password, role) 
                                VALUES ('$default_username', '$default_password', '$default_role')";
    $conn->query($insert_default_user_sql);
}

if (isset($_POST['login'])) {
    $username = $_POST['un'];
    $password = $_POST['pwd'];

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $row['role'];

        // Redirect based on role
        if ($row['role'] == 'admin') {
            header('location: admin.php'); 
        } else {
            header('location: home1.php');
        }
        exit();
    } else {
        echo "<script>
              alert('Invalid Credentials! Please try again.');
              window.location.href='login.html';
              </script>";
    }
    $conn->close();
}
?>