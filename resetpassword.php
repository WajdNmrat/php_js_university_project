<?php
include("db.php");
session_start();
   
if($_SERVER["REQUEST_METHOD"] == "POST") {
   $email = $conn->real_escape_string($_POST['email']);
   $query = "SELECT `email` FROM `registration` WHERE `email` = '$email'";
   $result = $conn->query($query);
   if ($result->num_rows == 0) {
      echo '<script>alert("Wrong Email Insert ")</script>';
 } else if ($result->num_rows > 1) {

      die("Duplicate user accounts!");
 } else {
   header('Location:newpassword.html');
   die();
 }
}
?>