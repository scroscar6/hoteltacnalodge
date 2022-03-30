<?php defined('SS_NYAA') or die;?>
<?php
$GET_opc = isset($_GET['opc'])?LimpiarXSS($_GET['opc']):'';
$GET_id = isset($_GET['id'])?(int)$_GET['id']:'';
$GET_pag = isset($_GET['p'])?(int)$_GET['p']:'';
$GET_lim = isset($_GET['lim'])?(int)$_GET['lim']:'';

$GET_opc = empty($GET_opc) ? 'reg' : $GET_opc;
$GET_id = empty($GET_id) ? '0' : (int) $GET_id;
$GET_pag = empty($GET_pag) || $GET_pag == 0 ? '1' : (int) $GET_pag;
$GET_lim = empty($GET_lim) ? '6' : (int)$GET_lim;
switch($GET_opc){
    case 'reg':
        include('paquetes_reg.php');
    break;
    case 'ver':
        include('paquetes_ver.php');
    break;
    default:
        include('paquetes_def.php');
    break;
}

 ?>