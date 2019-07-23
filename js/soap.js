var cart = {}; //Корзина

function init(){
	$.post(
		"admin/core.php",
		{
			"action" : "loadGoodsSoap"
		},
		goodsOut
	);
}

function goodsOut(data){
	data = JSON.parse(data);
	// Вывод товара на страницу с бомбочками
	// console.log(data);
	var out = '';
	for (var key in data)
	{
		out += '<div class="goods">';
			out += '<a href="product_soap#' + (data.length - key) + '">';
				out += '<div class="main_container">';
					out += '<img src="' + data[key].main_image + '" alt="">';
					out += '<div class="name_price name_price_good">';
						out += '<h3>' + data[key].name + '</h3>';
						out += '<h3>' + data[key].cost + 'Р</h3>';
					out += '</div>';
					out += '<p class="good_description">' + data[key].description + '</p>';
				out += '</div>';
			out += '</a>';
				out += '<div class="buttons_container">';
					out += '<a href="product_soap#' + (data.length - key) + '"><button class="view">Посмотреть</button></a>';
					out += '<button class="add_to_cart" data-id="' + data[key].name + '">Купить</button>';
				out += '</div>';
		out += '</div>';
	}
	$('.catalog_main').html(out);
	$('.add_to_cart').click(addToCart);
}

function addToCart(){
	// Добавляем товар в корзину
	var id = $(this).attr('data-id');

	if (cart[id] == undefined)
	{
		cart[id] = 1;
		alert('Товар добален в корзину!');
	}
	else
	{
		cart[id]++;
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

$(document).ready(function(){
	loadCart();
	init();
});