<?php 
	$db = mysqli_connect('localhost','root','','beejee');
if (isset($_POST['submit'])){
	$username = mysqli_real_escape_string($db,trim($_POST['username']));
	$mail = mysqli_real_escape_string($db,trim($_POST['mail']));
	$password = mysqli_real_escape_string($db,trim($_POST['password']));
	$password2 = mysqli_real_escape_string($db,trim($_POST['password2']));
	if (!empty($username) && !empty($mail) && !empty($password) && !empty($password2) && ($password == $password2)) {
		$query = "SELECT * FROM `signup` WHERE name = '$username'";
		$data = mysqli_query($db, $query);
		if (mysqli_num_rows($data) == 0) {
			$query = "INSERT INTO `signup` (name,password,mail) VALUES ('$username',SHA('$password'),'$mail')";
			mysqli_query($db, $query);
			header("location: index_signin.php");
			mysqli_close($db);
			exit();
		}
		else{
			echo "Login already exists";
		}
	}

}
 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="img/tasks.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="script/script.js"></script>
	<title>Task meneger</title>
</head>
<body style="background-color: #F44336;">
	<?php include "nav.php" ?>
<content class="cont_signup">
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
		<label for="username">Enter your name</label>
		<input type="text" name="username">
		<label for="mail">Enter your mail</label>
		<input type="text" name="mail">
		<label for="password">Enter your password</label>
		<input type="password" name="password">
		<label for="password">Enter your password again</label>
		<input type="password" name="password2">
		<button type="submit" name="submit">sign up</button>
		</form>
	</content>
</body>
</html>
