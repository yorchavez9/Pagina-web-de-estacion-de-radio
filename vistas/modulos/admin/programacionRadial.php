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
                    <table id="example" class="table table-striped table-bordered tabla_programacion_radial" style="width:100%">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th class="text-center">Conductor</th>
                                <th class="text-center">Día</th>
                                <th class="text-center">Título</th>
                                <th class="text-center">Imagen</th>
                                <th class="text-center">Hora</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $item = null;
                            $valor = null;

                            $programacionesRadiales = ControladorProgramacionRadial::ctrMostrarProgramacionRadial($item, $valor);
                            foreach ($programacionesRadiales as $key => $value) {
                            ?>
                                <tr>
                                    <td class="align-middle"><?php echo $key + 1 ?></td>
                                    <td class="align-middle">
                                        <span><?php echo $value["nombre"] ?></span>
                                        <span><?php echo $value["apellidos"] ?></span>
                                    </td>
                                    <td class="aling-middle"><?php echo $value["dia"]?></td>
                                    <td class="aling-middle"><?php echo $value["titulo"]?></td>
                                    <td class="text-center align-middle">
                                        <?php

                                        if ($value["imagen"] != null) {

                                            echo '<img src="' . $value["imagen"] . '" alt="" width="150" height="80">';
                                        } else {
                                            echo '<img src="vistas/img/banner/defualt.png" alt="">';
                                        }
                                        ?>
                                    </td>
                                    <td class="align-middle"><?php echo $value["hora"] ?></td>
                                    <?php
                                    if ($value["estado"] == 1) {

                                        echo '<td class="text-center align-middle"><button class="btn btn-success btn-sm rounded btnActivar" idRadial="' . $value["id_radial"] . '" estadoRadial="0">Activado</button></td>';
                                    } else {

                                        echo '<td class="text-center align-middle"><button class="btn btn-danger btn-sm rounded btnActivar" idRadial="' . $value["id_radial"] . '" estadoRadial="1">Desactivado</button></td>';
                                    }
                                    ?>
                                    <td class="align-middle">
                                        <div class="text-center align-middle">
                                            <a href="#" class="btn btn-warning rounded btn-sm me-1 btnEditarProgramacionRadial" idRadial="<?php echo $value["id_radial"] ?>" data-bs-toggle="modal" data-bs-target="#modalEditarProgramacionRadial"><i class="bx bx-edit"></i></a>
                                            <a href="#" class="btn btn-danger rounded btn-sm btnEliminarProgramacionRadial" idRadial="<?php echo $value["id_radial"] ?>" imagen="<?php echo $value["imagen"] ?>"><i class="bx bx-trash"></i></a>
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
                                <th class="text-center">Conductor</th>
                                <th class="text-center">Día</th>
                                <th class="text-center">Título</th>
                                <th class="text-center">Imagen</th>
                                <th class="text-center">Hora</th>
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

                    <div class="row">

                        <!-- Conductores -->
                        <div class="form-group col-md-6">
                            <label for="conductores" class="form-label">Seleccione el conductor</label>
                            <select name="id_conductor" class="form-select">
                                <option value="" selected disabled>Seleccione el conductor</option>
                                <?php

                                $item = null;
                                $valor = null;
                                $conductores = ControladorConductor::ctrMostrarConductores($item, $valor);

                                foreach ($conductores as $key => $value) {
                                ?>
                                    <option value="<?php echo $value["id_conductor"] ?>"><?php echo $value["nombre"]; echo ' ' . $value["apellidos"] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Dia -->
                        <div class="form-group col-md-6">
                            <label for="dia" class="form-label">Seleccione el día</label>
                            <select name="dia" class="form-control">
                                <option value="" selected disabled>Selecione el día</option>
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miercoles">Miercoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                                <option value="Sábado">Sábado</option>
                                <option value="Domingo">Domingo</option>
                            </select>
                        </div>

                    </div>

                    <!-- Titulo -->
                    <div class="form-group mt-3">
                        <label for="titulo" class="form-label">Ingrese el título</label>
                        <input type="text" name="titulo" class="form-control" placeholder="Ingrese el título" required>
                    </div>


                    <div class="row mt-4">
                        <!-- Imagen -->
                        <div class="col-md-6">
                            <label for="imagen" class="form-label">Selecionar una imagen</label>
                            <input type="file" name="imagen" id="imagenRadial" class="form-control" accept="image/*" required>
                            <div class="text-center mt-3">
                                <img src="vistas/img/banner/default.png" id="previewImgRadial" class="img img-fluid" alt="">
                            </div>
                        </div>

                        <!-- Hora -->
                        <div class="col-md-6">
                            <label for="hora" class="form-label">Ingrese la hora</label>
                            <input type="text" name="hora" class="form-control" placeholder="Ingrese el horario" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>Guardar</button>
                </div>
                <?php
                $crearProgramacionRadial = new ControladorProgramacionRadial();
                $crearProgramacionRadial->ctrCrearProgramacionRadial();
                ?>
            </form>
        </div>
    </div>
</div>

<!-- MODAL EDITAR PROGRAMACION RADIAL -->
<div class="modal fade" id="modalEditarProgramacionRadial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Editar programación radial</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    
                    <!-- id programacion radial -->
                    <input type="hidden" name="id_radial" id="id_radial">

                    <div class="row">

                        <!-- Conductores -->
                        <div class="form-group col-md-6">
                            <label for="conductores" class="form-label">Seleccione el conductor</label>
                            <select name="editId_conductor" id="editId_conductor" class="form-select">
                                <option value="" id="id_conductorEdit"></option>
                                <?php

                                $item = null;
                                $valor = null;
                                $conductores = ControladorConductor::ctrMostrarConductores($item, $valor);

                                foreach ($conductores as $key => $value) {
                                ?>
                                    <option value="<?php echo $value["id_conductor"] ?>"><?php echo $value["nombre"]; echo ' ' . $value["apellidos"] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Dia -->
                        <div class="form-group col-md-6">
                            <label for="dia" class="form-label">Seleccione el día</label>
                            <select name="editDia" id="editDia" class="form-control">
                                <option value="" id="idDia">Selecione el día</option>
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miercoles">Miercoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                                <option value="Sábado">Sábado</option>
                                <option value="Domingo">Domingo</option>
                            </select>
                        </div>

                    </div>

                    <!-- Titulo -->
                    <div class="form-group mt-3">
                        <label for="titulo" class="form-label">Ingrese el título</label>
                        <input type="text" name="editTitulo" id="editTitulo" class="form-control" placeholder="Ingrese el título" required>
                    </div>


                    <div class="row mt-4">
                        <!-- Imagen -->
                        <div class="col-md-6">
                            <label for="imagen" class="form-label">Selecionar una imagen</label>
                            <input type="file" name="editImagenR" id="editImagenRadial" class="form-control" accept="image/*">
                            <div class="text-center mt-3">
                                <img src="vistas/img/banner/default.png" id="editPreviewImgRadial" class="img img-fluid" alt="">
                            </div>
                            <input type="hidden" name="imagenActualRadial" id="imagenActualRadial">
                        </div>

                        <!-- Hora -->
                        <div class="col-md-6">
                            <label for="hora" class="form-label">Ingrese la hora</label>
                            <input type="text" name="editHora" id="editHora" class="form-control" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>Guardar</button>
                </div>
                <?php
                $editarProgramacionRadial = new ControladorProgramacionRadial();
                $editarProgramacionRadial->ctrEditarProgramacionRadial();
                ?>
            </form>
        </div>
    </div>
</div>


<!-- BORRAR PROGRAMACION TV -->

<?php
$borrarRadial = new ControladorProgramacionRadial();
$borrarRadial->ctrBorrarProgramacionRadial();
?>