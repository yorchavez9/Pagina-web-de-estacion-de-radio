<main class="site-body">

  <!-- blog section start -->
  <section class="pt-120 pb-120 section-bg">
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <div class="section-top">
            <span class="top-title">Galería</span>
            <h2 class="section-title">Nuestras imágenes</h2>
          </div>
        </div>
      </div><!-- row end -->
      <div class="row gy-4">
        <?php
        $item = null;
        $valor = null;

        $imganes = ControladorGaleria::ctrMostrarGaleria($item, $valor);
        foreach ($imganes as $key => $value) {
        ?>
          <div class="col-lg-4 col-md-6" idShow="vista<?php echo $value["id_galeria"] ?>">
            <div class="blog-item">
              <div class="blog-thumb">
                <a href="#" class="d-block h-100" data-bs-toggle="modal" data-bs-target="#modalShowEvento<?php echo $value["id_galeria"] ?>">
                  <img src="<?php echo $value["imagen"] ?>" alt="image">
                </a>
              </div>
              <small class="single-meta" style="font-size: 12px"><?php echo date("d/m/Y H:i:s", strtotime($value["fecha"])); ?></small>
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
  foreach ($imganes as $key => $value) {
  ?>
    <!-- Modal -->
    <div class="modal fade" id="modalShowEvento<?php echo $value["id_galeria"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background: #071126">
          <div class="d-flex justify-content-between m-3">
            <button type="button" class="btn ms-auto p-1 btn-sm rounded-circle fw-bold" style="color: #66FCF1" data-bs-dismiss="modal" aria-label="Close">X</button>
          </div>
          <div class="modal-body text-center">
            <img src="<?php echo $value["imagen"] ?>" class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
  <!-- subscribe section start -->
  <?php include "boletin.php"; ?>
  <!-- subscribe section end -->

</main><!-- site-body end -->