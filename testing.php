<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $passwordErr = "";
$name = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Username is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z]*$/",$name)) {
      $nameErr = "Only letters allowed";
    }
  }
  
	if (empty($_POST["password"])) {
		$passwordErr = "Password is required";
	} else {
		$password = test_input($_POST["password"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/\S+/",$password)) {
		$passwordErr = "No white space allowed";
		}
	}
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Create an Account</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Username: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Password: <input type="text" name="password">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
	
  <br/>

<?php

if (!empty($_POST["email"]) && filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match("/^[a-zA-Z ]*$/",$name) && !empty($_POST["name"]))
{
	echo "You have successfully created an account ";
	echo $name;
	echo "!";
}
?>


<br/>
<br/>

<button onclick="window.location.href = 'homepage.php';">Click here to get to the site</button

</body>
</html>
