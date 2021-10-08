<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro
			
		</title>

 		<!-- Google font -->
		 <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="css/font-awesome.min.css">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	<script>
		function loadProdutos() {
			
			$.ajax({
				url: 'getProdutos.php',
				type: 'GET', // type of response data
				dataType: 'json',
				contentType: "application/json",
				timeout: 500, // timeout milliseconds 
				success: function(data) {
				// success callback function 
				var produtos = data.produtos;
				
				if (data.status == 'ok') {
					
					for(var i=0;i<produtos.length;i++){
						
						var id = produtos[i].id;
						var categoria = produtos[i].NAME;
						var nome = produtos[i].nome;
						var preco = produtos[i].preco;
						var imagem = produtos[i].image;

						html ='<div class="col-md-4 col-xs-6" style="width:290px; height:500px">';
						html += '<div class="product">';
						html += '<div id="'+i+'" class="product-img">';
						//html += '<img witdh="230px" height="300px" alt="" src="..../images/" '+ imagem + '">';
						html += '<div class="product-label">';
						html += '</div>';
						html +=	'</div>';
						html += '<div class="product-body">';
						html +=	'<p class="product-category">'+ categoria +'</p>';
						html +=	'<h3 class="product-name"><a href="product.php?id='+ id +'">'+ nome +'</a></h3>';
						html +=	'<h4 class="product-price"> '+ preco +'€</h4>';
						html +=	'<div class="product-btns">';
						html +=	'<button class="quick-view"><a href="product.php?id='+ id +'"<i class="fa fa-eye"></i><span class="tooltipp">quick view</span></a></button>';
						html +=	'</div>';
						html +=	'</div>';
						html +=	'<div class="add-to-cart">';
						html +=	'<button class="add-to-cart-btn"><a href="product.php?id='+ id +'"<i class="fa fa-shopping-cart"></i> add to cart</button>';
						html +=	'</div>';
						html +=	'</div>';
						html +=	'</div>';
						$('#produtos').append(html);
						$('#'+i+'').append("<img src=../images/" + imagem + " witdh='250px' height='300px'/>");
						

					}
					

				}


			},
			error: function(jqXhr, textStatus, errorMessage) {
				// error callback 
				console.log(jqXhr);
				console.log(textStatus);
				console.log(errorMessage);
				$('#produtos').html('Error: ' + errorMessage);

			}
		});
	}

	function loadComputadores() {
			
			$.ajax({
				url: 'getComputadores.php',
				type: 'GET', // type of response data
				dataType: 'json',
				contentType: "application/json",
				timeout: 500, // timeout milliseconds 
				success: function(data) {
				// success callback function 
				var produtos = data.produtos;
				
				if (data.status == 'ok') {
					
					for(var i=0;i<produtos.length;i++){
						
						var id = produtos[i].id;
						var categoria = produtos[i].NAME;
						var nome = produtos[i].nome;
						var preco = produtos[i].preco;
						var imagem = produtos[i].image;

						html ='<div class="col-md-4 col-xs-6" style="width:290px; height:500px">';
						html += '<div class="product">';
						html += '<div id="'+i+'" class="product-img">';
						//html += '<img witdh="230px" height="300px" alt="" src="..../images/" '+ imagem + '">';
						html += '<div class="product-label">';
						html += '</div>';
						html +=	'</div>';
						html += '<div class="product-body">';
						html +=	'<p class="product-category">'+ categoria +'</p>';
						html +=	'<h3 class="product-name"><a href="product.php?id='+ id +'">'+ nome +'</a></h3>';
						html +=	'<h4 class="product-price"> '+ preco +'€</h4>';
						html +=	'<div class="product-btns">';
						
						html +=	'<button class="quick-view"><a href="product.php?id='+ id +'"<i class="fa fa-eye"></i><span class="tooltipp">quick view</span></a></button>';
						html +=	'</div>';
						html +=	'</div>';
						html +=	'<div class="add-to-cart">';
						html +=	'<button class="add-to-cart-btn"><a href="product.php?id='+ id +'"<i class="fa fa-shopping-cart"></i> add to cart</button>';
						html +=	'</div>';
						html +=	'</div>';
						html +=	'</div>';
						$('#produtos').append(html);
						$('#'+i+'').append("<img src=../images/" + imagem + " witdh='250px' height='300px'/>")

					}
					

				}


			},
			error: function(jqXhr, textStatus, errorMessage) {
				// error callback 
				console.log(jqXhr);
				console.log(textStatus);
				console.log(errorMessage);
				$('#produtos').html('Error: ' + errorMessage);

			}
		});
	}

	function loadSmartphones() {
			
			$.ajax({
				url: 'getSmartphones.php',
				type: 'GET', // type of response data
				dataType: 'json',
				contentType: "application/json",
				timeout: 500, // timeout milliseconds 
				success: function(data) {
				// success callback function 
				var produtos = data.produtos;
				
				if (data.status == 'ok') {
					
					for(var i=0;i<produtos.length;i++){

						var id = produtos[i].id;
						var categoria = produtos[i].NAME;
						var nome = produtos[i].nome;
						var preco = produtos[i].preco;
						var imagem = produtos[i].image;

						html ='<div class="col-md-4 col-xs-6" style="width:290px; height:500px">';
						html += '<div class="product">';
						html += '<div id="'+i+'" class="product-img">';
						//html += '<img witdh="230px" height="300px" alt="" src="..../images/" '+ imagem + '">';
						html += '<div class="product-label">';
						html += '</div>';
						html +=	'</div>';
						html += '<div class="product-body">';
						html +=	'<p class="product-category">'+ categoria +'</p>';
						html +=	'<h3 class="product-name"><a href="product.php?id='+ id +'">'+ nome +'</a></h3>';
						html +=	'<h4 class="product-price"> '+ preco +'€</h4>';
						html +=	'<div class="product-btns">';
						
						html +=	'<button class="quick-view"><a href="product.php?id='+ id +'"<i class="fa fa-eye"></i><span class="tooltipp">quick view</span></a></button>';
						html +=	'</div>';
						html +=	'</div>';
						html +=	'<div class="add-to-cart">';
						html +=	'<button class="add-to-cart-btn"><a href="product.php?id='+ id +'"<i class="fa fa-shopping-cart"></i> add to cart</button>';
						html +=	'</div>';
						html +=	'</div>';
						html +=	'</div>';
						$('#produtos').append(html);
						$('#'+i+'').append("<img src=../images/" + imagem + " witdh='250px' height='300px'/>")

					}
					

				}


			},
			error: function(jqXhr, textStatus, errorMessage) {
				// error callback 
				console.log(jqXhr);
				console.log(textStatus);
				console.log(errorMessage);
				$('#produtos').html('Error: ' + errorMessage);

			}
		});
	}

	function loadPerifericos() {
			
			$.ajax({
				url: 'getPerifericos.php',
				type: 'GET', // type of response data
				dataType: 'json',
				contentType: "application/json",
				timeout: 500, // timeout milliseconds 
				success: function(data) {
				// success callback function 
				var produtos = data.produtos;
				
				if (data.status == 'ok') {
					
					for(var i=0;i<produtos.length;i++){
						
						var id = produtos[i].id;
						var categoria = produtos[i].NAME;
						var nome = produtos[i].nome;
						var preco = produtos[i].preco;
						var imagem = produtos[i].image;

						html ='<div class="col-md-4 col-xs-6" style="width:290px; height:500px">';
						html += '<div class="product">';
						html += '<div id="'+i+'" class="product-img">';
						//html += '<img witdh="230px" height="300px" alt="" src="..../images/" '+ imagem + '">';
						html += '<div class="product-label">';
						html += '</div>';
						html +=	'</div>';
						html += '<div class="product-body">';
						html +=	'<p class="product-category">'+ categoria +'</p>';
						html +=	'<h3 class="product-name"><a href="product.php?id='+ id +'">'+ nome +'</a></h3>';
						html +=	'<h4 class="product-price"> '+ preco +'€</h4>';
						html +=	'<div class="product-btns">';
						
						html +=	'<button class="quick-view"><a href="product.php?id='+ id +'"<i class="fa fa-eye"></i><span class="tooltipp">quick view</span></a></button>';
						html +=	'</div>';
						html +=	'</div>';
						html +=	'<div class="add-to-cart">';
						html +=	'<button class="add-to-cart-btn"><a href="product.php?id='+ id +'"<i class="fa fa-shopping-cart"></i> add to cart</button>';
						html +=	'</div>';
						html +=	'</div>';
						html +=	'</div>';
						$('#produtos').append(html);
						$('#'+i+'').append("<img src=../images/" + imagem + " witdh='250px' height='300px'/>")

					}
					

				}


			},
			error: function(jqXhr, textStatus, errorMessage) {
				// error callback 
				console.log(jqXhr);
				console.log(textStatus);
				console.log(errorMessage);
				$('#produtos').html('Error: ' + errorMessage);

			}
		});
	}

	function loadComponentes() {
			
			$.ajax({
				url: 'getComponentes.php',
				type: 'GET', // type of response data
				dataType: 'json',
				contentType: "application/json",
				timeout: 500, // timeout milliseconds 
				success: function(data) {
				// success callback function 
				var produtos = data.produtos;
				
				if (data.status == 'ok') {
					
					for(var i=0;i<produtos.length;i++){
						
						var id = produtos[i].id;
						var categoria = produtos[i].NAME;
						var nome = produtos[i].nome;
						var preco = produtos[i].preco;
						var imagem = produtos[i].image;

						html ='<div class="col-md-4 col-xs-6" style="width:290px; height:500px">';
						html += '<div class="product">';
						html += '<div id="'+i+'" class="product-img">';
						//html += '<img witdh="230px" height="300px" alt="" src="..../images/" '+ imagem + '">';
						html += '<div class="product-label">';
						html += '</div>';
						html +=	'</div>';
						html += '<div class="product-body">';
						html +=	'<p class="product-category">'+ categoria +'</p>';
						html +=	'<h3 class="product-name"><a href="product.php?id='+ id +'">'+ nome +'</a></h3>';
						html +=	'<h4 class="product-price"> '+ preco +'€</h4>';
						html +=	'<div class="product-btns">';
						
						html +=	'<button class="quick-view"><a href="product.php?id='+ id +'"<i class="fa fa-eye"></i><span class="tooltipp">quick view</span></a></button>';
						html +=	'</div>';
						html +=	'</div>';
						html +=	'<div class="add-to-cart">';
						html +=	'<button class="add-to-cart-btn"><a href="product.php?id='+ id +'"<i class="fa fa-shopping-cart"></i> add to cart</button>';
						html +=	'</div>';
						html +=	'</div>';
						html +=	'</div>';
						$('#produtos').append(html);
						$('#'+i+'').append("<img src=../images/" + imagem + " witdh='250px' height='300px'/>")

					}
					

				}


			},
			error: function(jqXhr, textStatus, errorMessage) {
				// error callback 
				console.log(jqXhr);
				console.log(textStatus);
				console.log(errorMessage);
				$('#produtos').html('Error: ' + errorMessage);

			}
		});
	}

	function loadImagem () {
			
			$.ajax({
				url: 'getImagem.php',
				type: 'GET', // type of response data
				dataType: 'json',
				contentType: "application/json",
				timeout: 500, // timeout milliseconds 
				success: function(data) {
				// success callback function 
				var produtos = data.produtos;
				
				if (data.status == 'ok') {
					
					for(var i=0;i<produtos.length;i++){

						var id = produtos[i].id;
						var categoria = produtos[i].NAME;
						var nome = produtos[i].nome;
						var preco = produtos[i].preco;
						var imagem = produtos[i].image;

						html ='<div class="col-md-4 col-xs-6" style="width:290px; height:500px">';
						html += '<div class="product">';
						html += '<div id="'+i+'" class="product-img">';
						//html += '<img witdh="230px" height="300px" alt="" src="..../images/" '+ imagem + '">';
						html += '<div class="product-label">';
						html += '</div>';
						html +=	'</div>';
						html += '<div class="product-body">';
						html +=	'<p class="product-category">'+ categoria +'</p>';
						html +=	'<h3 class="product-name"><a href="product.php?id='+ id +'">'+ nome +'</a></h3>';
						html +=	'<h4 class="product-price"> '+ preco +'€</h4>';
						html +=	'<div class="product-btns">';
						
						html +=	'<button class="quick-view"><a href="product.php?id='+ id +'"> <i class="fa fa-eye"></i><span class="tooltipp">quick view</span></a></button>';
						html +=	'</div>';
						html +=	'</div>';
						html +=	'<div class="add-to-cart">';
						html +=	'<button class="add-to-cart-btn"><a href="product.php?id='+ id +'"<i class="fa fa-shopping-cart"></i> add to cart</button>';
						html +=	'</div>';
						html +=	'</div>';
						html +=	'</div>';
						$('#produtos').append(html);
						$('#'+i+'').append("<img src=../images/" + imagem + " witdh='250px' height='300px'/>")

					}
					

				}


			},
			error: function(jqXhr, textStatus, errorMessage) {
				// error callback 
				console.log(jqXhr);
				console.log(textStatus);
				console.log(errorMessage);
				$('#produtos').html('Error: ' + errorMessage);

			}
		});
	}

	function loadOutros () {
			
			$.ajax({
				url: 'getOutros.php',
				type: 'GET', // type of response data
				dataType: 'json',
				contentType: "application/json",
				timeout: 500, // timeout milliseconds 
				success: function(data) {
				// success callback function 
				var produtos = data.produtos;
				
				if (data.status == 'ok') {
					
					for(var i=0;i<produtos.length;i++){
						
						var id = produtos[i].id;
						var categoria = produtos[i].NAME;
						var nome = produtos[i].nome;
						var preco = produtos[i].preco;
						var imagem = produtos[i].image;

						html ='<div class="col-md-4 col-xs-6" style="width:290px; height:500px">';
						html += '<div class="product">';
						html += '<div id="'+i+'" class="product-img">';
						//html += '<img witdh="230px" height="300px" alt="" src="..../images/" '+ imagem + '">';
						html += '<div class="product-label">';
						html += '</div>';
						html +=	'</div>';
						html += '<div class="product-body">';
						html +=	'<p class="product-category">'+ categoria +'</p>';
						html +=	'<h3 class="product-name"><a href="product.php?id='+ id +'">'+ nome +'</a></h3>';
						html +=	'<h4 class="product-price"> '+ preco +'€</h4>';
						html +=	'<div class="product-btns">';
					
						html +=	'<button class="quick-view"> <a href="product.php?id='+ id +'" <i class="fa fa-eye"></i><span class="tooltipp">quick view</span></a></button>';
						html +=	'</div>';
						html +=	'</div>';
						html +=	'<div class="add-to-cart">';
						html +=	'<button class="add-to-cart-btn"><a href="product.php?id='+ id +'"<i class="fa fa-shopping-cart"></i> add to cart</button>';
						html +=	'</div>';
						html +=	'</div>';
						html +=	'</div>';
						$('#produtos').append(html);
						$('#'+i+'').append("<img src=../images/" + imagem + " witdh='250px' height='300px'/>")

					}
					

				}


			},
			error: function(jqXhr, textStatus, errorMessage) {
				// error callback 
				console.log(jqXhr);
				console.log(textStatus);
				console.log(errorMessage);
				$('#produtos').html('Error: ' + errorMessage);

			}
		});
	}

	$(document).ready(function() {
		var url = window.location.href;
		var ctg = url.substring(url.lastIndexOf('=') + 1);
		console.log(ctg);

		var check1 = document.getElementById('category-1').checked;
		var check2 = document.getElementById('category-2').checked;
		var check3 = document.getElementById('category-3').checked;
		var check4 = document.getElementById('category-4').checked;
		var check5 = document.getElementById('category-5').checked;
		var check6 = document.getElementById('category-6').checked;
		console.log(check1);
		console.log(check2);
		console.log(check3);
		console.log(check4);
		console.log(check5);
		console.log(check6);

		// $('#category-1').on('click', function() {
		// 	loadComputadores();
		// });



		// if( check1 == true ){
		// 	loadComputadores();
		// 	exit();
		// }else if( check2 == true){
		// 	loadSmartphones();
		// 	exit();
		// }else if( check3 == true) {
		// 	loadPerifericos();
		// 	exit();
		// }else if (check4 == true){
		// 	loadComponentes();
		// 	exit();
		// }else if (check5 == true){
		// 	loadImagem();
		// 	exit();
		// }else if (check6 == true){
		// 	loadOutros();
		// 	exit();
		// }else{
		// 	loadProdutos();
		// 	exit();
		// }

		if( ctg == 1 ){
			loadComputadores();
			exit();
		}else if( ctg == 2){
			loadSmartphones();
			exit();
		}else if(ctg == 3) {
			loadPerifericos();
			exit();
		}else if (ctg == 4){
			loadComponentes();
			exit();
		}else if (ctg == 5){
			loadImagem();
			exit();
		}else if (ctg == 6){
			loadOutros();
			exit();
		}else{
			loadProdutos();
			exit();
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
				<?php 
				$ctg = $_GET['ctg'];
				?>
				<ul class="main-nav nav navbar-nav">
					<li><a href="index.php">Home</a></li>
					<li <?php if($ctg == null){echo 'class="active"';} ?>><a href="store.php">Loja</a></li>
					<li <?php if($ctg == 1){echo 'class="active"';} ?>><a href="store.php?ctg=1">Computadores</a></li>
					<li <?php if($ctg == 2){echo 'class="active"';} ?>><a href="store.php?ctg=2">Smartphones</a></li>
					<li <?php if($ctg == 3){echo 'class="active"';} ?>><a href="store.php?ctg=3">Periféricos</a></li>
					<li <?php if($ctg == 4){echo 'class="active"';} ?>><a href="store.php?ctg=4">Componentes</a></li>
					<li <?php if($ctg == 5){echo 'class="active"';} ?>><a href="store.php?ctg=5">Imagem</a></li>
					<li <?php if($ctg == 6){echo 'class="active"';} ?>><a href="store.php?ctg=6">Outros</a></li>

					
					


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
							<!--<li><a href="#">Accessories</a></li>-->
							<!--<li class="active">Headphones (227,490 Results)</li>-->
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
					<div id="produtos" >
						
					</div>
					<!-- ASIDE -->
					<div id="aside" style="visibility: hidden;" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categorias</h3>
							<div class="checkbox-filter">

								<div class="input-checkbox">
									<input <?php if($ctg == 1){echo 'checked';}?> type="checkbox" id="category-1">
									<label for="category-1">
										<span></span>
										Computadores
										
									</label>
								</div>

								<div class="input-checkbox">
									<input <?php if($ctg == 2){echo 'checked';}?> type="checkbox" id="category-2">
									<label for="category-2">
										<span></span>
										Smartphones
									
									</label>
								</div>

								<div class="input-checkbox">
									<input <?php if($ctg == 3){echo 'checked';}?> type="checkbox" id="category-3">
									<label for="category-3">
										<span></span>
										Periféricos
										
									</label>
								</div>

								<div class="input-checkbox">
									<input <?php if($ctg == 4){echo 'checked';}?> type="checkbox" id="category-4">
									<label for="category-4">
										<span></span>
										Componentes
										
									</label>
								</div>

								<div  class="input-checkbox">
									<input <?php if($ctg == 5){echo 'checked';}?> type="checkbox" id="category-5">
									<label for="category-5">
										<span></span>
										Imagem
										
									</label>
								</div>

								<div class="input-checkbox">
									<input <?php if($ctg == 6){echo 'checked';}?> type="checkbox" id="category-6">
									<label for="category-6">
										<span></span>
										Outros
										
									</label>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<!--<div class="aside">
							<h3 class="aside-title">Price</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>-->
						<!-- /aside Widget -->

						<!-- aside Widget -->
						
						<!-- /aside Widget -->

					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							
						</div> 
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row" id="row">
							<!-- /////////////////////////////////////////////////////////////////////////product -->	
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

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
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
