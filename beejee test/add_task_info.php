<div class="close_icon" >
	<div class="add_task" onclick="task_Open()">
		<img src="img/add.png">
	</div>
	<div class="sorting">
		<a href="?sort=name" class="sort_name">Sort by name</a>
		<a href="?sort=mail" class="sort_mail">Sort by mail</a>
		<a href="?sort=status">Sort by status</a>
	</div>
</div>
<?php 
$query_part = 'id';
if (isset($_GET['sort']) and !empty($_GET['sort'])) {
	$query_part = $_GET['sort'];
}
$query = $connection->query("SELECT * FROM test_info ORDER BY ".$query_part."");
while ($row = $query->fetch_assoc()){
	$show_img = base64_encode($row['avatar']);
	$show_name=($row['name']);
	$show_mail=($row['mail']);
	$show_task=($row['task']);
	$show_id=($row['Id']);
	$status=($row['status']);
				?>
				<section>
					<div class="col">
						<div class="col_img">
							<img class="user_icon" src="data:image/jpg;base64, <?= $show_img ?>"  alt="" >
						</div>
						<div class="user_info">
							<p class="name"><?= $show_name; ?></p>
							<p class="email"><?= $show_mail; ?></p>
							<p class="task"><?= $show_task; ?></p>
							<form method="post" action="" class="status_form" >
								<button class="status_btn" name="done_btn" style="background-color:<?=($status=='a'?'green':'red')?>" value="<?=$show_id?>">Done</button>
							</form>
						</div>
					</section>
				<?php } ?>


