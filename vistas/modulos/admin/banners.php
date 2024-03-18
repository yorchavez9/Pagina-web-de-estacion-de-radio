<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
            <div class="breadcrumb-title pe-3">Banners</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="inicio"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Banners</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div>
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalNuevoBanner"><i class="bx bx-plus"></i> Nuevo banner</button>
            <h6 class="mb-3 text-uppercase mt-2">Tabla de banners</h6>
        </div>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered tabla_banner" style="width:100%">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th class="text-center">Imagen</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $item = null;
                            $valor = null;
                            $tipo = null;
                            $banners = ControladorBanner::ctrMostrarBanners($item, $valor, $tipo);
                            foreach ($banners as $key => $value) {
                            ?>
                                <tr>
                                    <td><?php echo $key + 1 ?></td>
                                    <td class="text-center align-middle">
                                        <?php

                                        if ($value["imagen"] != null) {

                                            echo '<img src="' . $value["imagen"] . '" alt="" width="300" height="250">';
                                        } else {
                                            echo '<img src="vistas/img/banner/defualt.png" alt="">';
                                        }
                                        ?>
                                    </td>
                                    <td class="align-middle">
                                        <div class="text-center align-middle">
                                            <a href="#" class="btn btn-warning rounded btn-sm me-1 btnEditarBanner" idBanner="<?php echo $value["id_banner"] ?>" data-bs-toggle="modal" data-bs-target="#modalEditarBanner"><i class="bx bx-edit"></i></a>
                                            <a href="#" class="btn btn-danger rounded btn-sm btnEliminarBanner" idBanner="<?php echo $value["id_banner"] ?>" imagen="<?php echo $value["imagen"]?>"><i class="bx bx-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>N°</th>
                                <th>Imagen</th>
                                <th>Acción</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- MODAL NUEVO BANNER -->
<div class="modal fade" id="modalNuevoBanner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo banner</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="imagen" class="form-label">Selecionar una imagen</label>
                        <input type="file" name="imagen" id="newImagen" class="form-control" accept="image/*" required>
                        <small class="fw-bold">* El peso máximo de la imagen 5MB</small><br>
                        <small class="fw-bold">* El tamaño (1920 x 950) pixels</small>
                        <div class="text-center">
                            <img src="vistas/img/banner/default.png" id="imagenPreview" class="img img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>Guardar</button>
                </div>
                <?php
                $crearBanner = new ControladorBanner();
                $crearBanner->ctrCrearBanner();
                ?>
            </form>
        </div>
    </div>
</div>

<!-- MODAL EDITAR BANNER -->
<div class="modal fade" id="modalEditarBanner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Editar banner</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id_banner" id="id_banner">
                    <div class="form-group">
                        <label for="imagen" class="form-label">Selecionar una imagen</label>
                        <input type="file" name="editImagen" id="editImagen" class="form-control mb-2" accept="image/*" >
                        <small class="fw-bold mt-3">* El peso máximo de la imagen 5MB</small><br>
                        <small class="fw-bold">* El tamaño (1920 x 950) pixels</small>
                        <div class="text-center mt-3">
                            <img src="vistas/img/banner/default.png" id="editImagenPreview" class="img img-fluid" alt="">
                        </div>
                        <input type="hidden" name="imagenActual" id="imagenActual">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>Guardar</button>
                </div>
                <?php
                $editarBanner = new ControladorBanner();
                $editarBanner->ctrEditarBanner();
                ?>
            </form>
        </div>
    </div>
</div>


<!-- BORRAR BANNER -->

<?php
$borrarBanner = new ControladorBanner();
$borrarBanner->ctrBorrarBanner();
?>