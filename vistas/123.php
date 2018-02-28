<?php
$respuesta=$donacion->listar($idDon);
        $data=Array();
        while($reg=$respuesta->fetch_object()){
            $data[]=array(
                "fdon"=>$reg->fdonacion,
                "nomDon"=>$reg->nomDon,
                "apDon"=>$reg->apDon,
                "nomRec"=>$reg->nomRec,
                "apRec"=>$reg->apRec,
                "cMedico"=>$reg->cMedico,
                "idDon"=>$reg->idDon,
                "codRec"=>$reg->codigo,
                "idD"=>$reg->id,
                "estado"=>($reg->estado)?'<div class="col s3 #00e676 green accent-3" id="backGreen">
                <h5 class="col">DONÉ</h5><div class="switch col s3"><label>
                <input class="modal-trigger" type="checkbox" checked href="#modalDesactivar'.$reg->id.'" 
                ><span class="lever"></span></label></div></div>':
                '<div class="col s3 #9e9e9e grey" id="backGreen">
                <h5 class="center">NO PUDE DONAR</h5></div>'
            );
        }
        echo json_encode($data);

?>

<div class="input-field col s12 m6">
   <div class="select-wrapper">
      <span class="caret">▼</span>
      <input type="text" class="select-dropdown" readonly="true" data-activates="select-options-e4558e53-bb51-4fff-0a0d-eca4071a0112" value="Choose your option">
         <ul id="select-options-e4558e53-bb51-4fff-0a0d-eca4071a0112" class="dropdown-content select-dropdown" style="width: 358.391px; position: absolute; top: 0px; left: 0px; display: none; opacity: 1;">
            <li class="disabled"><span>Escoge tu tipo de sangre</span></li>
            <li class="" value="1"><span>A+</span></li>
            <li class="" value="2"><span>A-</span></li>
            <li class="" value="3"><span>B+</span></li>
            <li class="" value="4"><span>B-</span></li>
            <li class="" value="5"><span>AB+</span></li>
            <li class="" value="6"><span>AB-</span></li>
            <li class="" value="7"><span>O+</span></li>
            <li class="" value="8"><span>O-</span></li>
         </ul>
      <select data-select-id="e4558e53-bb51-4fff-0a0d-eca4071a0112" class="initialized">
         <option value="" disabled="" selected="">Escoge tu tipo de sangre</option>
         <option value="1">A+</option>
         <option value="2">A-</option>
         <option value="3">B+</option>
         <option value="4">B-</option>
         <option value="5">AB+</option>
         <option value="6">AB-</option>
         <option value="7">O+</option>
         <option value="8">O-</option>
      </select>
   </div>
</div>