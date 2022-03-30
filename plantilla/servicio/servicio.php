<?php defined('SS_NYAA') or die;?>
<?php
//opciones
$GET_opc = isset($_GET['opc'])?LimpiarXSS($_GET['opc']):'';
$GET_opc = empty($GET_opc) ? 'reg' : $GET_opc;

$GET_id = isset($_GET['id'])?(int)$_GET['id']:0;

$csServicio = new ClsServicio();

switch($GET_opc){
	case 'reg':
		$Servicios = $csServicio->ObtenerPermitidosPorCategoria(1, 'ASC');
			
		if($Servicios==NULL){
			$GET_opc = 'err';
			$Error = 3;
		}
		
	break;
	case 'ver':
		if($GET_id!=NULL){
			$csServicio->id = $GET_id;
			$Servicio = $csServicio->ObtenerPermitidosPorId();
			$Servicio = convertObj($Servicio);
			if($Servicio==NULL){
				$GET_opc = 'err';
				$Error = 4;
			}
		}else{
			$GET_opc = 'err';
			$Error = 5;
		}
	break;
}

//Plantilla del Modulo
switch($GET_opc){
	case 'reg':
		include("servicio_reg.php");
	break;
	case 'ver':
		include("servicio_ver.php");
	break;
	case 'err':
		include("servicio_err.php");
	break;
}
?>