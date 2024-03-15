<main class="site-body">

    <!-- blog section start -->
    <section class="pt-120 pb-120 section-bg">
        <div class="container mt-5">
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