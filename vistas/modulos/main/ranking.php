<main class="site-body">

    <!-- blog section start -->
    <section class="pt-120 pb-120 section-bg">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-top">
                        <span class="top-title">Ranking</span>
                        <h2 class="section-title">Lo mejor</h2>
                    </div>
                </div>
            </div><!-- row end -->
            <div class="row gy-4">
                <?php
                $item = null;
                $valor = null;

                $rankings = ControladorRanking::ctrMostrarRanking($item, $valor);
                foreach ($rankings as $key => $value) {
                ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="blog-item">
                            <div class="blog-thumb" style="height: 100%;">
                                <?php echo $value["video_url"] ?>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <?php
                                    setlocale(LC_TIME, 'spanish');
                                    $fecha_en_espanol = strftime('%A, %d de %B de %Y', strtotime($value["fecha"]));
                                    ?>
                                    <span class="single-meta"><?php echo $fecha_en_espanol ?></span>
                                </div>
                                <h4 class="blog-title text-center">
                                    <?php
                                    if ($value["puesto"] == 1) {
                                        echo '<span>Puesto 1 <br><i class="fas fa-star text-warning"></i></span>';
                                    } else if ($value["puesto"] == 2) {
                                        echo '<span>Puesto 2 <br><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i></span>';
                                    } else if ($value["puesto"] == 3) {
                                        echo '<span>Puesto 3 <br><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i></span>';
                                    } else if ($value["puesto"] == 4) {
                                        echo '<span>Puesto 4 <br><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i></span>';
                                    } else {
                                        echo '<span>Puesto 5 <br><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i></span>';
                                    }
                                    ?>

                                </h4>
                                <h4 class="blog-title">
                                    <?php
                                    $cancion = $value["cancion"];
                                    $palabras = explode(' ', $cancion);
                                    if (count($palabras) > 6) {
                                        $primeras_seis_palabras = implode(' ', array_slice($palabras, 0, 6));
                                    ?>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalShowRanking<?php echo $value["id_ranking"] ?>"><?php echo $primeras_seis_palabras ?>...</a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalShowRanking<?php echo $value["id_ranking"] ?>"><?php echo $cancion ?></a>

                                    <?php
                                    }
                                    ?>
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


    <!--  Modal show ranking -->
    <?php
    foreach ($rankings as $key => $value) {
    ?>
        <!-- Modal -->
        <div class="modal fade" id="modalShowRanking<?php echo $value["id_ranking"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="background: #071126">
                    <div class="d-flex justify-content-between m-3">
                        <button type="button" class="btn ms-auto p-1 btn-sm rounded-circle fw-bold" style="color: #66FCF1" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body text-center">
                        <div>
                            <?php echo $value["video_url"] ?>
                        </div>
                        <div>
                            <?php
                            if ($value["puesto"] == 1) {
                                echo '<span>Puesto 1 <br><i class="fas fa-star text-warning"></i></span>';
                            } else if ($value["puesto"] == 2) {
                                echo '<span>Puesto 2 <br><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i></span>';
                            } else if ($value["puesto"] == 3) {
                                echo '<span>Puesto 3 <br><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i></span>';
                            } else if ($value["puesto"] == 4) {
                                echo '<span>Puesto 4 <br><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i></span>';
                            } else {
                                echo '<span>Puesto 5 <br><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i></span>';
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <h4><?php echo $value["cancion"]?></h4>
                        </div>
                        <div class="mb-3">
                            <h5><?php echo $value["artista"]?></h5>
                        </div>
                        <div class="mb-3">
                            <p><?php echo $value["letra"]?></p>
                        </div>
                        <div class="mb-3">
                            <p><?php echo $value["fecha"]?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>


    <!-- subscribe section start -->
    <?php include "boletin.php" ?>
    <!-- subscribe section end -->

</main><!-- site-body end -->