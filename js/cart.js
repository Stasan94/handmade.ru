var cart = {};
var sale;
var promoSale = {};

function loadCart(){
	// Проверяем есть ли в localStorage запись cart
	if (localStorage.getItem('cart'))
	{
		cart = JSON.parse(localStorage.getItem('cart'));
		if (isNotEmpty(cart))
		{
			showMainCart();
		}
		else
		{		
			$('.cart_main').html('<p class="empty_cart">Ваша корзина пуста!<br><span>Для оформления заказа добавьте в корзину хотя бы один товар</span><br><a onclick="javascript:history.back(); return false;">Вернуться к покупкам</a></p>');
		}
	}
	else
	{
		$('.cart_main').html('<p class="empty_cart">Ваша корзина пуста!<br><span>Для оформления заказа добавьте в корзину хотя бы один товар</span><br><a onclick="javascript:history.back(); return false;">Вернуться к покупкам</a></p>');
	}
}

function showMainCart(){
	// Вывод содержимого корзины
	if (isNotEmpty(cart))
	{
		$.post(
			"admin/core.php",
			{
				"action" : "loadCart"
			},
			function(data)
			{
				data = JSON.parse(data);
				console.log(data);
				console.log(cart);
				var out = '';
				var total = 0;

				sale = sessionStorage.getItem('sale');
				if (sale == null)
				{
					sale = 1;
				}

				for (var key in cart)
				{
						// out += '<tr>';
						out += '<td class="cart_photo"><img src="' + data[key].cart_image + '" alt=""></td>';
						if (data[key].name.indexOf("бомбочка") !== -1)
						{
							out += '<td class="cart_name"><a href="product_bombs#' + data[key].id + '">' + data[key].name + '</a></td>';
						}
						else if (data[key].name.indexOf("мыло") !== -1)
						{
							out += '<td class="cart_name"><a href="product_soap#' + data[key].id + '">' + data[key].name + '</a></td>';
						}	
						else if (data[key].name.indexOf("гейзер") !== -1)
						{
							out += '<td class="cart_name"><a href="product_geyser#' + data[key].id + '">' + data[key].name + '</a></td>';
						}	
						out += '<td class="cart_cost">' + data[key].cost * sale + 'р</td>';
						out += '<td class="cart_count"><button data-id="' + key + '" class="minus_goods">-</button><p>' + cart[key] + ' шт</p><button data-id="' + key + '" class="plus_goods">+</button></td>';
						out += '<td class="cart_sum">' + data[key].cost * cart[key] * sale + 'р</td>';
						out += '<td class="cart_delete"><img src="images/delete_icon.png" alt="" data-id="' + key + '" class="delete_goods"></td>';
						// out += '</tr>';
						total += data[key].cost * cart[key] * sale;
					}
					$('.cart_out').html(out);
					$('.plus_goods').click(plusGoods);
					$('.minus_goods').click(minusGoods);
					$('.delete_goods').click(deleteGoods);

					var outTotal = 'Итого: <span class="itogo">' + total + 'р</span>';
					$('.cart_total').html(outTotal);
				}
				);
	}
	else
	{
		$('.cart_main').html('<p class="empty_cart">Ваша корзина пуста!<br><span>Для оформления заказа добавьте в корзину хотя бы один товар</span><br><a>Вернуться к покупкам</a></p>');
	}
}

function plusGoods(){
	var id = $(this).attr('data-id');
	console.log(cart[id]);
	cart[id]++;
	saveCart();
	showMainCart();
}

function minusGoods(){
	var id = $(this).attr('data-id');
	if (cart[id] == 1)
	{
		cart[id] = 1;
	}
	else
	{
		cart[id]--;
	}
	saveCart();
	showMainCart();
}

function deleteGoods(){
	var id = $(this).attr('data-id');
	delete cart[id];
	saveCart();
	showMainCart();
	showCartInfo();
}

function saveCart(){
	// Сохранение корзины в localStorage
	localStorage.setItem('cart', JSON.stringify(cart));
}

function stopIfEmpty(){
	// Запрет перехода к оформлению заказа при пустой корзине
	if (Object.keys(cart).length == 0){
		alert("Ваша корзина пуста! \nДля оформления заказа добавьте в корзину хотя бы один товар");
		return false;
	}
}

function isNotEmpty(object){
	//Проверка корзины на пустоту
	for (var key in object)
		if (object.hasOwnProperty(key)) return true;
	return false;
}

function promoCode(){
	// Изменение цен после введения промокода
	var promo = $("#promo_code").val();
	$.post(
		"admin/core.php",
		{
			"action" : "promoCode",
			"promo" : promo
		},
		function(data){
			if (data != '0')
			{
				data = JSON.parse(data);
				sale = parseFloat(data.sale);
				sessionStorage.setItem('sale', JSON.stringify(sale));
				showMainCart();
			}
			else{
				alert("Введенного вами промокода не существует!");
			}
		}
		);
}

$(document).ready(function(){
	loadCart();
	$('.order_button').click(stopIfEmpty);
	$('#promo_code_button').click(promoCode);
});