var cart = {};
var user = {};
function showCartInfo(){
	var out = '';
	// for (var key in cart)
	// {
		if (Object.keys(cart).length == 0)
		{
			out = 'Ваша корзина пуста';
		}
		else
		{
			out = 'Корзина (' + Object.keys(cart).length + ')';
		}
	// }
	$('.cart_info').html(out);
}

function loadCart(){
	if (localStorage.getItem('cart')){
		cart = JSON.parse(localStorage.getItem('cart'));
	}
}

function showUserName(){
	var out = document.cookie.match('user');
	if (out != null)
	{
		$('.log_user_name').html(out['input'].substring(5).toUpperCase());
		$('.log_out').css("display", "flex");
	}
}

$(document).ready(function(){
	loadCart();
	showCartInfo();
	showUserName();
});