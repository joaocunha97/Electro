<?php
session_start();
if (!isset($_SESSION["user"])) {
	echo '<script>alert("Necessita de fazer login")</script>';
	echo '<script>window.location = "login.php";</script>';
	 exit;
 }

$total_price = 0;
$total_item = 0;


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Electro</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>
<script>
	$(document).on('click', '.delete', function() {

		var product_id = $(this).attr("id");
		console.log(product_id);
		var action = 'remove';
		if (confirm("Are you sure you want to remove this product?")) {
			$.ajax({
				url: "action.php",
				method: "POST",
				data: {
					product_id: product_id,
					action: action
				},
				success: function() {
					// load_cart_data();
					alert("Item has been removed from Cart");
					location.reload();
				}
			})
		} else {
			return false;
		}
	});
</script>

<body>
	<!-- HEADER -->
	<header>
		<!-- TOP HEADER -->
		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-left">
					<li><a href="#"><i class="fa fa-phone"></i> +351-939452354</a></li>
					<li><a href="#"><i class="fa fa-envelope-o"></i> email@gmail.com</a></li>
				</ul>
				<ul class="header-links pull-right">
					<li><a href="login.php"><i class="fa fa-user-o"></i><?php if (isset($_SESSION["user"])) { echo $_SESSION["user"];}else{ echo 'Log In';}  ?></a></li>
					<?php if (isset($_SESSION["user"])) { ?>
					<li><a href="logout.php"><i class="fas fa-sign-out"></i></a></li>
					<?php }else{} ?>
				</ul>
			</div>
		</div>
		<!-- /TOP HEADER -->

		<!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
							<a href="index.php" class="logo">
								<img src="./img/logo.png" alt="">
							</a>
						</div>
					</div>
					<!-- /LOGO -->

					<!-- SEARCH BAR 
					<div class="col-md-6">
						<div class="header-search">
							<form>
								<select class="input-select">
									<option value="0">Categorias</option>
									<option value="1">Computadores</option>
									<option value="2">Smartphones</option>
									<option value="3">Periféricos</option>
									<option value="4">Componentes</option>
									<option value="5">Imagem</option>
									<option value="6">Outros</option>
								</select>
								<input class="input" placeholder="Procurar">
								<button class="search-btn">Procurar</button>
							</form>
						</div>
					</div>
					SEARCH BAR -->

					<!-- ACCOUNT -->
					<div class="col-md-9">
						<div class="header-ctn">
							<!-- Wishlist -->

							<!-- /Wishlist -->

							<!-- Cart -->
							<div>
								<a href="cart.html">
									<i class="fa fa-shopping-cart"></i>
									<span>Carrinho</span>
									<div class="qty"><?php if (isset($_SESSION["shopping_cart"])){echo count($_SESSION["shopping_cart"]);}else{ echo '0';} ?></div>
								</a>
							</div>
							<!-- /Cart -->

							<!-- Menu Toogle -->
							<div class="menu-toggle">
								<a href="#">
									<i class="fa fa-bars"></i>
									<span>Menu</span>
								</a>
							</div>
							<!-- /Menu Toogle -->
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<nav id="navigation">
		<!-- container -->
		<div class="container">
			<!-- responsive-nav -->
			<div id="responsive-nav">
				<!-- NAV -->
				<ul class="main-nav nav navbar-nav">
					<li class="active"><a href="index.html">Home</a></li>
					<li><a href="store.php">Loja</a></li>
					<li><a href="store.php?ctg=1">Computadores</a></li>
					<li><a href="store.php?ctg=2">Smartphones</a></li>
					<li><a href="store.php?ctg=3">Periféricos</a></li>
					<li><a href="store.php?ctg=4">Componentes</a></li>
					<li><a href="store.php?ctg=5">Imagem</a></li>
					<li><a href="store.php?ctg=6">Outros</a></li>




				</ul>
				<!-- /NAV -->
			</div>
			<!-- /responsive-nav -->
		</div>
		<!-- /container -->
	</nav>
	<!-- /NAVIGATION -->

	<!-- BREADCRUMB -->
	<div id="breadcrumb" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<h3 class="breadcrumb-header">Carrinho</h3>
					<ul class="breadcrumb-tree">
						<li><a href="#">Home</a></li>
						<li class="active">Carrinho</li>
					</ul>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /BREADCRUMB -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">



				<!-- Order Details -->
				<div class="col-md-12 order-details">
					<div class="section-title text-center">
						<h3 class="title">Seu Carrinho</h3>
					</div>
					<div class="order-summary">
						<div class="order-col">
							<div><strong>PRODUTOS</strong></div>
							<div><strong>TOTAL</strong></div>
						</div>
						<div class="order-products">

							<?php
							if (!empty($_SESSION["shopping_cart"])) {
								foreach ($_SESSION["shopping_cart"] as $keys => $values) {
									echo '<div class="order-col">
								<div>' . $values["product_quantity"] . 'x  ' . $values["product_name"] . '</div>
								<div><button name="delete" class="btn btn-danger btn-xs delete" id="' . $values["product_id"] . '">Remove</button></div>
								<div>' . number_format($values["product_quantity"] * $values["product_price"], 2) . '€</div>
								</div>';
								$total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
								}

								echo '<div class="order-col">
							 	<div>Shiping</div>
							 	<div><strong>GRÁTIS</strong></div>
								 </div>
								 <div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">' . number_format($total_price, 2) . '€</strong></div>
								</div>
								</div>
								<div class="payment-method">
									<div class="input-radio">
									<input type="radio" name="payment" id="payment-1">
									<label for="payment-1">
									<span></span>
									Multibanco
									</label>
								</div>
									<div class="input-radio">
										<input type="radio" name="payment" id="payment-2">
											<label for="payment-2">
											<span></span>
											Cheque Payment
												</label>
											</div>
											<div class="input-radio">
										<input type="radio" name="payment" id="payment-3">
										<label for="payment-3">
										<span></span>
											Paypal
									</label>

							</div>
						</div>
						<a href="encomenda.php" class="primary-btn order-submit">Encomendar</a>';
							} else {
								echo '<div class="order-col">
										<div>Carrinho vazio</div>
									</div>';
							}
							?>
						</div>
						<!-- /Order Details -->
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /SECTION -->

			<!-- NEWSLETTER -->

			<!-- /NEWSLETTER -->

			<!-- FOOTER -->
			<!-- FOOTER -->
			<br><br>
			<footer id="footer">
				<!-- top footer -->
				<div class="section">
					<!-- container -->
					<div class="container">
						<!-- row -->
						<div class="row">
							<div class="col-md-3 col-xs-6">
								<div class="footer">
									<h3 class="footer-title">Sobre</h3>
									<p>Loja Virtual de Compra de Produtos Eletrónicos e Relacionados para GAMERS</p>
									<ul class="footer-links">
										<li><i class="fa fa-phone"></i>+351-939452354</a></li>
										<li><i class="fa fa-envelope-o"></i>email@gmail.com</a></li>
									</ul>
								</div>
							</div>

							<div class="col-md-3 col-xs-6">
								<div class="footer">
									<h3 class="footer-title">Categorias</h3>
									<ul class="footer-links">
										<li><a href="store.php?ctg=1">Computadores</a></li>
										<li><a href="store.php?ctg=2">Smartphones</a></li>
										<li><a href="store.php?ctg=3">Periféricos</a></li>
										<li><a href="store.php?ctg=4">Componentes</a></li>
										<li><a href="store.php?ctg=5">Imagem</a></li>
										<li><a href="store.php?ctg=6">Outros</a></li>
									</ul>
								</div>
							</div>

							<div class="clearfix visible-xs"></div>

							<div class="col-md-3 col-xs-6">
								<div class="footer">
									<h3 class="footer-title">Informações</h3>
									<ul class="footer-links">
										<li><a href="sobre.html">Sobre Nós</a></li>
										<li><a href="conctatos.html">Contactos</a></li>
									</ul>
								</div>
							</div>

							<div class="col-md-3 col-xs-6">
								<div class="footer">
									<h3 class="footer-title">Serviços</h3>
									<ul class="footer-links">
										<li><a href="perfil.html">Minha Conta</a></li>
										<li><a href="carrinho.html">Ver Carrinho</a></li>
										<li><a href="wishlist.html">Wishlist</a></li>
									</ul>
								</div>
							</div>
						</div>
						<!-- /row -->
					</div>
					<!-- /container -->
				</div>
				<!-- /top footer -->

				<!-- bottom footer -->
				<div id="bottom-footer" class="section">
					<div class="container">
						<!-- row -->
						<div class="row">
							<div class="col-md-12 text-center">
								<span class="copyright">
									<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
									Copyright &copy;<script>
										document.write(new Date().getFullYear());
									</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
									<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								</span>
							</div>
						</div>
						<!-- /row -->
					</div>
					<!-- /container -->
				</div>
				<!-- /bottom footer -->
			</footer>
			<!-- jQuery Plugins -->
			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/slick.min.js"></script>
			<script src="js/nouislider.min.js"></script>
			<script src="js/jquery.zoom.min.js"></script>
			<script src="js/main.js"></script>

</body>

</html>