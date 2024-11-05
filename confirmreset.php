<?php
include("db.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
   $email = $conn->real_escape_string($_POST['email']);
   $newpassword = $_POST['newpassword'];
   $newpasswordreapet = $_POST['newpasswordreapet'];
   $query = "SELECT `email` FROM `registration` WHERE `email` = '$email'";
   $result = $conn->query($query);
   if ($result->num_rows == 0) {
      echo '<script>alert("THE Mail not exist ")</script>';
 }
  else if ($result->num_rows > 1) {

      die("Duplicate user accounts!");
 } 
        if($result->num_rows == 1) {
           
                $query1 = "SELECT `password` FROM `registration` WHERE  `password` = '$password'";
                $result2 = $conn->query($query1);
                if ($result2->num_rows == 1) {
                    echo '<script>alert("Choose another Password The Password is Already exist ")</script>';
                    exit();
               } 
        if($newpassword==$newpasswordreapet)
        {
            mysqli_query($conn,"UPDATE registration set password='" . $_POST["newpassword"] . "' WHERE email='" . $email . "'");
            mysqli_query($conn,"UPDATE registration set passwordreapet='" . $_POST["newpasswordreapet"] . "' WHERE email='" . $email . "'");

            echo '<script>alert("Congratulations You have successfully changed your password ")</script>';
            header('Location:HomePage.html');

        }
       else {
       echo "Passwords do not match";
        }
    }

} 
?>
