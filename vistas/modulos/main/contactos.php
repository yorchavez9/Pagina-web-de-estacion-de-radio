<?php
$item = null;
$valor = null;

$datosContacto = ControladorDatosContacto::ctrMostrarDatosContacto($item, $valor);
?>
<main class="site-body">
    <!-- page banner start -->
    <section class="inner-page-banner" style="background-image: url('vistas/dist/main/assets/images/bg/inner-page-banner.jpg');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="inner-page-title text-white">Contáctenos</h2>
                    <ul class="page-breadcrumb">
                        <li><a href="inicio">Inicio</a></li>
                        <li>Contáctenos</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- page banner end -->

    <!-- contact info section start -->
    <?php
    foreach ($datosContacto as $key => $value) {
    ?>
    <section class="pt-120 pb-120 section-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-top">
                        <span class="top-title">Contacto</span>
                        <h2 class="section-title">Datos de contacto</h2>
                    </div>
                </div>
            </div><!-- row end -->
            <div class="row gy-4">
                <div class="col-lg-4">
                    <div class="contact-item">
                        <div class="top">
                            <div class="icon">
                                <img src="vistas/dist/main/assets/images/icons/contact/1.png" alt="image">
                            </div>
                            <h4 class="title">Ubicación</h4>
                        </div>
                        <ul class="contact-item-list">
                            <li><?php echo $value["localizacion"]?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-item">
                        <div class="top">
                            <div class="icon">
                                <img src="vistas/dist/main/assets/images/icons/contact/2.png" alt="image">
                            </div>
                            <h4 class="title">Llámanos</h4>
                        </div>
                        <ul class="contact-item-list">
                            <li><?php echo $value["telefono"]?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-item">
                        <div class="top">
                            <div class="icon">
                                <img src="vistas/dist/main/assets/images/icons/contact/3.png" alt="image">
                            </div>
                            <h4 class="title">Correo</h4>
                        </div>
                        <ul class="contact-item-list">
                            <li><a href="https://mail.google.com/" class="__cf_email__" target="_blank"><?php echo $value["correo"]?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    }
    ?>
    <!-- contact info section end -->

    <!-- contact section start -->
    <section class="pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="section-top">
                        <span class="top-title">Contacto</span>
                        <h2 class="section-title">Escribir un comentario</h2>
                    </div>
                </div>
            </div><!-- row end -->
            <div class="row gy-5">
                <div class="col-lg-6">
                    <form class="row gy-4 contact-form" method="POST">
                        <div class="col-md-6">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre completo">
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="correo" class="form-control" placeholder="Correo">
                        </div>
                        <div class="col-md-6">
                            <input type="tel" name="telefono" class="form-control" placeholder="teléfono">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="compania" class="form-control" placeholder="Compañia">
                        </div>
                        <div class="col-lg-12">
                            <textarea name="mensaje" cols="30" rows="10" class="form-control textarea-md" placeholder="Escribe el comentario"></textarea>
                        </div>
                        <div class="col-lg-12 text-center mt-lg-5 mt-4">
                            <button type="submit" id="contact_form_submit" class="btn btn-main">Enviar</button>
                        </div>
                        <?php
                        $crearMensaje = new ControladorMensaje();
                        $crearMensaje->ctrCrearMensaje();
                        ?>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7499.484785459639!2d-122.42760422031482!3d37.7866430027955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1675184241076!5m2!1sen!2sbd" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact section end -->

    <?php include "boletin.php" ?>

</main><!-- site-body end -->