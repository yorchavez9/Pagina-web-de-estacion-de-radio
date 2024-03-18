<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
            <div class="breadcrumb-title pe-3">Patrocinadores</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="inicio"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Patrocinadores</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered tabla_patrocinador" style="width:100%">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Empresa</th>
                                <th class="text-center">Correo</th>
                                <th class="text-center">Teléfono</th>
                                <th class="text-center">Sitio web</th>
                                <th class="text-center">Dirección</th>
                                <th class="text-center">Mensaje</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $item = null;
                            $valor = null;

                            $patrocinadores = ControladorPatrocinador::ctrMostrarPatrocinador($item, $valor);
                            foreach ($patrocinadores as $key => $value) {
                            ?>
                                <tr>
                                    <td><?php echo $key + 1 ?></td>
                                    <td class="align-middle"><?php echo $value["nombre"]?></td>
                                    <td class="align-middle"><?php echo $value["empresa"]?></td>
                                    <td class="align-middle"><?php echo $value["correo"]?></td>
                                    <td class="align-middle"><?php echo $value["telefono"]?></td>
                                    <td class="align-middle"><?php echo $value["sitio_web"]?></td>
                                    <td class="align-middle"><?php echo $value["direccion"]?></td>
                                    <td class="align-middle text-wrap" style="word-break: break-word;"><?php echo $value["mensaje"]?></td>
                                    <td class="text-center align-middle">
                                      
                                        <a href="#" class="btn btn-danger rounded btn-sm btnEliminarPatrocinador" idPatrocinador="<?php echo $value["id_patrocinador"] ?>" ><i class="bx bx-trash"></i></a>
                                      
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>N°</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Empresa</th>
                                <th class="text-center">Correo</th>
                                <th class="text-center">Teléfono</th>
                                <th class="text-center">Sitio web</th>
                                <th class="text-center">Dirección</th>
                                <th class="text-center">Mensaje</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>



<!-- BORRAR PATROCINADOR -->

<?php
$borrarPatrocinador = new ControladorPatrocinador();
$borrarPatrocinador->ctrBorrarPatrocinador();