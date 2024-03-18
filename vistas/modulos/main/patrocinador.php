<main class="site-body">


    <!-- sponsor section start -->
    <section class="dark-overlay pt-120 pb-120" style="background-image: url('assets/images/bg/sponsor.jpg');">
      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-lg-8 text-center">
            <div class="section-top">
              <span class="top-title">Patrocinador</span>
              <h2 class="section-title">Únase como patrocinador</h2>
            </div>
          </div>
        </div><!-- row end -->
        <div class="row justify-content-center">
          <div class="col-xl-8 col-lg-10">
            <form method="POST">
              <div class="row gy-4">
                <div class="col-md-6">
                  <input type="text" name="nombre" autocomplete="off" class="form-control" placeholder="Nombre completo">
                </div>
                <div class="col-md-6">
                  <input type="text" name="empresa" autocomplete="off" class="form-control" placeholder="Nombre de la empresa">
                </div>
                <div class="col-md-6">
                  <input type="email" name="correo" autocomplete="off" class="form-control" placeholder="Correo Electrónico">
                </div>
                <div class="col-md-6">
                  <input type="text" name="telefono" autocomplete="off" class="form-control" placeholder="Teléfono">
                </div>
                <div class="col-md-6">
                  <input type="text" name="sitio_web" autocomplete="off" class="form-control" placeholder="Página web">
                </div>
                <div class="col-md-6">
                  <input type="text" name="direccion" autocomplete="off" class="form-control" placeholder="Dirección">
                </div>
                <div class="col-lg-12">
                  <textarea class="form-control" name="mensaje" placeholder="Mensaje"></textarea>
                </div>
                <div class="col-lg-12 text-center">
                  <button type="submit" class="btn btn-main">Enviar</button>
                </div>
              </div>
              <?php 
              $newSponsor = new ControladorPatrocinador();
              $newSponsor->ctrCrearPatrocinador();
              
              ?>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- sponsor section end -->


    <!-- subscribe section start -->
    <?php
    include "boletin.php";
    ?>
    <!-- subscribe section end -->

  </main><!-- site-body end -->
