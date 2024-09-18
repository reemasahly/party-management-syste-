<?php 
session_start(); 
require_once('conf.php');

if (isset($_GET['pid'])) {
    $package_id = $_GET['pid'];
    $sql = "DELETE FROM packages WHERE pid = $package_id";
    $result = $conn->query($sql);

    if ($result) {
        echo "Package successfully deleted.";
    } else {
        echo "Error deleting package.";
    }
    header("Location: adminContent.php");
    exit();
}
?>
