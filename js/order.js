var cart = {};

function sendOrderEmail(){
	// Отправка письма с заказом клиенту на почту
	cart = JSON.parse(localStorage.getItem('cart'));
	var sale = JSON.parse(sessionStorage.getItem('sale'));
	var elastName = $('#elast_name').val();
	var efirstName = $('#efirst_name').val();
	var email = $('#email').val();
	var ephone = $('#ephone').val();

	// Способ доставки
	var edelivery;
	switch ($('input[name=delivery]:checked').val())
	{
		case 'coming_shop':
		edelivery = 'самовывоз';
		break;

		case 'courier':
		edelivery = 'доставка курьером';
		break;

		case 'send_by_post':
		edelivery = 'доставка почтой России';
		break;
	}

	// Самовывоз
	var eplace;
	switch ($('#eplace').val())
	{
		case 'khimki':
		eplace = 'г. Химки, ул. Молодежная, д.3';
		break;

		case 'moscow':
		eplace = 'г. Москва, Светлый проезд, д.4, корп.1';
		break;
	}

	// Доставка курьером
	var estreetCourier = $('#estreet_courier').val();
	var ehomeCourier = $('#ehome_courier').val();
	var ekorpusCourier = $('#ekorpus_courier').val();
	var estroenieCourier = $('#estroenie_courier').val();
	var eflatCourier = $('#eflat_courier').val();
	var entranceCourier = $('#entrance_courier').val();
	var efloorCourier = $('#efloor_courier').val();
	var ecodeCourier = $('#ecode_courier').val();

	// Доставка почтой
	var ecityPost = $('#ecity_post').val();
	var estreetPost = $('#estreet_post').val();
	var ehomePost = $('#ehome_post').val();
	var ekorpusPost = $('#ekorpus_post').val();
	var estroeniePost = $('#estroenie_post').val();
	var eflatPost = $('#eflat_post').val();
	var eindexPost = $('#index_mask').val();

	if (elastName != '' && efirstName != '' && email != '' && ephone != '' && $('input[name=delivery]:checked'))
	{
		$.post(
			"admin/core.php",
			{
				"action" : "sendOrderEmailToAdmin",
				"cart" : cart,
				"sale" : sale,
				"elastName" : elastName,
				"efirstName" : efirstName,
				"email" : email,
				"ephone" : ephone,
				"edelivery" : edelivery,
				"eplace" : eplace,
				"estreetCourier" : estreetCourier,
				"ehomeCourier" : ehomeCourier,
				"ekorpusCourier" : ekorpusCourier,
				"estroenieCourier" : estroenieCourier,
				"eflatCourier" : eflatCourier,
				"entranceCourier" : entranceCourier,
				"efloorCourier" : efloorCourier,
				"ecodeCourier" : ecodeCourier,
				"ecityPost" : ecityPost,
				"estreetPost" : estreetPost,
				"ehomePost" : ehomePost,
				"ekorpusPost" : ekorpusPost,
				"estroeniePost" : estroeniePost,
				"eflatPost" : eflatPost,
				"eindexPost" : eindexPost
			}
			// function(data){
				// console.log(data);
				// if (data == '1')
				// {
				// 	// alert('Заказ отправлен!');
				// 	// var out = '';
				// 	// out += '<p>Ваш заказ успешно отправлен и будет обработан в ближайшее время!<br></p>';
				// 	$('.order_main').toggle(800);
				// 	$('.order_success, .order_success a').css("display" , "flex");
				// }
				// else
				// {
				// 	alert('Заказ не отправлен! Повторите попытку');
				// }
			// }
			);

		$.post(
			"admin/core.php",
			{
				"action" : "sendOrderEmailToCustomer",
				"cart" : cart,
				"sale" : sale,
				"elastName" : elastName,
				"efirstName" : efirstName,
				"email" : email,
				"ephone" : ephone
			},
			function(data){
				console.log(data);
				if (data == '1')
				{
					// alert('Заказ отправлен!');
					// var out = '';
					// out += '<p>Ваш заказ успешно отправлен и будет обработан в ближайшее время!<br></p>';
					$('.order_main').toggle(800);
					$('.order_success, .order_success a').css("display" , "flex");

					localStorage.removeItem('cart');
					sessionStorage.removeItem('sale');
				}
				else
				{
					alert('Заказ не отправлен! Повторите попытку');
				}
			}
			);
	}
	else
	{
		alert('Заполнены не все обязательные поля!');
	}
}

function regulAgree(){
	// Отравка формы только после согласия на обработку персональных данных
	// var agree = $('input[name=regul_agree]:checked');

	if ($('input[name=regul_agree]').hasClass('checked'))
	{
		$('#send_order_email').prop('disabled', false);
		$('#send_order_email').removeClass('disabled_button');
		$('#send_order_email').toggleClass('not_disabled_button');
		$('input[name=regul_agree]').removeClass('checked');
	}
	else
	{
		$('#send_order_email').prop('disabled', true);
		$('input[name=regul_agree]').toggleClass('checked');
		$('#send_order_email').removeClass('not_disabled_button');
		$('#send_order_email').toggleClass('disabled_button');
	}
}

function showPartOfForm(){
	// Показ необходимых элементов формы в зависимости от выбора способа доставки
	$('.delivery_radio_select').click(function(){
		var delivery = $('input[name=delivery]:checked').val();

		switch (delivery)
		{
			case 'coming_shop':
			$('.coming_shop').css("display" , "block");
			$('.courier').css("display" , "none");
			$('.send_by_post').css("display" , "none");
			break;

			case 'courier':
			$('.courier').css("display" , "block");
			$('.coming_shop').css("display" , "none");
			$('.send_by_post').css("display" , "none");
			break;

			case 'send_by_post':
			$('.send_by_post').css("display" , "block");
			$('.courier').css("display" , "none");
			$('.coming_shop').css("display" , "none");
			break;
		}
	})
}

function inputMasks(){
	// Маски для ввода некоторых полей
	$('#ephone').mask("8(999)999-99-99");
	$('#index_mask').mask("999999");
};

$(document).ready(function(){
	showPartOfForm();
	inputMasks();
	$('#send_order_email').click(sendOrderEmail);
	$('input[name=regul_agree]').click(regulAgree);
});