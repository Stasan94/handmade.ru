<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Активация пользователя</title>
</head>
<body>
	<?php

	function connect(){
		$connection = mysqli_connect('127.0.0.1', 'root', '', 'handmade_bd');
		if (!$connection)
		{
			die(mysqli_connect_error());
		}
		return $connection;
	}

	if(isset($_GET['login']) && isset($_GET['active_key']))
	{
		$active_key = $_GET['active_key'];
		$login = $_GET['login'];

		$connection = connect();

		$query = "SELECT `active_key` FROM `users` WHERE `active_key` = '$active_key'";
		$result = mysqli_query($connection, $query);
		$row = mysqli_fetch_assoc($result);		

		if ($active_key == $row["active_key"])
		{
			$query = "UPDATE `users` SET `verification` = '1' WHERE `active_key` = '$active_key'";
			$result = mysqli_query($connection, $query);
		}

		mysqli_close($connection);
	}

	?>
</body>

</html>