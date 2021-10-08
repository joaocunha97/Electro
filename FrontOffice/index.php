<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="-8">
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

	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/main.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<script>
	function loadnewprodutos() {
		$.ajax({
			url: 'getNewProdutos.php',
			type: 'GET',
			dataType: 'json', // type of response data
			contentType: "application/json",
			timeout: 500, // timeout milliseconds 
			success: function(data) {
				// success callback function 
				var produtos = data.produtos;
				if (data.status == 'ok') {
					//novos produtos
					var id1 = produtos[0].id;;
					var id2 = produtos[1].id;;
					var id3 = produtos[2].id;;
					var id4 = produtos[3].id;;

					var p1 = produtos[0].NAME;
					var p2 = produtos[1].NAME;
					var p3 = produtos[2].NAME;
					var p4 = produtos[3].NAME;

					var h1 = produtos[0].nome;
					var h2 = produtos[1].nome;
					var h3 = produtos[2].nome;
					var h4 = produtos[3].nome;

					var h11 = produtos[0].preco;
					var h22 = produtos[1].preco;
					var h33 = produtos[2].preco;
					var h44 = produtos[3].preco;

					var img1 = produtos[0].image;
					var img2 = produtos[1].image;
					var img3 = produtos[2].image;
					var img4 = produtos[3].image;

					$('#p1').html(p1);
					$('#p2').html(p2);
					$('#p3').html(p3);
					$('#p4').html(p4);

					$('#h1').html(h1);
					$('#id1').html(id1);
					$('#h2').html(h2);
					$('#id2').html(id2);
					$('#h3').html(h3);
					$('#id3').html(id3);
					$('#h4').html(h4);
					$('#id4').html(id4);

					$('#h11').html(h11 + '€');
					$('#h22').html(h22 + '€');
					$('#h33').html(h33 + '€');
					$('#h44').html(h44 + '€');


					$('#img1').append("<img src=../images/" + img1 + " witdh='230px' height='300px'/>");
					$('#img2').append("<img src=../images/" + img2 + " witdh='280px' height='300px'/>");
					$('#img3').append("<img src=../images/" + img3 + " witdh='280px' height='300px'/>");
					$('#img4').append("<img src=../images/" + img4 + " witdh='280px' height='300px' />");

				}


			},
			error: function(jqXhr, textStatus, errorMessage) { // error callback 
				$('#p1').append('Error: ' + errorMessage);

			}
		});
	}


	function loadComponentes() {
		$.ajax({
			url: 'getNewProdutos.php',
			type: 'GET',
			dataType: 'json', // type of response data
			contentType: "application/json",
			timeout: 500, // timeout milliseconds 
			success: function(data) {
				// success callback function
				var array_produtos = [];
				var produtos = data.produtos;
				if (data.status == 'ok') {
					for (var i = 0; i < produtos.length; i++) {
						if (produtos[i].NAME == "Componentes") {
							var array_produto = [produtos[i].NAME, produtos[i].nome, produtos[i].preco, produtos[i].image];
							array_produtos.push(array_produto);
						}
					}
					//Categorias
					var cat1 = array_produtos[0][0];

					$('#cat1').html(cat1);
					$('#cat2').html(cat1);
					$('#cat3').html(cat1);
					$('#cat4').html(cat1);
					$('#cat5').html(cat1);
					$('#cat6').html(cat1);

					//Nome dos produtos
					var pro1 = array_produtos[0][1];
					var pro2 = array_produtos[1][1];
					var pro3 = array_produtos[2][1];
					var pro4 = array_produtos[3][1];
					var pro5 = array_produtos[4][1];
					var pro6 = array_produtos[5][1];

					$('#pro1').html(pro1);
					$('#pro2').html(pro2);
					$('#pro3').html(pro3);
					$('#pro4').html(pro4);
					$('#pro5').html(pro5);
					$('#pro6').html(pro6);

					//Preço
					var pre1 = array_produtos[0][2];
					var pre2 = array_produtos[1][2];
					var pre3 = array_produtos[2][2];
					var pre4 = array_produtos[3][2];
					var pre5 = array_produtos[4][2];
					var pre6 = array_produtos[5][2];

					$('#pre1').html(pre1 + '€');
					$('#pre2').html(pre2 + '€');
					$('#pre3').html(pre3 + '€');
					$('#pre4').html(pre4 + '€');
					$('#pre5').html(pre5 + '€');
					$('#pre6').html(pre6 + '€');

					//Imagem
					var img1 = array_produtos[0][3];
					var img2 = array_produtos[1][3];
					var img3 = array_produtos[2][3];
					var img4 = array_produtos[3][3];
					var img5 = array_produtos[4][3];
					var img6 = array_produtos[5][3];

					$('#i1').append("<img src=../images/" + img1 + " witdh='60px' height='60px'/>");
					$('#i2').append("<img src=../images/" + img2 + " witdh='60px' height='60px'/>");
					$('#i3').append("<img src=../images/" + img3 + " witdh='60px' height='60px'/>");
					$('#i4').append("<img src=../images/" + img4 + " witdh='60px' height='60px'/>");
					$('#i5').append("<img src=../images/" + img5 + " witdh='60px' height='60px'/>");
					$('#i6').append("<img src=../images/" + img6 + " witdh='60px' height='60px'/>");



				}
				console.log(array_produtos);
				console.log(array_produtos[0][2]);


			},
			error: function(jqXhr, textStatus, errorMessage) { // error callback 
				$('#cat1').append('Error: ' + errorMessage);

			}
		});
	}


	function loadImagem() {
		$.ajax({
			url: 'getNewProdutos.php',
			type: 'GET',
			dataType: 'json', // type of response data
			contentType: "application/json",
			timeout: 500, // timeout milliseconds 
			success: function(data) {
				// success callback function
				var array_produtos = [];
				var produtos = data.produtos;
				if (data.status == 'ok') {
					for (var i = 0; i < produtos.length; i++) {
						if (produtos[i].NAME == "Imagem") {
							var array_produto = [produtos[i].NAME, produtos[i].nome, produtos[i].preco, produtos[i].image];
							array_produtos.push(array_produto);
						}
					}
					//Categorias
					var cat1 = array_produtos[0][0];

					$('#ct1').html(cat1);
					$('#ct2').html(cat1);
					$('#ct3').html(cat1);
					$('#ct4').html(cat1);
					$('#ct5').html(cat1);
					$('#ct6').html(cat1);

					//Nome dos produtos
					var pro1 = array_produtos[0][1];
					var pro2 = array_produtos[1][1];
					var pro3 = array_produtos[2][1];
					var pro4 = array_produtos[3][1];
					var pro5 = array_produtos[4][1];
					var pro6 = array_produtos[5][1];

					$('#prod1').html(pro1);
					$('#prod2').html(pro2);
					$('#prod3').html(pro3);
					$('#prod4').html(pro4);
					$('#prod5').html(pro5);
					$('#prod6').html(pro6);

					//Preço
					var pre1 = array_produtos[0][2];
					var pre2 = array_produtos[1][2];
					var pre3 = array_produtos[2][2];
					var pre4 = array_produtos[3][2];
					var pre5 = array_produtos[4][2];
					var pre6 = array_produtos[5][2];

					$('#prec1').html(pre1 + '€');
					$('#prec2').html(pre2 + '€');
					$('#prec3').html(pre3 + '€');
					$('#prec4').html(pre4 + '€');
					$('#prec5').html(pre5 + '€');
					$('#prec6').html(pre6 + '€');

					//Imagem
					var ig1 = array_produtos[0][3];
					var ig2 = array_produtos[1][3];
					var ig3 = array_produtos[2][3];
					var ig4 = array_produtos[3][3];
					var ig5 = array_produtos[4][3];
					var ig6 = array_produtos[5][3];

					$('#im1').append("<img src=../images/" + ig1 + " witdh='60px' height='60px'/>");
					$('#im2').append("<img src=../images/" + ig2 + " witdh='60px' height='60px'/>");
					$('#im3').append("<img src=../images/" + ig3 + " witdh='60px' height='60px'/>");
					$('#im4').append("<img src=../images/" + ig4 + " witdh='60px' height='60px'/>");
					$('#im5').append("<img src=../images/" + ig5 + " witdh='60px' height='60px'/>");
					$('#im6').append("<img src=../images/" + ig6 + " witdh='60px' height='60px'/>");



				}
				console.log(array_produtos);
				console.log(array_produtos[0][2]);


			},
			error: function(jqXhr, textStatus, errorMessage) { // error callback 
				$('#cat1').append('Error: ' + errorMessage);

			}
		});
	}

	function loadOutros() {
		$.ajax({
			url: 'getNewProdutos.php',
			type: 'GET',
			dataType: 'json', // type of response data
			contentType: "application/json",
			timeout: 500, // timeout milliseconds 
			success: function(data) {
				// success callback function
				var array_produtos = [];
				var produtos = data.produtos;
				if (data.status == 'ok') {
					for (var i = 0; i < produtos.length; i++) {
						if (produtos[i].NAME == "Outros") {
							var array_produto = [produtos[i].NAME, produtos[i].nome, produtos[i].preco, produtos[i].image];
							array_produtos.push(array_produto);
						}
					}
					console.log(array_produtos);
					//Categorias
					var cat1 = array_produtos[0][0];

					$('#cc1').html(cat1);
					$('#cc2').html(cat1);
					$('#cc3').html(cat1);
					$('#cc4').html(cat1);
					$('#cc5').html(cat1);
					$('#cc6').html(cat1);

					//Nome dos produtos
					var pro1 = array_produtos[0][1];
					var pro2 = array_produtos[1][1];
					var pro3 = array_produtos[2][1];
					var pro4 = array_produtos[3][1];
					var pro5 = array_produtos[4][1];
					var pro6 = array_produtos[5][1];

					$('#produ1').html(pro1);
					$('#produ2').html(pro2);
					$('#produ3').html(pro3);
					$('#produ4').html(pro4);
					$('#produ5').html(pro5);
					$('#produ6').html(pro6);

					//Preço
					var pre1 = array_produtos[0][2];
					var pre2 = array_produtos[1][2];
					var pre3 = array_produtos[2][2];
					var pre4 = array_produtos[3][2];
					var pre5 = array_produtos[4][2];
					var pre6 = array_produtos[5][2];

					$('#preco1').html(pre1 + '€');
					$('#preco2').html(pre2 + '€');
					$('#preco3').html(pre3 + '€');
					$('#preco4').html(pre4 + '€');
					$('#preco5').html(pre5 + '€');
					$('#preco6').html(pre6 + '€');

					//Imagem
					var ig1 = array_produtos[0][3];
					var ig2 = array_produtos[1][3];
					var ig3 = array_produtos[2][3];
					var ig4 = array_produtos[3][3];
					var ig5 = array_produtos[4][3];
					var ig6 = array_produtos[5][3];

					$('#ig1').append("<img src=../images/" + ig1 + " witdh='60px' height='60px'/>");
					$('#ig2').append("<img src=../images/" + ig2 + " witdh='60px' height='60px'/>");
					$('#ig3').append("<img src=../images/" + ig3 + " witdh='60px' height='60px'/>");
					$('#ig4').append("<img src=../images/" + ig4 + " witdh='60px' height='60px'/>");
					$('#ig5').append("<img src=../images/" + ig5 + " witdh='60px' height='60px'/>");
					$('#ig6').append("<img src=../images/" + ig6 + " witdh='60px' height='60px'/>");



				}
				console.log(array_produtos);
				console.log(array_produtos[0][2]);


			},
			error: function(jqXhr, textStatus, errorMessage) { // error callback 
				$('#cat1').append('Error: ' + errorMessage);
				console.log(textStatus);
				console.log(errorMessage);
				console.log(jqXhr);
			}
		});
	}


	$(document).ready(function() {
		loadnewprodutos();
		loadComponentes();
		loadImagem();
		loadOutros();
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
					<li><a href="<?php if (!isset($_SESSION["user"])) {echo "login.php";} else{ echo "perfil.php";} ?>"><i class="fa fa-user-o"></i><?php if (isset($_SESSION["user"])) { echo $_SESSION["user"];}else{ echo 'Log In';}  ?></a></li>
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
							<form action="search.php" method="GET">
								<select class="input-select">
									<option value="0">Categorias</option>
									<option value="1">Computadores</option>
									<option value="2">Smartphones</option>
									<option value="3">Periféricos</option>
									<option value="4">Componentes</option>
									<option value="5">Imagem</option>
									<option value="6">Outros</option>
								</select>
								<input id="search" name="search" class="input" placeholder="Procurar">
								<input type="submit" value="Procurar" class="search-btn"/>
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
							<div >
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

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<div class="shop">
						<div class="shop-img">
							<img src="./img/shop01.png" alt="">
						</div>
						<div class="shop-body">
							<h3>Computadores e Portáteis<br></h3>
							<a href="store.php?ctg=1" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
				<!-- /shop -->

				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<div class="shop">
						<div class="shop-img">
							<img src="./img/shop03.png" alt="">
						</div>
						<div class="shop-body">
							<h3>Periféricos</h3>
							<a href="store.php?ctg=3" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
				<!-- /shop -->

				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<div class="shop">
						<div class="shop-img">
							<img src="./img/pngguru.com.png" alt="" width="340px" height="240px">
						</div>
						<div class="shop-body">
							<h3>Smartphones</h3>
							<a href="store.php?ctg=2" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
				<!-- /shop -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section" id="produtos">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Novos Produtos</h3>
					</div>
				</div>
				<!-- /section title -->

				<!-- Products tab & slick -->
				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs">
							<!-- tab -->
							<div id="tab1" class="tab-pane active">
								<div class="products-slick" data-nav="#slick-nav-1">
									<!-- product -->
									<div class="product">
										<div class="product-img" id="img1">
										</div>
										<div class="product-body">
											<p id="p1" class="product-category"></p>
											<p hidden id="id1"></p>
											<h3 id="h1" class="product-name"></h3>
											<h4 id="h11" class="product-price"></h4>
											<div class="product-btns">
												
												<button id="view1" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button id="buy1" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
										</div>
									</div>
									<!-- /product -->

									<!-- product -->
									<div class="product">
										<div class="product-img" id="img2">

										</div>
										<div class="product-body">
											<p id="p2" class="product-category"></p>
											<p hidden id="id2"></p>
											<h3 id="h2" class="product-name"><a href="product.php?id=11"></a></h3>
											<h4 id="h22" class="product-price"></h4>
											<div class="product-btns">
												<button id="view2" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button id="buy2" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
										</div>
									</div>
									<!-- /product -->

									<!-- product -->
									<div class="product">
										<div class="product-img" id="img3">
										</div>
										<div class="product-body">
											<p id="p3" class="product-category"></p>
											<p hidden id="id3"></p>
											<h3 id="h3" class="product-name"><a href="#"></a></h3>
											<h4 id="h33" class="product-price"></h4>
											<div class="product-btns">
												
												<button id="view3" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button id="buy3" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
										</div>
									</div>
									<!-- /product -->

									<!-- product -->
									<div class="product">
										<div class="product-img" id="img4">
										</div>
										<div class="product-body">
											<p id="p4" class="product-category"></p>
											<p hidden id="id4"></p>
											<h3 id="h4" class="product-name"><a href="#"></a></h3>
											<h4 id="h44" class="product-price"></h4>
											<div class="product-btns">
											
												<button id="view4" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button id="buy4" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
										</div>
									</div>
									<!-- /product -->

									<!-- product -->

									<!-- /product -->
								</div>
								<div id="slick-nav-1" class="products-slick-nav"></div>
							</div>
							<!-- /tab -->
						</div>
					</div>
				</div>
				<!-- Products tab & slick -->
			</div>
			<!-- /row -->
		</div>
	</div>
	<!-- /SECTION -->

	<!-- HOT DEAL SECTION -->
	<!-- /HOT DEAL SECTION -->

	<!-- SECTION -->
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-4 col-xs-6">
					<div class="section-title">
						<h4 class="title">Componentes</h4>
						<div class="section-nav">
							<div id="slick-nav-3" class="products-slick-nav"></div>
						</div>
					</div>

					<div class="products-widget-slick" data-nav="#slick-nav-3" id="componentes">
						<div>
							<!-- product widget -->
							<div id="produto1" class="product-widget">
								<div id="i1" class="product-img">
								</div>
								<div class="product-body">
									<p id="cat1" class="product-category"></p>
									<h3 id="pro1" class="product-name"><a href="product.php"></a></h3>
									<h4 id="pre1" class="product-price"></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div id="i2" class="product-img">
								</div>
								<div class="product-body">
									<p id="cat2" class="product-category"></p>
									<h3 id="pro2" class="product-name"><a href="product.php"></a></h3>
									<h4 id="pre2" class="product-price"></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div id="i3" class="product-img">
								</div>
								<div class="product-body">
									<p id="cat3" class="product-category"></p>
									<h3 id="pro3" class="product-name"><a href="product.php"></a></h3>
									<h4 id="pre3" class="product-price"></h4>
								</div>
							</div>
							<!-- product widget -->
						</div>

						<div>
							<!-- product widget -->
							<div class="product-widget">
								<div id="i4" class="product-img">
								</div>
								<div class="product-body">
									<p id="cat4" class="product-category"></p>
									<h3 id="pro4" class="product-name"><a href="product.php"></a></h3>
									<h4 id="pre4" class="product-price"></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div id="i5" class="product-img">
								</div>
								<div class="product-body">
									<p id="cat5" class="product-category"></p>
									<h3 id="pro5" class="product-name"><a href="#"></a></h3>
									<h4 id="pre5" class="product-price"></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div id="i6" class="product-img">
								</div>
								<div class="product-body">
									<p id="cat6" class="product-category"></p>
									<h3 id="pro6" class="product-name"><a href="#"></a></h3>
									<h4 id="pre6" class="product-price"> </h4>
								</div>
							</div>
							<!-- product widget -->
						</div>
					</div>
				</div>

				<div class="col-md-4 col-xs-6">
					<div class="section-title">
						<h4 class="title">Imagem</h4>
						<div class="section-nav">
							<div id="slick-nav-4" class="products-slick-nav"></div>
						</div>
					</div>

					<div class="products-widget-slick" data-nav="#slick-nav-4">
						<div>
							<!-- product widget -->
							<div class="product-widget">
								<div id="im1" class="product-img">
								</div>
								<div class="product-body">
									<p id="ct1" class="product-category"></p>
									<h3 id="prod1" class="product-name"><a href="#"></a></h3>
									<h4 id="prec1" class="product-price"></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div id="im2" class="product-img">
								</div>
								<div class="product-body">
									<p id="ct2" class="product-category"></p>
									<h3 id="prod2" class="product-name"><a href="#"></a></h3>
									<h4 id="prec2" class="product-price"></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div id="im3" class="product-img">
								</div>
								<div class="product-body">
									<p id="ct3" class="product-category"></p>
									<h3 id="prod3" class="product-name"><a href="#"></a></h3>
									<h4 id="prec3" class="product-price"></h4>
								</div>
							</div>
							<!-- product widget -->
						</div>

						<div>
							<!-- product widget -->
							<div class="product-widget">
								<div id="im4" class="product-img">
								</div>
								<div class="product-body">
									<p id="ct4" class="product-category"></p>
									<h3 id="prod4" class="product-name"><a href="#">/a></h3>
									<h4 id="prec4" class="product-price"></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div id="im5" class="product-img">
								</div>
								<div class="product-body">
									<p id="ct5" class="product-category"></p>
									<h3 id="prod5" class="product-name"><a href="#"></a></h3>
									<h4 id="prec5" class="product-price"> </h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div id="im6" class="product-img">
								</div>
								<div class="product-body">
									<p id="ct6" class="product-category"></p>
									<h3 id="prod6" class="product-name"><a href="#"></a></h3>
									<h4 id="prec6" class="product-price"> </h4>
								</div>
							</div>
							<!-- product widget -->
						</div>
					</div>
				</div>

				<div class="clearfix visible-sm visible-xs"></div>

				<div class="col-md-4 col-xs-6">
					<div class="section-title">
						<h4 class="title">Outros</h4>
						<div class="section-nav">
							<div id="slick-nav-5" class="products-slick-nav"></div>
						</div>
					</div>

					<div class="products-widget-slick" data-nav="#slick-nav-5">
						<div>
							<!-- product widget -->
							<div class="product-widget">
								<div id="ig1" class="product-img">
								</div>
								<div class="product-body">
									<p id="cc1" class="product-category"></p>
									<h3 id="produ1" class="product-name"><a href="#"></a></h3>
									<h4 id="preco1" class="product-price"></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div id="ig2" class="product-img">

								</div>
								<div class="product-body">
									<p id="cc2" class="product-category"></p>
									<h3 id="produ2" class="product-name"><a href="#"></a></h3>
									<h4 id="preco2" class="product-price"></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div id="ig3" class="product-img">

								</div>
								<div class="product-body">
									<p id="cc3"="product-category"></p>
									<h3 id="produ3" class="product-name"><a href="#"></a></h3>
									<h4 id="preco3" class="product-price"></h4>
								</div>
							</div>
							<!-- product widget -->
						</div>

						<div>
							<!-- product widget -->
							<div class="product-widget">
								<div id="ig4" class="product-img">

								</div>
								<div class="product-body">
									<p id="cc4" class="product-category"></p>
									<h3 id="produ4" class="product-name"><a href="#"></a></h3>
									<h4 id="preco4" class="product-price"></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div id="ig5" class="product-img">

								</div>
								<div class="product-body">
									<p id="cc5" class="product-category"></p>
									<h3 id="produ5" class="product-name"><a href="#"></a></h3>
									<h4 id="preco5" class="product-price"></h4>
								</div>
							</div>
							<!-- /product widget -->

							<!-- product widget -->
							<div class="product-widget">
								<div id="ig6" class="product-img">
								</div>
								<div class="product-body">
									<p id="cc6" class="product-category"></p>
									<h3 id="produ6" class="product-name"><a href="#"></a></h3>
									<h4 id="preco6" class="product-price"></h4>
								</div>
							</div>
							<!-- product widget -->
						</div>
					</div>
				</div>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- FOOTER -->
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
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>