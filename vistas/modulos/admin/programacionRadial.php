<?php
setlocale(LC_TIME, "es_ES");
?>
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
            <div class="breadcrumb-title pe-3">Programación radial</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="inicio"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Programación radial</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div>
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalNuevoProgramacionRadial"><i class="bx bx-plus"></i> Nuevo programación radial</button>
            <h6 class="mb-3 text-uppercase mt-2">Tabla de programación radial</h6>
        </div>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered tabla_evento" style="width:100%">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th class="text-center">Título</th>
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

                            $eventos = ControladorEvento::ctrMostrarEvento($item, $valor);
                            foreach ($eventos as $key => $value) {
                            ?>
                                <tr>
                                    <td class="align-middle"><?php echo $key + 1 ?></td>
                                    <td class="align-middle" style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo $value["titulo"] ?></td>
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

                                        echo '<td class="text-center align-middle"><button class="btn btn-success btn-sm rounded btnActivar" idEvento="' . $value["id_evento"] . '" estadoEvento="0">Activado</button></td>';
                                    } else {

                                        echo '<td class="text-center align-middle"><button class="btn btn-danger btn-sm rounded btnActivar" idEvento="' . $value["id_evento"] . '" estadoEvento="1">Desactivado</button></td>';
                                    }
                                    ?>
                                    <td class="align-middle">
                                        <div class="text-center align-middle">
                                            <a href="#" class="btn btn-warning rounded btn-sm me-1 btnEditarEvento" idEvento="<?php echo $value["id_evento"] ?>" data-bs-toggle="modal" data-bs-target="#modalEditarProgramacionRadial"><i class="bx bx-edit"></i></a>
                                            <a href="#" class="btn btn-danger rounded btn-sm btnEliminarEvento" idEvento="<?php echo $value["id_evento"] ?>" imagen="<?php echo $value["imagen"] ?>"><i class="bx bx-trash"></i></a>
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
                                <th class="text-center">Título</th>
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


<!-- MODAL NUEVO PROGRAMACION RADIAL -->
<div class="modal fade" id="modalNuevoProgramacionRadial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Nueva programación radial</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <!-- Conductor -->
                    <div class="form-group">
                        <label for="titulo" class="form-label">Ingrese el título</label>
                        <input type="text" name="titulo" class="form-control" placeholder="Ingrese el título" required>
                    </div>

                    <div class="form-group row mt-4 mb-4">

                        <!-- Imagen -->
                        <div class="col-md-6">
                            <label for="imagen" class="form-label">Selecionar una imagen</label>
                            <input type="file" name="imagen" id="imagenEvento" class="form-control" accept="image/*" required>
                            <div class="text-center mt-3">
                                <img src="vistas/img/banner/default.png" id="previewImgEvento" class="img img-fluid" alt="">
                            </div>
                        </div>

                        <!-- Fecha -->
                        <div class="col-md-6">
                            <label for="fecha" class="form-label">Ingrese la fecha</label>
                            <input type="date" name="fecha" class="form-control" placeholder="Ingrese la fecha" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>Guardar</button>
                </div>
                <?php
                $crearEvento = new ControladorEvento();
                $crearEvento->ctrCrearEvento();
                ?>
            </form>
        </div>
    </div>
</div>




<!-- BORRAR PROGRAMACION RADIAL -->

<?php
$borrarEvento = new ControladorEvento();
$borrarEvento->ctrBorrarEvento();
?>
