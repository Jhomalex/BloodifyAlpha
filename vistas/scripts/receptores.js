var tabla;

function init(){
	listarRec();
    $("#formularioRec").on("submit",function(e)
	{
		guardaryeditarRec(e);
	})
	$.post("../ajax/receptores.php?op=selectTipoDeSangre",function (r){
		$('#tsangreRec').html(r);
//		$('#tsangreRec').selectpicker('render');
//		$('#tsangreRec').selectpicker('refresh');
    });
    selectCM();
}

function selectCM(){
    $.post("../ajax/receptores.php?op=selectCentroMedico",function (r){
		$('#cMedicoRec').html(r);
//		$('#tipoSangre').selectpicker('render');
//		$('#tipoSangre').selectpicker('refresh');
	});
}

function limpiarRec(){
    $("#nomRec").val("");
    $("#apRec").val("");
    $("#dniRec").val("");
	$("#celRec").val("");
    $("#fnacRec").val("");
    $("#cMedicoRec").val("");
    $("#tsangreRec").val("");
    $("#necesitaRec").val("");
    $("#progresoRec").val("");
    $("#descripcionRec").val("");
    $("#casoRec").val("");
    $("#fotoRec").val("");
    $("#codigoRec").val("");
}
function mostrarformRec(e){
    limpiarRec();
    if(e==true){
        $("#listadoregistros").hide();
        $("#formularioCentroMedico").show();
    }else{
        $("#listadoregistros").show();
        $("#formularioCentroMedico").hide();
    }
}
function listarRec()
{
	tabla=$('#tblReceptor').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/receptores.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 10,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}

function guardaryeditarRec(e)
{
	e.preventDefault();
	//$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($('#formularioRec')[0]);
	$.ajax({
		url: '../ajax/receptores.php?op=guardaryeditar',
	    type: "POST",
		data: formData,
	    contentType: false,
        processData: false,

	    success: function(datos)
	    {
			bootbox.alert(datos);
			tabla.ajax.reload();
			//mostrarform(false);
	    }
	});
	limpiarRec();
}

function mostrarRec(id){
	$.post('../ajax/receptores.php?op=mostrar',{idRec:id},function(data,status){
		data=JSON.parse(data);
        $("#idRec").val(data.id);
		$("#nomRec").val(data.nombre);
        $("#apRec").val(data.apellido);
        $("#dniRec").val(data.dni);
        $("#celRec").val(data.cel);
        $("#fnacRec").val(data.fnac);
        $("#cMedicoRec").val(data.cMedico_id);
        $("#tsangreRec").val(data.tsangre_id);
        $("#necesitaRec").val(data.necesita);
        $("#progresoRec").val(data.progreso);
        $("#descripcionRec").val(data.descripcion);
        $("#casoRec").val(data.caso);
        $("#fotoRec").val(data.foto);
        $("#codigoRec").val(data.codigo);
	})
}

function desactivarRec(id){
	bootbox.confirm("¿Está seguro de desactivar al Receptor?",function(result){
		if(result==true){
			$.post("../ajax/receptores.php?op=desactivar",{idRec:id},function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
	listarRec();
}

function activarRec(id){
	bootbox.confirm("¿Está seguro de activar al Receptor?",function(result){
		if(result==true){
			$.post("../ajax/receptores.php?op=activar",{idRec:id},function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
	listarRec();
}
function mostrarPac(id){
	$.post('../ajax/receptores.php?op=mostrarPac',{idRec:id},function(data,status){
		 data=JSON.parse(data);
		 $("#nomPac").html(data.nombre+" "+data.apellido);
		 $("#quienEs").html(data.descripcion);
		 $("#quePaso").html(data.caso);
		 $("#horarioPac").html(data.horario);
	})
}

init();