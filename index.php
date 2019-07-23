<?php 
$route = $_GET['route'];

require 'templates/header.php';

switch ($route) {
	case '':
		require 'templates/home.php';
	break;

	case 'product_bombs':
		require 'templates/product_bombs.php';
	break;

	case 'product_soap':
		require 'templates/product_soap.php';
	break;

	case 'product_geyser':
		require 'templates/product_geyser.php';
	break;

	case 'cart':
		require 'templates/cart.php';
	break;

	case 'login':
		require 'templates/login.php';
	break;

	case 'registration':
		require 'templates/registration.php';
	break;

	case 'contact':
		require 'templates/contact.php';
	break;

	case 'privacy_policy':
		require 'templates/privacy_policy.php';
	break;

	case '404_eror':
		require 'templates/404_eror.php';
	break;

	case 'bombs':
		require 'templates/bombs.php';
	break;

	case 'soap':
		require 'templates/soap.php';
	break;

	case 'geyser':
		require 'templates/geyser.php';
	break;

	case 'adminpanel';
		require 'templates/adminpanel.php';
	break;

	case 'order';
		require 'templates/order.php';
	break;

	case 'wish';
		require 'templates/wish.php';
	break;

	case 'activation';
		require 'templates/activation.php';
	break;
	}

require 'templates/footer.php';