<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
            <div class="breadcrumb-title pe-3">Ranking</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="inicio"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Ranking</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div>
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalNuevoRanking"><i class="text-warning bx bxs-star"></i> Nuevo ranking</button>
            <h6 class="mb-3 text-uppercase mt-2">Tabla de ranking</h6>
        </div>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered tabla_ranking" style="width:100%">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th class="text-center">Puesto</th>
                                <th class="text-center">Canción</th>
                                <th class="text-center">Artista</th>
                                <th class="text-center">Letra</th>
                                <th class="text-center">Video</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $item = null;
                            $valor = null;

                            $rankings = ControladorRanking::ctrMostrarRanking($item, $valor);
                            foreach ($rankings as $key => $value) {
                            ?>
                                <tr>
                                    <td class="align-middle"><?php echo $key + 1 ?></td>
                                    <td class="align-middle text-center">
                                        <?php 
                                        if($value["puesto"] == 1){
                                            echo '<span>'.$value["puesto"].'<br><i class="text-warning bx bxs-star"></i></span>';
                                        }else if($value["puesto"] == 2){
                                            echo '<span>'.$value["puesto"].'<br><i class="text-warning bx bxs-star"></i><i class="text-warning bx bxs-star"></i></span>';
                                        }else if($value["puesto"] == 3){
                                            echo '<span>'.$value["puesto"].'<br><i class="text-warning bx bxs-star"></i><i class="text-warning bx bxs-star"></i><i class="text-warning bx bxs-star"></i></span>';
                                        }else if($value["puesto"] == 4){
                                            echo '<span>'.$value["puesto"].'<br><i class="text-warning bx bxs-star"></i><i class="text-warning bx bxs-star"></i><i class="text-warning bx bxs-star"></i><i class="text-warning bx bxs-star"></i></span>';
                                        }else{
                                            echo '<span>'.$value["puesto"].'<br><i class="text-warning bx bxs-star"></i><i class="text-warning bx bxs-star"></i><i class="text-warning bx bxs-star"></i><i class="text-warning bx bxs-star"></i><i class="text-warning bx bxs-star"></i></span>';
                                        }
                                        ?>
                                    </td>
                                    <td class="align-middle text-wrap" style="word-break: break-word;"><?php echo $value["cancion"]?></td>
                                    <td class="align-middle text-wrap" style="word-break: break-word;"><?php echo $value["artista"]?></td>
                                    <td class="align-middle text-wrap" style="word-break: break-word;"><?php echo $value["letra"]?></td>
                                    <td class="text-center w-25">
                                        <?php echo $value["video_url"]?>
                                    </td>
                                    <td class="align-middle"><?php echo $value["fecha"]?></td>
                                    <td class="text-center align-middle">
                                      
                                        <a href="#" class="btn btn-warning rounded btn-sm me-1 btnEditarRanking" idRanking="<?php echo $value["id_ranking"] ?>" data-bs-toggle="modal" data-bs-target="#modalEditarRanking"><i class="bx bx-edit"></i></a>
                                        <a href="#" class="btn btn-danger rounded btn-sm btnEliminarRanking" idRanking="<?php echo $value["id_ranking"] ?>" ><i class="bx bx-trash"></i></a>
                                      
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>N°</th>
                                <th class="text-center">Puesto</th>
                                <th class="text-center">Canción</th>
                                <th class="text-center">Artista</th>
                                <th class="text-center">Letra</th>
                                <th class="text-center">Video</th>
                                <th class="text-center">Fecha</th>
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
<div class="modal fade" id="modalNuevoRanking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo ranking <i class="text-warning bx bxs-star"></i><i class="text-warning bx bxs-star"></i><i class="text-warning bx bxs-star"></i><i class="text-warning bx bxs-star"></i><i class="text-warning bx bxs-star"></i> </h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">

                    <!-- Puesto -->
                    <div class="form-group mb-3">
                        <label for="puesto" class="form-label">Selecione el puesto (<span class="text-danger">*</span>) </label>
                        <select name="puesto" class="form-control" required>
                            <option value="" selected disabled>Seleccione</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <!-- Canción -->
                    <div class="form-group mb-3">
                        <label for="cancion" class="form-label">Ingrese la canción (<span class="text-danger">*</span>)</label>
                        <input type="text" name="cancion" class="form-control" placeholder="Ingrese la canción" required>
                    </div>

                    <!-- Artista -->
                    <div class="form-group mb-3">
                        <label for="artista" class="form-label">Ingrese el artista (<span class="text-danger">*</span>)</label>
                        <input type="text" name="artista" class="form-control" placeholder="Ingrese el artista" required>
                    </div>

                    <!-- Letra -->
                    <div class="form-group mb-3">
                        <label for="letra" class="form-label">Ingrese la letra de la canción</label>
                        <textarea name="letra" class="form-control" placeholder="Ingrese la letra de la canción"></textarea>
                    </div>

                    <!-- URL VIDEO -->
                    <div class="form-group mb-3">
                        <label for="video_url" class="form-label">Ingrese la url del video</label>
                        <small>Modificar el tamaño </small>
                        <textarea name="video_url" class="form-control" placeholder="Ingrese la url del video"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>Guardar</button>
                </div>
                <?php
                $crearRanking = new ControladorRanking();
                $crearRanking->ctrCrearRanking();
                ?>
            </form>
        </div>
    </div>
</div>



<!-- MODAL EDITAR RANKING -->
<div class="modal fade" id="modalEditarRanking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo ranking <i class="text-warning bx bxs-star"></i><i class="text-warning bx bxs-star"></i><i class="text-warning bx bxs-star"></i><i class="text-warning bx bxs-star"></i><i class="text-warning bx bxs-star"></i> </h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    
                    <!-- id -->
                    <input type="hidden" name="id_ranking" id="id_ranking">

                    <!-- Puesto -->
                    <div class="form-group mb-3">
                        <label for="puesto" class="form-label">Selecione el puesto (<span class="text-danger">*</span>) </label>
                        <select name="editPuesto" id="editPuesto" class="form-control" required>
                            <option value="" selected disabled>Seleccione</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <!-- Canción -->
                    <div class="form-group mb-3">
                        <label for="cancion" class="form-label">Ingrese la canción (<span class="text-danger">*</span>)</label>
                        <input type="text" name="editCancion" id="editCancion" class="form-control" placeholder="Ingrese la canción" required>
                    </div>

                    <!-- Artista -->
                    <div class="form-group mb-3">
                        <label for="artista" class="form-label">Ingrese el artista (<span class="text-danger">*</span>)</label>
                        <input type="text" name="editArtista" id="editArtista" class="form-control" placeholder="Ingrese el artista" required>
                    </div>

                    <!-- Letra -->
                    <div class="form-group mb-3">
                        <label for="letra" class="form-label">Ingrese la letra de la canción</label>
                        <textarea name="editLetra" id="editLetra" class="form-control" placeholder="Ingrese la letra de la canción"></textarea>
                    </div>

                    <!-- URL VIDEO -->
                    <div class="form-group mb-3">
                        <label for="video_url" class="form-label">Ingrese la url del video</label>
                        <small>Modificar el tamaño </small>
                        <textarea name="editVideo_url" id="editVideo_url" class="form-control" placeholder="Ingrese la url del video"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>Guardar</button>
                </div>
                <?php
                $editarRanking = new ControladorRanking();
                $editarRanking->ctrEditarRanking();
                ?>
            </form>
        </div>
    </div>
</div>





<!-- BORRAR BANNER -->

<?php
$borrarRanking = new ControladorRanking();
$borrarRanking->ctrBorrarRanking();
?>