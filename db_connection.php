<?php
$servername = "localhost";
$username = "root";     // XAMPP ka default username 'root' hota hai
$password = "";         // XAMPP ka default password khali hota hai
$dbname = "myportfolio"; // Jo naam aapne phpMyAdmin mein rakha tha

// Connection banana
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Connection check karna
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>