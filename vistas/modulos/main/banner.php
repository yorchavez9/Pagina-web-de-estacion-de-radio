<?php
$item = null;
$valor = null;
$tipo = "random";

$banners = ControladorBanner::ctrMostrarBanners($item, $valor, $tipo);

foreach ($banners as $key => $value) {
?>
<section class="banner-section style-two" style="background-image: url('<?php echo $value["imagen"]?>');">
    <div class="container">
        <div class="row align-items-center justify-content-end">
            <div class="col-lg-6 text-lg-end text-center">
                <h2 class="banner-title">Ke Buena<span>Escuchar FM. 92.7</span></h2>
                <p class="banner-details">¡La radio que une, entretiene y lleva buena energía.!</p>
            </div>
        </div><!-- row end -->
        <div class="row">
            <div class="col-lg-12">
                <div class="single-audio-player style-two">
                    <div class="single-audio-thumb">
                        <img src="vistas/dist/main/assets/images/shows/player/2.jpg" alt="image">
                    </div>
                    <div class="single-audio-content">
                        <div class="single-audio-content-top">
                            <h4 class="title">The Live Love Show</h4>
                            <p class="audio-time">RJ Alex 1:15-2:45 PM <span class="live-status">Live</span></p>
                        </div>
                        <audio controls src="vistas/dist/main/assets/audio/main.mp3" class="style-two"></audio>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
?>