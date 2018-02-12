var tabla;

function init(){
    //mostrarform(false);
	listarCM();
    $("#formularioCp").on("submit",function(e)
	{
		guardaryeditarCp(e);
	})
}
function limpiarCp(){
    $("#idCp").val("");
    $("#nombreCp").val("");
    $("#ubicacionCp").val("");
    $("#fechaCp").val("");
}
function listarCp()
{
	tabla=$('#tblCampaña').dataTable(
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
					url: '../ajax/campaña.php?op=listar',
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

function guardaryeditarCp(e)
{
	e.preventDefault();
	//$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($('#formularioCp')[0]);
	$.ajax({
		url: '../ajax/campaña.php?op=guardaryeditar',
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
	limpiarCp();
}

function mostrarCp(id){
	$.post('../ajax/campaña.php?op=mostrar',{idCp:id},function(data,status){
		data=JSON.parse(data);
		$("#idCp").val(data.id);
		$("#nombreCp").val(data.nombre);
        $("#ubicacionCp").val(data.ubicacion);
        $("#fechaICp").val(data.fechaInicio);
        $("#fechaFCp").val(data.fechaFin);
		$("#estadoCp").val(data.estado);
	})
}

function desactivarCp(id){
	bootbox.confirm("¿Está seguro de desactivar la Campaña?",function(result){
		if(result==true){
			$.post("../ajax/campaña.php?op=desactivar",{idCp:id},function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
	listarCp();
}

function activarCp(id){
	bootbox.confirm("¿Está seguro de activar la Campaña?",function(result){
		if(result==true){
			$.post("../ajax/campaña.php?op=activar",{idCp:id},function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
	listarCp();
}

init();