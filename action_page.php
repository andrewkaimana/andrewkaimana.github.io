<html>
<body>
<?php

$to = andrew.kaimana@yahoo.com;
$email = test_input($_POST["email"]);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
}


if (mail($to, $name, $email, $message)){
	echo 'Your message has been sent successfully. Thank you.';
}

else {
	echo 'Unable to send your message. Please try again later.';
}
   
/*
if(isset ($_POST["username"]) && isset ($_POST["password"])){
	
	$username = $_POST["username"];
	$password = $_POST["password"];
}

	
if($username == "dig3134user" && $password == "dig3134pass"){
	$username = $_SESSION["username"] = $username;
	$password = $_SESSION["password"] = $password;
	
	header("Location:Success_Login.php");
}

else {
	header ("Location:Failure_Login.php");
} 

?>
*/
</body>
</html>