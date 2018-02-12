var tabla;

function init(){
    //mostrarform(false);
	listarCM();
    $("#formularioCM").on("submit",function(e)
	{
		guardaryeditarCM(e);
	})
}
function limpiarCM(){
    $("#idCM").val("");
    $("#nombreCM").val("");
    $("#ubicacionCM").val("");
    $("#codUbicacionCM").val("");
    $("#horarioCM").val("");
}

function listarCM()
{
	tabla=$('#tblCentroMedico').dataTable(
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
					url: '../ajax/cmedico.php?op=listar',
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

function guardaryeditarCM(e)
{
	e.preventDefault();
	//$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($('#formularioCM')[0]);
	$.ajax({
		url: '../ajax/cmedico.php?op=guardaryeditar',
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
	limpiarCM();
}

function mostrarCM(id){
	$.post('../ajax/cmedico.php?op=mostrar',{idCM:id},function(data,status){
		data=JSON.parse(data);
		$("#idCM").val(data.id);
		$("#nombreCM").val(data.nombre);
        $("#ubicacionCM").val(data.ubicacion);
        $("#codUbicacionCM").val(data.codUbicacion);
		$("#horarioCM").val(data.horario);
	})
}

function desactivarCM(id){
	bootbox.confirm("¿Está seguro de desactivar el Centro Médico?",function(result){
		if(result==true){
			$.post("../ajax/cmedico.php?op=desactivar",{idCM:id},function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
	listarCM();
}

function activarCM(id){
	bootbox.confirm("¿Está seguro de activar el Centro Médico?",function(result){
		if(result==true){
			$.post("../ajax/cmedico.php?op=activar",{idCM:id},function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
	listarCM();
}

init();