<?php
$item = null;
$valor = null;
$redesSociales = ControladorRedesSociales::ctrMostrarRedesSociales($item, $valor);

$totalRedesSociales = count($redesSociales);

?>

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
            <div class="breadcrumb-title pe-3">Redes sociales</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="inicio"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Redes sociales</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div>
            <?php
            if($totalRedesSociales <= 0){
            ?>
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalNuevoRedSocial"><i class="bx bx-user-plus"></i> Registrar las redes sociales</button>
            <?php
            }
            ?>
            <h6 class="mb-3 text-uppercase mt-2">Tabla de redes sociales</h6>
        </div>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered tabla_redes_sociales" style="width:100%">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Facebook</th>
                                <th>Whatsapp</th>
                                <th>Youtube</th>
                                <th>Linkedin</th>
                                <th>Twitter</th>
                                <th>Tiktok</th>
                                <th>Instagram</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($redesSociales as $key => $value) {
                            ?>
                                <tr>
                                    <td><?php echo $key + 1 ?></td>
                                    <td><a href="<?php echo $value["facebook"] ?>" target="_blank"><i class="bx bxl-facebook bx-lg"></i></a></td>
                                    <td><a href="<?php echo $value["whatsapp"] ?>" target="_blank"><i class="bx bxl-whatsapp bx-lg text-success"></i></a></td>
                                    <td><a href="<?php echo $value["youtube"] ?>" target="_blank"><i class="bx bxl-youtube bx-lg text-danger"></i></a></td>
                                    <td><a href="<?php echo $value["linkedin"] ?>" target="_blank"><i class="bx bxl-linkedin bx-lg text-primary"></i></a></td>
                                    <td><a href="<?php echo $value["twitter"] ?>" target="_blank"><i class="bx bxl-twitter bx-lg text-info"></i></a></td>
                                    <td class="align-middle"><a href="<?php echo $value["tiktok"] ?>" target="_blank"><img src="vistas/img/icon/tik-tok.png" width="45" alt=""></a></td>
                                    <td><a href="<?php echo $value["instagram"] ?>" target="_blank"><i class="bx bxl-instagram bx-lg text-warning"></i></a></td>
                                    
                                    <td>
                                        <div class="text-center">
                                            <a href="#" class="btn btn-warning rounded btn-sm me-1 btnEditarRedesSociales" idRedes="<?php echo $value["id_redes"] ?>" data-bs-toggle="modal" data-bs-target="#modalEditarRedSocial"><i class="bx bx-edit"></i></a>
                                            <a href="#" class="btn btn-danger rounded btn-sm btnEliminarRedesSociales" idRedes="<?php echo $value["id_redes"] ?>"><i class="bx bx-trash"></i></a>
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
                                <th>Facebook</th>
                                <th>Whatsapp</th>
                                <th>Youtube</th>
                                <th>Linkedin</th>
                                <th>Twitter</th>
                                <th>Tiktok</th>
                                <th>Instagram</th>
                                <th>Acción</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- MODAL NUEVO RED SOCIAL -->
<div class="modal fade" id="modalNuevoRedSocial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    

                    <!-- WhatsApp -->
                    <div class="form-group mb-3">
                        <label for="facebook" class="form-label">Ingrese el link de facebook</label>
                        <input type="text" name="facebook" class="form-control"placeholder="Ingrese el link de facebook">
                    </div>

                    <!-- whatsapp -->
                    <div class="form-group mb-3">
                        <label for="whatsapp" class="form-label">Ingrese el link de whatsapp</label>
                        <input type="text" name="whatsapp" class="form-control" placeholder="Ingrese el link de whatsapp">
                    </div>

                    <!-- youtube -->
                    <div class="form-group mb-3">
                        <label for="youtube" class="form-label">Ingrese el link de youtube</label>
                        <input type="text" name="youtube" class="form-control" placeholder="Ingrese el link de youtube">
                    </div>

                    <!-- linkedin -->
                    <div class="form-group mb-3">
                        <label for="linkedin" class="form-label">Ingrese el link de linkedin</label>
                        <input type="text" name="linkedin" class="form-control" placeholder="Ingrese el link de linkedin">
                    </div>

                    <!-- twitter -->
                    <div class="form-group mb-3">
                        <label for="twitter" class="form-label">Ingrese el link de twitter</label>
                        <input type="text" name="twitter" class="form-control" placeholder="Ingrese el link de twitter">
                    </div>

                    <!-- tiktok -->
                    <div class="form-group mb-3">
                        <label for="tiktok" class="form-label">Ingrese el link de tiktok</label>
                        <input type="text" name="tiktok" class="form-control" placeholder="Ingrese el link de tiktok">
                    </div>

                    <!-- instagram -->
                    <div class="form-group mb-3">
                        <label for="instagram" class="form-label">Ingrese el link de instagram</label>
                        <input type="text" name="instagram" class="form-control" placeholder="Ingrese el link de instagram">
                    </div>

                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>Guardar</button>
                </div>
                <?php
                $crearRedesSociales = new ControladorRedesSociales();
                $crearRedesSociales->ctrCrearRedesSociales();
                ?>
            </form>
        </div>
    </div>
</div>


<!-- MODAL NUEVO RED SOCIAL -->
<div class="modal fade" id="modalEditarRedSocial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    
                    <!-- id redes -->
                    <input type="hidden" name="id_redes" id="id_redes">

                    <!-- WhatsApp -->
                    <div class="form-group mb-3">
                        <label for="facebook" class="form-label">Ingrese el link de facebook</label>
                        <input type="text" name="editFacebook" id="editFacebook" class="form-control"placeholder="Ingrese el link de facebook">
                    </div>

                    <!-- whatsapp -->
                    <div class="form-group mb-3">
                        <label for="whatsapp" class="form-label">Ingrese el link de whatsapp</label>
                        <input type="text" name="editWhatsapp" id="editWhatsapp" class="form-control" placeholder="Ingrese el link de whatsapp">
                    </div>

                    <!-- youtube -->
                    <div class="form-group mb-3">
                        <label for="youtube" class="form-label">Ingrese el link de youtube</label>
                        <input type="text" name="editYoutube" id="editYoutube" class="form-control" placeholder="Ingrese el link de youtube">
                    </div>

                    <!-- linkedin -->
                    <div class="form-group mb-3">
                        <label for="linkedin" class="form-label">Ingrese el link de linkedin</label>
                        <input type="text" name="editLinkedin" id="editLinkedin" class="form-control" placeholder="Ingrese el link de linkedin">
                    </div>

                    <!-- twitter -->
                    <div class="form-group mb-3">
                        <label for="twitter" class="form-label">Ingrese el link de twitter</label>
                        <input type="text" name="editTwitter" id="editTwitter" class="form-control" placeholder="Ingrese el link de twitter">
                    </div>

                    <!-- tiktok -->
                    <div class="form-group mb-3">
                        <label for="tiktok" class="form-label">Ingrese el link de tiktok</label>
                        <input type="text" name="editTiktok" id="editTiktok" class="form-control" placeholder="Ingrese el link de tiktok">
                    </div>

                    <!-- instagram -->
                    <div class="form-group mb-3">
                        <label for="instagram" class="form-label">Ingrese el link de instagram</label>
                        <input type="text" name="editInstagram" id="editInstagram" class="form-control" placeholder="Ingrese el link de instagram">
                    </div>

                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>Guardar</button>
                </div>
                <?php
                $editarRedesSociales = new ControladorRedesSociales();
                $editarRedesSociales->ctrEditarRedesSociales();
                ?>
            </form>
        </div>
    </div>
</div>




<!-- BORRAR REDES SOCIALES -->

<?php
$borrarRedesSociales = new ControladorRedesSociales();
$borrarRedesSociales->ctrBorrarRedesSociales();
?>