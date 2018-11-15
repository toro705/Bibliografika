	</main>
	<footer class="pie bg-2">
		<div class="container">
            <div class="row">
				<div class="col-md-4 hidden-xs hidden-sm col-lg-2">
						<p class="h5"><a href="<?=url('librerias')?>">LIBRERÍAS</a></p>
						<ul class="unstyled-list">
							<li><a class="paragraph-2" href="<?=url('librerias#sin-stocks')?>">eDistribución</a></li>
						</ul>
				</div>
				<div class="col-md-4 hidden-xs hidden-sm col-lg-2">
						<p class="h5"><a href="<?=url('editoriales')?>">EDITORIALES</a></p>
						<ul class="unstyled-list">
							<li><a class="paragraph-2" href="<?=url('editoriales#impresion-por-demanda')?>">Impresión por demanda</a></li>
							<li><a class="paragraph-2" href="<?=url('editoriales#edistribucion')?>">eDistribución</a></li>
						</ul>
				</div>
				<div class="col-md-4 hidden-xs hidden-sm col-lg-2">
					<p class="h5"><a href="<?=url('bibliografika')?>">BIBLIOGRÁFIKA</a></p>
				</div>
				<div class="clearfix visible-md separador-pie"></div>
				<div class="col-md-4 hidden-xs hidden-sm col-lg-2">
						<p class="h5"><a href="<?=url('novedades')?>">NOVEDADES</a></p>
				</div>
				<div class="col-sm-6 col-md-4 footer-contacto col-lg-2">
						<p class="h5 text-center-xs"><a href="<?=url('contacto')?>">CONTACTO</a></p>
						<ul class="unstyled-list">
							<li class="text-center-xs">
								<i class="icn icn-3 text-center-xs" aria-hidden="true"></i><br>
								<a class="paragraph-2 text-center-xs" target="_blank" href="mailto:consultas@bibliografika.com;">consultas@bibliografika.com</a>
							</li>
							<li class="text-center-xs">
								<i class="icn icn-4 text-center-xs" aria-hidden="true"></i><br>
								<a class="paragraph-2 text-center-xs" href="tel:11-4524-0005">(+5411) 4524-0005</a>
							</li>
						</ul>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-2 newsletter">
					<p class="h5 text-center-xs">RECIBA TODAS LAS NOVEDADES</p>
					<?php include('forms/newsletter.php'); ?>
					<?= $form_newsletter->mensaje_estado ?>
					<?php if ($form_newsletter->estado != 'ok') { ?>
						<form id="newsletter-form" role="form" method="post" action="<?=URL_SECCION?>#newsletter-form">
							<div class="form-group">
			                    <input class="form-control text-center-xs" aria-label="Email" type="email" id="email" name="email" value="<?= (isset($_POST['email'])) ? $_POST['email'] : ''; ?>" placeholder="E-mail"/>
			                </div>
							<button type="submit" class="btn btn-xs btn-transparent" name="enviar_newsletter">SUSCRIBIRME</button>
						</form>
					<?php } ?>
				</div>
			</div>
		</div>
	</footer>
	<div class="copyright">
		<div class="container">
            <div class="row">
           		<div class="col-xs-12 col-sm-6 text-left text-center-xs">
           			<a href="<?=url('home')?>"><img src="images/logo_nav-principal-pie.png" alt="BIBLIOGRAFIKA"></a><br>
				</div>
			</div>
            <div class="row">
           		<div class="col-xs-12 col-sm-6 text-left text-center-xs">
					<small>Copyright <?=date('Y').' ©  '.Empresa::$nombre?></small>
				</div>
    			<div class="col-xs-12 col-sm-6 text-right text-center-xs">
					<a class="synapsis" href="http://synapsis.com.ar/" target="_blank" title="Diseño web Argentina"><img src="images/logo_synapsis.png" alt="Synapsis Diseño Web Argentina">				
</a>
    			</div>
    		</div>
    	</div>
	</div>

   <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/wow.min.js"></script>
	<script>
			new WOW().init();
	</script>
   <!-- Imágenes responsive -->
    <script>
	   	//Defino el nuevo ancho de las imágenes
	      	var anchoVentana = $(window).width();
	      	var anchos = [1920,1200,990,768,490];
	      	var nuevoAncho = 1920;
	      	for (var i=0; i<anchos.length; i++) {
	      		if( anchoVentana<anchos[i] ){
		      		nuevoAncho = anchos[i];	
		      	}
	      	}

	      	//Cambio el src de las imágenes
	      	var imagenes = ['.slider-principal__imagen'];
	      	for (var i=0; i<imagenes.length; i++) {
	      		$(imagenes[i]).each(function(){
	       			var src = $(this).attr('src');
	       			$(this).attr('src',src.replace('1920',nuevoAncho));
	      		});
	      	}
    </script>
    <!-- Fin Imágenes responsive -->

    <!-- Scroll en cabecera -->
	<script>
		//Anima el menú cuando hay scroll
		$( window ).scroll(function(){
			var $cabecera = $('.cabecera');
			if( $(window).scrollTop() > 20){
				$cabecera.addClass('scroll');
			}else{
				$cabecera.removeClass('scroll');
			}
		});
		//Oculta y muestra el menú cuando hay scroll
		var $cabecera = $('.cabecera');
		var previousScroll = 0;
		$(window).scroll(function(event){
		   var scroll = $(this).scrollTop();
		   if (scroll > previousScroll && scroll > 400){
		       $cabecera.addClass('ocultar');
		       //Cierra el menú cuando hay scroll
				$(".navbar-collapse").removeClass("in").addClass("collapse");
				$(".navbar-toggle").removeClass("is-active");
		   } else {
		      $cabecera.removeClass('ocultar');
		   }
		   previousScroll = scroll;
		});
	</script>
	<!-- Fin Scroll en cabecera -->

    <!-- Hamburguesa  -->
    <script>
	$(document).ready(function(){
		$('.hamburger').click(function(){
			$(this).toggleClass('is-active');
		});
		$('.dropdown-toggle').click(function(){
			$(this).parent().toggleClass('open');
		});
	});
    </script>
	<!-- Fin hamburguesa -->

	<?php if(in_array('slider-principal', $js)){ ?>
	<!-- Owl Carousel -->
	<!-- http://owlcarousel2.github.io/OwlCarousel2/ -->
    <script src="js/jquery.owl.carousel/owl.carousel.min.js"></script>
    <script src="js/jquery.owl.carousel/owl.animate.js"></script>
	<?php }

	if(in_array('slider-principal', $js)){ ?>
	<!-- Owl Carousel -->
    <script>
		$(document).ready(function(){
			$('.slider-principal > ul').owlCarousel({
				autoplay: true,
				items: 1,
			    loop: true,
			    slideSpeed: 600,
		        paginationSpeed: 400,
		        singleItem: true,
		        nav: false,
		        dots: false,
		        dragBeforeAnimFinish: false,
		        mouseDrag: false,
		        touchDrag: false,
		        animateOut: 'fadeOut'

			});
		});
    </script>
	<script>
		$(document).ready(function() {
		 	$('#slider-librerias').owlCarousel({
				autoplay: true,
	      		items : 11, 
	      		responsive : {
		            1600 : { items : 11  },
		            1200 : { items : 10  },
		            990 : { items : 8  },
		            768 : { items : 6  },
		            600 : { items : 5  },
		            480 : { items : 4  },
		            400 : { items : 3  },
		            320 : { items : 2  }
		        },
			    loop: true,
			    slideSpeed: 600,
		        paginationSpeed: 400,
		        dots: false,
		        nav: true,
		        dragBeforeAnimFinish: false,
		        mouseDrag: false,
		        touchDrag: true,
		        navText: [
	            "<div class=\"slider-librerias__controls bg-1 color-2 prev\"><i class='fa fa-chevron-left'></i></div>",
	            "<div class=\"slider-librerias__controls bg-1 color-2 next\"><i class='fa fa-chevron-right'></i></div>"
	            ],		        
			});
		});		
	</script>
	<!-- Fin Owl Carousel -->
	<?php } ?>
  </body>
</html>