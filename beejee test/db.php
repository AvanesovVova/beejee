<?php 
	$server = 'localhost';
	$name = 'id13698082_test_info';
	$password = 'wIh#hm!Ol0a|p3iq';
	$dbname = 'id13698082_beejee';
	$charset = 'utf8';

	$connection = new mysqli($server,$name,$password,$dbname);
	if ($connection->connect_error) {
		die("ошибка с соединения сервером".$connection->connect_error);
	}

	if (!$connection->set_charset($charset)) {
		echo "utf8";
	}
	?>