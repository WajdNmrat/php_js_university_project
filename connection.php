<?php
include("db.php");
$email = $_POST['email'];
if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
echo '<script>alert("Wrong email Enter ")</script>';
exit();
}
$password = $_POST['password'];
$passwordreapet = $_POST['passwordreapet'];
if($password!=$passwordreapet)
{
 echo '<script>alert("Password not the same ")</script>';
exit();
}
$Name = $_POST['Name'];
// Database connection
$conn = new mysqli('localhost','root','','homework2');
if($conn->connect_error){
	echo "$conn->connect_error";
	die("Connection Failed : ". $conn->connect_error);
} else {
	$query = "SELECT `email` OR `password` FROM `registration` WHERE `email` = '$email' OR `password` = '$password'";
	$result = $conn->query($query);
	if ($result->num_rows == 1) {
		echo '<script>alert("The Email Or Password is exist ")</script>';
		exit();
  }
}

	$stmt = $conn->prepare("insert into registration(email, password, passwordreapet, Name) values(?, ?, ?, ?)");
	$stmt->bind_param("ssss", $email, $password, $passwordreapet, $Name);
	$execval = $stmt->execute();
	header('Location:HomePage.html');
	$stmt->close();
	$conn->close();
?>
