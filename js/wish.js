var cart = {};
var wish = {};

function loadWish(){
	// Проверяем есть ли в localStorage запись wish
	if (localStorage.getItem('wish'))
	{
		wish = JSON.parse(localStorage.getItem('wish'));
		if (isNotEmpty(wish))
		{
			showWish();
		}
		else
		{
			$('.catalog_main').html('<p class="empty_cart">Ваш список желаний пока пуст!<br><span>Для добавления нажмите на кнопку "Добавить в список желаний" на странице с понравившемся товаром</span><br><a onclick="javascript:history.back(); return false;">Вернуться к покупкам</a></p>');
		}
	}
	else
	{
		$('.catalog_main').html('<p class="empty_cart">Ваш список желаний пока пуст!<br><span>Для добавления нажмите на кнопку "Добавить в список желаний" на странице с понравившемся товаром</span><br><a onclick="javascript:history.back(); return false;">Вернуться к покупкам</a></p>');
	}
}

function showWish(){
	// Вывод списка желаний
	if (isNotEmpty(wish))
	{
		$.post(
			"admin/core.php",
			{
				"action" : "loadWish"
			},
			function(data)
			{
				data = JSON.parse(data);
				// console.log(data);
				var out = '';
				for (var key in wish)
				{
					// console.log(key);
					out += '<div class="goods">';
					if (data[key].name.indexOf("бомбочка") !== -1)
					{
						out += '<a href="product_bombs#' + data[key].id + '">';
					}
					else if (data[key].name.indexOf("мыло") !== -1)
					{
						out += '<a href="product_soap#' + data[key].id + '">';
					}
					else if (data[key].name.indexOf("гейзер") !== -1)
					{
						out += '<a href="product_geyser#' + data[key].id + '">';
					}
					out += '<div class="main_container">';
					out += '<img src="' + data[key].main_image + '" alt="">';
					out += '<div class="name_price name_price_good">';
					out += '<h3 class="wish_name">' + data[key].name + '</h3>';
					out += '<h3>' + data[key].cost + 'Р</h3>';
					out += '</div>';
					out += '<p class="good_description">' + data[key].description + '</p>';
					out += '</div>';
					out += '</a>';
					out += '<div class="buttons_container">';
					out += '<a href="product_bombs#' + data[key].id + '"><button class="view">Посмотреть</button></a>';
					out += '<button class="add_to_cart" data-id="' + data[key].name + '">Купить</button>';
					// out += '<button>Удалить</button>';
					out += '</div>';
					out += '<button data-id="' + key + '" class="delete_wish">Удалить</button>';
					out += '</div>';
				}
				$('.catalog_main').html(out);
				$('.delete_wish').click(deleteWishGoods);
				$('.add_to_cart').click(addToCart);
			}
			);
	}
	else
	{
		$('.catalog_main').html('<p class="empty_cart">Ваш список желаний пока пуст!<br><span>Для добавления нажмите на кнопку "Добавить в список желаний" на странице с понравившемся товаром</span><br><a>Вернуться к покупкам</a></p>');
	}
}

function deleteWishGoods(){
	// Удаление товаров из списка желаний
	var id = $(this).attr('data-id');
	// console.log(id);
	delete wish[id];
	saveWish();
	showWish();
}

function saveWish(){
	// Сохраняем список желаний в localStorage
	localStorage.setItem('wish', JSON.stringify(wish));
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

function isNotEmpty(object){
	//Проверка корзины на пустоту
	for (var key in object)
		if (object.hasOwnProperty(key)) return true;
	return false;
}

$(document).ready(function(){
	loadWish();
	loadCart();
});