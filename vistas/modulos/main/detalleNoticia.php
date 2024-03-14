<?php
if (isset($_GET["idNoticiaDetalle"])) {

    $item = null;
    $valor = null;
    $noticiasDetalle = ControladorNoticia::ctrMostrarNoticias($item, $valor);

?>
    <main class="site-body">

        <!-- ==============================
        CABECERA DEL DETALLE DE LA NOTICIA
        ================================= -->
        <section class="inner-page-banner" style="background-image: url('vistas/dist/main/assets/images/bg/inner-page-banner.jpg');">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="inner-page-title text-white">Detalles de la Noticia</h2>
                        <ul class="page-breadcrumb">
                            <li><a href="inicio">Inicio</a></li>
                            <li>Detalle de noticia</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>


        <!-- ==============================
        DETALLE DE LA NOTICIA
        ================================= -->
        <?php
        foreach ($noticiasDetalle as $key => $value) {
            if ($value["id_noticia"] == $_GET["idNoticiaDetalle"]) {
            ?>
                <section class="pt-120 pb-120 section-bg">
                    <div class="container">
                        <div class="row gy-5">
                            <div class="col-xl-8">
                                <div class="blog-details-wrapper">
                                    <div class="blog-details-thumb">
                                        <img src="vistas/dist/main/assets/images/blog/b1.jpg" alt="image">
                                    </div>
                                    <div class="blog-details-content">
                                        <div class="blog-meta">
                                            <span class="single-meta">
                                                <?php
                                                echo strftime("%e de %B del %Y", strtotime($value["fecha"]));
                                                ?>
                                            </span>
                                        </div>
                                        <h2 class="blog-details-title"><?php echo $value["titulo"] ?></h2>
                                        <p><?php echo $value["descripcion"] ?></p>


                                    </div>
                                </div><!-- blog-details-wrapper end -->

                                <div class="blog-details-footer mt-60">
                                    <div class="left">

                                    </div>
                                    <div class="right">
                                        <ul class="social-links-white">
                                            <li class="text-white fw-500">Compartir:</li>
                                            <li><a href="#0"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#0"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li><a href="#0"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#0"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div><!-- blog-details-footer end -->

                            </div>
                            <div class="col-xl-4">
                                <div class="widget-box">
                                    <form class="search-form">
                                        <input type="text" name="#0" class="form-control" placeholder="Search...">
                                        <button type="submit" class="search-form-btn"><i class="ri-search-line"></i></button>
                                    </form>

                                    <h4 class="widget-box-title mt-30">Post Category</h4>
                                    <ul class="cat-list">
                                        <li><a href="multi-blog.html"><i class="ri-arrow-right-s-line"></i> Music </a></li>
                                        <li><a href="multi-blog.html"><i class="ri-arrow-right-s-line"></i> Artist</a></li>
                                        <li><a href="multi-blog.html"><i class="ri-arrow-right-s-line"></i> Podcast</a></li>
                                        <li><a href="multi-blog.html"><i class="ri-arrow-right-s-line"></i> Song</a></li>
                                    </ul>

                                    <h4 class="widget-box-title mt-30">Latest Post</h4>
                                    <div class="side-post">
                                        <div class="side-post-thumb">
                                            <img src="vistas/dist/main/assets/images/blog/1.jpg" alt="image">
                                        </div>
                                        <div class="side-post-content">
                                            <h6 class="side-post-title"><a href="multi-blog-details.html">Myself in the world of travel where
                                                    anything
                                                    is possible.</a>
                                            </h6>
                                            <p class="side-post-date"><i class="ri-alarm-line me-2"></i> 21 JUN, 2022</p>
                                        </div>
                                    </div><!-- side-post end -->
                                    <div class="side-post">
                                        <div class="side-post-thumb">
                                            <img src="vistas/dist/main/assets/images/blog/2.jpg" alt="image">
                                        </div>
                                        <div class="side-post-content">
                                            <h6 class="side-post-title"><a href="multi-blog-details.html">Myself in the world of travel where
                                                    anything
                                                    is possible.</a>
                                            </h6>
                                            <p class="side-post-date"><i class="ri-alarm-line me-2"></i> 21 JUN, 2022</p>
                                        </div>
                                    </div><!-- side-post end -->
                                </div><!-- widget-box end -->

                            </div>
                        </div>
                    </div>
                </section>
            <?php
            }
        }
        ?>


        <!-- ==============================
        SIDEBAR DE DETALLE NOTICIA
        ================================= -->
        <?php include "boletin.php"?>

    </main>
<?php

}
?>