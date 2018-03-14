$('#formAcceso').on('submit',function(e){
   e.preventDefault();
   usuario=$('#usuario').val();
   pass=$('#pass').val();
   $.post("../ajax/donantes.php?op=verificarUsuario",
   {
      'usuario':usuario,
      'pass':pass
   },
   function (data){
      if(data!="null"){
         $(location).attr("href","body.php");
      }else{
         var $toastContent = $('<span>El usuario o password ingresado es incorrecto</span>').add($('<button class="btn-flat toast-action">Desliza</button>'));
         Materialize.toast($toastContent, 10000)
      }
   })
})