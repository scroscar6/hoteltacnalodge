<?php
defined('SS_NYAA') or die;
//Verifica e incluye los archivos funciones y XSS
file_exists(SSINCLUDES.'funciones.php') ? require_once(SSINCLUDES.'funciones.php') : die('<strong>ERROR: </strong>El archivo <strong>"funciones"</strong> faltante, revise.');
file_exists(SSINCLUDES.'XSS.php') ? require_once(SSINCLUDES.'XSS.php') : die('<strong>ERROR: </strong>El archivo <strong>"XSS"</strong> faltante, revise.');
file_exists(SSINCLUDES.'Mobile_Detect.php') ? require_once(SSINCLUDES.'Mobile_Detect.php') : die('<strong>ERROR: </strong>El archivo <strong>"Mobile_Detect"</strong> faltante, revise.');
//Instancia la clase conexion
$CConexion = new ClsConexion();
//Verificar si la conexión ha sido establecida y iniciando
if($CConexion->Conectar()){
	//Verificar si está en mantenimiento
	if(!$CConexion->Mantenimiento()){
		require(SSDOMINIO.'opciones.php');
		require(SSDOMINIO.'plantilla.php');
		$CConexion->Desconectar();
		exit();
	}else{
		$iderrno = 2;
		$ConfigNombre = $CConexion->ConfigNombre();
		require_once(SSINCLUDES.'mysql_error.php');
		exit();
	}
}
?>