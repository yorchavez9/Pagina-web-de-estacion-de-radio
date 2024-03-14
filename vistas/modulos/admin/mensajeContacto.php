<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
            <div class="breadcrumb-title pe-3">Mensajes</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="inicio"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Mensajes</li>
                    </ol>
                </nav>
            </div>
        </div>

        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered tabla_mensaje" style="width:100%">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nombre</th>
                                <th>Contactos</th>
                                <th>Compañia</th>
                                <th>Mensaje</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $item = null;
                            $valor = null;

                            $mensajes = ControladorMensaje::ctrMostrarMensaje($item, $valor);
                            foreach ($mensajes as $key => $value) {
                            ?>
                                <tr>
                                    <td><?php echo $key + 1 ?></td>
                                    <td><?php echo $value["nombre"] ?></td>
                                    <td>
                                        <small><?php echo $value["correo"] ?></small><br>
                                        <small><?php echo $value["telefono"] ?></small>
                                    </td>
                                    <td><?php echo $value["compania"] ?></td>
                                    <td><?php echo $value["mensaje"] ?></td>
                                    <td><?php echo $value["fecha"] ?></td>
                                    <?php
                                    if ($value["estado"] == 1) {

                                        echo '<td class="text-center"><button class="btn btn-success btn-sm rounded btnActivar" idMensaje="' . $value["id_contacto"] . '" estadoMensaje="0">Visto</button></td>';
                                    } else {

                                        echo '<td class="text-center"><button class="btn btn-danger btn-sm rounded btnActivar" idMensaje="' . $value["id_contacto"] . '" estadoMensaje="1">ver</button></td>';
                                    }
                                    ?>
                                    <td>
                                        <div class="text-center">
                                            <a href="#" class="btn btn-success rounded btn-sm me-1 btnVerMensaje" idMensaje="<?php echo $value["id_contacto"] ?>" data-bs-toggle="modal" data-bs-target="#modalVerMensaje"><i class="bx bx-show"></i></a>
                                            <a href="#" class="btn btn-danger rounded btn-sm btnEliminarMensaje" idMensaje="<?php echo $value["id_contacto"] ?>"><i class="bx bx-trash"></i></a>
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
                                <th>Contactos</th>
                                <th>Compañia</th>
                                <th>Mensaje</th>
                                <th>Fecha</th>
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




<!-- MODAL NUEVO USUARIO -->
<div class="modal fade" id="modalVerMensaje" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Detalles del mensaje</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card mb-3" style="border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <div class="card-body">
                        <h5 class="card-title text-primary text-center" id="showNombre"></h5>
                        <h6 class="card-subtitle mb-2 text-muted text-center mb-2" id="showCorreo"></h6>
                        <div class="card-text row"><strong>Teléfono:</strong> <p id="showTelefono"></p> </div>
                        <div class="card-text row"><strong>Compañía:</strong> <p id="showCompania"></p> </div>
                        <div class="card-text row"><strong>Mensaje:</strong> <p id="showMensaje"></p> </div>
                        <div class="card-text row"><strong>Fecha:</strong> <span class="text-info" id="showFecha">2024-03-14</span></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- BORRAR MENSJAE -->

<?php
$borrarMensaje = new ControladorMensaje();
$borrarMensaje->ctrBorrarMensaje();
?>