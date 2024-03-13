<?php
$item = null;
$valor = null;
$datosContacto = ControladorDatosContacto::ctrMostrarDatosContacto($item, $valor);

$totalDatosContacto = count($datosContacto);

?>

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
            <div class="breadcrumb-title pe-3">Datos de contacto</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="inicio"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Datos de contacto</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div>
            <?php
            if($totalDatosContacto <= 0){
            ?>
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalNuevoDatosContacto"><i class="bx bx-user-plus"></i> Registrar datos de contacto</button>
            <?php
            }
            ?>
            <h6 class="mb-3 text-uppercase mt-2">Tabla de contactos</h6>
        </div>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered tabla_datos_contacto" style="width:100%">
                        <thead>
                            <tr>
                                <th>Localización</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($datosContacto as $key => $value) {
                            ?>
                                <tr>
                                    <td><?php echo $value["localizacion"]?></td>
                                    <td><?php echo $value["telefono"]?></td>
                                    <td><?php echo $value["correo"]?></td>
                                    <td class="align-middle">
                                        <div class="text-center">
                                            <a href="#" class="btn btn-warning rounded btn-sm me-1 btnEditarDatosContacto" idDatosContacto="<?php echo $value["id_data_contacto"] ?>" data-bs-toggle="modal" data-bs-target="#modalEditarDatosContacto"><i class="bx bx-edit"></i></a>
                                            <a href="#" class="btn btn-danger rounded btn-sm btnEliminarDatosContacto" idDatosContacto="<?php echo $value["id_data_contacto"] ?>"><i class="bx bx-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Localización</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Acción</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- MODAL NUEVO DATOS DE CONTACTO -->
<div class="modal fade" id="modalNuevoDatosContacto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Redes sociales</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    

                    <!-- Localización -->
                    <div class="form-group mb-3">
                        <label for="localizacion" class="form-label">Ingrese la localización</label>
                        <input type="text" name="localizacion" class="form-control"placeholder="Ingrese la localización">
                    </div>

                    <!-- Telefono -->
                    <div class="form-group mb-3">
                        <label for="telefono" class="form-label">Ingrese el teléfono</label>
                        <input type="text" name="telefono" class="form-control" placeholder="Ingrese el teléfono">
                    </div>

                    <!-- Correo -->
                    <div class="form-group mb-3">
                        <label for="correo" class="form-label">Ingrese el correo electrónico</label>
                        <input type="text" name="correo" class="form-control" placeholder="Ingrese el correo electrónico">
                    </div>
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>Guardar</button>
                </div>
                <?php
                $crearDatosContacto = new ControladorDatosContacto();
                $crearDatosContacto->ctrCrearDatosContacto();
                ?>
            </form>
        </div>
    </div>
</div>



<!-- MODAL EDITAR DATOS DE CONTACTO -->
<div class="modal fade" id="modalEditarDatosContacto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Redes sociales</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    
                    <!-- id -->
                    <input type="hidden" name="id_data_contacto" id="id_data_contacto">
                    
                    <!-- Localización -->
                    <div class="form-group mb-3">
                        <label for="localizacion" class="form-label">Ingrese la localización</label>
                        <input type="text" name="editLocalizacion" id="editLocalizacion" class="form-control"placeholder="Ingrese la localización">
                    </div>

                    <!-- Telefono -->
                    <div class="form-group mb-3">
                        <label for="telefono" class="form-label">Ingrese el teléfono</label>
                        <input type="text" name="editTelefono" id="editTelefono" class="form-control" placeholder="Ingrese el teléfono">
                    </div>

                    <!-- Correo -->
                    <div class="form-group mb-3">
                        <label for="correo" class="form-label">Ingrese el correo electrónico</label>
                        <input type="text" name="editCorreo" id="editCorreo" class="form-control" placeholder="Ingrese el correo electrónico">
                    </div>
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>Guardar</button>
                </div>
                <?php
                $editarDatosContacto = new ControladorDatosContacto();
                $editarDatosContacto->ctrEditarDatosContacto();
                ?>
            </form>
        </div>
    </div>
</div>




<!-- BORRAR DATOS DE CONTACTO -->

<?php
$borrarDatosContacto = new ControladorDatosContacto();
$borrarDatosContacto->ctrBorrarDatosContacto();
?>