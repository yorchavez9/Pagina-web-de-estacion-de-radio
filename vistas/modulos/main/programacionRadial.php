<main class="site-body">

    <!-- podcast section start -->
    <section class="pt-120 pb-120 section-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-top">
                        <span class="top-title">Espectáculo en vivo</span>
                        <h2 class="section-title">Programación de radial</h2>
                    </div>
                </div>
            </div>


            <ul class="nav nav-tabs show-tabs programacionRadialSemana" id="myTab" role="tablist">

                <!-- Lunes -->
                <li class="nav-item btnDiaSemana" diaText="Lunes" role="presentation">
                    <button class="nav-link active">Lunes</button>
                </li>
                <!-- Martes -->
                <li class="nav-item btnDiaSemana" diaText="Martes" role="presentation">
                    <button class="nav-link ">Martes</button>
                </li>
                <!-- Miercoles -->
                <li class="nav-item btnDiaSemana" diaText="Miercoles" role="presentation">
                    <button class="nav-link ">Miercoles</button>
                </li>
                <!-- Jueves -->
                <li class="nav-item btnDiaSemana" diaText="Jueves" role="presentation">
                    <button class="nav-link ">Jueves</button>
                </li>
                <!-- Viernes -->
                <li class="nav-item btnDiaSemana" diaText="Viernes" role="presentation">
                    <button class="nav-link ">Viernes</button>
                </li>
                <!-- Sábado -->
                <li class="nav-item btnDiaSemana" diaText="Sábado" role="presentation">
                    <button class="nav-link ">Sábado</button>
                </li>
                <!-- Domingo -->
                <li class="nav-item btnDiaSemana" diaText="Domingo" role="presentation">
                    <button class="nav-link ">Domingo</button>
                </li>
            </ul>


            <div class="row mt-5">
                <div class="podcast-slider">
                    <?php
                    $item = null;
                    $valor = null;
                    $programacionesRadiales = ControladorProgramacionRadial::ctrMostrarProgramacionRadial($item, $valor);
                    if (isset($_GET["diaText"])) {
                        foreach ($programacionesRadiales as $key => $value) {
                            if ($value["dia"] == $_GET["diaText"]) {
                            ?>
                                <div class="single-slide">
                                    <div class="podcast-item link-item">
                                        <a href="#" class="full-link"></a>
                                        <div class="podcast-item-thumb">
                                            <img src="<?php echo $value["imagen"]?>" alt="image">
                                            <div class="thumb-content">
                                                <p><?php echo $value["hora"]?></p>
                                                
                                            </div>
                                        </div>
                                        <div class="podcast-item-content">
                                         
                                            <div class="artist-content">
                                                <h5 class="show-name"><?php echo $value["titulo"]?></h5>
                                                <p class="artist-name"><?php echo $value["nombre"]?></p>
                                            </div>
                                        </div>
                                    </div><!-- podcast-item end -->
                                </div>
                            <?php
                            }
                        }
                    } else {
                        foreach ($programacionesRadiales as $key => $value) {
                            if($value["dia"] == "Lunes"){
                        ?>
                        <div class="single-slide">
                            <div class="podcast-item link-item">
                                <a href="#" class="full-link"></a>
                                <div class="podcast-item-thumb">
                                    <img src="<?php echo $value["imagen"]?>" alt="image">
                                    <div class="thumb-content">
                                        <p><?php echo $value["hora"]?></p>
                                    </div>
                                </div>
                                <div class="podcast-item-content">
                                 
                                    <div class="artist-content">
                                        <h5 class="show-name"><?php echo $value["titulo"]?></h5>
                                        <p class="artist-name"><?php echo $value["nombre"]?></p>
                                    </div>
                                </div>
                            </div><!-- podcast-item end -->
                        </div>
                    <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>




        </div>
    </section>
    <!-- podcast section end -->

    <!-- previous show section start -->
    <section class="previous-show-section pt-120 pb-120 overflow-hidden" style="background-image: url('vistas/dist/main/assets/images/bg/previous-show.jpg');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-top">
                        <span class="top-title">Yesterday</span>
                        <h2 class="section-title">Previous shows </h2>
                    </div>
                </div>
            </div><!-- row end -->
        </div>
        <div class="previous-show-slider">
            <div class="single-slide">
                <div class="show-item style-two">
                    <div class="thumb">
                        <img src="vistas/dist/main/assets/images/shows/previous/4.jpg" alt="image">
                    </div>
                    <audio controls src="vistas/dist/main/assets/audio/main.mp3" class="style-two"></audio>
                    <div class="show-item-content">
                        <div class="show-item-top">
                            <h5 class="show-item-top-title">“Music Of Life”</h5>
                            <span class="show-item-duration">24min</span>
                        </div>
                        <div class="artist-thumb">
                            <img src="vistas/dist/main/assets/images/artist/1.jpg" alt="image">
                        </div>
                        <div class="artist-content">
                            <h5 class="show-name">Life Music</h5>
                            <p class="artist-name">Rj Movin</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slide">
                <div class="show-item style-two">
                    <div class="thumb">
                        <img src="vistas/dist/main/assets/images/shows/previous/6.jpg" alt="image">
                    </div>
                    <audio controls src="vistas/dist/main/assets/audio/main.mp3" class="style-two"></audio>
                    <div class="show-item-content">
                        <div class="show-item-top">
                            <h5 class="show-item-top-title">“Music Of Life”</h5>
                            <span class="show-item-duration">24min</span>
                        </div>
                        <div class="artist-thumb">
                            <img src="vistas/dist/main/assets/images/artist/2.jpg" alt="image">
                        </div>
                        <div class="artist-content">
                            <h5 class="show-name">Music Artist Podcast</h5>
                            <p class="artist-name">Rj Sonai</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slide">
                <div class="show-item style-two">
                    <div class="thumb">
                        <img src="vistas/dist/main/assets/images/shows/previous/7.jpg" alt="image">
                    </div>
                    <audio controls src="vistas/dist/main/assets/audio/main.mp3" class="style-two"></audio>
                    <div class="show-item-content">
                        <div class="show-item-top">
                            <h5 class="show-item-top-title">“Music Of Life”</h5>
                            <span class="show-item-duration">24min</span>
                        </div>
                        <div class="artist-thumb">
                            <img src="vistas/dist/main/assets/images/artist/3.jpg" alt="image">
                        </div>
                        <div class="artist-content">
                            <h5 class="show-name">Music World</h5>
                            <p class="artist-name">Rj Josino</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slide">
                <div class="show-item style-two">
                    <div class="thumb">
                        <img src="vistas/dist/main/assets/images/shows/previous/6.jpg" alt="image">
                    </div>
                    <audio controls src="vistas/dist/main/assets/audio/main.mp3" class="style-two"></audio>
                    <div class="show-item-content">
                        <div class="show-item-top">
                            <h5 class="show-item-top-title">“Music Of Life”</h5>
                            <span class="show-item-duration">24min</span>
                        </div>
                        <div class="artist-thumb">
                            <img src="vistas/dist/main/assets/images/artist/2.jpg" alt="image">
                        </div>
                        <div class="artist-content">
                            <h5 class="show-name">Music Artist Podcast</h5>
                            <p class="artist-name">Rj Sonai</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slide">
                <div class="show-item style-two">
                    <div class="thumb">
                        <img src="vistas/dist/main/assets/images/shows/previous/7.jpg" alt="image">
                    </div>
                    <audio controls src="vistas/dist/main/assets/audio/main.mp3" class="style-two"></audio>
                    <div class="show-item-content">
                        <div class="show-item-top">
                            <h5 class="show-item-top-title">“Music Of Life”</h5>
                            <span class="show-item-duration">24min</span>
                        </div>
                        <div class="artist-thumb">
                            <img src="vistas/dist/main/assets/images/artist/3.jpg" alt="image">
                        </div>
                        <div class="artist-content">
                            <h5 class="show-name">Music World</h5>
                            <p class="artist-name">Rj Josino</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slide">
                <div class="show-item style-two">
                    <div class="thumb">
                        <img src="vistas/dist/main/assets/images/shows/previous/6.jpg" alt="image">
                    </div>
                    <audio controls src="vistas/dist/main/assets/audio/main.mp3" class="style-two"></audio>
                    <div class="show-item-content">
                        <div class="show-item-top">
                            <h5 class="show-item-top-title">“Music Of Life”</h5>
                            <span class="show-item-duration">24min</span>
                        </div>
                        <div class="artist-thumb">
                            <img src="vistas/dist/main/assets/images/artist/2.jpg" alt="image">
                        </div>
                        <div class="artist-content">
                            <h5 class="show-name">Music Artist Podcast</h5>
                            <p class="artist-name">Rj Sonai</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slide">
                <div class="show-item style-two">
                    <div class="thumb">
                        <img src="vistas/dist/main/assets/images/shows/previous/7.jpg" alt="image">
                    </div>
                    <audio controls src="vistas/dist/main/assets/audio/main.mp3" class="style-two"></audio>
                    <div class="show-item-content">
                        <div class="show-item-top">
                            <h5 class="show-item-top-title">“Music Of Life”</h5>
                            <span class="show-item-duration">24min</span>
                        </div>
                        <div class="artist-thumb">
                            <img src="vistas/dist/main/assets/images/artist/3.jpg" alt="image">
                        </div>
                        <div class="artist-content">
                            <h5 class="show-name">Music World</h5>
                            <p class="artist-name">Rj Josino</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- previous show section end -->

    <!-- upcoming show start -->
    <section class="pt-120 pb-120 section-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-top">
                        <span class="top-title">Show</span>
                        <h2 class="section-title">Upcoming show</h2>
                    </div>
                </div>
            </div><!-- row end -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="upcoming-show">
                        <div class="upcoming-content">
                            <h4 class="upcoming-title">Music Life Event</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Augue maecenas commodo mollis sagittis
                                quisque.
                            </p>
                            <div class="show-rj">
                                <div class="show-rj-thumb">
                                    <img src="vistas/dist/main/assets/images/shows/show-rj.jpg" alt="image">
                                </div>
                                <div class="show-rj-content">
                                    <h4 class="show-rj-name">RJ Merino</h4>
                                    <p>09AM To 10PM</p>
                                </div>
                            </div>
                        </div>
                        <div class="upcoming-thumb">
                            <img src="vistas/dist/main/assets/images/shows/upcoming.jpg" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- upcoming show end -->

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