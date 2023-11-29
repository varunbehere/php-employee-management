<?php
// dbconnections.php
$con = mysqli_connect("localhost", "root", "", "phpcrud");

// Check connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
