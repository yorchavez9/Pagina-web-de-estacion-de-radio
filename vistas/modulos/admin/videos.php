<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
            <div class="breadcrumb-title pe-3">Videos</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="inicio"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Videos</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div>
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalNuevoVideo"><i class="bx bx-video"></i> Nuevo video</button>
            <h6 class="mb-3 text-uppercase mt-2">Tabla de videos</h6>
        </div>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered tabla_video" style="width:100%">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th class="text-center">Título</th>
                                <th class="text-center">Video</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $item = null;
                            $valor = null;

                            $videos = ControladorVideo::ctrMostrarVideos($item, $valor);
                            foreach ($videos as $key => $value) {
                            ?>
                                <tr>
                                    <td><?php echo $key + 1 ?></td>
                                    <td class="align-middle"><?php echo $value["titulo"]?></td>
                                    <td class="text-center w-25">
                                        <?php echo $value["video_url"]?>
                                    </td>
                                    <?php
                                    if ($value["estado"] == 1) {

                                        echo '<td class="text-center align-middle"><button class="btn btn-success btn-sm rounded btnActivar" idVideo="' . $value["id_video"] . '" estadoVideo="0">Activado</button></td>';
                                    } else {

                                        echo '<td class="text-center align-middle"><button class="btn btn-danger btn-sm rounded btnActivar" idVideo="' . $value["id_video"] . '" estadoVideo="1">Desactivado</button></td>';
                                    }
                                    ?>
                                    <td class="text-center align-middle">
                                      
                                        <a href="#" class="btn btn-warning rounded btn-sm me-1 btnEditarVideo" idVideo="<?php echo $value["id_video"] ?>" data-bs-toggle="modal" data-bs-target="#modalEditarVideo"><i class="bx bx-edit"></i></a>
                                        <a href="#" class="btn btn-danger rounded btn-sm btnEliminarVideo" idVideo="<?php echo $value["id_video"] ?>" ><i class="bx bx-trash"></i></a>
                                      
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
                                <th class="text-center">Video</th>
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


<!-- MODAL NUEVO VIDEO -->
<div class="modal fade" id="modalNuevoVideo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Video</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="titulo" class="form-label">Ingrese el título</label>
                        <input type="text" name="titulo" class="form-control" placeholder="Ingrese el titulo">
                    </div>
                    <div class="form-group mt-3">
                        <label for="video_url" class="form-label">Ingrese la url del video</label>
                        <textarea name="video_url" class="form-control" id="" cols="30" rows="10"></textarea>
                        <a href=""></a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>Guardar</button>
                </div>
                <?php
                $crearVideo = new ControladorVideo();
                $crearVideo->ctrCrearVideos();
                ?>
            </form>
        </div>
    </div>
</div>


<!-- MODAL EDITAR VIDEO -->
<div class="modal fade" id="modalEditarVideo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Video</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_video" id="id_video">
                    <div class="form-group">
                        <label for="titulo" class="form-label">Ingrese el título</label>
                        <input type="text" name="editTitulo" id="editTitulo" class="form-control" placeholder="Ingrese el titulo">
                    </div>
                    <div class="form-group mt-3">
                        <label for="video_url" class="form-label">Ingrese la url del video</label>
                        <small>Modificar el tamaño </small>
                        <textarea name="editVideo_url" class="form-control" id="editVideo_url" cols="30" rows="10"></textarea>
                        <a href=""></a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>Guardar</button>
                </div>
                <?php
                $editarVideo = new ControladorVideo();
                $editarVideo->ctrEditarvideos();
                ?>
            </form>
        </div>
    </div>
</div>




<!-- BORRAR BANNER -->

<?php
$borrarVideo = new ControladorVideo();
$borrarVideo->ctrBorrarVideos();
?>