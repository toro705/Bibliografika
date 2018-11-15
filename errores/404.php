<?php

    include_once('includes/config/inicio.php');
    $m = Missing_children::obtener();

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Página no encontrada</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <base href="<?=BASE_URL?>">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/missing.css">
</head>
<body>
    <article>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <div class="no-encontrado">
                            <h1>Página no encontrada</h1>
                            <p>Pero podés ayudarnos a encontrar a:</p>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="no-encontrado__imagen">
                                        <img class="img-responsive" src="<?=$m->foto?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6 text-left">
                                    <div class="no-encontrado__texto">
                                        <h2><?=$m->nombre?></h2>
                                        <div class="no-encontrado__datos">
                                            <p><strong>Edad actual:</strong> <?='<span class="no-encontrado__edad">'.$m->edad.'</span><br>
                                            <strong>Edad en la foto:</strong> <span class="no-encontrado__edad_foto">'.$m->edad_foto.'</span><br>
                                            <strong>Residencia:</strong> <span class="no-encontrado__residencia">'.$m->residencia.'</span><br>
                                            <strong>Perdido/a desde:</strong> <span class="no-encontrado__fecha">'.$m->fecha_desaparicion.'</span><br>'?></p>
                                            <a class="boton" href="">Más búsquedas</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3>Si tenés información comunicate al <a href="tel:0800-333-5500">0800-333-5500</a> <div class="redes"><a class="redes" href="http://www.facebook.com/noencontradoORG" target="_blank"><i class="fa fa-facebook"></i><span>Facebook</span></a> <a class="redes" href="http://www.twitter.com/noencontradoORG" target="_blank"><i class="fa fa-twitter"></i><span>Twitter</span></a></div></h3>
                            <div class="logos">
                                <a href="http://www.missingchildren.org.ar" target="blank_">
                                    <img class="img-responsive" src="images/logo_404-1.gif">
                                    <span>Missing Children</span>
                                </a>
                                <a href="http://www.noencontrado.org" target="blank_">
                                    <img class="img-responsive" src="images/logo_404-2.gif">
                                    <span>Noencontrado.org</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>



    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
    $(document).ready(function(){
        // Abrir sesión con AJAX
        $('.boton').click(function(){
            $.ajax({
                type: 'GET',
                url: "<?= BASE_URL.'json?m=missing_children&formato=json'?>",
                context: document.body,

                error: function(){
                    // $form.find(".error").html('Hubo un problema.');
                },

                success: function(m){
                    $('.no-encontrado__imagen img').attr('src', m.foto);
                    $('h2').html(m.nombre);
                    $('.no-encontrado__edad').html(m.edad);
                    $('.no-encontrado__edad_foto').html(m.edad_foto);
                    $('.no-encontrado__residencia').html(m.residencia);
                    $('.no-encontrado__fecha').html(m.fecha_desaparicion);
                }
            });

            return false;
        });
    });
    </script>
</body>
</html>
