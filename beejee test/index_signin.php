<?php 
	include "db.php";
	if (isset($_POST['sub'])) {
		$text = $_POST['textarea'];
		$words = strlen($text);

		if ($words >5000) {
			echo "max words 5000";
		}
		$task = $_POST['textarea'];
		$query =$connection->query("UPDATE `test_info` SET task='$task', `status`='b' WHERE id=".$_POST['sub']."");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="img/tasks.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="script/script.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<title>Task meneger</title>
</head>
<body>

	<!-- Navbar -->
	<p id="demo"></p>
	<ul>
		<li class="sign"><a class="sign_btt" href="signin.php">log out</a></li>
		<li class="logo"><a href="index_signin.php"><img src="img/tasks.png"></a></li>
	</ul>
	<!-- Task Content -->
	
	<?php 
	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		$query =$connection->query("DELETE FROM test_info WHERE id=$id");
	}
	$query = $connection->query("SELECT * FROM test_info ORDER BY name DESC");
	while ($row = $query->fetch_assoc()){
		$show_img = base64_encode($row['avatar']);
		$show_name=($row['name']);
		$show_mail=($row['mail']);
		$show_task=($row['task']);
		$show_id= ($row['Id']);
					?>
					<section>
						<div class="col">
							<div class="del_icon">
								<a href="?del=<?= $show_id ?>"><img src="img/signs.png"></a>
							</div>
							<div class="col_img">
								<img class="user_icon" src="data:image/jpg;base64, <?= $show_img ?>"  alt="" >
							</div>
							<div class="user_info">
								<form action="" method="post">
									<p class="name"><?= $show_name; ?></p>
									<p class="email"><?= $show_mail; ?></p>
									<textarea class="email" name="textarea"><?= $show_task; ?></textarea>
									<button class="redirect_btn" name="sub" value="<?=$show_id?>"> Submit</button>
								</form>
							</div>
						</section>
					<?php } ?>

				</body>
				</html>