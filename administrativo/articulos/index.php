<?php
session_start();
if(!isset ($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info']))
header ('Location: ../index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<title>TiendaVirtual_final</title>
	<meta charset="UTF-8">
    <meta name="drescription" content="Tienda Virtual proyecto final App-Web">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="David Vélez, David Charo">

<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../../assets/images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../assets/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../assets/fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Bienvenido Usuario: David
					</div>

					<div class="right-top-bar flex-w h-full">

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							Mi cuenta
						</a>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">

					<!-- Logo desktop -->
					<a href="#" class="logo">
						<img src="../../assets/images/icons/logo-01.png" alt="Tienda Virtual">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="index.html">Inicio</a>

							</li>

							<li>
								<a href="product.html">Tienda</a>
							</li>

							<li>
								<a href="nosotros.html">Nosotros</a>
							</li>

							<li>
								<a href="contacto.html">Contacto</a>
							</li>
						</ul>
					</div>

					<!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i><a href="index.php">Articulos</a></i>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">
							<i><a href="../pedidos/index.php">Pedidos</a></i>
						</div>

                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">
							<i><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php print $_SESSION['usuario_info']['nombre_usuario']?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="../cerrarsesion.php">Salir</a></li>
                        </ul></i>
						</div>
                        
					</div>
				</nav>
			</div>
		</div>



		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="index.html"><img src="../../assets/images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Bienvenido: "aqui el nombre del usuario"
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Mi cuenta
						</a>

					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.html">Inicio</a>
				</li>

				<li>
					<a href="product.html">Tienda</a>
				</li>

				<li>
					<a href="nosotros.html">Nosotros</a>
				</li>

				<li>
					<a href="contacto.html">Contacto</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="../../assets/images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>


	</header>

    <br> <br> <br><hr>
 	<!-- Despliegue de articulos -->
	<div class="container" id="main">
		<div class="row">
          <div class="col-md-12">
              <div class="pull-right">
                <a href="registrar_form.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Nuevo</a>
              </div>
          </div>
        </div>

		<div class="row">
			<div class="col-md-12">
				<fieldset>
				<legend>Articulos</legend>
					<table class="table table-bordered">
					<thead>
						<tr>
						<th>#</th>
						<th>Articulo</th>
						<th>Categoria</th>
						<th>Precio</th>
						<th class="text-center">Imagen</th>
						<th> </th>
						</tr>
					</thead>
					<tbody> 
						<?php
							require '../../vendor/autoload.php';
							$articulo = new Kawschool\Articulo;
							$articulo_info = $articulo->mostrar();
							$longitud = count($articulo_info);
							 
							if($longitud > 0){
								$cont=0;
								for($i =0; $i < $longitud; $i++){
									$cont++;
									$indice_articulo = $articulo_info[$i];
						?>
								<tr>
									<td><?php print $cont ?></td>
									<td><?php print $indice_articulo['articulo'] ?></td>
									<td><?php print $indice_articulo['nombre'] ?></td>
									<td><?php print $indice_articulo['precio']?> </td>
									<td class="text-center">
									<?php $imagen='../../assets/img_articulos/'.$indice_articulo['imagen']; 
									if(file_exists($imagen)){?>

									<img src="<?php print $imagen; ?>" alt="img_articulo" width="50">
									<?php }else{ ?>	Sin imagen <?php } ?>

									</td>
									<td class="text-center">
										<a href="../controlador.php?id=<?php print $indice_articulo['id'] ?>"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></a>
										<a href="editar_form.php?id=<?php print $indice_articulo['id'] ?>"><button type="button" class="btn btn-success btn-sm">Editar</button></a>
									</td>
								</tr>
						<?php }}else{ ?>
								<tr><td colspan="6">No hay articulos registrados</td></tr>
						<?php } ?>
					</tbody>
					</table>
				</fieldset>
			</div>
		</div>
	</div>

     <br> <br> 
	<!-- Footer -->
	<footer class="bg3 p-t-15 p-b-10">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-6 p-b-10">
					<h4 class="stext-301 cl0 p-b-15">
						Categorias
					</h4>
					<ul>
						<li class="p-b-7">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Colección
							</a>
						</li>
						<li class="p-b-7">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Decoración
							</a>
						</li>
						<li class="p-b-7">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Juguetes
							</a>
						</li>
						<li class="p-b-2">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Relojes
							</a>
						</li>
					</ul>
				</div>
				<div class="col-sm-6 col-lg-6 p-b-10">
					<h4 class="stext-301 cl0 p-b-15">
						Contacto
					</h4>
					<p class="stext-107 cl7 size-201">
						Facultad de ingenieria - Universidad de Antioquia - Ingeniería Electrónica
					</p>
					<div class="p-t-27">
						<a href="#" target="_blank" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>
						<a href="#" target="_blank" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>
					</div>
				</div>
			</div>
			<div class="p-t-2">
				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		</div>
	</footer>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>



<!--===============================================================================================-->
	<script src="../../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../../vendor/bootstrap/js/popper.js"></script>
	<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../../vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="../../vendor/daterangepicker/moment.min.js"></script>
	<script src="../../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../../vendor/slick/slick.min.js"></script>
	<script src="../../assets/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="../../vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="../../vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="../../vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="../../vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

	</script>
<!--===============================================================================================-->
	<script src="../../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="../../assets/js/main.js"></script>

</body>
</html>
	
