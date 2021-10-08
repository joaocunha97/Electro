<?php
session_start();
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
	let contador = 1;

	function loadProduto() {
		var url = window.location.href;
		var id = url.substring(url.lastIndexOf('=') + 1);
		// console.log(id);

		$.ajax({
			url: 'getProduto.php',
			type: 'GET', // type of response data
			data: 'id=' + id,
			dataType: 'json',
			contentType: "application/json",
			timeout: 500, // timeout milliseconds 
			success: function(data) {
				// success callback function 
				var produtos = data.produtos;

				// console.log(produtos);
				if (data.status == 'ok') {

					var categoria = produtos[0].NAME;
					var nome = produtos[0].nome;
					var preco = produtos[0].preco;
					var imagem = produtos[0].image;
					var descricao = produtos[0].descricao;
					var id = produtos[0].id;
					// console.log(categoria);
					$('#id').html(id);
					$('#nome').html(nome);
					$('#nome1').html(nome);
					$('#categoria').html(categoria);
					$('#categoria1').html(categoria);
					$('#descricao').html(descricao);
					$('#preco').html(preco + '€');
					//$('#row').append(html);
					$('#img').append("<img src=../images/" + imagem + " witdh='400px' height='450px'/>");

					let categoriaToQuery = '"' + $('#categoria').html() + '"';
					console.log(categoriaToQuery);
					$.ajax({
						url: 'getProdutosRelacionados.php',
						method: 'GET',
						data: {
							category: categoriaToQuery
						},
						dataType: 'json',
						contentType: "application/json",
						timeout: 500,
						success: (res) => {
							var produto = res.produtos;
							console.log(produto);
							if (res.status == 'ok') {

								console.log("here");
								var categoria1 = produto[0].NAME;
								var nome1 = produto[0].nome;
								var id1 = produto[0].id;
								var preco1 = produto[0].preco;
								var imagem1 = produto[0].image;
								var descricao1 = produto[0].descricao;
								$('#nome2').html(nome1);
								$('#categoria2').html(categoria1);
								$('#id1').html(id1);
								$('#preco2').html(preco1 + '€');
								$('#descricao2').html(descricao1);
								$('#img1').append("<img src=../images/" + imagem1 + " witdh='230px' height='300px'/>");

								console.log(produto[1].nome);
								var categoria2 = produto[1].NAME;
								var nome2 = produto[1].nome;
								var id2 = produto[1].id;
								var preco2 = produto[1].preco;
								var imagem2 = produto[1].image;
								var descricao2 = produto[1].descricao;
								$('#nome3').html(nome2);
								$('#categoria3').html(categoria2);
								$('#id2').html(id2);
								$('#preco3').html(preco2 + '€');
								$('#descricao3').html(descricao2);
								$('#img2').append("<img src=../images/" + imagem2 + " witdh='230px' height='300px'/>");

								var categoria3 = produto[2].NAME;
								var id3 = produto[2].id;
								var nome3 = produto[2].nome;
								var preco3 = produto[2].preco;
								var imagem3 = produto[2].image;
								var descricao3 = produto[2].descricao;
								$('#nome4').html(nome3);
								$('#categoria4').html(categoria3);
								$('#id3').html(id3);
								$('#preco4').html(preco3 + '€');
								$('#descricao4').html(descricao3);
								$('#img3').append("<img src=../images/" + imagem3 + " witdh='230px' height='300px'/>");

								var categoria4 = produto[3].NAME;
								var id4 = produto[3].id;
								var nome4 = produto[3].nome;
								var preco4 = produto[3].preco;
								var imagem4 = produto[3].image;
								var descricao4 = produto[3].descricao;
								$('#nome5').html(nome4);
								$('#categoria5').html(categoria4);
								$('#preco5').html(preco4 + '€');
								$('#id4').html(id4);
								$('#descricao5').html(descricao4);
								$('#img4').append("<img src=../images/" + imagem4 + " witdh='230px' height='300px'/>");
							}
						},
						error: function(jqXhr, textStatus, errorMessage) {
							// error callback 
							console.log(jqXhr);
							console.log(textStatus);
							console.log(errorMessage);
							$('#row').html('Error: ' + errorMessage);

						}
					});

				}


			},
			error: function(jqXhr, textStatus, errorMessage) {
				// error callback 
				console.log(jqXhr);
				console.log(textStatus);
				console.log(errorMessage);
				$('#row').html('Error: ' + errorMessage);

			}
		});
	}

	$(document).ready(function() {
		$('#add').on('click', function() {
			var product_id = $("#id").html();
			var product_name = $("#nome1").html();
			var product_quantity = $("#contador").val();
			var product_price = $("#preco").html();
			var action = "add";
			console.log(product_id);
			console.log(product_name);
			console.log(product_quantity);
			console.log(product_price);
			$.ajax({
				type: 'POST',
				url: 'action.php',
				data: {product_id:product_id, product_name:product_name, product_price:product_price,product_quantity:product_quantity ,action:action},
				//dataType: "json",
				success: function(response) {
					alert("Product has been added to cart");
					location.reload();
				},
				error: function(jqXhr, textStatus, errorMessage) {
				// error callback 
				console.log(jqXhr);
				console.log(textStatus);
				console.log(errorMessage);

			}
			});

		});
	});

	


	 $(document).ready(function() {
	// 	$.ajax({
    //     type:'GET',
    //     url:'guardarprodutos.php',
    //     data:{
    //       total_cart_items:"total_items"
    //     },
    //     success:function(response) {
	// 		console.log(response);
    //     }
    //   });

		loadProduto();

	});


	$(document).ready(function() {
		$('#view1').on('click', function() {
			var IDnum = $("#id1").html();
			console.log(IDnum);
			window.location.href="product.php?id=" + IDnum;

		});
	});

	$(document).ready(function() {
		$('#view2').on('click', function() {
			var IDnum = $("#id2").html();
			console.log(IDnum);
			window.location.href="product.php?id=" + IDnum;

		});
	});
	$(document).ready(function() {
		$('#view3').on('click', function() {
			var IDnum = $("#id3").html();
			console.log(IDnum);
			window.location.href="product.php?id=" + IDnum;

		});
	});
	$(document).ready(function() {
		$('#view4').on('click', function() {
			var IDnum = $("#id4").html();
			console.log(IDnum);
			window.location.href="product.php?id=" + IDnum;
		});
	});
	$(document).ready(function() {
		$('#produto1').on('click', function() {
			var IDnum = $("#id4").html();
			console.log(IDnum);
			window.location.href="product.php?id=" + IDnum;
		});
	});

	$(document).ready(function() {
		$('#buy1').on('click', function() {
			var IDnum = $("#id1").html();
			console.log(IDnum);
			window.location.href="product.php?id=" + IDnum;
		});
	});
	$(document).ready(function() {
		$('#buy2').on('click', function() {
			var IDnum = $("#id2").html();
			console.log(IDnum);
			window.location.href="product.php?id=" + IDnum;
		});
	});
	$(document).ready(function() {
		$('#buy3').on('click', function() {
			var IDnum = $("#id3").html();
			console.log(IDnum);
			window.location.href="product.php?id=" + IDnum;
		});
	});
	$(document).ready(function() {
		$('#buy4').on('click', function() {
			var IDnum = $("#id4").html();
			console.log(IDnum);
			window.location.href="product.php?id=" + IDnum;
		});
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
								<a href="cart.php">
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
					<li><a href="index.php">Home</a></li>
					<li class="active"><a href="store.php">Loja</a></li>
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
					<ul class="breadcrumb-tree">
						<li><a href="#">Home</a></li>
						<li><a href="#">Loja</a></li>
						<li id="categoria"><a href="#"></a></li>
						<li id="nome" class="active"></li>
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
				<!-- Product main img -->
				<div class="col-md-5 col-md-push-2" style="left:0% !important">
					<div id="product-main-img">
						<div id="img" class="product-preview">
						</div>

						<!--<div class="product-preview">
								<img src="./img/product03.png" alt="">
							</div>

							<div class="product-preview">
								<img src="./img/product06.png" alt="">
							</div>

							<div class="product-preview">
								<img src="./img/product08.png" alt="">
							</div>-->
					</div>
				</div>
				<!-- /Product main img -->

				<!-- Product thumb imgs -->

				<!-- /Product thumb imgs -->

				<!-- Product details -->
				<div class="col-md-5">
					<div class="product-details">
						<p id="id" hidden>
							<p>
								<h2 id="nome1" class="product-name"></h2>
								<div>
									<h3 id="preco" class="product-price"></h3>
									<span class="product-available">In Stock</span>
								</div>
								<p id="descricao">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
									labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
									laboris nisi ut aliquip ex ea commodo consequat.</p>

								<div class="add-to-cart">
									<div class="qty-label">
										Quantidade:
										<div class="input-number">
											<input type="number" id="contador" value="1" placeholder="1">
											<span class="qty-up" onclick="contadorup()">+</span>
											<span class="qty-down" onclick="contadordown()">-</span>
											<script>
												console.log(contador);

												function contadorup() {
													contador += 1;
													$('#contador').val(contador);
													console.log(contador);
												}

												function contadordown() {
													if (contador == 1) return;
													contador -= 1;
													$('#contador').val(contador);
													console.log(contador);
												}
											</script>
										</div>
									</div>
									<button id="add" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
								</div>

								<ul class="product-btns">
									
								</ul>

								<ul class="product-links">
									<li>Categoria:</li>
									<li id="categoria1"><a href="#"></a></li>
								</ul>

								<!--<ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>-->

					</div>
				</div>
				<!-- /Product details -->

				<!-- Product tab -->
				<div class="col-md-12">
					<div id="product-tab">
						<!-- product tab nav -->
						<ul class="tab-nav">
							
						</ul>
						<!-- /product tab nav -->

						<!-- product tab content -->
						<div class="tab-content">
							<!-- tab1  -->
							<div id="tab1" class="tab-pane fade in active">
								<div class="row">
									<div class="col-md-12">
										<p id="descricao"></p>
									</div>
								</div>
							</div>
							<!-- /tab1  -->

							<!-- tab2  -->

							<!-- /tab2  -->

							<!-- tab3  -->

							<!-- Rating -->

							<!-- /Rating -->

							<!-- Reviews -->

							<!-- /Reviews -->

							<!-- Review Form -->

							<!-- /Review Form -->
						</div>
					</div>
					<!-- /tab3  -->
				</div>
				<!-- /product tab content  -->
			</div>
		</div>
		<!-- /product tab -->
	</div>
	<!-- /row -->
	</div>
	<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- Section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<div class="col-md-12">
					<div class="section-title text-center">
						<h3 class="title">Produtos Relacionados</h3>
					</div>
				</div>

				<!-- product -->
				<div class="col-md-3 col-xs-6">
					<div class="product">
						<div id="img1" class="product-img">
						</div>
						<div class="product-body">
							<p id="categoria2" class="product-category">Category</p>
							<p id="id1"></p>
							<h3 id="nome2" class="product-name"><a href="#">product name goes here</a></h3>
							<h4 id="preco2" class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							<div class="product-btns">


								<button id="view1" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
										view</span></button>
							</div>
						</div>
						<div id="view1" class="add-to-cart">
							<button id="buy1" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
						</div>
					</div>
				</div>
				<!-- /product -->

				<!-- product -->
				<div class="col-md-3 col-xs-6">
					<div class="product">
						<div id="img2" class="product-img">
						</div>
						<div class="product-body">
							<p id="categoria3" class="product-category">Category</p>
							<p hidden id="id2"></p>
							<h3 id="nome3" class="product-name"><a href="#">product name goes here</a></h3>
							<h4 id="preco3" class="product-price">$980.00</h4>
							<div class="product-btns">

								<button id="view2" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
										view</span></button>
							</div>
						</div>
						<div class="add-to-cart">
							<button id="buy2" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
						</div>
					</div>
				</div>
				<!-- /product -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- product -->
				<div class="col-md-3 col-xs-6">
					<div class="product">
						<div id="img3" class="product-img">
						</div>
						<div class="product-body">
							<p id="categoria4" class="product-category">Category</p>
							<p hidden id="id3"></p>
							<h3 id="nome4" class="product-name"><a href="#">product name goes here</a></h3>
							<h4 id="preco4" class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
							<div class="product-btns">

								<button id="view3" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
										view</span></button>
							</div>
						</div>
						<div class="add-to-cart">
							<button id="buy3" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
						</div>
					</div>
				</div>
				<!-- /product -->

				<!-- product -->
				<div class="col-md-3 col-xs-6">
					<div class="product">
						<div id="img4" class="product-img">
						</div>
						<div class="product-body">
							<p id="categoria5" class="product-category">Category</p>
							<p hidden id="id4"></p>
							<h3 id="nome5" class="product-name"><a href="#">product name goes here</a></h3>
							<h4 id="preco" class="product-price">$980.00</h4>
							<div class="product-btns">

								<button id="view4" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
										view</span></button>
							</div>
						</div>
						<div class="add-to-cart">
							<button id="buy4" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
						</div>
					</div>
				</div>
				<!-- /product -->

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /Section -->

	<!-- NEWSLETTER -->
	
	<!-- /NEWSLETTER -->

	<!-- FOOTER -->
	<footer id="footer">
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Sobre</h3>
							<p>Loja Online de Compra de Produtos Eletrónicos e Relacionados para GAMERS</p>
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
						<ul class="footer-payments">
							<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
							<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
						</ul>
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
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<!--<script src="js/slick.min.js"></script>-->
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>