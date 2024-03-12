<?php
setlocale(LC_TIME, "es_ES");
?>
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
            <div class="breadcrumb-title pe-3">Eventos</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="inicio"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Eventos</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div>
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalNuevoEvento"><i class="bx bx-plus"></i> Nuevo evento</button>
            <h6 class="mb-3 text-uppercase mt-2">Tabla de eventos</h6>
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
                                            <a href="#" class="btn btn-warning rounded btn-sm me-1 btnEditarEvento" idEvento="<?php echo $value["id_evento"] ?>" data-bs-toggle="modal" data-bs-target="#modalEditarEvento"><i class="bx bx-edit"></i></a>
                                            <a href="#" class="btn btn-success rounded btn-sm" data-bs-toggle="modal" data-bs-target="#modalVerEvento<?php echo $value["id_evento"] ?>"><i class="bx bx-show"></i></a>
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


<!-- MODAL NUEVO NOTICIA -->
<div class="modal fade" id="modalNuevoEvento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva evento</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <!-- titulo -->
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


<!-- MODAL EDITAR NOTICIA -->
<div class="modal fade" id="modalEditarEvento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Editar noticia</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <!-- id de la noticia -->
                    <input type="hidden" name="id_evento" id="id_evento">

                    <!-- titulo -->
                    <div class="form-group">
                        <label for="titulo" class="form-label">Ingrese el título</label>
                        <input type="text" name="editTitulo" id="editTitulo" class="form-control" placeholder="Ingrese el título">
                    </div>

                    <div class="form-group row mt-4 mb-4">

                        <!-- Imagen -->
                        <div class="col-md-6">
                            <label for="imagen" class="form-label">Selecionar una imagen</label>
                            <input type="file" name="editImagen" id="editImagenEvento" class="form-control" accept="image/*">
                            <div class="text-center mt-3">
                                <img src="vistas/img/banner/default.png" id="editPreviewImgEvento" class="img img-fluid" alt="">
                            </div>
                            <input type="hidden" name="imagenActualE" id="imagenActualE">
                        </div>

                        <!-- Fecha -->
                        <div class="col-md-6">
                            <label for="fecha" class="form-label">Ingrese la fecha</label>
                            <input type="date" name="editFecha" id="editFecha" class="form-control" placeholder="Ingrese la fecha">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-refresh"></i>Actualizar</button>
                </div>
                <?php
                $editarEvento = new ControladorEvento();
                $editarEvento->ctrEditarEvento();
                ?>
            </form>
        </div>
    </div>
</div>

<?php

$item = null;
$valor = null;

$showEvento = ControladorEvento::ctrMostrarEvento($item, $valor);
foreach ($showEvento as $key => $value) {
?>
    <div class="modal fade" id="modalVerEvento<?php echo $value["id_evento"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="text-center">
                        <h3 class="modal-title fw-bold" id="exampleModalLabel">Detalles del evento</h3>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card p-3">
                    <div class="text-center mb-2">
                        <h3 class="card-title"><?php echo $value["titulo"] ?></h3>
                    </div>
                    <div class="text-center">
                        <img src="<?php echo $value["imagen"] ?>" class="img img-fluid" alt="Imagen de la noticia">
                    </div>
                    <div class="card-body">
                        
                        <p class="card-text text-center">
                            <small class="text-muted h4 fw-bold">
                                <?php
                                setlocale(LC_TIME, 'es_ES.UTF-8');

                                // Suponiendo que $value["fecha"] contiene la fecha en formato YYYY-MM-DD
                                $fecha = new DateTime($value["fecha"]);
                                
                                // Formatea la fecha utilizando el formato específico
                                echo strftime('%d de %B del %Y', $fecha->getTimestamp());
                                ?>
                            </small>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php
}
?>

<!-- BORRAR BANNER -->

<?php
$borrarNoticias = new ControladorNoticia();
$borrarNoticias->ctrBorrarNoticia();
?>
