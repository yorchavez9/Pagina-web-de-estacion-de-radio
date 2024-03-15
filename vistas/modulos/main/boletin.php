<!-- subscribe section start -->
<section class="subscribe-section" style="background-image: url('vistas/dist/main/assets/images/bg/subscribe.jpg');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-6 col-lg-8 text-center">
                <h2 class="section-title">Suscríbete a nuestro boletín</h2>
                <p class="subscribe-section-des">¡Suscríbete ahora para no perderte nada!</p>
                <form class="subscribe-form" method="POST">
                    <input type="email" name="correoBeletin" class="form-control" placeholder="Correo">
                    <button type="submit" class="btn btn-main">Subscribe</button>
                    <?php 
                    $newBoletin = new ControladorSuscriptor();
                    $newBoletin->ctrCrearSuscriptor();
                    ?>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- subscribe section end -->