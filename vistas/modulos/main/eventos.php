<main class="site-body">
    <!-- page banner start -->
    <section class="inner-page-banner" style="background-image: url('vistas/dist/main/assets/images/bg/inner-page-banner.jpg');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="inner-page-title text-white">Eventos</h2>
                    <ul class="page-breadcrumb">
                        <li><a href="inicio">Inicio</a></li>
                        <li>Eventos</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- page banner end -->

    <!-- blog section start -->
    <section class="pt-120 pb-120 section-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-top">
                        <span class="top-title">Eventos</span>
                        <h2 class="section-title">Nuestros eventos</h2>
                    </div>
                </div>
            </div><!-- row end -->
            <div class="row gy-4">
                <?php 
                $item = null;
                $valor = null;

                $eventos = ControladorEvento::ctrMostrarEvento($item, $valor);
                foreach ($eventos as $key => $value) {
                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item">
                        <div class="blog-thumb">
                            <a href="#" class="d-block h-100" data-bs-toggle="modal" data-bs-target="#modalShowEvento<?php echo $value["id_evento"]?>">
                                <img src="<?php echo $value["imagen"]?>" alt="image">
                            </a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span class="single-meta"><?php echo $value["fecha"]?></span>
                            </div>
                            <h4 class="blog-title">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalShowEvento<?php echo $value["id_evento"]?>"><?php echo $value["titulo"]?></a>
                            </h4>
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
    <?php
    foreach ($eventos as $key => $value) {
    ?>
    <!-- Modal -->
    <div class="modal fade" id="modalShowEvento<?php echo $value["id_evento"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background: #071126">
                <div class="d-flex justify-content-between m-3">
                    <button type="button" class="btn ms-auto p-1 btn-sm rounded-circle fw-bold" style="color: #66FCF1" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="text-center">
                    <h5 class="modal-title text-white" id="exampleModalLabel"><?php echo $value["titulo"]?></h5>
                </div>
                <div class="modal-body">
                    <img src="<?php echo $value["imagen"]?>" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
    <?php 
    }
    ?>

    <!-- subscribe section start -->
    <?php include "boletin.php"?>
    <!-- subscribe section end -->

</main><!-- site-body end -->