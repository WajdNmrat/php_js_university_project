<?php 
    $servername = "localhost";
    $email = "root";
    $password = "";
    $dbname = "homework2";

// Create connection
    $conn = new mysqli($servername, $email, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>