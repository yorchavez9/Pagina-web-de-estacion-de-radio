<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
            <div class="breadcrumb-title pe-3">Conductores</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="inicio"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Conductores</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div>
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalNuevoConductor"><i class="bx bx-user-plus"></i> Nuevo conductor</button>
            <h6 class="mb-3 text-uppercase mt-2">Tabla de conductores</h6>
        </div>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered tabla_conductor" style="width:100%">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Perfil</th>
                                <th>Correo</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $item = null;
                            $valor = null;

                            $conductores = ControladorConductor::ctrMostrarConductores($item, $valor);
                            foreach ($conductores as $key => $value) {
                            ?>
                                <tr>
                                    <td><?php echo $key + 1 ?></td>
                                    <td><?php echo $value["nombre"] ?></td>
                                    <td><?php echo $value["apellidos"] ?></td>
                                    <td><?php echo $value["tipo"] ?></td>
                                    <td><?php echo $value["correo"] ?></td>
                                    <td><?php echo $value["telefono"] ?></td>
                                    <td><?php echo $value["habilidades"] ?></td>
                                    <?php
                                    if ($value["estado"] == 1) {

                                        echo '<td class="text-center"><button class="btn btn-success btn-sm rounded btnActivar" idConductor="' . $value["id_conductor"] . '" estadoConductor="0">Activado</button></td>';
                                    } else {

                                        echo '<td class="text-center"><button class="btn btn-danger btn-sm rounded btnActivar" idConductor="' . $value["id_conductor"] . '" estadoConductor="1">Desactivado</button></td>';
                                    }
                                    ?>
                                    <td>
                                        <div class="text-center">
                                            <a href="#" class="btn btn-warning rounded btn-sm me-1 btnEditarConductor" idConductor="<?php echo $value["id_conductor"] ?>" data-bs-toggle="modal" data-bs-target="#modalEditarConductor"><i class="bx bx-edit"></i></a>
                                            <a href="#" class="btn btn-danger rounded btn-sm btnEliminarConductor" idConductor="<?php echo $value["id_conductor"] ?>"><i class="bx bx-trash"></i></a>
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
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Perfil</th>
                                <th>Correo</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- MODAL NUEVO CONDUCTOR -->
<div class="modal fade" id="modalNuevoConductor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Nuevo conductor</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="form-group row mb-3">

                        <!-- nombre  -->
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Ingrese el nombre (<span class="text-danger">*</span>)</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre" required>
                        </div>

                        <!-- Apellidos -->
                        <div class="col-md-6">
                            <label for="apellidos" class="form-label">Ingrese el apellido (<span class="text-danger">*</span>)</label>
                            <input type="text" name="apellidos" class="form-control" placeholder="Ingrese el apellido" required>
                        </div>

                    </div>

                    <!-- Tipo de trabajador -->
                    <div class="form-group mb-3">
                        <label for="tipo" class="form-label">Selecione el tipo (<span class="text-danger">*</span>)</label>
                        <select name="tipo" class="form-select" required>
                            <option value="" selected disabled>Selecion el tipo</option>
                            <option value="radio">Radio</option>
                            <option value="tv">TV</option>
                        </select>
                    </div>

                    <!-- Correo electrónico -->
                    <div class="form-group mb-3">
                        <label for="correo" class="form-label">Ingrese el correo electrónico (<span class="text-danger">*</span>)</label>
                        <input type="email" name="correo" class="form-control" placeholder="Ingrese el correo electrónico" required>
                    </div>

                    <div class="row">

                        <!-- Telefono -->
                        <div class="form-group col-md-6">
                            <label for="" class="form-label">Ingrese el teléfono (<span class="text-danger">*</span>)</label>
                            <input type="text" name="telefono" class="form-control" placeholder="Ingrese el teléfono" required>
                        </div>

                        <!-- Experiencia -->
                        <div class="form-group col-md-6">
                            <label for="" class="form-label">Ingrese la experiencia (<span class="text-danger">*</span>)</label>
                            <input type="text" name="experiencia" class="form-control" placeholder="Ingrese experiencia" required>
                        </div>

                        <div class="form-group">
                            <label for="habilidad" class="form-label">Ingrese las habilidades</label>
                            <textarea name="habilidad" class="form-control" cols="30" rows="3" placeholder="Ingrese las habilidades"></textarea>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>Guardar</button>
                </div>
                <?php
                $crearConductor = new ControladorConductor();
                $crearConductor->ctrCrearConductor();
                ?>
            </form>
        </div>
    </div>
</div>



<!-- MODAL EDITAR CONDUCTOR -->
<div class="modal fade" id="modalEditarConductor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Editar conductor</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">

                    <!-- id conductor -->
                    <input type="hidden" name="id_conductor" id="id_conductor">

                    <div class="form-group row mb-3">

                        <!-- nombre  -->
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Ingrese el nombre (<span class="text-danger">*</span>)</label>
                            <input type="text" name="editNombre" id="editNombre" class="form-control" placeholder="Ingrese el nombre" required>
                        </div>

                        <!-- Apellidos -->
                        <div class="col-md-6">
                            <label for="apellidos" class="form-label">Ingrese el apellido (<span class="text-danger">*</span>)</label>
                            <input type="text" name="editApellidos" id="editApellidos" class="form-control" placeholder="Ingrese el apellido" required>
                        </div>

                    </div>

                    <!-- Tipo de trabajador -->
                    <div class="form-group mb-3">
                        <label for="perfil" class="form-label">Selecione el tipo (<span class="text-danger">*</span>)</label>
                        <select name="editTipo" id="editTipo" class="form-select" required>
                            <option value="" selected disabled>Selecion el tipo</option>
                            <option value="radio">Radio</option>
                            <option value="tv">TV</option>
                        </select>
                    </div>

                    <!-- Correo electrónico -->
                    <div class="form-group mb-3">
                        <label for="correo" class="form-label">Ingrese el correo electrónico (<span class="text-danger">*</span>)</label>
                        <input type="email" name="editCorreo" id="editCorreo" class="form-control" placeholder="Ingrese el correo electrónico" required>
                    </div>

                    <div class="row">

                        <!-- Telefono -->
                        <div class="form-group col-md-6">
                            <label for="" class="form-label">Ingrese el teléfono (<span class="text-danger">*</span>)</label>
                            <input type="text" name="editTelefono" id="editTelefono" class="form-control" placeholder="Ingrese el teléfono" required>
                        </div>

                        <!-- Experiencia -->
                        <div class="form-group col-md-6">
                            <label for="" class="form-label">Ingrese la experiencia (<span class="text-danger">*</span>)</label>
                            <input type="text" name="editExperiencia" id="editExperiencia" class="form-control" placeholder="Ingrese experiencia" required>
                        </div>

                        <div class="form-group">
                            <label for="habilidades" class="form-label">Ingrese las habilidades</label>
                            <textarea name="editHabilidad" id="editHabilidad" class="form-control" cols="30" rows="3" placeholder="Ingrese las habilidades"></textarea>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-refresh"></i>Guardar</button>
                </div>
                <?php
                $editarConductor = new ControladorConductor();
                $editarConductor->ctrEditarConductor();
                ?>
            </form>
        </div>
    </div>
</div>




<!-- BORRAR CONDUCTOR -->

<?php
$borrarConductores = new ControladorConductor();
$borrarConductores->ctrBorrarConductor();
?>