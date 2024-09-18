<?php 
session_start();
require_once('conf.php'); 

$un = $_POST['un'];
$pwd = $_POST['pwd'];
$role = 'ordinary'; 

if (isset($_POST['sign'])) {
    $sql = "INSERT INTO user (username, password, role) VALUES ('$un', '$pwd', '$role')";
    $result = $conn->query($sql);
    
    if ($result) {
        $_SESSION['username'] = $un;
        echo "<script>alert('Registered Successfully!');
              window.location.href='home1.php';
              </script>";
    } else {
        echo "<script>alert('Failed to Register');
              window.location.href='signUp.html';
              </script>";
    }
}
$conn->close();
?>
