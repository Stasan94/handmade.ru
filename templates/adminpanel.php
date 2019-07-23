<section class="adminpanel">
	<h2>Товары</h2>
	
	<div class="admin_form">
		<div class="admin_select_goods">
			<div class="goods_out_bombs"></div>
			<div class="goods_out_soap"></div>
			<div class="goods_out_geyser"></div>
		</div>
		<div class="admin_form_line">
			<span class="good_names">Наименование: </span>
			<input type="text" id="gname_bombs" class="enter_line">
			<input type="text" id="gname_soap" class="enter_line">
			<input type="text" id="gname_geyser" class="enter_line">
		</div>
		<div  class="admin_form_line">
			<span class="good_names">Стоимость: </span>
			<input type="text" id="gcost_bombs" class="enter_line">
			<input type="text" id="gcost_soap" class="enter_line">
			<input type="text" id="gcost_geyser" class="enter_line">
		</div>
		<div  class="admin_form_line">
			<span class="good_names">Описание: </span>
			<textarea id="gdescr_bombs" class="enter_field" rows="3"></textarea>
			<textarea id="gdescr_soap" class="enter_field" rows="3"></textarea>
			<textarea id="gdescr_geyser" class="enter_field" rows="3"></textarea>
		</div>
		<div  class="admin_form_line">
			<span class="good_names">Полное описание: </span>
			<textarea id="gfull_descr_bombs" class="enter_field" rows="5"></textarea>
			<textarea id="gfull_descr_soap" class="enter_field" rows="5"></textarea>
			<textarea id="gfull_descr_geyser" class="enter_field" rows="5"></textarea>
		</div>
		<div  class="admin_form_line">
			<span class="good_names">Главное изображение: </span>
			<input type="text" id="gmain_image_bombs" class="enter_line">
			<input type="text" id="gmain_image_soap" class="enter_line">
			<input type="text" id="gmain_image_geyser" class="enter_line">
		</div>
		<div class="admin_form_line">
			<span class="good_names">Второе изображение: </span>
			<input type="text" id="gsecond_image_bombs" class="enter_line">
			<input type="text" id="gsecond_image_soap" class="enter_line">
			<input type="text" id="gsecond_image_geyser" class="enter_line">
		</div>
		<div class="admin_form_line">
			<span class="good_names">Третье изображение: </span>
			<input type="text" id="gthird_image_bombs" class="enter_line">
			<input type="text" id="gthird_image_soap" class="enter_line">
			<input type="text" id="gthird_image_geyser" class="enter_line">
		</div>
		<div class="admin_form_line">
			<span class="good_names">Изображение для корзины: </span>
			<input type="text" id="gcart_image_bombs" class="enter_line">
			<input type="text" id="gcart_image_soap" class="enter_line">
			<input type="text" id="gcart_image_geyser" class="enter_line">
		</div>
		<input type="hidden" id="hidden_name_bombs">
		<input type="hidden" id="hidden_name_soap">
		<input type="hidden" id="hidden_name_geyser">
		<div class="admin_buttons">
			<div class="admin_buttons_form">
				<button class="add_to_db_bombs">Добавить</button>
				<button class="change_to_db_bombs">Обновить</button>
				<button class="delete_from_db_bombs">Удалить</button>
			</div>

			<div class="admin_buttons_form">
				<button class="add_to_db_soap">Добавить</button>
				<button class="change_to_db_soap">Обновить</button>
				<button class="delete_from_db_soap">Удалить</button>
			</div>

			<div class="admin_buttons_form">
				<button class="add_to_db_geyser">Добавить</button>
				<button class="change_to_db_geyser">Обновить</button>
				<button class="delete_from_db_geyser">Удалить</button>
			</div>
		</div>
	</div>

</section>

<script src="js/adminpanel.js"></script>