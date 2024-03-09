<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
            <div class="breadcrumb-title pe-3">Usuarios</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="inicio"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div>
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalNuevoUsuario"><i class="bx bx-user-plus"></i> Nuevo usuario</button>
            <h6 class="mb-3 text-uppercase mt-2">Tabla de usuarios</h6>
        </div>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
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
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-warning btn-sm rounded"><i class="bx bx-edit mx-1"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm rounded"><i class="bx bx-trash mx-1"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>63</td>
                                <td>2011/07/25</td>
                                <td>$170,750</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-warning btn-sm rounded"><i class="bx bx-edit mx-1"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm rounded"><i class="bx bx-trash mx-1"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Ashton Cox</td>
                                <td>Junior Technical Author</td>
                                <td>San Francisco</td>
                                <td>66</td>
                                <td>2009/01/12</td>
                                <td>$86,000</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-warning btn-sm rounded"><i class="bx bx-edit mx-1"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm rounded"><i class="bx bx-trash mx-1"></i></a>
                                </td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- MODAL NUEVO USUARIO -->
<div class="modal fade" id="modalNuevoUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo usuario</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group row mb-3">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Ingrese el nombre (<span class="text-danger">*</span>)</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre">
                    </div>
                    <div class="col-md-6">
                        <label for="apellidos" class="form-label">Ingrese el apellido (<span class="text-danger">*</span>)</label>
                        <input type="text" name="apellidos" class="form-control" placeholder="Ingrese el apellido">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="perfil" class="form-label">Selecione el perfil (<span class="text-danger">*</span>)</label>
                    <select name="perfil" class="form-select">
                        <option value="" selected disabled>Selecion el perfil</option>
                        <option value="administrador">Administrador</option>
                        <option value="ayudante">Ayudante</option>
                        <option value="usuario">Usuario</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="correo" class="form-label">Ingrese el correo electrónico (<span class="text-danger">*</span>)</label>
                    <input type="email" name="correo" class="form-control" placeholder="Ingrese el correo electrónico">
                </div>
                <div class="form-group mb-3">
                    <label for="password" class="form-label">Ingrese la contraseña (<span class="text-danger">*</span>)</label>
                    <div class="input-group" id="show_hide_password">
                        <input type="password" name="password" class="form-control border-end-0" id="inputChoosePassword" value="12345678" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bx bx-x"></i>Cerrar</button>
                <button type="button" class="btn btn-primary"><i class="bx bx-save"></i>Guardar</button>
            </div>
        </div>
    </div>
</div>



<!-- SCRIPT DE VALIDACIONES -->
<script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
    });
</script>