<?php
setlocale(LC_TIME, "es_ES");
?>
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
            <div class="breadcrumb-title pe-3">Noticias</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="inicio"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Noticias</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div>
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalNuevoNoticia"><i class="bx bx-plus"></i> Nueva noticia</button>
            <h6 class="mb-3 text-uppercase mt-2">Tabla de noticias</h6>
        </div>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered tabla_noticia" style="width:100%">
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

                            $noticias = ControladorNoticia::ctrMostrarNoticias($item, $valor);
                            foreach ($noticias as $key => $value) {
                            ?>
                                <tr>
                                    <td><?php echo $key + 1 ?></td>
                                    <td class="align-middle"><?php echo $value["titulo"] ?></td>
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

                                        echo '<td class="text-center align-middle"><button class="btn btn-success btn-sm rounded btnActivar" idNoticia="' . $value["id_noticia"] . '" estadoNoticia="0">Activado</button></td>';
                                    } else {

                                        echo '<td class="text-center align-middle"><button class="btn btn-danger btn-sm rounded btnActivar" idNoticia="' . $value["id_noticia"] . '" estadoNoticia="1">Desactivado</button></td>';
                                    }
                                    ?>
                                    <td class="align-middle">
                                        <div class="text-center align-middle">
                                            <a href="#" class="btn btn-warning rounded btn-sm me-1 btnEditarNoticia" idNoticia="<?php echo $value["id_noticia"] ?>" data-bs-toggle="modal" data-bs-target="#modalEditarNoticia"><i class="bx bx-edit"></i></a>
                                            <a href="#" class="btn btn-success rounded btn-sm" data-bs-toggle="modal" data-bs-target="#modalVerNoticia<?php echo $value["id_noticia"] ?>"><i class="bx bx-show"></i></a>
                                            <a href="#" class="btn btn-danger rounded btn-sm btnEliminarNoticia" idNoticia="<?php echo $value["id_noticia"] ?>" imagen="<?php echo $value["imagen"] ?>"><i class="bx bx-trash"></i></a>
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
<div class="modal fade" id="modalNuevoNoticia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva noticia</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <!-- titulo -->
                    <div class="form-group">
                        <label for="titulo" class="form-label">Ingrese el título</label>
                        <input type="text" name="titulo" class="form-control" placeholder="Ingrese el título">
                    </div>

                    <div class="form-group row mt-4 mb-4">

                        <!-- Imagen -->
                        <div class="col-md-6">
                            <label for="imagen" class="form-label">Selecionar una imagen</label>
                            <input type="file" name="imagen" id="imagenNoticia" class="form-control" accept="image/*">
                            <div class="text-center mt-3">
                                <img src="vistas/img/banner/default.png" id="previewImgNoticia" class="img img-fluid" alt="">
                            </div>
                        </div>

                        <!-- Fecha -->
                        <div class="col-md-6">
                            <label for="fecha" class="form-label">Ingrese la fecha</label>
                            <input type="date" name="fecha" class="form-control" placeholder="Ingrese la fecha">
                        </div>
                    </div>

                    <!-- descripción -->
                    <div class="form-group">
                        <label for="descripcion" class="form-label">Ingrese la descripción</label>
                        <textarea name="descripcion" id="textDescripcion" class="form-control" rows="4"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>Guardar</button>
                </div>
                <?php
                $crearNoticia = new ControladorNoticia();
                $crearNoticia->ctrCrearNoticia();
                ?>
            </form>
        </div>
    </div>
</div>


<!-- MODAL EDITAR NOTICIA -->
<div class="modal fade" id="modalEditarNoticia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input type="hidden" name="id_noticia" id="id_noticia">

                    <!-- titulo -->
                    <div class="form-group">
                        <label for="titulo" class="form-label">Ingrese el título</label>
                        <input type="text" name="editTitulo" id="editTitulo" class="form-control" placeholder="Ingrese el título">
                    </div>

                    <div class="form-group row mt-4 mb-4">

                        <!-- Imagen -->
                        <div class="col-md-6">
                            <label for="imagen" class="form-label">Selecionar una imagen</label>
                            <input type="file" name="editImagen" id="editImagenNoticia" class="form-control" accept="image/*">
                            <div class="text-center mt-3">
                                <img src="vistas/img/banner/default.png" id="editPreviewImgNoticia" class="img img-fluid" alt="">
                            </div>
                            <input type="hidden" name="imagenActualN" id="imagenActualN">
                        </div>

                        <!-- Fecha -->
                        <div class="col-md-6">
                            <label for="fecha" class="form-label">Ingrese la fecha</label>
                            <input type="date" name="editFecha" id="editFecha" class="form-control" placeholder="Ingrese la fecha">
                        </div>
                    </div>

                    <!-- descripción -->
                    <div class="form-group">
                        <label for="descripcion" class="form-label">Ingrese la descripción</label>
                        <textarea name="editDescripcion" id="editDescripcion" class="form-control" rows="4"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>Guardar</button>
                </div>
                <?php
                $editarNoticia = new ControladorNoticia();
                $editarNoticia->ctrEditarNoticia();
                ?>
            </form>
        </div>
    </div>
</div>

<?php

$item = null;
$valor = null;

$showNoticias = ControladorNoticia::ctrMostrarNoticias($item, $valor);
foreach ($showNoticias as $key => $value) {
?>
    <div class="modal fade" id="modalVerNoticia<?php echo $value["id_noticia"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="text-center">
                        <h5 class="modal-title" id="exampleModalLabel">Ver noticia</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card p-3">
                    <img src="<?php echo $value["imagen"] ?>" class="img img-fluid" alt="Imagen de la noticia">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $value["titulo"] ?></h5>
                        <p class="card-text"><?php echo $value["descripcion"] ?></p>
                        <p class="card-text">
                            <small class="text-muted">
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

<script>
    $(document).ready(function() {
        $("#textDescripcion").summernote({
            height: 150 // Altura en píxeles
        });
        $("#editDescripcion").summernote({
            height: 150 // Altura en píxeles
        });
    });
</script>