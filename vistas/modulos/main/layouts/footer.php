<!-- footer section start -->
<footer class="footer-section">
  <div class="container">
    <div class="row align-items-end">
      <div class="col-xxl-4 col-xl-5 col-lg-4 text-lg-start text-center">
        <a href="index.html" class="footer-logo">
          <img src="vistas/dist/main/assets/images/logo.png" alt="image">
        </a>
        <p>¿Ke Buena, La radio perfecta para disfrutar de éxitos musicales y ritmos contagiosos todo el día.!</p>
      </div>
      <div class="col-xxl-8 col-xl-7 col-lg-8">
        <nav class="footer-nav">
          <ul class="footer-menu">
            <li><a href="inicio">Inicio</a></li>
            <li><a href="noticias">Noticias</a></li>
            <li><a href="videos">videos</a></li>
            <li><a href="galeria">Galeria</a></li>
            <li><a href="eventos">Eventos</a></li>
            <li><a href="contactos">Contacto</a></li>
          </ul>
        </nav>
      </div>
    </div>
    <hr>
    <div class="row gy-2 align-items-center">
      <div class="col-md-6 text-md-start text-center">
        <p>© 2023 Ke buena. Todos los derechos reservados</p>
      </div>
      <div class="col-md-6">
        <ul class="social-links">
          <?php 
          $item = null;
          $valor = null;

          $redesSociales = ControladorRedesSociales::ctrMostrarRedesSociales($item, $valor);
          foreach ($redesSociales as $key => $value) {
          ?>
          <li>
            <a href="<?php echo $value["facebook"]?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
          </li>
          <li>
            <a href="<?php echo $value["instagram"]?>" target="_blank"><i class="fab fa-instagram"></i></a>
          </li>
          <li>
            <a href="<?php echo $value["linkedin"]?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
          </li>
          <li>
            <a href="<?php echo $value["twitter"]?>" target="_blank"><i class="fab fa-twitter"></i></a>
          </li>
          <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </div>
</footer>
<!-- footer section end -->

<!-- bootstrap 5 js -->
<script src="vistas/dist/main/assets/js/lib/bootstrap.bundle.min.js"></script>
<!-- audio player js -->
<script src="vistas/dist/main/assets/js/lib/maudio.js"></script>
<!-- slick  slider js -->
<script src="vistas/dist/main/assets/js/lib/slick.min.js"></script>
<!-- wow js  -->
<script src="vistas/dist/main/assets/js/lib/wow.min.js"></script>
<!-- contact js -->
<script src="vistas/dist/main/assets/js/contact.js"></script>
<!-- main js -->
<script src="vistas/dist/main/assets/js/main.js"></script>


<!-- SCRIPT DE MODULOS -->
<script src="vistas/js/detalleNoticia.js"></script>
<script src="vistas/js/programacionDia.js"></script>

</body>

</html>