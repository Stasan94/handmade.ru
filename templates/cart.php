<section class="cart">
	<div class="cart_container">
		<div class="cart_topic">
			<div class="cart_topic_left">
				<div class="navigation">
					<p><a href="http://handmade.ru">Главная</a></p>
					<p>Корзина</p>
				</div>
				<div class="cart_topic_cart">
					<h1>Ваша корзина</h1>
				</div>
			</div>
			<div class="cart_topic_right">
				<a href="order"><button class="order_button"><img src="images/button_cart.png" alt=""> Оформить заказ</button></a>
				<p><a onclick="javascript:history.back(); return false;">Вернуться к покупкам</a></p>
			</div>
		</div>
		<div class="cart_main">
			<table class="table">
				<tr>
					<th class="cart_photo">Фото</th>
					<th class="cart_name">Наименование</th>
					<th class="cart_cost">Цена</th>
					<th class="cart_count">Количество</th>
					<th class="cart_sum">Стоимость</th>
					<th class="cart_delete">Удалить</th>
				</tr>
				<tr class="cart_out">
					<!-- <td class="cart_photo"><img src="images/cart_img_1.png" alt=""></td>
					<td class="cart_name">Шоколадная</td>
					<td class="cart_cost">600р</td> -->
					<!-- <td class="cart_count"> -->
						<!-- <button>-</button>
						<p>1 шт.</p>
						<button>+</button> -->
						<!-- </td> -->
					<!-- <td class="cart_sum">1200р</td>
						<td class="cart_delete"><img src="images/delete_icon.png" alt=""></td> -->
					</tr>
				<!-- <tr class="cart_out">
					<td class="cart_photo"><img src="images/cart_img_2.png" alt=""></td>
					<td class="cart_name">Бомбочка</td>
					<td class="cart_cost">600р</td>
					<td class="cart_count">
						<button>-</button>
						<p>1 шт.</p>
						<button>+</button>
					</td>
					<td class="cart_sum">1200р</td>
					<td class="cart_delete"><img src="images/delete_icon.png" alt=""></td>
				</tr>
				<tr class="cart_out">
					<td class="cart_photo"><img src="images/cart_img_3.png" alt=""></td>
					<td class="cart_name"><p>Шоколадная бомбочка</p></td>
					<td class="cart_cost">600р</td>
					<td class="cart_count">
						<button>-</button>
						<p>1 шт.</p>
						<button>+</button>
					</td>
					<td class="cart_sum">1200р</td>
					<td class="cart_delete"><img src="images/delete_icon.png" alt="" class="rotate"></td>
				</tr> -->
			</table>
		</div>
		<div class="cart_order">
			<div class="cart_order_left">
				<h2>Оформление заказа:</h2>
				<div class="discount_code">
					<input type="text" placeholder="Введите промо код..." id="promo_code">		
					<button id="promo_code_button"><img src="images/arrow_right.png" alt=""></button>
				</div>
				<button class="refresh_cart" onclick="javascript:location.reload(); return false;"><img src="images/update_icon.png" alt=""> Обновить корзину</button>
			</div>
			<div class="cart_order_right">
				<p class="cart_total">
					Итого: <span>0Р</span>
				</p>
				<a href="order"><button class="order_button"><img src="images/button_cart.png" alt="">Оформить заказ</button></a>
				<p class="return_shop"><a onclick="javascript:history.back(); return false;">Вернуться к покупкам</a></p>
			</div>
		</div>
	</div>
</section>

<script src="js/cart.js"></script>