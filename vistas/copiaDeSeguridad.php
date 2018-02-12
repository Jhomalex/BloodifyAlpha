<h3>Centros Médicos</h3>
                <button class="btn btn-primary" data-toggle="modal" href="#formularioCentroMedico">Agregar hospital</button>
                <button class="btn btn-success" onclick="listar()"><i class="fa fa-plus-circle">Refrescar</i></button>
                <div class="panel-body table-responsive" id="listadoregistros">
                    <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <tr class="table-danger">
                                <th>ID</th>
                                <th>Centro Médico</th>
                                <th>Ubicación</th>
                                <th>Activo</th>
                                <!--th>Horas de atención</th-->
                            </tr>
                        </thead>
                        <body>

                        </body>
                    </table>
                </div>
                <div class="panel-body" id="formularioregistros">
                    
                </div>
                <!--oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
                <!--oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
                <div class="modal fade" id="formularioCentroMedico">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4>Agregar Centro Médico</h4>
                                <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form id="formularioCentroMedico" name="formularioCentroMedico" method="POST">
                                      <input type="hidden" name="idCentroMedico" id="idCentroMedico">
                                      <label>Nombre del Centro Médico:</label>
                                      <input type="text" class="form-control" id="nombre" maxLength="200"
                                      placeholder="Centro Médico" name="nombre" required>
                                      <label>Ubicación:</label>
                                      <input type="text" class="form-control" id="ubicacion" maxLength="200"
                                      placeholder="Dirección del Centro Médico" name="ubicacion" required> 
                                      <label>Estado:</label>           
                                      <input type="text" class="form-control" id="estado" 
                                      placeholder="Estado" name="estado" required> 
                                      
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary" id="btnGuardar">Guardar</button>
                                        <button tyle="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
                <!--oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
                <h3>Usuarios</h3>
                <div>
                    <table class="table table-md-responsive">
                    <thead>
                        <tr class="table-danger">
                            <th>Acciones</th>
                            <th>Activo</th>>
                            <th>Nombres y Apellidos</th>
                            <th>DNI</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a class="btn btn-warning"><em class="fa fa-pencil">Editar</em></a>
                            </td>
                            <td>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                </label>
                            </td>
                            <td>Filipo Sjneider Wayne Chiroque</td>
                            <td>72245905</td>
                            <td>Superusuario</td>
                        </tr>
                    </tbody>
                </table>
                </div>
<!--oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
<div class="modal fade" id="formularioCentroMedico">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4>Agregar Centro Médico</h4>
                                <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form id="formularioCentroMedico" method="POST">
                                    <input type="hidden" id="id" name="id"></input>
                                    <label>Nombre del Centro Médico</label>
                                    <input type="text" class="form-control" id="nombre" maxLength="200" placeholder="Nombre" name="nombre" required></input>
                                    <label>Ubicación:</label>
                                    <input type="text" class="form-control" id="ubicacion" maxLength="200" placeholder="Dirección del Centro Médico" name="ubicacion" required></input>
                                    <label>Estado:</label>
                                    <input type="text" class="form-control" id="estado" placeholder="Estado" name="estado" required></input>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary" id="btnGuardar">Guardar</button>
                                        <button tyle="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
<!--oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
<div class="panel-body" id="formularioCentroMedico">
                    <form id="formulario" method="POST">
                        <div class="form-group">
                            <label>Nombre del Centro Médico</label>
                            <input type="hidden" id="id" name="id">
                            <input type="text" class="form-control" id="nombre" maxLength="200" placeholder="Nombre" name="nombre" required>
                            <label>Ubicación:</label>
                            <input type="text" class="form-control" id="ubicacion" maxLength="200" placeholder="Dirección del Centro Médico" name="ubicacion" required>
                            <label>Estado:</label>
                            <input type="text" class="form-control" id="estado" placeholder="Estado" name="estado" required>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary" id="btnGuardar"><i class="fa fa-save">Guardar</i></button>
                                <button tyle="button" class="btn btn-danger" onclick="mostrarform(false)"><i class="fa fa-arrow-circle-left">Cancelar</i></button>
                            </div>
                        </div>
                    </form>
                </div>