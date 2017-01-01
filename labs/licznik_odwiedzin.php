<?php
	require_once "./source/scripts/database_config.php";
	$connection = @new mysqli($db_host, $db_user, $db_password, $db_name) or die("Error: ".$connection->connect_errno);
	if($result =
        @$connection->query("SELECT * FROM zad3 WHERE ip='{$_SERVER[REMOTE_ADDR]}'"))
	{
		if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			if($row['time'] > (time()-(60*60))){
				@$connection->query("INSERT INTO zad3 (ip) VALUES ('{$_SERVER[REMOTE_ADDR]}')");
			}
		}
		else{
			@$connection->query("INSERT INTO zad3 (ip) VALUES ('{$_SERVER[REMOTE_ADDR]}')");
		}
	}
	$result = @$connection->query("SELECT * FROM zad3");
	echo 'licznik: '.$result->num_rows;


?>