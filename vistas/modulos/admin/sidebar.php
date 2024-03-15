<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="vistas/dist/admin/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Ke buena</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="inicio">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Inicio</div>
            </a>
        </li>
        <?php
        if($_SESSION["perfil"] == "administrador")
        {
        ?>
        <li>
            <a href="usuarios">
                <div class="parent-icon"><i class="bx bx-user"></i>
                </div>
                <div class="menu-title">Usuarios</div>
            </a>
        </li>
        <?php
        }
        ?>
        <li class="menu-label">Contenido</li>
        <li>
            <a href="categorias">
                <div class="parent-icon"><i class='bx bx-menu-alt-right'></i>
                </div>
                <div class="menu-title">Categorias</div>
            </a>
        </li>
        <li>
            <a href="banners">
                <div class="parent-icon"><i class='bx bx-flag'></i>
                </div>
                <div class="menu-title">Banner</div>
            </a>
        </li>
        <li>
            <a href="noticias">
                <div class="parent-icon"><i class='bx bx-news'></i>
                </div>
                <div class="menu-title">Noticias</div>
            </a>
        </li>
        <li>
            <a href="rankings">
                <div class="parent-icon"><i class='bx bx-star'></i>
                </div>
                <div class="menu-title">Ranking</div>
            </a>
        </li>
        <li>
            <a href="videos">
                <div class="parent-icon"><i class='bx bx-video'></i>
                </div>
                <div class="menu-title">Videos</div>
            </a>
        </li>
        <li>
            <a href="eventos">
                <div class="parent-icon"><i class='bx bx-calendar-event'></i>
                </div>
                <div class="menu-title">Eventos</div>
            </a>
        </li>
        <li>
            <a href="galerias">
                <div class="parent-icon"><i class='bx bx-image'></i>
                </div>
                <div class="menu-title">Galería</div>
            </a>
        </li>
        <li>
            <a href="conductores">
                <div class="parent-icon"><i class='bx bx-user-voice'></i>
                </div>
                <div class="menu-title">Conductores</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-time'></i>
                </div>
                <div class="menu-title">Programación</div>
            </a>
            <ul>
                <li> <a href="programacionRadial"><i class='bx bx-radio-circle'></i>Radial</a>
                </li>
                <li> <a href="programacionTV"><i class='bx bx-radio-circle'></i>TV</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Contactos</li>
        <li>
            <a href="redesSociales">
                <div class="parent-icon"><i class="bx bx-share-alt"></i>
                </div>
                <div class="menu-title">Redes sociales</div>
            </a>
        </li>
        <li>
            <a href="datosContacto">
                <div class="parent-icon"><i class="bx bx-envelope"></i>
                </div>
                <div class="menu-title">Datos de contacto</div>
            </a>
        </li>
        <li>
            <a href="mensajeContacto">
                <div class="parent-icon"><i class="bx bx-message-rounded-dots"></i>
                </div>
                <div class="menu-title">Mensaje contacto</div>
            </a>
        </li>
        <li>
            <a href="javascript:;">
                <div class="parent-icon"><i class="bx bx-badge-check"></i>
                </div>
                <div class="menu-title">Patrocinadores</div>
            </a>
        </li>
        <li>
            <a href="suscriptor">
                <div class="parent-icon"><i class="bx bx-user-plus"></i>
                </div>
                <div class="menu-title">Suscriptores</div>
            </a>
        </li>
        <li class="menu-label">Sistema</li>
        <li>
            <a href="https://codervent.com/rocker/documentation/index.html" target="_blank">
                <div class="parent-icon"><i class="bx bx-folder"></i>
                </div>
                <div class="menu-title">Documentación</div>
            </a>
        </li>
        <li>
            <a href="https://themeforest.net/user/codervent" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i>
                </div>
                <div class="menu-title">Soporte</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>