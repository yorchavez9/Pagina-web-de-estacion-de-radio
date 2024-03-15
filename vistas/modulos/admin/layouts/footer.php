
<!--start switcher-->
<div class="switcher-wrapper">
    <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
    </div>
    <div class="switcher-body">
        <div class="d-flex align-items-center">
            <h5 class="mb-0 text-uppercase">Personalizador de temas</h5>
            <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
        </div>
        <hr />
        <h6 class="mb-0">Estilos de tema</h6>
        <hr />
        <div class="d-flex align-items-center justify-content-between">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
                <label class="form-check-label" for="lightmode">Luz</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
                <label class="form-check-label" for="darkmode">Oscuro</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
                <label class="form-check-label" for="semidark">Semi oscuro</label>
            </div>
        </div>
        <hr />
        <div class="form-check">
            <input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
            <label class="form-check-label" for="minimaltheme">Tema mínimo</label>
        </div>
        <hr />
        <h6 class="mb-0">Colores del encabezado</h6>
        <hr />
        <div class="header-colors-indigators">
            <div class="row row-cols-auto g-3">
                <div class="col">
                    <div class="indigator headercolor1" id="headercolor1"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor2" id="headercolor2"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor3" id="headercolor3"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor4" id="headercolor4"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor5" id="headercolor5"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor6" id="headercolor6"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor7" id="headercolor7"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor8" id="headercolor8"></div>
                </div>
            </div>
        </div>
        <hr />
        <h6 class="mb-0">Sidebar Colores</h6>
        <hr />
        <div class="header-colors-indigators">
            <div class="row row-cols-auto g-3">
                <div class="col">
                    <div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--end switcher-->
<!-- Bootstrap JS -->
<script src="vistas/dist/admin/assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="vistas/dist/admin/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="vistas/dist/admin/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="vistas/dist/admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="vistas/dist/admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="vistas/dist/admin/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="vistas/dist/admin/assets/plugins/chartjs/js/chart.js"></script>
<script src="vistas/dist/admin/assets/js/index.js"></script>
<!-- Datatables -->
<script src="vistas/dist/admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="vistas/dist/admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<!--app JS-->
<script src="vistas/dist/admin/assets/js/app.js"></script>
<script>
    new PerfectScrollbar(".app-container")
</script>

<!-- SCRIPT DE MODULOS -->
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/banners.js"></script>
<script src="vistas/js/script-noticias.js"></script>
<script src="vistas/js/videos.js"></script>
<script src="vistas/js/eventos.js"></script>
<script src="vistas/js/galeria.js"></script>
<script src="vistas/js/conductor.js"></script>
<script src="vistas/js/programacionRadial.js"></script>
<script src="vistas/js/programacionTV.js"></script>
<script src="vistas/js/script-redesSociales.js"></script>
<script src="vistas/js/datosContacto.js"></script>
<script src="vistas/js/mensajeContacto.js"></script>
<script src="vistas/js/botelin.js"></script>

</body>


</html>