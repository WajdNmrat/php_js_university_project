<?php
include("db.php");
session_start();
   
if($_SERVER["REQUEST_METHOD"] == "POST") {
   $email = $conn->real_escape_string($_POST['email']);
   $pass = $conn->real_escape_string($_POST['password']);
   $query = "SELECT `email` AND `password` FROM `registration` WHERE `email` = '$email' AND `password` = '$pass'";
   $result = $conn->query($query);
   $user = mysqli_fetch_array($result);
	if($user) {
			$_SESSION["email"] = $user["email"];
			
			if(!empty($_POST["remember"])) {
				setcookie ("member_login",$_POST["email"],time()+ (7 * 24 * 60 * 60));
			} else {
				if(isset($_COOKIE["member_login"])) {
					setcookie ("member_login","");
				}
			}
	} else {
		$message = "Invalid Login";
	}
   if ($result->num_rows == 0) {
      echo '<script>alert("Wrong user/pass ")</script>';
 } else if ($result->num_rows > 1) {

      die("Duplicate user accounts!");
 } else {
   header('Location:Recipespage.html');
   die();
 }
}
?>
