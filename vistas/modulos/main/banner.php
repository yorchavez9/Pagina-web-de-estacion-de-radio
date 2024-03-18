<?php
$item = null;
$valor = null;
$tipo = "random";

$banners = ControladorBanner::ctrMostrarBanners($item, $valor, $tipo);

foreach ($banners as $key => $value) {
?>
    <!-- banner section start -->
    <section class="banner-section" style="background-image: url('vistas/dist/main/assets/images/bg/banner-bg.png');">
        <div class="banner-right-img" style="background-image: url('<?php echo $value["imagen"] ?>');"></div>
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-md-6 order-md-1 order-2">
                    <h2 class="banner-title text-md-start text-center">Escucha y disfruta con Ke Buena <span>92.0</span></h2>
                    <div class="banner-sm-show">
                        <div class="sm-show-thumb">
                            <img src="vistas/dist/main/assets/images/bg/banner-sm-show.jpg" alt="image">
                        </div>
                        <div class="sm-show-content">
                            <p>RJ Mario</p>
                            <p>Sunday at 2:15AM</p>
                            <h4 class="sm-show-title">Let's Go The Music</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 order-md-2 order-1 text-md-start text-center">
                    <a href="show-details.html" class="play-btn"><i class="fas fa-play"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- banner section end -->
<?php
}
?>

<!-- player section start -->
<section class="player-section section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-audio-player">
                    <div class="single-audio-thumb">
                        <img src="vistas/dist/main/assets/images/shows/player/1.jpg" alt="image">
                    </div>
                    <div class="single-audio-content">
                        <h4 class="title">The Live Love Show</h4>
                        <p class="audio-time">RJ Alex 1:15-2:45 PM <span class="live-status">Live</span></p>
                        <audio controls src="vistas/dist/main/assets/audio/main.mp3"></audio>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- player section end -->