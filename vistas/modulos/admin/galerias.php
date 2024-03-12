<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
            <div class="breadcrumb-title pe-3">Galeria</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="inicio"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Galeria</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div>
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalNuevoGaleria"><i class="bx bx-plus"></i> Nueva galería</button>
            <h6 class="mb-3 text-uppercase mt-2">Tabla de galería</h6>
        </div>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered tabla_galeria" style="width:100%">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th class="text-center">Tipo</th>
                                <th class="text-center">Imagen</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $item = null;
                            $valor = null;

                            $galerias = ControladorGaleria::ctrMostrarGaleria($item, $valor);

                            foreach ($galerias as $key => $value) {
                            ?>
                                <tr>
                                    <td class="align-middle"><?php echo $key + 1 ?></td>
                                    <td class="align-middle"><?php echo $value["tipo"]?></td>
                                    <td class="text-center align-middle">
                                        <?php

                                        if ($value["imagen"] != null) {

                                            echo '<img src="' . $value["imagen"] . '" alt="" width="300" height="150">';
                                        } else {
                                            echo '<img src="vistas/img/banner/defualt.png" alt="">';
                                        }
                                        ?>
                                    </td>
                                    <td class="align-middle">
                                        <div class="text-center align-middle">
                                            <a href="#" class="btn btn-warning rounded btn-sm me-1 btnEditarGaleria" idGaleria="<?php echo $value["id_galeria"] ?>" data-bs-toggle="modal" data-bs-target="#modalEditarGaleria"><i class="bx bx-edit"></i></a>
                                            <a href="#" class="btn btn-danger rounded btn-sm btnEliminarGaleria" idGaleria="<?php echo $value["id_galeria"] ?>" imagen="<?php echo $value["imagen"]?>"><i class="bx bx-trash"></i></a>
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
                                <th>Tipo</th>
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


<!-- MODAL NUEVO GALERIA -->
<div class="modal fade" id="modalNuevoGaleria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Foto</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="tipo" class="form-label">Selecione el tipo (Radio - TV)</label>
                        <select name="tipo" id="tipo" class="form-select">
                            <option value="" selected disabled>Selecione una opción</option>
                            <option value="radio">Radio</option>
                            <option value="tv">TV</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="imagen" class="form-label">Selecionar una imagen</label>

                        <input type="file" name="imagen" id="newImagen" class="form-control" accept="image/*">
                        
                        <div class="text-center mt-3">
                            <img src="vistas/img/banner/default.png" id="imagenPreviewG" class="img img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>Guardar</button>
                </div>
                <?php
                $crearGaleria = new ControladorGaleria();
                $crearGaleria->ctrCrearGaleria();
                ?>
            </form>
        </div>
    </div>
</div>

<!-- MODAL EDITAR GALERIA -->
<div class="modal fade" id="modalEditarGaleria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                    <!-- Id -->
                    <input type="hidden" name="id_galeria" id="id_galeria">

                    <!-- Tipo -->
                    <div class="form-group mb-4">
                        <label for="tipo" class="form-label">Selecione el tipo (Radio - TV)</label>
                        <select name="editTipo" id="editTipo" class="form-select">
                            <option value="" selected disabled>Selecione una opción</option>
                            <option value="radio">Radio</option>
                            <option value="tv">TV</option>
                        </select>
                    </div>

                    <!-- Imagen -->
                    <div class="form-group">
                        <label for="imagen" class="form-label">Selecionar una imagen</label>
                        <input type="file" name="editImagen" id="editImagen" class="form-control mb-2" accept="image/*">
                       
                        <div class="text-center mt-3">
                            <img src="vistas/img/banner/default.png" id="editImagenPreviewG" class="img img-fluid" alt="">
                        </div>
                        <input type="hidden" name="imagenActualG" id="imagenActualG">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>Guardar</button>
                </div>
                <?php
                $editarGaleria = new ControladorGaleria();
                $editarGaleria->ctrEditarGaleria();
                ?>
            </form>
        </div>
    </div>
</div>


<!-- BORRAR GALERIA -->

<?php
$borrarGaleria = new ControladorGaleria();
$borrarGaleria->ctrBorrarGaleria();
?>