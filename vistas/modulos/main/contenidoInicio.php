<?php
$item = null;
$valor = null;

$anuncio1 = ControladorAnuncioA::ctrMostrarAnuncioA($item, $valor);
$countAnuncio1 = count($anuncio1);
if ($countAnuncio1 > 0) {
?>
<section class="pt-120 pb-120">
    <div class="container-fluid">
        <div class="sponsor-slider">
            <?php foreach ($anuncio1 as $key => $value) { ?>
                <div class="single-slide mx-1">
                    <div class="">
                        <img src="<?php echo $value["imagen"] ?>" alt="image">
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('.sponsor-slider').slick({
            autoplay: true,
            autoplaySpeed: 3000, // Cambia el tiempo de desplazamiento a 3 segundos
            arrows: false,
            dots: true,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1
        });
    });
</script>
<?php
}
?>

<!-- =========================================
SECCION DE SOBRE NOSOTROS
========================================= -->

<?php
$item = null;
$valor = null;

$sobreNosotros = ControladorSobreNosotros::ctrMostrarSobreNosotros($item, $valor);
$countSobreNosotros = count($sobreNosotros);
if ($countSobreNosotros > 0) {
?>
    <section class="pt-120 pb-120 section-bg overflow-hidden">
        <div class="container">
            <div class="row gy-5 align-items-center justify-content-between">
                <div class="col-lg-6">
                    <div class="about-thumb-wrapper-two">
                        <img src="vistas/dist/main/assets/images/about/left-img2.jpg" alt="image">
                        <img src="vistas/dist/main/assets/images/about/about-circle2.png" alt="image" class="about-thumb-circle">
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="about-content">
                        <span class="top-title">Sobre nosotros</span>
                        <?php
                        foreach ($sobreNosotros as $key => $value) {
                        ?>
                            <h2 class="section-title"><?php echo $value["titulo"] ?></h2>
                            <p>
                                <?php
                                $descripcion = $value["descripcion"];
                                $palabras = explode(' ', $descripcion);
                                $limite_palabras = 60;

                                // Verificar si la cantidad de palabras excede el límite
                                if (count($palabras) > $limite_palabras) {
                                    // Cortar el arreglo de palabras para incluir solo las primeras 60 palabras
                                    $palabras = array_slice($palabras, 0, $limite_palabras);
                                    // Unir las palabras nuevamente en una cadena
                                    $descripcion_recortada = implode(' ', $palabras);
                                    echo $descripcion_recortada . '...';
                                } else {
                                    echo $descripcion;
                                }
                                ?>
                            </p>

                            <a href="#" class="btn btn-main" data-bs-toggle="modal" data-bs-target="#modalSobreNosotros<?php echo $value["id_sobre_nosotros"] ?>">Ver más</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
}
?>

<!-- ===============================
MODAL SOBRE NOSOTROS
=============================== -->
<?php
foreach ($sobreNosotros as $key => $value) {
?>
    <div class="modal fade" id="modalSobreNosotros<?php echo $value["id_sobre_nosotros"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background: #071126">
                <div class="d-flex justify-content-between m-3">
                    <button type="button" class="btn ms-auto p-1 btn-sm rounded-circle fw-bold" style="color: #66FCF1" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="text-center">
                    <h5 class="modal-title text-white" id="exampleModalLabel"><?php echo $value["titulo"] ?></h5>
                </div>
                <div>
                    <div class="m-4">
                        <p><?php echo $value["descripcion"] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>


<!-- ====================================
SECCION DE PROGRAMACION
==================================== -->

<section class="pt-120 pb-120 overflow-hidden">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="section-top">
                    <span class="top-title">Espectáculo en vivo</span>
                    <h2 class="section-title">Programación radial</h2>

                </div>
            </div>
        </div> <!-- row end -->

        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="day1-tab-pane" role="tabpanel" aria-labelledby="day1-tab" tabindex="0">
                        <div class="podcast-slider-two">
                            <?php

                            setlocale(LC_TIME, 'spanish');
                            $dia_actual = ucfirst(mb_strtolower(strftime('%A')));

                            $item = null;
                            $valor = null;

                            $programaciones = ControladorProgramacionRadial::ctrMostrarProgramacionRadial($item, $valor);
                            foreach ($programaciones as $key => $value) {
                                if ($value["dia"] == $dia_actual) {
                            ?>
                                    <div class="single-slide">
                                        <div class="podcast-item style-two link-item">
                                            <a href="#" class="full-link"></a>
                                            <div class="podcast-item-thumb">
                                                <img src="<?php echo $value["imagen"] ?>" alt="image">
                                                <div class="thumb-content">
                                                    <p><?php echo $value["hora"] ?></p>
                                                </div>
                                            </div>
                                            <div class="podcast-item-content">
                                                <div class="artist-thumb">
                                                    <img src="<?php echo $value["imagen"] ?>" alt="image">
                                                </div>
                                                <div class="artist-content">
                                                    <h5 class="show-name"><?php echo $value["titulo"] ?></h5>
                                                    <p class="artist-name"><?php echo $value["nombre"] ?></p>
                                                </div>
                                            </div>
                                        </div><!-- podcast-item end -->
                                    </div>
                            <?php
                                }
                            }
                            ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>




<!-- ======================================
ESPECTÁCULOS ANTERIORES (AYER)
====================================== -->
<section class="previous-show-section pt-120 pb-120 overflow-hidden" style="background-image: url('vistas/dist/main/assets/images/bg/previous-show.jpg');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="section-top">
                    <span class="top-title">Ayer</span>
                    <h2 class="section-title">Espectáculos anteriores </h2>
                </div>
            </div>
        </div><!-- row end -->
    </div>
    <div class="previous-show-slider">
        <?php
        setlocale(LC_TIME, 'spanish');
        $dia_ayer = strftime('%A', strtotime('-1 day'));
        $dia_ayer = ucfirst(mb_strtolower($dia_ayer));
        foreach ($programaciones as $key => $value) {
            if ($value["dia"] == $dia_ayer) {
        ?>
                <div class="single-slide">
                    <div class="show-item style-two">
                        <div class="thumb">
                            <img src="<?php echo $value["imagen"] ?>" alt="image">
                        </div>
                        <audio controls src="vistas/dist/main/assets/audio/main.mp3" class="style-two"></audio>
                        <div class="show-item-content">
                            <div class="show-item-top">
                                <h5 class="show-item-top-title">“<?php echo $value["titulo"] ?>”</h5>
                                <?php
                                // Obtener la hora de inicio y fin del espectáculo
                                $horas = explode(" a ", $value["hora"]);
                                $hora_inicio = date("H:i", strtotime($horas[0]));
                                $hora_fin = date("H:i", strtotime($horas[1]));

                                // Convertir las horas de inicio y fin a minutos
                                list($hora_inicio_horas, $hora_inicio_minutos) = explode(":", $hora_inicio);
                                list($hora_fin_horas, $hora_fin_minutos) = explode(":", $hora_fin);

                                $minutos_inicio = $hora_inicio_horas * 60 + $hora_inicio_minutos;
                                $minutos_fin = $hora_fin_horas * 60 + $hora_fin_minutos;

                                // Calcular la duración en minutos
                                $duracion_en_minutos = $minutos_fin - $minutos_inicio;

                                // Verificar si la duración es exactamente 60 minutos
                                if ($duracion_en_minutos == 60) {
                                    $duracion = "1 hora";
                                } else {
                                    $horas = floor($duracion_en_minutos / 60);
                                    $minutos = $duracion_en_minutos % 60;
                                    if ($horas > 0 && $minutos > 0) {
                                        $duracion = $horas . " h " . $minutos . " m";
                                    } elseif ($horas > 0) {
                                        $duracion = $horas . " hora";
                                    } else {
                                        $duracion = $minutos . " minutos";
                                    }
                                }
                                ?>

                                <span class="show-item-duration"><?php echo $duracion ?></span>

                            </div>
                            <div class="artist-thumb">
                                <img src="vistas/dist/main/assets/images/artist/1.jpg" alt="image">
                            </div>
                            <div class="artist-content">
                                <h5 class="show-name"><?php echo $value["dia"] ?></h5>
                                <p class="artist-name"><?php echo $value["nombre"] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</section>



<!-- ====================================
SECCION DE CONDUCTORES
==================================== -->

<section class="pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-top">
                    <span class="top-title">Conductores</span>
                    <h2 class="section-title">Nuestros conductores </h2>
                </div>
            </div>
        </div><!-- row end -->
        <div class="row gy-4">
            <?php
            $item = null;
            $item = null;

            $conductores = ControladorConductor::ctrMostrarConductores($item, $valor);
            foreach ($conductores as $key => $value) {
            ?>
                <div class="col-xl-3 col-sm-6">
                    <div class="rj-item style-two">
                        <!-- <div class="thumb">
                            <img src="vistas/dist/main/assets/images/rj/1.jpg" alt="image">
                        </div> -->
                        <div class="content">
                            <h4 class="rj-name">
                                <a href="jockey-details.html"><?php echo $value["nombre"] ?></a>
                            </h4>
                            <p class="rj-designation">+51 <?php echo $value["telefono"] ?></p>
                            <ul class="rj-social-links">
                                <li>
                                    <a href="#0"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#0"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="#0"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                                <li>
                                    <a href="#0"><i class="fab fa-twitter"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- rj-item end -->
                </div>
            <?php
            }
            ?>
        </div><!-- row end -->
    </div>
</section>

<!-- ==================================
ANUNCIO NUMERO 2
================================== -->
<?php
$item = null;
$valor = null;

$anuncio2 = ControladorAnuncioB::ctrMostrarAnuncioB($item, $valor);
$totalAnuncio = count($anuncio2);
if ($totalAnuncio > 0) {
?>
    <section class="pt-120 pb-120 section-bg overflow-hidden">
        <div class="container">

            <div class="testimonial-slider">
                <?php
                foreach ($anuncio2 as $key => $value) {
                ?>
                    <div class="single-slide">
                        <div class="testimonial-item">
                            <img src="<?php echo $value["imagen"] ?>" alt="image">
                        </div>
                    </div><!-- single-slide end -->
                <?php
                }
                ?>
            </div>
        </div>
    </section>
<?php
}
?>



<!-- =======================================
SECCION DE PATROCINADOR
======================================= -->
<section class="pt-120 pb-120 section-bg">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-4 text-center">
                <div class="section-top">
                    <span class="top-title">Patrocinadores</span>
                </div>
            </div>
        </div><!-- row end -->
        <div class="sponsor-slider">
            <?php

            $item = null;
            $valor = null;

            $patrocinadores = ControladorPatrocinador::ctrMostrarPatrocinador($item, $valor);
            foreach ($patrocinadores as $key => $value) {
            ?>
                <div class="single-slide">
                    <div class="sponsor-item">
                        <h4><?php echo $value["empresa"] ?></h4>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="single-slide">
                <div class="sponsor-item">
                    <img src="vistas/dist/main/assets/images/sponsors/2.png" alt="image">
                </div>
            </div>
        </div><!-- sponsor-slider end -->
    </div>
</section>



<!-- =================================
SECCION DE ULTIMAS NOTICIAS
================================= -->
<section class="pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-top">
                    <span class="top-title">Noticias</span>
                    <h2 class="section-title">Nuestras últimas noticias</h2>
                </div>
            </div>
        </div><!-- row end -->
        <div class="row gy-4 justify-content-center" id="seccion_noticia">
            <?php
            $item = null;
            $valor = null;

            $noticias = ControladorNoticia::ctrMostrarNoticias($item, $valor);
            foreach ($noticias as $key => $value) {
            ?>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item style-two">
                        <div class="blog-thumb">
                            <a href="blog-details.html" class="d-block h-100">
                                <img src="<?php echo $value["imagen"] ?>" alt="image">
                            </a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span class="single-meta"><?php echo $value["fecha"] ?></span>
                            </div>
                            <h4 class="blog-title">
                                <a href="#" idNoticiaDetalle="<?php echo $value["id_noticia"] ?>" class="btnMostrarDetalleNoticia"><?php echo $value["titulo"] ?></a>
                            </h4>
                            <a href="#" idNoticiaDetalle="<?php echo $value["id_noticia"] ?>" class="blog-btn btnMostrarDetalleNoticia">Leer mas</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="mt-50 text-center">
            <a href="noticias" class="btn btn-main">Ver más</a>
        </div>
    </div>
</section>


<!-- =================================
SCRIPT
================================= -->

