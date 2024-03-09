<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
            <div class="breadcrumb-title pe-3">Banners</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="inicio"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Banners</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div>
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalNuevoBanner"><i class="bx bx-plus"></i> Nuevo banner</button>
            <h6 class="mb-3 text-uppercase mt-2">Tabla de banners</h6>
        </div>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered tabla_banner" style="width:100%">
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

                            $usuarios = ControladorUsuario::ctrMostrarUsuarios($item, $valor);
                            foreach ($usuarios as $key => $value) {
                            ?>
                                <tr>
                                    <td><?php echo $key + 1 ?></td>
                                    <td><?php echo $value["nombre"] ?></td>
                                    <td><?php echo $value["apellidos"] ?></td>
                                    <td><?php echo $value["perfil"] ?></td>
                                    <td><?php echo $value["correo"] ?></td>
                                    <?php
                                    if ($value["estado"] == 1) {

                                        echo '<td class="text-center"><button class="btn btn-success btn-sm rounded btnActivar" idUsuario="' . $value["id_usuario"] . '" estadoUsuario="0">Activado</button></td>';
                                    } else {

                                        echo '<td class="text-center"><button class="btn btn-danger btn-sm rounded btnActivar" idUsuario="' . $value["id_usuario"] . '" estadoUsuario="1">Desactivado</button></td>';
                                    }
                                    ?>
                                    <td>
                                        <div class="text-center">
                                            <a href="#" class="btn btn-warning rounded btn-sm me-1 btnEditarUsuario" idUsuario="<?php echo $value["id_usuario"] ?>" data-bs-toggle="modal" data-bs-target="#modalEditarUsuario"><i class="bx bx-edit"></i></a>
                                            <a href="#" class="btn btn-danger rounded btn-sm btnEliminarUsuario" idUsuario="<?php echo $value["id_usuario"] ?>"><i class="bx bx-trash"></i></a>
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


<!-- MODAL NUEVO BANNER -->
<div class="modal fade" id="modalNuevoBanner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo banner</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="imagen" class="form-label">Selecionar una imagen</label>
                        <input type="file" name="imagen" id="newImagen" class="form-control" accept="image/*">
                        <small class="fw-bold">* El peso máximo de la imagen 5MB</small><br>
                        <small class="fw-bold">* El tamaño (1920 x 950) pixels</small>
                        <div class="text-center">
                            <img src="vistas/img/banner/default.png" id="imagenPreview" class="img img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>Guardar</button>
                </div>
                <?php
                
                ?>
            </form>
        </div>
    </div>
</div>

<!-- MODAL EDITAR BANNER -->
<div class="modal fade" id="modalEditarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo usuario</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">

                    <!-- editar id -->
                    <input type="hidden" name="id_usuario" id="id_usuario">

                    <div class="form-group row mb-3">

                        <!-- editar nombre -->
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Ingrese el nombre (<span class="text-danger">*</span>)</label>
                            <input type="text" name="editNombre" id="editNombre" class="form-control" placeholder="Ingrese el nombre">
                        </div>

                        <!-- editar apellidos -->
                        <div class="col-md-6">
                            <label for="apellidos" class="form-label">Ingrese el apellido (<span class="text-danger">*</span>)</label>
                            <input type="text" name="editApellidos" id="editApellidos" class="form-control" placeholder="Ingrese el apellido">
                        </div>

                    </div>
                    
                    <!-- editar perfil -->
                    <div class="form-group mb-3">
                        <label for="perfil" class="form-label">Selecione el perfil (<span class="text-danger">*</span>)</label>
                        <select name="editPerfil" id="editPerfil" class="form-select">
                            <option value="" selected disabled>Selecion el perfil</option>
                            <option value="administrador">Administrador</option>
                            <option value="ayudante">Ayudante</option>
                            <option value="usuario">Usuario</option>
                        </select>
                    </div>

                    <!-- editar correo -->
                    <div class="form-group mb-3">
                        <label for="correo" class="form-label">Ingrese el correo electrónico (<span class="text-danger">*</span>)</label>
                        <input type="email" name="editCorreo" id="editCorreo" class="form-control" placeholder="Ingrese el correo electrónico">
                    </div>

                    <!-- editar contraseña -->
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Ingrese la nueva contraseña </label>
                        <div class="input-group" id="show_hide_password">
                            <input type="password" name="editPassword" class="form-control border-end-0" id="inputChoosePassword"  placeholder="Ingrese la nueva contraseña"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                            <input type="hidden" name="passwordActual" id="passwordActual">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-refresh"></i>Guardar</button>
                </div>
                <?php
                $editarUsuario = new ControladorUsuario();
                $editarUsuario->ctrEditarUsuario();
                ?>
            </form>
        </div>
    </div>
</div>


<!-- BORRAR BANNER -->

<?php

?>