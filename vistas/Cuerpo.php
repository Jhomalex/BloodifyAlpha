<?php
require "Cabeza.php";
?>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane in active" id="pacientes">
        <h3>Pacientes</h3>
        <button class="btn btn-primary" data-toggle="modal" href="#formularioReceptor" onclick="limpiarRec();selectCM();">
        <i class="fa fa-plus-circle">Agregar petición</i></button>
        <button class="btn btn-success" onclick="listarRec()">Refrescar</button>
        <div class="panel-body table-responsive" id="listadoregistros">
            <table id="tblReceptor" class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <tr class="table-danger">
                        <th>Editar</th>
                        <th>Apellidos y Nombres</th>
                        <th>DNI</th>
                        <th>Celular</th>
                        <th>fnac</th>
                        <th>C. Médico</th>
                        <th>T. Sangre</th>
                        <th>Necesita</th>
                        <th>Progreso</th>
                        <th>Código</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
                
        <div class="modal fade" id="formularioReceptor">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Nueva Petición</h4>
                        <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="formularioRec" method="POST">
                            <input type="hidden" class="form-control input-sm" id="idRec" name="id">
                            <input type="text" class="form-control input-sm" id="nomRec" name="nomRec"
                            placeholder="Nombres" maxLength="200" required>
                            <input type="text" class="form-control input-sm" id="apRec" name="apRec"
                            placeholder="Apellidos" maxLength="200" required>
                            <input type="text" class="form-control input-sm" id="dniRec" name="dniRec"
                            placeholder="DNI" maxLength="20" required>
                            <input type="text" class="form-control input-sm" id="celRec" name="celRec"
                            placeholder="Celular" maxLength="20" required>
                            <input type="text" class="form-control input-sm" id="fnacRec" name="fnacRec"
                            placeholder="fnac" maxLength="200" required>
                            <div class="form-group">
                                <label>Centro Médico</label>
                                <select id="cMedicoRec" class="form-control" name="cMedicoRec" required></select>
                            </div>
                            <div class="form-group">
                                <label>Tipo de sangre</label>
                                <select id="tsangreRec" class="form-control" name="tsangreRec" required></select>
                            </div>
                            <input type="number" class="form-control input-sm" id="necesitaRec" 
                            name="necesitaRec" placeholder="Necesita" required>
                            <input type="number" class="form-control input-sm" id="progresoRec" 
                            name="progresoRec" placeholder="Progreso" required>
                            <input type="text" class="form-control input-lg" id="descripcionRec" 
                            name="descripcionRec" placeholder="Descripción" required>
                            <input type="text" class="form-control input-lg" id="casoRec" 
                            name="casoRec" placeholder="Caso" required>
                            <label for="disabledSelect">Foto</label>
                            <input type="file" id="fotosRec" name="fotosRec">
                            <input type="text" class="form-control input-sm" id="codigoRec" 
                            name="codigoRec" placeholder="Código" required>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary" id="btnGuardarRec"><i class="fa fa-save">Guardar</i></button>
                                <button tyle="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-arrow-circle-left">Cancelar</i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
<!--oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
    <div role="tabpanel" class="tab-pane fade" id="campañas">
        <h3>Campaña</h3>
        <button class="btn btn-primary" data-toggle="modal" href="#formularioCampaña" onclick="limpiarCp()">
        <i class="fa fa-plus-circle">Agregar centro médico</i></button>
        <button class="btn btn-success" onclick="listarCp()">Refrescar</button>
        <div class="panel-body table-responsive" id="listadoregistros">
            <table id="tblCampaña" class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <tr class="table-danger">
                        <th>Editar</th>
                        <th>Campaña</th>
                        <th>Ubicación</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="formularioCampaña">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Centro Médico</h4>
                        <button tyle="button" class="close" data-dismiss="modal" >&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="formularioCp" method="POST">
                            <input type="hidden" id="idCp" name="idCp">
                            <label>Nombre de la campaña</label>
                            <input type="text" class="form-control" id="nombreCp" maxLength="200" placeholder="Nombre" name="nombreCp" required>
                            <label>Ubicación</label>
                            <input type="text" class="form-control" id="ubicacionCp" maxLength="200" placeholder="Ubicación" name="ubicacionCp" required>
                            <label>Fecha</label>
                            <input type="date" class="form-control" id="fechaICp" placeholder="Fecha" name="fechaICp" required>
                            <input type="date" class="form-control" id="fechaFCp" placeholder="Fecha" name="fechaFCp" required>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary" id="btnGuardarCp"><i class="fa fa-save">Guardar</i></button>
                                <button tyle="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-arrow-circle-left">Cancelar</i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo onclick="mostrarform(true)"-->
                <!--
<label class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" checked>
    <span class="custom-control-indicator"></span>
</label>oooooooooooooooooooooooooooooooooooooooooooo data-toggle="modal" href="#formularioCentroMedico"-->
    <div role="tabpanel" class="tab-pane fade" id="centrosMedicos">
        <h3>Centros Médicos</h3>
        <button class="btn btn-primary" data-toggle="modal" href="#formularioCentroMedico" onclick="limpiarCM()">
        <i class="fa fa-plus-circle">Agregar centro médico</i></button>
        <button class="btn btn-success" onclick="listarCM()">Refrescar</button>
        <div class="panel-body table-responsive" id="listadoregistros">
            <table id="tblCentroMedico" class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <tr class="table-danger">
                        <th>Editar</th>
                        <th>Centro Médico</th>
                        <th>Ubicación</th>
                        <th>Cod. Ubicación</th>
                        <th>Horario</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="formularioCentroMedico">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Centro Médico</h4>
                        <button tyle="button" class="close" data-dismiss="modal" >&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="formularioCM" method="POST">
                            <input type="hidden" id="idCM" name="idCM">
                            <label>Nombre del Centro Médico</label>
                            <input type="text" class="form-control" id="nombreCM" maxLength="200" placeholder="Nombre" name="nombreCM" required>
                            <label>Ubicación:</label>
                            <input type="text" class="form-control" id="ubicacionCM" maxLength="200" placeholder="Dirección del Centro Médico" name="ubicacionCM" required>
                            <label>Cod. ubicación:</label>
                            <input type="text" class="form-control" id="codUbicacionCM" placeholder="Código del Centro Médico" name="codUbicacionCM" required>
                            <label>Horario:</label>
                            <input type="text" class="form-control" id="horarioCM" placeholder="Horario del Centro Médico" name="horarioCM" required>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary" id="btnGuardarCM"><i class="fa fa-save">Guardar</i></button>
                                <button tyle="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-arrow-circle-left">Cancelar</i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->
<!--oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo-->

    <div role="tabpanel" class="tab-pane fade" id="usuarios">
        <h3>Usuarios</h3>
        <button class="btn btn-primary" data-toggle="modal" href="#formularioDonante" onclick="limpiarDon()">
        <i class="fa fa-plus-circle">Agregar petición</i></button>
        <button class="btn btn-success" onclick="listarDon()">Refrescar</button>
        <div class="panel-body table-responsive" id="listadoregistros">
            <table id="tblDonante" class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <tr class="table-danger">
                        <th>Editar</th>
                        <th>Usuario</th>
                        <th>Contraseña</th>
                        <th>Apellidos y Nombres</th>
                        <th>DNI</th>
                        <th>Celular</th>
                        <th>Correo</th>
                        <th>T. Sangre</th>
                        <th>Nacimiento</th>
                        <th>Ubicación</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
                
        <div class="modal fade" id="formularioDonante">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Nueva Petición</h4>
                        <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="formularioDon" method="POST">
                            <input type="hidden" class="form-control input-sm" id="idDon" name="id">
                            <input type="text" class="form-control input-sm" id="usDon" name="usDon"
                            placeholder="Usuario" maxLength="200" required>
                            <input type="password" class="form-control input-sm" id="passDon" name="passDon"
                            placeholder="Contraseña" maxLength="200" required>
                            <input type="text" class="form-control input-sm" id="nomDon" name="nomDon"
                            placeholder="Nombres" maxLength="200" required>
                            <input type="text" class="form-control input-sm" id="apDon" name="apDon"
                            placeholder="Apellidos" maxLength="200" required>
                            <input type="text" class="form-control input-sm" id="dniDon" name="dniDon"
                            placeholder="DNI" maxLength="20" required>
                            <input type="text" class="form-control input-sm" id="celDon" name="celDon"
                            placeholder="Celular" maxLength="20" required>
                            <input type="mail" class="form-control input-sm" id="correoDon" name="correoDon"
                            placeholder="Correo" maxLength="200" required>
                            <div class="form-group">
                                <label>Tipo de sangre</label>
                                <select id="tsangreDon" class="form-control" name="tsangreDon" required></select>
                            </div>
                            <label>Fecha de nacimiento</label>
                            <input type="date" class="form-control input-sm" id="fnacDon" 
                            name="fnacDon" placeholder="Fecha de nacimiento" required>
                            <input type="text" class="form-control input-sm" id="ubicacionDon" 
                            name="ubicacionDon" placeholder="Ubicación" required>
                            <label for="disabledSelect">Foto</label>
                            <input type="file" id="fotoDon" name="fotoDon">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary" id="btnGuardarDon"><i class="fa fa-save">Guardar</i></button>
                                <button tyle="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-arrow-circle-left">Cancelar</i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require "Pie.php";
?>