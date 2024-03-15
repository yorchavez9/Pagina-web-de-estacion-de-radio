<main class="site-body">
    <!-- page banner start -->
    <section class="inner-page-banner" style="background-image: url('assets/images/bg/inner-page-banner.jpg');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="inner-page-title text-white">Videos</h2>
                    <ul class="page-breadcrumb">
                        <li><a href="inicio">Inicio</a></li>
                        <li>Videos</li>
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
                        <span class="top-title">Videos</span>
                        <h2 class="section-title">Nuestros videos</h2>
                    </div>
                </div>
            </div><!-- row end -->
            <div class="row gy-4">
                <?php
                $item = null;
                $valor = null;

                $videos = ControladorVideo::ctrMostrarVideos($item, $valor);
                foreach ($videos as $key => $value) {
                ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="blog-item">
                            <div class="blog-thumb" style="height: 100%;">
                                <?php echo $value["video_url"] ?>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <span class="single-meta"><?php echo $value["fecha"] ?></span>
                                </div>
                                <h4 class="blog-title">
                                    <a href="#"><?php echo $value["titulo"] ?></a>
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


    <!-- subscribe section start -->
    <?php include "boletin.php" ?>
    <!-- subscribe section end -->

</main><!-- site-body end -->