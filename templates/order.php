<section class="order">
	<div class="order_container">
		<div class="catalog_topic">
			<div class="navigation">
				<p><a href="http://handmade.ru">Главная</a></p>
				<p><a href="cart">Корзина</a></p>
				<p>Оформление заказа</p>
			</div>
			<div class="category">
				<h1>Оформление заказа</h1>
			</div>
		</div>
		<div class="order_main">
			<!-- <form> -->
				<h2>Заполните форму</h2>
				<p class="order_comment">Поля отмеченные символом &nbsp;<span class="red_star">*</span>&nbsp; обязательны для заполнения</p>
				<p><label><span class="order_lines">Фамилия: <span class="red_star">*</span></span><input id="elast_name" type="text" required></label></p>
				<p><label><span class="order_lines">Имя: <span class="red_star">*</span></span><input id="efirst_name" type="text" required></label></p>
				<p><label><span class="order_lines">E-mail: <span class="red_star">*</span></span><input id="email" type="email" required></label></p>
				<p><label><span class="order_lines">Телефон: <span class="red_star">*</span></span><input id="ephone" type="text" required></label></p>
				<div class="delivery_select">
					<p class="radio_select">Способ доставки: <span class="red_star">*</span></p>
					<div class="delivery_radio">
						<p><label><input type="radio" name="delivery" class="delivery_radio_select" value="coming_shop">Самовывоз</label></p>
						<p><label><input type="radio" name="delivery" class="delivery_radio_select" value="courier">Курьером</label></p>
						<p><label><input type="radio" name="delivery" class="delivery_radio_select" value="send_by_post">Почтой России</label></p>
					</div>
				</div>
				<div class="delivery_out"></div>
				<div class="coming_shop">
					<p>Выберете наиболее удобный для вас пункт выдачи товара</p>
					<select id="eplace">
						<option value="khimki">г. Химки, ул. Молодежная, д.3</option>
						<option value="moscow">г. Москва, Светлый проезд, д.4, корп.1</option>
					</select>
				</div>
				<div class="courier">
					<p class="order_comment">Доставка курьерам осуществляется в пределах Москвы</p>
					<p><span class="order_lines">Улица: <span class="red_star">*</span></span><input type="text" id="estreet_courier"></p>
					<p><span class="order_lines">Дом: <span class="red_star">*</span></span><input type="text" id="ehome_courier"></p>
					<p><span class="order_lines">Корпус: </span><input type="text" id="ekorpus_courier"></p>
					<p><span class="order_lines">Строение: </span><input type="text" id="estroenie_courier"></p>
					<p><span class="order_lines">Квартира: <span class="red_star">*</span></span><input type="text" id="eflat_courier"></p>
					<p><span class="order_lines">Подъезд: </span><input type="text" id="entrance_courier"></p>
					<p><span class="order_lines">Этаж: </span><input type="text" id="efloor_courier"></p>
					<p><span class="order_lines">Домофон: </span><input type="text" id="ecode_courier"></p>
				</div>
				<div class="send_by_post">
					<p class="order_comment">Доставка почтой России за пределы России не осуществляется</p>
					<p class="order_comment">Стоимость отправки входит в стоимость заказа</p>
					<p><span class="order_lines">Город: <span class="red_star">*</span></span><input type="text" id="ecity_post"></p>
					<p><span class="order_lines">Улица: <span class="red_star">*</span></span><input type="text" id="estreet_post"></p>
					<p><span class="order_lines">Дом: <span class="red_star">*</span></span><input type="text" id="ehome_post"></p>
					<p><span class="order_lines">Корпус: </span><input type="text" id="ekorpus_post"></p>
					<p><span class="order_lines">Строение: </span><input type="text" id="estroenie_post"></p>
					<p><span class="order_lines">Квартира: <span class="red_star">*</span></span><input type="text" id="eflat_post"></p>
					<p><span class="order_lines">Индекс: <span class="red_star">*</span></span><input id="index_mask" type="text"></p>
				</div>
				<div class="pay_select">
					<p class="radio_select">Способ оплаты: <span class="red_star">*</span></p>
					<div class="pay_radio">
						<p><label><input type="radio" name="pay" checked>Наличными</label></p>
						<p><label><input type="radio" name="pay">Банковской картой</label></p>
					</div>
				</div>
				<div class="data_agree">
					<p><label><input type="checkbox" name="regul_agree" class="checked">Я согласен на обработку своих персональных данных</label></p>
				</div>
				<button id="send_order_email" class="disabled_button" disabled>Оформить заказ</button>
				<!-- </form> -->
			</div>
			<p class="order_success">Спасибо за покупку!</p>
			<p class="order_success">Ваш заказ успешно отправлен и будет обработан в ближайшее время!</p>
			<p class="order_success">Для подтверждения деталей заказа наш сотрудник свяжется с вами в течение 30 минут.</p>
			<p class="order_success"><a href="http://handmade.ru">Вернуться на главную</a></p>
		</div>
	</section>

	<script src="js/order.js"></script>
	<script src="js/jquery.maskedinput/jquery.maskedinput.min.js"></script>
