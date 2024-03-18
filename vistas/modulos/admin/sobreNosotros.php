<?php
setlocale(LC_TIME, "es_ES");

/* Contar la cantidad de registros */
$item = null;
$valor = null;
$sobreNosotros = ControladorSobreNosotros::ctrMostrarSobreNosotros($item, $valor);
$totalRegistro = count($sobreNosotros);
?>
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
            <div class="breadcrumb-title pe-3">Sobre nosotros</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="inicio"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Sobre nosotros</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div>
            <?php
            if($totalRegistro < 0){
            ?>
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalNuevoSobreNosotros"><i class="bx bx-plus"></i>Ingresar datos sobre nosotros</button>
            <?php
            }
            ?>

            <h6 class="mb-3 text-uppercase mt-2">Tabla de sobre nosotros</h6>
        </div>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered tabla_sobre_nosotros" style="width:100%">
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
                                            <a href="#" class="btn btn-warning rounded btn-sm me-1 btnEditarEvento" idEvento="<?php echo $value["id_evento"] ?>" data-bs-toggle="modal" data-bs-target="#modalEditarSobreNosotros"><i class="bx bx-edit"></i></a>
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


<!-- MODAL NUEVO NOSOTROS -->
<div class="modal fade" id="modalNuevoSobreNosotros" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Ingresar datos sobre nosotros</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">

                    <!-- titulo -->
                    <div class="form-group mb-4">
                        <label for="titulo" class="form-label">Ingrese el título (<span class="text-danger">*</span>)</label>
                        <input type="text" name="titulo" class="form-control" placeholder="Ingrese el título" required>
                    </div>

                    <!-- Descripcion -->
                    <div class="form-group">
                        <label for="descripcion" class="form-label">Ingrese la descripción (<span class="text-danger">*</span>)</label>
                        <textarea name="descripcion" id="" cols="30" rows="10" class="form-control" placeholder="Ingrese la descripción" required></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>Guardar</button>
                </div>
                <?php
                $crearSobreNosotros = new ControladorSobreNosotros();
                $crearSobreNosotros->ctrCrearSobreNosotros();
                ?>
            </form>
        </div>
    </div>
</div>

<!-- MODAL EDITAR NOSOTROS -->
<div class="modal fade" id="modalEditarSobreNosotros" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Editar datos sobre nosotros</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <!-- id --> 
                    <input type="text" name="id_sobre_nosotros" id="id_sobre_nosotros">

                    <!-- titulo -->
                    <div class="form-group">
                        <label for="titulo" class="form-label">Ingrese el título (<span class="text-danger">*</span>)</label>
                        <input type="text" name="titulo" class="form-control" placeholder="Ingrese el título" required>
                    </div>

                    <!-- Descripcion -->
                    <div class="form-group">
                        <label for="descripcion" class="form-control">Ingrese la descripción (<span class="text-danger">*</span>)</label>
                        <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="Ingrese la descripción" required></textarea>
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



<!-- BORRAR SOBRE NOSOTROS -->

<?php
$borrarEvento = new ControladorEvento();
$borrarEvento->ctrBorrarEvento();
?>
