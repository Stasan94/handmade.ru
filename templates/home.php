<section class="home">
	<main class="main_home">
		<div class="slider">
			<img src="images/main_slider_1.png" alt="">
			<img src="images/main_slider_2.png" alt="">
			<img src="images/main_slider_3.png" alt="">
		</div>
		<aside class="aside_home">
			<div class="aside_slider">
				<div class="aside_slider_content">
					<img src="images/aside_slider.png" alt="">
				</div>
			</div>
			<div class="news">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, nihil.</p>
				<img src="images/news.png" alt="">
				<input type="text" placeholder="Email...">
				<button><img src="images/arrow_right.png" alt=""></button>
			</div>
		</aside>
	</main>
	<div class="new_products">
		<div class="new_products_topic">
			<h1>Новинки</h1>
		</div>
		<div class="new_products_main">
			<div class="new_good_top">
				<div class="new_good">
					<a href=""><img src="images/new_products_1.png" alt=""></a>
					<div class="name_price">
						<a href=""><h3>Ванильный гейзер</h3></a>
						<h3>150р</h3>
					</div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo nam suscipit, nisi facere, dolores est!</p>
					<div class="view_container"><button class="view">Посмотреть</button></div>
					<button class="add_to_cart">Купить</button>
				</div>
				<div class="new_good">
					<a href=""><img src="images/new_products_2.png" alt=""></a>
					<div class="name_price">
						<a href=""><h3>Шоколадная бомбочка</h3></a>
						<h3>150р</h3>
					</div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo nam suscipit, nisi facere, dolores est!</p>
					<div class="view_container"><button class="view">Посмотреть</button></div>
					<button class="add_to_cart">Купить</button>
				</div>
			</div>
			<div class="new_good_down">
				<div class="new_good">
					<a href=""><img src="images/new_products_3.png" alt=""></a>
					<div class="name_price">
						<a href=""><h3>Мыло с лепестками роз</h3></a>
						<h3>150р</h3>
					</div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo nam suscipit, nisi facere, dolores est!</p>
					<div class="view_container"><button class="view">Посмотреть</button></div>
					<button class="add_to_cart">Купить</button>
				</div>
				<div class="new_good">
					<a href=""><img src="images/new_products_4.png" alt=""></a>
					<div class="name_price">
						<a href=""><h3>Персиковая бомбочка</h3></a>
						<h3>150р</h3>
					</div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo nam suscipit, nisi facere, dolores est!</p>
					<div class="view_container"><button class="view">Посмотреть</button></div>
					<button class="add_to_cart">Купить</button>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="featured_products">
	<div class="featured_products_topic">
		<h1>Топ продаж</h1>
	</div>
	<div class="featured_products_main">
		<div class="featured_good_top">
			<div class="featured_good">
				<a href=""><img src="images/featured_products_1.png" alt=""></a>
				<div class="name_price">
					<a href=""><h3>Клубничная бомбочка</h3></a>
					<h3>150р</h3>
				</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo nam suscipit, nisi facere, dolores est!</p>
				<div class="view_container"><button class="view">Посмотреть</button></div>
				<button class="add_to_cart">Купить</button>
			</div>
			<div class="featured_good">
				<a href=""><img src="images/featured_products_2.png" alt=""></a>
				<div class="name_price">
					<a href=""><h3>Шоколадная бомбочка</h3></a>
					<h3>150р</h3>
				</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo nam suscipit, nisi facere, dolores est!</p>
				<div class="view_container"><button class="view">Посмотреть</button></div>
				<button class="add_to_cart">Купить</button>
			</div>
		</div>
		<div class="featured_good_down">
			<div class="featured_good">
				<a href=""><img src="images/featured_products_3.png" alt=""></a>
				<div class="name_price">
					<a href=""><h3>Морская бомбочка</h3></a>
					<h3>150р</h3>
				</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo nam suscipit, nisi facere, dolores est!</p>
				<div class="view_container"><button class="view">Посмотреть</button></div>
				<button class="add_to_cart">Купить</button>
			</div>
			<div class="featured_good">
				<a href=""><img src="images/featured_products_4.png" alt=""></a>
				<div class="name_price">
					<a href=""><h3>Гейзер для глаз</h3></a>
					<h3>150р</h3>
				</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo nam suscipit, nisi facere, dolores est!</p>
				<div class="view_container"><button class="view">Посмотреть</button></div>
				<button class="add_to_cart">Купить</button>
			</div>
		</div>
	</div>
</div>
</section>

<script src="js/home.js"></script>
<script src="js/bxslider/src/js/jquery.bxslider.js"></script>
<script>
	$(document).ready(function(){
		$('.slider').bxSlider();
	});
</script>