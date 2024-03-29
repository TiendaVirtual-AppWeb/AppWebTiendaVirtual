<?php
session_start();
if(!isset ($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info']))
header ('Location: ../index.php');

  require '../../vendor/autoload.php';

  if(isset($_GET['id']) && is_numeric($_GET['id'])){
      $id = $_GET['id'];
    
      $pelicula = new Kawschool\Articulo;
      $resultado = $pelicula->mostrarPorId($id);
	

      if(!$resultado)
          header('Location: index.php');

  }else{
    header('Location: index.php');
  }
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
					
                <div class="right-top-bar flex-w h-full">

                    <a href="" class="flex-c-m trans-04 p-lr-25">
                        Editar artículo
                    </a>
                    </div>
                    <div class="right-top-bar flex-w h-full">

						<a href="../dashboard.php" class="flex-c-m trans-04 p-lr-25">
							<span>Mi cuenta</span>
						</a>
					</div>
			
				</div>
			</div>


			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">

					<!-- Logo desktop -->
					<a href="../../index.php" class="logo">
						<img src="../../assets/images/icons/logo.png" alt="Tienda Virtual">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="../../index.php">Inicio</a>
							</li>
						</ul>
					</div>

					<!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m"> 
					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="../../index.php"><img src="../../assets/images/icons/logo.png" alt="IMG-LOGO"></a>
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

			<ul class="main-menu-m">
				<li>
					<a href="../../index.php">Inicio</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="../assets/images/icons/icon-close2.png" alt="CLOSE">
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
    <!-- Formulario para editar productos -->
    <div class="container" id="main" >
      <div class="row">
        <div class="col-md-12">
          <fieldset>
            <legend>Editar artículo</legend>
            <form method="POST" action="../controlador.php" enctype="multipart/form-data" >
            <input type="hidden" name="id" value="<?php print $resultado['id']?>">  
			<div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Artículo</label>
                          <input value="<?php print $resultado['articulo']?>" type="text" class="form-control" name="articulo">
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Descripción</label>
                          <textarea class="form-control" name="descripcion" id="" cols="3" required><?php print $resultado['descripcion']?></textarea>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-4">
                      <div class="form-group">
                          <label>Categorias</label>
                          <select class="form-control" name="categoriaid" required>
                            <option value="">--SELECCIONE--</option>
                            
							<?php
								require '../../vendor/autoload.php';
									$categoria = new Kawschool\Categoria;
									$info_categoria = $categoria->mostrar();
									$longitud = count($info_categoria);
								for($i =0; $i< $longitud;$i++){
								$indice_categoria = $info_categoria[$i];
							?>
                                <option value="<?php print $indice_categoria['id'] ?>" 
								<?php print $resultado['categoriaid']== $indice_categoria['id'] ?'selected':'' ?>
								><?php print $indice_categoria['nombre'] ?></option>
                              <?php

                                }
                              ?>
                            
                          </select>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Imagen</label>
                          <input type="file" class="form-control" name="imagen">
						  <input type="hidden"name="imagen_temp" value="<?php print $resultado['imagen']?>">
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-3">
                      <div class="form-group">
                          <label>Precio</label>
                          <input value="<?php print $resultado['precio']?>" type="text" class="form-control" name="precio" required>
                      </div>
                  </div>
              </div>
              <input type="submit" name="accion" class="btn btn-primary" value="Editar">
              <a href="index.php" class="btn btn-default">Cancelar</a>
            </form>
          </fieldset>
        
        </div>
      </div>

    </div> <!-- /container -->

     <br> <br> 
	<!-- Footer -->
	<footer class="bg3 p-t-15 p-b-10">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-6 p-b-10">
					<h4 class="stext-301 cl0 p-b-15">
						De interes
					</h4>
					<ul>
						<li class="p-b-7">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								
							</a>
						</li>
						<li class="p-b-7">
							<a href="../index.php" class="stext-107 cl7 hov-cl1 trans-04">
								Artículos
							</a>
						</li>
						<li class="p-b-7">
							<a href="../nosotros.php" class="stext-107 cl7 hov-cl1 trans-04">
								Nosotros
							</a>
						</li>

					</ul>
				</div>
				<div class="col-sm-6 col-lg-6 p-b-10 ">
					<h4 class="stext-301 cl0 p-b-15" >
						Contacto
					</h4>
					<p class="stext-107 cl7 size-201" >
						Universidad de Antioquia 
                        <br>
                        Ingeniería Electrónica
                        <br>
                        David Vélez, davidf.velez@udea.edu.co
                        David Charo, cristian.charo@udea.edu.co
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