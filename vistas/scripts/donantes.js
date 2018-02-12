var tabla;

function init(){
	listarDon();
    $("#formularioDonante").on("submit",function(e)
	{
		guardaryeditarDon(e);
	})
	$.post("../ajax/donantes.php?op=selectTipoDeSangre",function (r){
		$('#tsangreDon').html(r);
//		$('#tsangreRec').selectpicker('render');
//		$('#tsangreRec').selectpicker('refresh');
    });
}


function limpiarDon(){
    $("#usDon").val("");
    $("#passDon").val("");
    $("#nomDon").val("");
    $("#apDon").val("");
    $("#dniDon").val("");
	$("#celDon").val("");
    $("#correoDon").val("");
    $("#tsangreDon").val("");
    $("#fnacDon").val("");
    $("#ubicacionDon").val("");
    $("#fotoDon").val("");
}

function listarDon()
{
	tabla=$('#tblDonante').dataTable(
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
					url: '../ajax/donantes.php?op=listar',
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

function guardaryeditarDon(e)
{
	e.preventDefault();
	var formData = new FormData($('#formularioDon')[0]);
	$.ajax({
		url: '../ajax/donantes.php?op=guardaryeditar',
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
	limpiarDon();
}

function mostrarDon(id){
	$.post('../ajax/donantes.php?op=mostrar',{idDon:id},function(data,status){
		data=JSON.parse(data);
        $("#idDon").val(data.id);
        $("#usDon").val(data.usuario);
        $("#passDon").val(data.pass);
		$("#nomDon").val(data.nombre);
        $("#apDon").val(data.apellido);
        $("#dniDon").val(data.dni);
        $("#celDon").val(data.cel);
        $("#correoDon").val(data.correo);
        $("#tsangreDon").val(data.tsangre_id);
        $("#fnacDon").val(data.fnac);
        $("#ubicacionDon").val(data.ubicacion);
        $("#fotoDon").val(data.foto);
	})
}

function desactivarDon(id){
	bootbox.confirm("¿Está seguro de desactivar al Donante?",function(result){
		if(result==true){
			$.post("../ajax/donantes.php?op=desactivar",{idDon:id},function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
	listarDon();
}

function activarDon(id){
	bootbox.confirm("¿Está seguro de activar al Donante?",function(result){
		if(result==true){
			$.post("../ajax/donantes.php?op=activar",{idDon:id},function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
	listarDon();
}
init();