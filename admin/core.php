<?php

$action = $_POST['action'];

require_once 'function.php';

switch ($action)
{
	case 'loadGoodsBombs';
	loadGoodsBombs();
	break;

	case 'loadGoodsSoap';
	loadGoodsSoap();
	break;

	case 'loadGoodsGeyser';
	loadGoodsGeyser();
	break;

	case 'loadSingleGoodsBombs';
	loadSingleGoodsBombs();
	break;

	case 'similarGoodsOutBombs';
	similarGoodsOutBombs();
	break;

	case 'loadSingleGoodsSoap';
	loadSingleGoodsSoap();
	break;

	case 'similarGoodsOutSoap';
	similarGoodsOutSoap();
	break;

	case 'loadSingleGoodsGeyser';
	loadSingleGoodsGeyser();
	break;

	case 'similarGoodsOutGeyser';
	similarGoodsOutGeyser();
	break;

	case 'loadCart';
	loadCart();
	break;

	case 'loadWish';
	loadCart();
	break;

	case 'initBombs';
	initBombs();
	break;

	case 'initSoap';
	initSoap();
	break;

	case 'initGeyser';
	initGeyser();
	break;

	case 'selectOneGoodsBombs';
	selectOneGoodsBombs();
	break;

	case 'selectOneGoodsSoap';
	selectOneGoodsSoap();
	break;

	case 'selectOneGoodsGeyser';
	selectOneGoodsGeyser();
	break;

	case 'updateGoodsBombs';
	updateGoodsBombs();
	break;

	case 'updateGoodsSoap';
	updateGoodsSoap();
	break;

	case 'updateGoodsGeyser';
	updateGoodsGeyser();
	break;

	case 'newGoodsBombs';
	newGoodsBombs();
	break;

	case 'newGoodsSoap';
	newGoodsSoap();
	break;

	case 'newGoodsGeyser';
	newGoodsGeyser();
	break;

	case 'deleteGoodsBombs';
	deleteGoodsBombs();
	break;

	case 'deleteGoodsSoap';
	deleteGoodsSoap();
	break;

	case 'deleteGoodsGeyser';
	deleteGoodsGeyser();
	break;

	case 'sendOrderEmailToCustomer';
	sendOrderEmailToCustomer();
	break;

	case 'sendOrderEmailToAdmin';
	sendOrderEmailToAdmin();
	break;

	case 'promoCode';
	promoCode();
	break;

	case 'registration';
	registration();
	break;

	case 'logIn';
	logIn();
	break;
}