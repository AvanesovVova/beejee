
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Task meneger</title>
	<link rel="shortcut icon" href="img/tasks.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/style.css?v=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="script/script.js"></script>
</head>
<body>
	<?php 
	include "db.php";
	
	if (isset($_POST['done_btn'])) {
		$connection->query("UPDATE `test_info` SET `status`='a' WHERE id=".$_POST['done_btn']."");
	}
	if(isset($_POST['upload'])){
		$name = $_POST['uname']; 
		$mail = $_POST['mail'];
		$task = $_POST['task'];
		$img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
		if (empty($name) && empty($mail) && empty($task)) {
			echo "<p class='alert'>Fill in all fields </p>";

		}else{
			$connection->query("INSERT INTO `test_info` (name,mail,task,avatar,status) VALUES ('$name','$mail','$task','$img','')");
		}
	}
	include "nav.php";
	include "add_task_info.php"; 
	?>
	<!-- Task Content -->
	
	<content id="add_task">
		<img src="img/cross.png" onclick="task_Close()" >
		<form action="index.php" method="POST" enctype="multipart/form-data">
			<input type="text" name="uname" placeholder="Enter name">
			<input type="text" name="mail" placeholder="Enter mail">
			<input type="text" name="task" placeholder="Enter task">
			<input type="file" name="img" placeholder="Enter avatar">
			<button type="submit" class="add_info" name="upload">Creat</button>
		</form>
	</content>	
	
</div>
</div>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</body>
</html>