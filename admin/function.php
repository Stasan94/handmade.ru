<?php

function connect(){
	$connection = mysqli_connect('127.0.0.1', 'root', '', 'handmade_bd');
	if (!$connection)
	{
		die(mysqli_connect_error());
	}
	return $connection;
}

function loadGoodsBombs(){
	// Подгрузка товаров из БД для страницы с бомбочками
	$connection = connect();
	$query = "SELECT * FROM `bombs`";
	$result = mysqli_query($connection, $query);

	if (mysqli_num_rows($result) > 0)
	{
		$out = array();
		while ($row = mysqli_fetch_assoc($result))
		{
			$out[$row["id"]] = $row;
		}
		array_multisort($out, SORT_DESC);
		echo json_encode($out);
	}
	else
	{
		echo'0';
	}
	mysqli_close($connection);
}

function loadGoodsSoap(){
	// Подгрузка товаров из БД для страницы с мылом
	$connection = connect();
	$query = "SELECT * FROM `soap`";
	$result = mysqli_query($connection, $query);

	if (mysqli_num_rows($result) > 0)
	{
		$out = array();
		while ($row = mysqli_fetch_assoc($result))
		{
			$out[$row["id"]] = $row;
		}
		array_multisort($out, SORT_DESC);
		echo json_encode($out);
	}
	else{
		echo'0';
	}
	mysqli_close($connection);
}

function loadGoodsGeyser(){
	// Подгрузка товаров из БД для страницы с мылом
	$connection = connect();
	$query = "SELECT * FROM `geyser`";
	$result = mysqli_query($connection, $query);

	if (mysqli_num_rows($result) > 0)
	{
		$out = array();
		while ($row = mysqli_fetch_assoc($result))
		{
			$out[$row["id"]] = $row;
		}
		array_multisort($out, SORT_DESC);
		echo json_encode($out);
	}
	else{
		echo'0';
	}
	mysqli_close($connection);
}

function loadSingleGoodsBombs(){
	// Подгрузка необходимого товара из БД для страницы с описанием товара бомбочек
	$id = $_POST['id'];
	$connection = connect();
	$query = "SELECT * FROM `bombs` WHERE `id` = '$id'";
	$result = mysqli_query($connection, $query);

	if (mysqli_num_rows($result) > 0)
	{
		$out = array();
		while ($row = mysqli_fetch_assoc($result))
		{
			$out[$row["id"]] = $row;
		}
		echo json_encode($out);
	}
	else
	{
		echo '0';
	}
	mysqli_close($connection);
}

function similarGoodsOutBombs(){
	// Подгрузка похожих товаров из БД для страницы с с описание товара бомбочек
	$connection = connect();
	$id = $_POST['id'];
	$query = "SELECT * FROM `bombs` WHERE `id` != '$id' ORDER BY RAND() LIMIT 3";
	$result = mysqli_query($connection, $query);
	if (mysqli_num_rows($result) > 0)
	{
		$out = array();
		while ($row = mysqli_fetch_assoc($result))
		{
			$out[$row["id"]] = $row;
		}
		echo json_encode($out);
	}
	mysqli_close($connection);
}

function loadSingleGoodsSoap(){
	// Подгрузка необходимого товара из БД для страницы с описанием товара мыла
	$id = $_POST['id'];
	$connection = connect();
	$query = "SELECT * FROM `soap` WHERE `id` = '$id'";
	$result = mysqli_query($connection, $query);

	if (mysqli_num_rows($result) > 0)
	{
		$out = array();
		while ($row = mysqli_fetch_assoc($result))
		{
			$out[$row["id"]] = $row;
		}
		echo json_encode($out);
	}
	else
	{
		echo '0';
	}
	mysqli_close($connection);
}

function similarGoodsOutSoap(){
	// Подгрузка похожих товаров из БД для страницы с с описание товара мыла
	$connection = connect();
	$id = $_POST['id'];
	$query = "SELECT * FROM `soap` WHERE `id` != '$id' ORDER BY RAND() LIMIT 3";
	$result = mysqli_query($connection, $query);
	if (mysqli_num_rows($result) > 0)
	{
		$out = array();
		while ($row = mysqli_fetch_assoc($result))
		{
			$out[$row["id"]] = $row;
		}
		echo json_encode($out);
	}
	mysqli_close($connection);
}

function loadSingleGoodsGeyser(){
	// Подгрузка необходимого товара из БД для страницы с описанием товара мыла
	$id = $_POST['id'];
	$connection = connect();
	$query = "SELECT * FROM `geyser` WHERE `id` = '$id'";
	$result = mysqli_query($connection, $query);

	if (mysqli_num_rows($result) > 0)
	{
		$out = array();
		while ($row = mysqli_fetch_assoc($result))
		{
			$out[$row["id"]] = $row;
		}
		echo json_encode($out);
	}
	else
	{
		echo '0';
	}
	mysqli_close($connection);
}

function similarGoodsOutGeyser(){
	// Подгрузка похожих товаров из БД для страницы с с описание товара гейзеров
	$connection = connect();
	$id = $_POST['id'];
	$query = "SELECT * FROM `geyser` WHERE `id` != '$id' ORDER BY RAND() LIMIT 3";
	$result = mysqli_query($connection, $query);
	if (mysqli_num_rows($result) > 0)
	{
		$out = array();
		while ($row = mysqli_fetch_assoc($result))
		{
			$out[$row["id"]] = $row;
		}
		echo json_encode($out);
	}
	mysqli_close($connection);
}

function loadCart(){
	// Подгрузка товаров из БД, которые внесены в корзину для страницы с корзиной
	// $id = $_POST['id'];
	$connection = connect();
	$query = "SELECT * FROM `bombs` UNION SELECT * FROM `soap` UNION SELECT * FROM `geyser`";
	$result = mysqli_query($connection, $query);

	if (mysqli_num_rows($result) > 0)
	{
		$out = array();
		while ($row = mysqli_fetch_assoc($result))
		{
			$out[$row["name"]] = $row;
		}
		echo json_encode($out);
	}
	else
	{
		echo '0';
	}
	mysqli_close($connection);
}

function loadWish(){
	// Подгрузка товаров из БД, которые внесены в список желаний для страницы со списком желаний
	$connection = connect();
	$query = "SELECT * FROM `bombs` UNION SELECT * FROM `soap` UNION SELECT * FROM `geyser`";
	$result = mysqli_query($connection, $query);

	if (mysqli_num_rows($result) > 0)
	{
		$out = array();
		while ($row = mysqli_fetch_assoc($result))
		{
			$out[$row["name"]] = $row;
		}
		echo json_encode($out);
	}
	else
	{
		echo '0';
	}
	mysqli_close($connection);
}

function promoCode(){
	$connection = connect();
	$promo = $_POST['promo'];

	$query = "SELECT `sale` FROM `promo` WHERE `promo_code` = '$promo'";
	$result = mysqli_query($connection, $query);

	if (mysqli_num_rows($result) > 0)
	{
		$out = mysqli_fetch_assoc($result);
		echo json_encode($out);
	}
	else
	{
		echo '0';
	}

	mysqli_close($connection);
}

function initBombs(){
	// Выводим список товаров из таблицы с бомбочками для страницы с админкой
	$connection = connect();
	$query = "SELECT `name` FROM `bombs`";
	$result = mysqli_query($connection, $query);

	if (mysqli_num_rows($result) > 0)
	{
		$out = array();
		while ($row = mysqli_fetch_assoc($result))
		{
			$out[$row["name"]] = $row;
		}
		array_multisort($out, SORT_REGULAR);
		echo json_encode($out);
	}
	else
	{
		echo '0';
	}
	mysqli_close($connection);
}

function initSoap(){
	// Выводим список товаров из таблицы с мылом для страницы с админкой
	$connection = connect();
	$query = "SELECT `name` FROM `soap`";
	$result = mysqli_query($connection, $query);

	if (mysqli_num_rows($result) > 0)
	{
		$out = array();
		while ($row = mysqli_fetch_assoc($result))
		{
			$out[$row["name"]] = $row;
		}
		array_multisort($out, SORT_REGULAR);
		echo json_encode($out);
	}
	else
	{
		echo '0';
	}
	mysqli_close($connection);
}

function initGeyser(){
	// Выводим список товаров из таблицы с гейзерами для страницы с админкой
	$connection = connect();
	$query = "SELECT `name` FROM `geyser`";
	$result = mysqli_query($connection, $query);

	if (mysqli_num_rows($result) > 0)
	{
		$out = array();
		while ($row = mysqli_fetch_assoc($result))
		{
			$out[$row["name"]] = $row;
		}
		array_multisort($out, SORT_REGULAR);
		echo json_encode($out);
	}
	else
	{
		echo '0';
	}
	mysqli_close($connection);
}

function selectOneGoodsBombs(){
	// Выбираем необходимый товар для получения информации о нем из БД для страницы с админкой
	$connection = connect();
	$name = $_POST['gname'];
	$query = "SELECT * FROM `bombs` WHERE `name` = '$name'";
	$result = mysqli_query($connection, $query);

	if (mysqli_num_rows($result) > 0)
	{
		$row = mysqli_fetch_assoc($result);
		$out[$row["name"]] = $row;
		echo json_encode($row);
	}
	else
	{
		echo '0';
	}
	mysqli_close($connection);
}

function selectOneGoodsSoap(){
	// Выбираем необходимый товар для получения информации о нем из БД для страницы с админкой
	$connection = connect();
	$name = $_POST['gname'];
	$query = "SELECT * FROM `soap` WHERE `name` = '$name'";
	$result = mysqli_query($connection, $query);

	if (mysqli_num_rows($result) > 0)
	{
		$row = mysqli_fetch_assoc($result);
		$out[$row["name"]] = $row;
		echo json_encode($row);
	}
	else
	{
		echo '0';
	}
	mysqli_close($connection);
}

function selectOneGoodsGeyser(){
	// Выбираем необходимый товар для получения информации о нем из БД для страницы с админкой
	$connection = connect();
	$name = $_POST['gname'];
	$query = "SELECT * FROM `geyser` WHERE `name` = '$name'";
	$result = mysqli_query($connection, $query);

	if (mysqli_num_rows($result) > 0)
	{
		$row = mysqli_fetch_assoc($result);
		$out[$row["name"]] = $row;
		echo json_encode($row);
	}
	else
	{
		echo '0';
	}
	mysqli_close($connection);
}

function newGoodsBombs(){
	$connection = connect();
	$name = $_POST['name'];
	$cost = $_POST['gcost'];
	$descr = $_POST['gdescr'];
	$full_descr = $_POST['gfull_descr'];
	$main_image = $_POST['gmain_image'];
	$second_image = $_POST['gsecond_image'];
	$third_image = $_POST['gthird_image'];
	$cart_image = $_POST['gcart_image'];

	$query = "INSERT INTO `bombs` (`name`, `cost`, `description`, `full_description`, `main_image`, `second_image`, `third_image`, `cart_image`) VALUES ('$name', '$cost', '$descr', '$full_descr', '$main_image', '$second_image', '$third_image', '$cart_image')";

	if (mysqli_query($connection, $query))
	{
		echo '1';
	}
	else
	{
		mysqli_error($connection);
	}

	mysqli_close($connection);
}

function newGoodsSoap(){
	$connection = connect();
	$name = $_POST['name'];
	$cost = $_POST['gcost'];
	$descr = $_POST['gdescr'];
	$full_descr = $_POST['gfull_descr'];
	$main_image = $_POST['gmain_image'];
	$second_image = $_POST['gsecond_image'];
	$third_image = $_POST['gthird_image'];
	$cart_image = $_POST['gcart_image'];

	$query = "INSERT INTO `soap` (`name`, `cost`, `description`, `full_description`, `main_image`, `second_image`, `third_image`, `cart_image`) VALUES ('$name', '$cost', '$descr', '$full_descr', '$main_image', '$second_image', '$third_image', '$cart_image')";

	if (mysqli_query($connection, $query))
	{
		echo '1';
	}
	else
	{
		mysqli_error($connection);
	}

	mysqli_close($connection);
}

function newGoodsGeyser(){
	$connection = connect();
	$name = $_POST['name'];
	$cost = $_POST['gcost'];
	$descr = $_POST['gdescr'];
	$full_descr = $_POST['gfull_descr'];
	$main_image = $_POST['gmain_image'];
	$second_image = $_POST['gsecond_image'];
	$third_image = $_POST['gthird_image'];
	$cart_image = $_POST['gcart_image'];

	$query = "INSERT INTO `geyser` (`name`, `cost`, `description`, `full_description`, `main_image`, `second_image`, `third_image`, `cart_image`) VALUES ('$name', '$cost', '$descr', '$full_descr', '$main_image', '$second_image', '$third_image', '$cart_image')";

	if (mysqli_query($connection, $query))
	{
		echo '1';
	}
	else
	{
		mysqli_error($connection);
	}

	mysqli_close($connection);
}

function updateGoodsBombs(){
	$connection = connect();
	$name = $_POST['name'];
	$cost = $_POST['gcost'];
	$descr = $_POST['gdescr'];
	$full_descr = $_POST['gfull_descr'];
	$main_image = $_POST['gmain_image'];
	$second_image = $_POST['gsecond_image'];
	$third_image = $_POST['gthird_image'];
	$cart_image = $_POST['gcart_image'];
	$hidden_name = $_POST['hidden_name'];

	$query = "UPDATE `bombs` SET `name` = '$name', `cost` = '$cost', `description` = '$descr', `full_description` = '$full_descr', `main_image` = '$main_image' ,`second_image` = '$second_image' ,`third_image` = '$third_image', `cart_image` = '$cart_image' WHERE `name` = '$hidden_name'";

	if (mysqli_query($connection, $query))
	{
		echo '1';
	}
	else
	{
		mysqli_error($connection);
	}

	mysqli_close($connection);
}

function updateGoodsSoap(){
	$connection = connect();
	$name = $_POST['name'];
	$cost = $_POST['gcost'];
	$descr = $_POST['gdescr'];
	$full_descr = $_POST['gfull_descr'];
	$main_image = $_POST['gmain_image'];
	$second_image = $_POST['gsecond_image'];
	$third_image = $_POST['gthird_image'];
	$cart_image = $_POST['gcart_image'];
	$hidden_name = $_POST['hidden_name'];

	$query = "UPDATE `soap` SET `name` = '$name', `cost` = '$cost', `description` = '$descr', `full_description` = '$full_descr', `main_image` = '$main_image' ,`second_image` = '$second_image' ,`third_image` = '$third_image', `cart_image` = '$cart_image' WHERE `name` = '$hidden_name'";

	if (mysqli_query($connection, $query))
	{
		echo '1';
	}
	else
	{
		mysqli_error($connection);
	}

	mysqli_close($connection);
}

function updateGoodsGeyser(){
	$connection = connect();
	$name = $_POST['name'];
	$cost = $_POST['gcost'];
	$descr = $_POST['gdescr'];
	$full_descr = $_POST['gfull_descr'];
	$main_image = $_POST['gmain_image'];
	$second_image = $_POST['gsecond_image'];
	$third_image = $_POST['gthird_image'];
	$cart_image = $_POST['gcart_image'];
	$hidden_name = $_POST['hidden_name'];

	$query = "UPDATE `geyser` SET `name` = '$name', `cost` = '$cost', `description` = '$descr', `full_description` = '$full_descr', `main_image` = '$main_image' ,`second_image` = '$second_image' ,`third_image` = '$third_image', `cart_image` = '$cart_image' WHERE `name` = '$hidden_name'";

	if (mysqli_query($connection, $query))
	{
		echo '1';
	}
	else
	{
		mysqli_error($connection);
	}

	mysqli_close($connection);
}

function deleteGoodsBombs(){
	$connection = connect();
	$hidden_name = $_POST['hidden_name'];

	$query = "DELETE FROM `bombs` WHERE `name` = '$hidden_name'";

	if (mysqli_query($connection, $query))
	{
		echo '1';
	}
	else
	{
		mysqli_error($connection);
	}

	mysqli_close($connection);
}

function deleteGoodsSoap(){
	$connection = connect();
	$hidden_name = $_POST['hidden_name'];

	$query = "DELETE FROM `soap` WHERE `name` = '$hidden_name'";

	if (mysqli_query($connection, $query))
	{
		echo '1';
	}
	else
	{
		mysqli_error($connection);
	}

	mysqli_close($connection);
}

function deleteGoodsGeyser(){
	$connection = connect();
	$hidden_name = $_POST['hidden_name'];

	$query = "DELETE FROM `geyser` WHERE `name` = '$hidden_name'";

	if (mysqli_query($connection, $query))
	{
		echo '1';
	}
	else
	{
		mysqli_error($connection);
	}

	mysqli_close($connection);
}

function sendOrderEmailToCustomer(){
	$connection = connect();

	$message = '';
	$message .= '<h1>Заказ косметики ручной работы</h1>';
	$message .= '<h2>Здравствуйте,&nbsp;'  . $_POST['efirstName'] . '!</h2>';
	$message .= '<h3>Ваш заказ успешно обработан.</h3><br>';
	$message .= '<h2>Вы заказали: </h2>';

	$cart = $_POST['cart'];
	$sale = $_POST['sale'];

	if ($sale == null)
	{
		$sale = 1;
	}

	$sum = 0;

	foreach ($cart as $name => $count)
	{
		$query_bombs = "SELECT * FROM `bombs` WHERE `name` = '$name'";
		$result_bombs = mysqli_query($connection, $query_bombs);
		$row_bombs = mysqli_fetch_assoc($result_bombs);

		$query_soap = "SELECT * FROM `soap` WHERE `name` = '$name'";
		$result_soap = mysqli_query($connection, $query_soap);
		$row_soap = mysqli_fetch_assoc($result_soap);

		$query_geyser = "SELECT * FROM `geyser` WHERE `name` = '$name'";
		$result_geyser = mysqli_query($connection, $query_geyser);	
		$row_geyser = mysqli_fetch_assoc($result_geyser);

		if ($name == $row_bombs["name"])
		{
			$message .= '<p><strong>' . $row_bombs["name"] . ' ' . $count . 'шт - ' . $row_bombs["cost"] * $count * $sale . 'р</strong></p>';
		}

		elseif ($name == $row_soap["name"])
		{
			$message .= '<p><strong>' . $row_soap["name"] . ' ' . $count . 'шт - ' . $row_soap["cost"] * $count * $sale . 'р</strong></p>';
		}

		elseif ($name == $row_geyser["name"])
		{
			$message .= '<p><strong>' . $row_geyser["name"] . ' ' . $count . 'шт - ' . $row_geyser["cost"] * $count * $sale . 'р</strong></p>';
		}

		$sum = $sum + $row_bombs["cost"] * $count * $sale;
		$sum = $sum + $row_soap["cost"] * $count * $sale;
		$sum = $sum + $row_geyser["cost"] * $count * $sale;
	}

	$message .= '<h2><strong>Итого: ' . $sum . 'р</strong></h2>';
	$message .= '<h3>Спасибо, что выбрали именно нас :)</h3>';
	// print_r ($names);

// $to = 'stasan94@gmail.com' . ',';
	$to = $_POST['email'];
	$subject = 'Заказ на сайте handmade.ru';
	$spectext = '<!DOCTYPE HTML><html><head><title>Заказ</title></head><body>';
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";

	$m = mail($to, $subject, $spectext.$message. '</body></html>', $headers);

	if ($m) {echo '1';} else {echo '0';}
	mysqli_close($connection);
}

function sendOrderEmailToAdmin(){
	$connection = connect();

	$message = '';
	$message .= '<h1>Заказ косметики ручной работы</h1>';
	$message .= '<h3>Покупатель: ' . $_POST['elastName'] . ' ' . $_POST['efirstName'] . '</h3>';
	$message .= '<h3>Номер телефона: ' . $_POST['ephone'] . '</h3>';
	$message .= '<h3>E-mail: ' . $_POST['email'] . '</h3>';
	$message .= '<h3>Способ доставки: ' . $_POST['edelivery'] . '</h3><br>';

	switch ($_POST['edelivery'])
	{
		case('самовывоз'):
		$message .= '<h3>Пункт самовывоза: ' . $_POST['eplace'] . '</h3><br>';
		break;

		case('доставка курьером'):
		$message .= '<h2>Адрес доставки:</h2>';
		$message .= '<h3>Улица: ' . $_POST['estreetCourier'] . '</h3>';
		$message .= '<h3>Дом: ' . $_POST['ehomeCourier'] . '</h3>';
		$message .= '<h3>Корпус: ' . $_POST['ekorpusCourier'] . '</h3>';
		$message .= '<h3>Строение: ' . $_POST['estroenieCourier'] . '</h3>';
		$message .= '<h3>Квартира: ' . $_POST['eflatCourier'] . '</h3>';
		$message .= '<h3>Подъезд: ' . $_POST['eentranceCourier'] . '</h3>';
		$message .= '<h3>Этаж: ' . $_POST['entranceCourier'] . '</h3>';
		$message .= '<h3>Этаж: ' . $_POST['efloorCourier'] . '</h3>';
		$message .= '<h3>Код домофона: ' . $_POST['ecodeCourier'] . '</h3><br>';
		break;

		case('доставка почтой России'):
		$message .= '<h2>Адрес доставки:</h2>';
		$message .= '<h3>Город: ' . $_POST['ecityPost'] . '</h3>';
		$message .= '<h3>Улица: ' . $_POST['estreetPost'] . '</h3>';
		$message .= '<h3>Дом: ' . $_POST['ehomePost'] . '</h3>';
		$message .= '<h3>Корпус: ' . $_POST['ekorpusPost'] . '</h3>';
		$message .= '<h3>Строение: ' . $_POST['estroeniePost'] . '</h3>';
		$message .= '<h3>Квартира: ' . $_POST['eflatPost'] . '</h3>';
		$message .= '<h3>Индекс: ' . $_POST['eindexPost'] . '</h3>';
		break;
	}

	$message .= '<h2>Заказ: </h2>';

	$cart = $_POST['cart'];
	$sale = $_POST['sale'];

	if ($sale == null)
	{
		$sale = 1;
	}

	$sum = 0;

	foreach ($cart as $name=>$count)
	{
		$query_bombs = "SELECT * FROM `bombs` WHERE `name` = '$name'";
		$result_bombs = mysqli_query($connection, $query_bombs);
		$row_bombs = mysqli_fetch_assoc($result_bombs);

		$query_soap = "SELECT * FROM `soap` WHERE `name` = '$name'";
		$result_soap = mysqli_query($connection, $query_soap);
		$row_soap = mysqli_fetch_assoc($result_soap);

		$query_geyser = "SELECT * FROM `geyser` WHERE `name` = '$name'";
		$result_geyser = mysqli_query($connection, $query_geyser);	
		$row_geyser = mysqli_fetch_assoc($result_geyser);

		if ($name == $row_bombs["name"])
		{
			$message .= '<h3><strong>' . $row_bombs["name"] . ' ' . $count . 'шт - ' . $row_bombs["cost"] * $count * $sale . 'р</strong></h3>';
		}

		elseif ($name == $row_soap["name"])
		{
			$message .= '<h3><strong>' . $row_soap["name"] . ' ' . $count . 'шт - ' . $row_soap["cost"] * $count * $sale . 'р</strong></h3>';
		}

		elseif ($name == $row_geyser["name"])
		{
			$message .= '<h3><strong>' . $row_geyser["name"] . ' ' . $count . 'шт - ' . $row_geyser["cost"] * $count * $sale . 'р</strong></h3>';
		}

		$sum = $sum + $row_bombs["cost"] * $count * $sale;
		$sum = $sum + $row_soap["cost"] * $count * $sale;
		$sum = $sum + $row_geyser["cost"] * $count * $sale;
	}

	$message .= '<h2><strong>Итого: ' . $sum . 'р</strong></h2>';
	// print_r ($names);

// $to = 'stasan94@gmail.com' . ',';
	$to = 'stasan94@gmail.com';
	$subject = 'Заказ на сайте handmade.ru';
	$spectext = '<!DOCTYPE HTML><html><head><title>Заказ</title></head><body>';
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";

	$m = mail($to, $subject, $spectext.$message. '</body></html>', $headers);

	// if ($m) {echo '1';} else {echo '0';}
	
	echo $sale;
	mysqli_close($connection);
}

function registration(){
	// Записываем данные о зарегистрировавшемся пользователе в БД
	// require_once 'templates/activation.php';
	$connection = connect();
	$rlogin = trim($_POST['rlogin']);
	$remail = trim($_POST['remail']);
	$rpassword = trim($_POST['rpassword']);

	$salt = generatePasswordSalt();
	$rpassword = md5($rpassword . $salt . $rlogin);

	$active_key = md5($rlogin . md5($rpassword . $salt) . $remail);

	$query_same_users = "SELECT `login`, `email` FROM `users` WHERE `login` = '$rlogin' OR `email` = '$remail'";
	$result_same_users = mysqli_query($connection, $query_same_users);
	$mass = mysqli_fetch_assoc($result_same_users);

	if ($mass['login'] == $rlogin)
	{
		echo 'same_login';
	}
	elseif ($mass['email'] == $remail)
	{
		echo 'same_email';
	}
	else
	{
		$query = "INSERT INTO `users` (`login`, `email`, `password`, `salt`, `active_key`, `verification`) VALUES ('$rlogin', '$remail', '$rpassword', '$salt', '$active_key', '0')";
		if (mysqli_query($connection, $query))
		{
			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";

			$message = '<h1>Здравствуйте, ' . $rlogin . '</h1><h3>Вы зарегистрировались на сайте handmade.ru. Для подтверждения регистрации перейдите по ссылке ниже:</h3><a href="http://handmade.ru/activation?login=' . $rlogin . '&active_key=' . $active_key . '"><h2>Подтвердить регистрацию</h2></a><br><h4>Если данное письмо попало к вам по ошибке, и вы нигде не регистрировались, просто проигнорируйте его.</h4><h4>С уважением, администрация сайта.</h4>';

			$subject = "Подтверждение регистрации на сайте handmade.ru";

			$m = mail($remail, $subject, $message, $headers);
			echo 'success';
		}
		else
		{
			mysqli_error($connection);
		}
		mysqli_close($connection);
	}
}

function generatePasswordSalt(){
	// Генерация случайной строки для соли пароля
	$chars = 'abcdefghjklmnoprstuvwxyzABCDEFGHJKLMNOPRSTUVXYZ1234567890';
	$salt = '';

	for ($i=0; $i<5; $i++){
		$salt .= $chars[rand(0, strlen($chars) - 1)];
	}
	return $salt;
}

function logIn(){
	// Проверяем есть ли в БД данный пользователь
	$connection = connect();
	$llogin = trim($_POST['llogin']);
	$lpassword = trim($_POST['lpassword']);

	$salt_query = "SELECT `salt`, `login` FROM `users` WHERE `login` = '$llogin' OR `email` = '$llogin'";
	$salt_result = mysqli_query($connection, $salt_query);
	$salt = mysqli_fetch_assoc($salt_result);


	$lpassword_db = md5($lpassword . $salt['salt'] . $salt['login']);

	$query = "SELECT `login`, `email`, `password`, `verification` FROM `users` WHERE `login` = '$llogin' OR `email` = '$llogin' AND `password` = '$lpassword_db'";
	$result = mysqli_query($connection, $query);
	$mass = mysqli_fetch_assoc($result);

	if ($mass)
	{
		echo json_encode($mass);
	}
	else
	{
		echo "0";
	}
	mysqli_close($connection);
}