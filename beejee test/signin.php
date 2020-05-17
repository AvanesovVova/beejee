<?php 
$db = mysqli_connect('localhost','id13698082_info','t#G4uWFHLCF&bhU6','id13698082_beejee_base');
if(!isset($_COOKIE['$user_id'])){
	if(isset($_POST['submit'])){
		$user_username = mysqli_real_escape_string($db,trim($_POST['username']));
		$user_password = mysqli_real_escape_string($db,trim($_POST['password']));
		if(!empty($user_username) && !empty($user_password)){
            $query = "SELECT `id`,`name` FROM `signup` WHERE name='$user_username' AND password= SHA('$user_password')";
			$data = mysqli_query($db,$query);
			if(mysqli_num_rows($data) == 0){
				$row = mysqli_fetch_assoc($data);
				setcookie('user_id',$row['user_id'], time()+(60*60*24*30));
				setcookie('username',$row['username'], time()+(60*60*24*30));
				header("location: index_signin.php");
				mysqli_close($db);
				exit();
			}
			else{
				echo 'ne pravilni login';
			}
		}	
		else{
			echo 'ne pravilno zapolneno pole';
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
	<content class="cont_signin">
		<form method="POST" action=""> 
			<input type="text" name="username" placeholder="Enter your name">
			<input type="password" name="password" placeholder="Enter your password">
			<button type="submit" name="submit">sign in</button>
		</form>
	</content>
</body>
</html>