<?php
setlocale(LC_TIME, "es_ES");
?>
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
            <div class="breadcrumb-title pe-3">Anuncios 1</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="inicio"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Anuncios 1</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div>
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalNuevoAnuncioA"><i class="bx bx-plus"></i> Nuevo anuncio 1</button>
            <h6 class="mb-3 text-uppercase mt-2">Tabla de anunacios 1</h6>
        </div>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered tabla_anuncioA" style="width:100%">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th class="text-center">Imagen</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $item = null;
                            $valor = null;

                            $anunciosA = ControladorAnuncioA::ctrMostrarAnuncioA($item, $valor);
                            foreach ($anunciosA as $key => $value) {
                            ?>
                                <tr>
                                    <td class="align-middle"><?php echo $key + 1 ?></td>
                                    <td class="text-center align-middle">
                                        <?php

                                        if ($value["imagen"] != null) {

                                            echo '<img src="' . $value["imagen"] . '" alt="" width="300" height="150">';
                                        } else {
                                            echo '<img src="vistas/img/banner/defualt.png" alt="">';
                                        }
                                        ?>
                                    </td>
                                    <td class="align-middle"><?php echo $value["fecha"] ?></td>
                                    <?php
                                    if ($value["estado"] == 1) {

                                        echo '<td class="text-center align-middle"><button class="btn btn-success btn-sm rounded btnActivar" idAnuncioA="' . $value["id_anuncioA"] . '" estadoAnuncioA="0">Activado</button></td>';
                                    } else {

                                        echo '<td class="text-center align-middle"><button class="btn btn-danger btn-sm rounded btnActivar" idAnuncioA="' . $value["id_anuncioA"] . '" estadoAnuncioA="1">Desactivado</button></td>';
                                    }
                                    ?>
                                    <td class="align-middle">
                                        <div class="text-center align-middle">
                                            <a href="#" class="btn btn-warning rounded btn-sm me-1 btnEditarAnuncioA" idAnuncioA="<?php echo $value["id_anuncioA"] ?>" data-bs-toggle="modal" data-bs-target="#modalEditarAnuncioA"><i class="bx bx-edit"></i></a>
                                            <a href="#" class="btn btn-danger rounded btn-sm btnEliminarAnuncioA" idAnuncioA="<?php echo $value["id_anuncioA"] ?>" imagen="<?php echo $value["imagen"] ?>"><i class="bx bx-trash"></i></a>
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
                                <th class="text-center">Imagen</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- MODAL NUEVO ANUNCIO A -->
<div class="modal fade" id="modalNuevoAnuncioA" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva anuncio 1</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <!-- Imagen -->
                    <div class="form-group">
                        <label for="imagen" class="form-label">Selecionar una imagen</label>
                        <input type="file" name="imagen" id="imagenAnuncioA" class="form-control" accept="image/*" required>
                        <div class="text-center mt-3">
                            <img src="vistas/img/banner/default.png" id="previewImgAnuncioA" class="img img-fluid" alt="">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>Guardar</button>
                </div>
                <?php
                $crearAnuncioA = new ControladorAnuncioA();
                $crearAnuncioA->ctrCrearAnuncioA();
                ?>
            </form>
        </div>
    </div>
</div>


<!-- MODAL EDITAR ANUNCIO A -->
<div class="modal fade" id="modalEditarAnuncioA" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva anuncio 1</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <!-- id -->
                    <input type="hidden" name="id_anuncioA" id="id_anuncioA">

                    <!-- Imagen -->
                    <div class="form-group">
                        <label for="imagen" class="form-label">Selecionar una imagen</label>
                        <input type="file" name="editImagen" id="EditImagenAnuncioA" class="form-control" accept="image/*">
                        <div class="text-center mt-3">
                            <img src="vistas/img/banner/default.png" id="editPreviewImgAnuncioA" class="img img-fluid" alt="">
                        </div>
                        <input type="hidden" name="imagenActualAnuncioA" id="imagenActualAnuncioA">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>Guardar</button>
                </div>
                <?php
                $editarAnuncioA = new ControladorAnuncioA();
                $editarAnuncioA->ctrEditarAnuncioA();
                ?>
            </form>
        </div>
    </div>
</div>



<!-- BORRAR ANUNCIO A -->

<?php
$borrarAnuncoA = new ControladorAnuncioA();
$borrarAnuncoA->ctrBorrarAnuncioA();
?>