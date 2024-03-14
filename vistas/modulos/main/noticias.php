<?php 
date_default_timezone_set('America/Lima');
?>
<main class="site-body">

    <!-- blog section start -->
    <section class="pt-120 pb-120 section-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="section-top">
                        <span class="top-title">Noticias</span>
                        <h2 class="section-title">Nuestras últimas noticias</h2>
                    </div>
                </div>
            </div><!-- row end -->
            <div class="row gy-4" id="seccion_noticia">
                <?php 
                $item = null;
                $valor = null;
                $noticias = ControladorNoticia::ctrMostrarNoticias($item, $valor);
                foreach ($noticias as $key => $value) {

                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item">
                        <div class="blog-thumb">
                            <a href="#" idNoticiaDetalle="<?php echo $value["id_noticia"]?>" class="d-block h-100 btnMostrarDetalleNoticia">
                                <img src="<?php echo $value["imagen"]?>" alt="image">
                            </a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span class="single-meta">
                                <?php 
                                setlocale(LC_TIME, 'es_ES.UTF-8');
                                echo strftime("%e de %B del %Y", strtotime($value["fecha"]));                             
                                ?>
                                </span>
                            </div>
                            <h4 class="blog-title">
                                <a href="#" class="btnMostrarDetalleNoticia" idNoticiaDetalle="<?php echo $value["id_noticia"]?>"><?php echo $value["titulo"]?></a>
                            </h4>
                            <a href="#" idNoticiaDetalle="<?php echo $value["id_noticia"]?>" class="blog-btn btnMostrarDetalleNoticia">Leer mas</a>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!-- blog section end -->

    <!-- subscribe section start -->
    <section class="subscribe-section" style="background-image: url('vistas/dist/main/assets/images/bg/subscribe.jpg');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-lg-8 text-center">
                    <h2 class="section-title">Subscribe Our Newsletter</h2>
                    <p class="subscribe-section-des">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <form class="subscribe-form">
                        <input type="email" name="#0" class="form-control" placeholder="Email">
                        <button type="submit" class="btn btn-main">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe section end -->

</main><!-- site-body end -->