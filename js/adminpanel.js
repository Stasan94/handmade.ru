function initBombs(){
	$.post(
		"admin/core.php",
		{
			"action" : "initBombs"
		},
		showGoodsBombs
		);
}

function initSoap(){
	$.post(
		"admin/core.php",
		{
			"action" : "initSoap"
		},
		showGoodsSoap
		);
}

function initGeyser(){
	$.post(
		"admin/core.php",
		{
			"action" : "initGeyser"
		},
		showGoodsGeyser
		);
}

function showGoodsBombs(data){
	// Вывод списка товаров из таблицы с бомбочками в select для страницы с админкой
	data = JSON.parse(data);
	console.log(data);
	var out = '';
	out += '<h3>Бомбочки</h3>';
	out += '<select>';
	out += '<option data-id="0">Новый товар</option>';
	for (var key in data)
	{
		out += '<option data-id="' + data[key].name + '">' + data[key].name + '</option>';
	}
	out += '</select>';

	$('.goods_out_bombs').html(out);
	$('.goods_out_bombs select').change(selectGoodsBombs);
}

function showGoodsSoap(data){
	// Вывод списка товаров из таблицы с мылом в select для страницы с админкой
	data = JSON.parse(data);
	console.log(data);
	var out = '';
	out += '<h3>Мыло</h3>';
	out += '<select>';
	out += '<option data-id="0">Новый товар</option>';
	for (var key in data)
	{
		out += '<option data-id="' + data[key].name + '">' + data[key].name + '</option>';
	}
	out += '</select>';

	$('.goods_out_soap').html(out);
	$('.goods_out_soap select').change(selectGoodsSoap);
}

function showGoodsGeyser(data){
	// Вывод списка товаров из таблицы с гейзерами в select для страницы с админкой
	data = JSON.parse(data);
	console.log(data);
	var out = '';
	out += '<h3>Гейзеры</h3>';
	out += '<select>';
	out += '<option data-id="0">Новый товар</option>';
	for (var key in data)
	{
		out += '<option data-id="' + data[key].name + '">' + data[key].name + '</option>';
	}
	out += '</select>';

	$('.goods_out_geyser').html(out);
	$('.goods_out_geyser select').change(selectGoodsGeyser);
}

function selectGoodsBombs(){
	// Выбор товара из таблицы с бомбочками для отображения информации о нем для страницы с админкой
	var name = $('.goods_out_bombs select option:selected').attr('data-id');
	// console.log(name);
	$.post(
		"admin/core.php",
		{
			"action" : "selectOneGoodsBombs",
			"gname" : name
		},
		function(data){
			data = JSON.parse(data);
			// console.log(data);
			$('#gname_bombs').val(data.name);
			$('#gcost_bombs').val(data.cost);
			$('#gdescr_bombs').val(data.description);
			$('#gfull_descr_bombs').val(data.full_description);
			$('#gmain_image_bombs').val(data.main_image);
			$('#gsecond_image_bombs').val(data.second_image);
			$('#gthird_image_bombs').val(data.third_image);
			$('#gcart_image_bombs').val(data.cart_image);
			$('#hidden_name_bombs').val(data.name);
		}
		);
}

function selectGoodsSoap(){
	// Выбор товара из таблицы с мылом для отображения информации о нем для страницы с админкой
	var name = $('.goods_out_soap select option:selected').attr('data-id');
	// console.log(name);
	$.post(
		"admin/core.php",
		{
			"action" : "selectOneGoodsSoap",
			"gname" : name
		},
		function(data){
			data = JSON.parse(data);
			// console.log(data);
			$('#gname_soap').val(data.name);
			$('#gcost_soap').val(data.cost);
			$('#gdescr_soap').val(data.description);
			$('#gfull_descr_soap').val(data.full_description);
			$('#gmain_image_soap').val(data.main_image);
			$('#gsecond_image_soap').val(data.second_image);
			$('#gthird_image_soap').val(data.third_image);
			$('#gcart_image_soap').val(data.cart_image);
			$('#hidden_name_soap').val(data.name);
		}
		);
}

function selectGoodsGeyser(){
	// Выбор товара из таблицы с гейзерами для отображения информации о нем для страницы с админкой
	var name = $('.goods_out_geyser select option:selected').attr('data-id');
	// console.log(name);
	$.post(
		"admin/core.php",
		{
			"action" : "selectOneGoodsGeyser",
			"gname" : name
		},
		function(data){
			data = JSON.parse(data);
			// console.log(data);
			$('#gname_geyser').val(data.name);
			$('#gcost_geyser').val(data.cost);
			$('#gdescr_geyser').val(data.description);
			$('#gfull_descr_geyser').val(data.full_description);
			$('#gmain_image_geyser').val(data.main_image);
			$('#gsecond_image_geyser').val(data.second_image);
			$('#gthird_image_geyser').val(data.third_image);
			$('#gcart_image_geyser').val(data.cart_image);
			$('#hidden_name_geyser').val(data.name);
		}
		);
}

function saveToDBBombs(){
	// Добавление товара бомбочки в БД для страницы с админкой
	var hiddenName = $('#hidden_name_bombs').val();
	console.log(hiddenName);
	if (hiddenName == '')
	{
		if ($('#gname_bombs').val() !== '')
		{
			$.post(
				"admin/core.php",
				{
					"action" : "newGoodsBombs",
					"name" : $('#gname_bombs').val(),
					"gcost" : $('#gcost_bombs').val(),
					"gdescr" : $('#gdescr_bombs').val(),
					"gfull_descr" : $('#gfull_descr_bombs').val(),
					"gmain_image" : $('#gmain_image_bombs').val(),
					"gsecond_image" : $('#gsecond_image_bombs').val(),
					"gthird_image" : $('#gthird_image_bombs').val(),
					"gcart_image" : $('#gcart_image_bombs').val(),
					"hidden_name" : $('#hidden_name_bombs').val()
				},
				function(data)
				{
					if (data == 1)
					{
						alert('Товар добавлен!');
						init();
					}
					else
					{
						console.log(data);
					}
				}
				);
		}
		else
		{
			alert('Добавление товара с пустым именем невозможно!');
		}
	}
	else
	{
		alert('Такой товар уже существует!');
	}
}

function saveToDBSoap(){
	// Добавление товара мыло в БД для страницы с админкой
	var hiddenName = $('#hidden_name_soap').val();
	console.log(hiddenName);
	if (hiddenName == '')
	{
		if ($('#gname_soap').val() !== '')
		{
			$.post(
				"admin/core.php",
				{
					"action" : "newGoodsSoap",
					"name" : $('#gname_soap').val(),
					"gcost" : $('#gcost_soap').val(),
					"gdescr" : $('#gdescr_soap').val(),
					"gfull_descr" : $('#gfull_descr_soap').val(),
					"gmain_image" : $('#gmain_image_soap').val(),
					"gsecond_image" : $('#gsecond_image_soap').val(),
					"gthird_image" : $('#gthird_image_soap').val(),
					"gcart_image" : $('#gcart_image_soap').val(),
					"hidden_name" : $('#hidden_name_soap').val()
				},
				function(data)
				{
					if (data == 1)
					{
						alert('Товар добавлен!');
						init();
					}
					else
					{
						console.log(data);
					}
				}
				);
		}
		else
		{
			alert('Добавление товара с пустым именем невозможно!');
		}
	}
	else
	{
		alert('Такой товар уже существует!');
	}
}

function saveToDBGeyser(){
	// Добавление товара гейзеры в БД для страницы с админкой
	var hiddenName = $('#hidden_name_geyser').val();
	console.log(hiddenName);
	if (hiddenName == '')
	{
		if ($('#gname_geyser').val() !== '')
		{
			$.post(
				"admin/core.php",
				{
					"action" : "newGoodsGeyser",
					"name" : $('#gname_geyser').val(),
					"gcost" : $('#gcost_geyser').val(),
					"gdescr" : $('#gdescr_geyser').val(),
					"gfull_descr" : $('#gfull_descr_geyser').val(),
					"gmain_image" : $('#gmain_image_geyser').val(),
					"gsecond_image" : $('#gsecond_image_geyser').val(),
					"gthird_image" : $('#gthird_image_geyser').val(),
					"gcart_image" : $('#gcart_image_geyser').val(),
					"hidden_name" : $('#hidden_name_geyser').val()
				},
				function(data)
				{
					if (data == 1)
					{
						alert('Товар добавлен!');
						init();
					}
					else
					{
						console.log(data);
					}
				}
				);
		}
		else
		{
			alert('Добавление товара с пустым именем невозможно!');
		}
	}
	else
	{
		alert('Такой товар уже существует!');
	}
}

function changeToDBBombs(){
	// Изменение товара в БД для страницы с админкой
	var hiddenName = $('#hidden_name_bombs').val();
	console.log(hiddenName);
	if (hiddenName != '')
	{
		$.post(
			"admin/core.php",
			{
				"action" : "updateGoodsBombs",
				"name" : $('#gname_bombs').val(),
				"gcost" : $('#gcost_bombs').val(),
				"gdescr" : $('#gdescr_bombs').val(),
				"gfull_descr" : $('#gfull_descr_bombs').val(),
				"gmain_image" : $('#gmain_image_bombs').val(),
				"gsecond_image" : $('#gsecond_image_bombs').val(),
				"gthird_image" : $('#gthird_image_bombs').val(),
				"gcart_image" : $('#gcart_image_bombs').val(),
				"hidden_name" : $('#hidden_name_bombs').val()
			},
			function(data)
			{
				if (data == 1)
				{
					alert('Товар обновлен!');
					init();
				}
				else
				{
					console.log(data);
				}
			}
			);
	}
	else
	{
		alert('Такого товара не существует!');
	}
}

function changeToDBSoap(){
	// Изменение товара в БД для страницы с админкой
	var hiddenName = $('#hidden_name_soap').val();
	console.log(hiddenName);
	if (hiddenName != '')
	{
		$.post(
			"admin/core.php",
			{
				"action" : "updateGoodsSoap",
				"name" : $('#gname_soap').val(),
				"gcost" : $('#gcost_soap').val(),
				"gdescr" : $('#gdescr_soap').val(),
				"gfull_descr" : $('#gfull_descr_soap').val(),
				"gmain_image" : $('#gmain_image_soap').val(),
				"gsecond_image" : $('#gsecond_image_soap').val(),
				"gthird_image" : $('#gthird_image_soap').val(),
				"gcart_image" : $('#gcart_image_soap').val(),
				"hidden_name" : $('#hidden_name_soap').val()
			},
			function(data)
			{
				if (data == 1)
				{
					alert('Товар обновлен!');
					init();
				}
				else
				{
					console.log(data);
				}
			}
			);
	}
	else
	{
		alert('Такого товара не существует!');
	}
}

function changeToDBGeyser(){
	// Изменение товара в БД для страницы с админкой
	var hiddenName = $('#hidden_name_geyser').val();
	console.log(hiddenName);
	if (hiddenName != '')
	{
		$.post(
			"admin/core.php",
			{
				"action" : "updateGoodsGeyser",
				"name" : $('#gname_geyser').val(),
				"gcost" : $('#gcost_geyser').val(),
				"gdescr" : $('#gdescr_bombs').val(),
				"gfull_descr" : $('#gfull_descr_geyser').val(),
				"gmain_image" : $('#gmain_image_geyser').val(),
				"gsecond_image" : $('#gsecond_image_geyser').val(),
				"gthird_image" : $('#gthird_image_geyser').val(),
				"gcart_image" : $('#gcart_image_geyser').val(),
				"hidden_name" : $('#hidden_name_geyser').val()
			},
			function(data)
			{
				if (data == 1)
				{
					alert('Товар обновлен!');
					init();
				}
				else
				{
					console.log(data);
				}
			}
			);
	}
	else
	{
		alert('Такого товара не существует!');
	}
}

function deleteFromDBBombs(){
	// Удаление товара в БД для страницы с админкой
	var hiddenName = $('#hidden_name_bombs').val();
	// console.log(hiddenName);
	if (hiddenName != '')
	{
		$.post(
			"admin/core.php",
			{
				"action" : "deleteGoodsBombs",
				// "name" : $('#gname').val(),
				// "gcost" : $('#gcost').val(),
				// "gdescr" : $('#gdescr').val(),
				// "gfull_descr" : $('#gfull_descr').val(),
				// "gmain_image" : $('#gmain_image').val(),
				// "gsecond_image" : $('#gsecond_image').val(),
				// "gthird_image" : $('#gthird_image').val(),
				// "gcart_image" : $('#gcart_image').val(),
				"hidden_name" : hiddenName
			},
			function(data)
			{
				if (data == 1)
				{
					alert('Товар удален!');
					init();
				}
				else
				{
					console.log(data);
				}
			}
			);
	}
	else
	{
		alert('Такого товара не существует!');
	}
}

function deleteFromDBSoap(){
	// Удаление товара в БД для страницы с админкой
	var hiddenName = $('#hidden_name_soap').val();
	// console.log(hiddenName);
	if (hiddenName != '')
	{
		$.post(
			"admin/core.php",
			{
				"action" : "deleteGoodsSoap",
				// "name" : $('#gname').val(),
				// "gcost" : $('#gcost').val(),
				// "gdescr" : $('#gdescr').val(),
				// "gfull_descr" : $('#gfull_descr').val(),
				// "gmain_image" : $('#gmain_image').val(),
				// "gsecond_image" : $('#gsecond_image').val(),
				// "gthird_image" : $('#gthird_image').val(),
				// "gcart_image" : $('#gcart_image').val(),
				"hidden_name" : hiddenName
			},
			function(data)
			{
				if (data == 1)
				{
					alert('Товар удален!');
					init();
				}
				else
				{
					console.log(data);
				}
			}
			);
	}
	else
	{
		alert('Такого товара не существует!');
	}
}

function deleteFromDBGeyser(){
	// Удаление товара в БД для страницы с админкой
	var hiddenName = $('#hidden_name_geyser').val();
	// console.log(hiddenName);
	if (hiddenName != '')
	{
		$.post(
			"admin/core.php",
			{
				"action" : "deleteGoodsGeyser",
				// "name" : $('#gname').val(),
				// "gcost" : $('#gcost').val(),
				// "gdescr" : $('#gdescr').val(),
				// "gfull_descr" : $('#gfull_descr').val(),
				// "gmain_image" : $('#gmain_image').val(),
				// "gsecond_image" : $('#gsecond_image').val(),
				// "gthird_image" : $('#gthird_image').val(),
				// "gcart_image" : $('#gcart_image').val(),
				"hidden_name" : hiddenName
			},
			function(data)
			{
				if (data == 1)
				{
					alert('Товар удален!');
					init();
				}
				else
				{
					console.log(data);
				}
			}
			);
	}
	else
	{
		alert('Такого товара не существует!');
	}
}

$(document).ready(function(){
	initBombs();
	initSoap();
	initGeyser();
	$('.add_to_db_bombs').click(saveToDBBombs);
	$('.change_to_db_bombs').click(changeToDBBombs);
	$('.delete_from_db_bombs').click(deleteFromDBBombs);

	$('.add_to_db_soap').click(saveToDBSoap);
	$('.change_to_db_soap').click(changeToDBSoap);
	$('.delete_from_db_soap').click(deleteFromDBSoap);

	$('.add_to_db_geyser').click(saveToDBGeyser);
	$('.change_to_db_geyser').click(changeToDBGeyser);
	$('.delete_from_db_geyser').click(deleteFromDBGeyser);
});