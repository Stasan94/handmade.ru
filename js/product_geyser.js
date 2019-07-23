var cart = {};
var wish = {};
var count = 1;

function init(){
	var hash = window.location.hash.substring(1);
	// console.log(hash);
	$.post(
		"admin/core.php",
		{
			"action" : "loadSingleGoodsGeyser",
			"id" : hash
		},
		goodsOutSingle
		);
}

function goodsOutSingle(data){
	// Вывод товара на страницу с его описанием
	if (data != 0)
	{
		data = JSON.parse(data);
		console.log(data);
		var outMain = '';
		var outTopic = '';
		var outName = '';
		// var total = '';

		for (var key in data)
		{
			console.log(key);
			outMain += '<div class="pictures">';
			outMain += '<div class="main_img_product">';
			outMain += '<img class="main_img" src="' + data[key].main_image + '" alt="">'; 
			outMain += '</div>';
			outMain += '<div class="second_img_product">';
			outMain += '<div class="second_img">';
			outMain += '<div class="second_img_img">';
			outMain += '<img src="' + data[key].second_image + '" alt">';	
			outMain += '</div>';	
			outMain += '<div class="magnifier_first">';	
			outMain += '<img src="images/magnifier_product.png">';
			outMain += '</div>';
			outMain += '</div>';
			outMain += '<div class="third_img">';
			outMain += '<div class="third_img_img">';
			outMain += '<img src="' + data[key].third_image + '" alt">';
			outMain += '</div>';		
			outMain += '<div class="magnifier_second">';
			outMain += '<img src="images/magnifier_product.png">';
			outMain += '</div>';
			outMain += '</div>';
			outMain += '</div>';
			outMain += '</div>';
			outMain += '<div class="info">';
			outMain += '<p>' + data[key].description + '</p>';
			outMain += '<p class="hide">' + data[key].full_description + '</p>';
			outMain += '<p class="more">Показать полностью</p>';
			outMain += '<div class="counts_price">';
			outMain += '<div class="plus_minus">';
			// outMain += '<button data-id="' + data[key].id + '" class="minus">-</button>';
			// outMain += '<p class="number">' + count + 'шт.</p>';
			// outMain += '<button data-id="' + data[key].id + '" class="plus">+</button>';
			outMain += '</div>';
			outMain += '<div class="total">';
			outMain += '<p>Итого: <span>' + data[key].cost * count + 'Р</span></p>';
			outMain += '</div>';
			outMain += '</div>';
			outMain += '<div class="bye_buttons">';
			outMain += '<button data-id="' + data[key].name + '" class="add_to_cart_product"><img src="images/button_cart.png" alt="">Добавить в корзину</button>';
			outMain += '<button data-id="' + data[key].name + '" class="add_to_wish">Добавить в список желаний</button>';
			outMain += '</div>';
			outMain += '</div>';

			outTopic += '<h1>' + data[key].name + '</h1>';
			outTopic += '<h1>' + data[key].cost + 'Р</h1>';

			outName += data[key].name;

			// total += '<p>Итого: <span>' + data[key].cost * cart[id] + 'Р</span></p>';
		}

		$('.product_left_main').html(outMain);
		$('.name_price_product_topic').html(outTopic);
		$('.nav_name').html(outName);
		// $('.total').html(total);

		countOut();

		function countOut(){
			// Вывод строки с количеством товара и суммой заказа
			var plusMinus = '';
			plusMinus += '<button class="minus">-</button>';
			plusMinus += '<p class="number">' + count + ' шт.</p>';
			plusMinus += '<button class="plus">+</button>';
			$('.plus_minus').html(plusMinus);

			var total = '';
			total += '<p>Итого: <span>' + data[key].cost * count + 'Р</span></p>';
			$('.total').html(total);

			$('.plus').click(plusGoods);
			$('.minus').click(minusGoods);

			$('.magnifier_first').click(showSecondImage);
			$('.magnifier_second').click(showThirdImage);
		}

		// $('.plus').click(plusGoods);
		// $('.minus').click(minusGoods);

		function plusGoods(){
			// Прибавить количество товара
			count++;
			countOut();
			console.log(count);
		}

		function minusGoods(){
			// Отнять количество товара
			if (count == 1)
			{
				count = 1;
			}
			else
			{
				count--;
			}
			countOut();
			console.log(count);
		}

		$('.add_to_cart_product').click(addToCart);
		$('.add_to_wish').click(addToWish);

		//Показ дополнительной информации на странице с описанием товара
		$('.hide').hide();
		$('.more').click(showInfo);

		var outFirst = '<img src="' + data[key].main_image + '" alt="">';
		var outSecond = '<img src="' + data[key].second_image + '" alt="">';
		var outThird = '<img src="' + data[key].third_image + '" alt="">';

		function showSecondImage(){
	// Делать вторую картинку основной
	
	if (outFirst == '<img src="' + data[key].main_image + '" alt="">' ||
		outFirst == '<img src="' + data[key].third_image + '" alt="">')
	{	
		outFirst = '<img src="' + data[key].second_image + '" alt="">';
		$('.main_img_product').html(outFirst);
		outSecond = '<img src="' + data[key].main_image + '" alt="">';
		$('.second_img_img').html(outSecond);
		outThird = '<img src="' + data[key].third_image + '" alt="">';
		$('.third_img_img').html(outThird);
	}
	else
	{
		outFirst = '<img src="' + data[key].main_image + '" alt="">';
		$('.main_img_product').html(outFirst);
		outSecond = '<img src="' + data[key].second_image + '" alt="">';
		$('.second_img_img').html(outSecond);
	}
}

function showThirdImage(){
	// Делать третью картинку основной
	
	if (outFirst == '<img src="' + data[key].main_image + '" alt="">' ||
		outFirst == '<img src="' + data[key].second_image + '" alt="">')
	{	
		outFirst = '<img src="' + data[key].third_image + '" alt="">';
		$('.main_img_product').html(outFirst);
		outSecond = '<img src="' + data[key].second_image + '" alt="">';
		$('.second_img_img').html(outSecond);
		outThird = '<img src="' + data[key].main_image + '" alt="">';
		$('.third_img_img').html(outThird);
	}
	else
	{
		outFirst = '<img src="' + data[key].main_image + '" alt="">';
		$('.main_img_product').html(outFirst);
		outThird = '<img src="' + data[key].third_image + '" alt="">';
		$('.third_img_img').html(outThird);
	}
}

}
else
{

}
}

function similarGoodsOutGeyser(){
	// Вывод похожих товаров
	var hash = window.location.hash.substring(1);
	$.post(
		"admin/core.php",
		{
			"action" : "similarGoodsOutGeyser",
			"id" : hash
		},
		function(data){
			data = JSON.parse(data);
			console.log(data);
			var out = '';
			for (var key in data)
			{
				out += '<div class="same_item">';
				out += '<a class="hash_change" href="product_geyser#' + key + '">';
				out += '<div class="same_item_bg">';
				out += '<img src="' + data[key].main_image + '">';
				out += '<div class="name_price_product">';
				out += '<p>' + data[key].name + '</p>';
				out += '<p>' + data[key].cost + 'Р</p>';
				out += '</div>';
				out += '</div>';
				out += '</a>';
				out += '</div>';
			}
			$('.product_right_main').html(out);
			$(window).bind('hashchange', function() { 
				location.reload();
			});
		});
}

function addToCart(){
	// Добавляем товар в корзину
	var id = $(this).attr('data-id');
	console.log(cart);

	if (cart[id] == undefined)
	{
		cart[id] = count;
		alert('Товар добален в корзину!');
	}
	else
	{
		cart[id] += count;
		// alert('Товар добален в корзину!');
	}
	saveCart();
	showCartInfo();
}

function saveCart(){
	// Сохраняем корзину в localStorage
	localStorage.setItem('cart', JSON.stringify(cart));
}

function loadCart(){
	if (localStorage.getItem('cart')){
		cart = JSON.parse(localStorage.getItem('cart'));
	}
}

function addToWish(){
	// Добавляем товар в список желаний
	var id = $(this).attr('data-id');
	console.log(id);
	if (wish[id] == undefined)
	{			
		wish[id] = count;
		alert('Товар добавлен в список желаний!');
	}
	else
	{
		alert('Данный товар уже находится в вашем списке желаний!');
	}	
	saveWish();
}

function saveWish(){
	// Сохраняем список желаний в localStorage
	localStorage.setItem('wish', JSON.stringify(wish));
}

function loadWish(){
	if (localStorage.getItem('wish'))
	{
		wish = JSON.parse(localStorage.getItem('wish'));
	}
}

function showInfo(){
	// Показывать дополнительное описание на странице с описанием товара
	$('.hide').toggleClass('open').slideToggle(500);
	if($('.hide').hasClass('open'))
	{
		$('.more').html('Скрыть');
	}
	else
	{
		$('.more').html('Показать полностью');
	}
}


$(document).ready(function(){
	init();
	loadCart();
	loadWish();
	similarGoodsOutGeyser();
});