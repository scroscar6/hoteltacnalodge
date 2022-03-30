<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    date_default_timezone_set('America/Lima');
    define('SS_NYAA',true);
    if(file_exists(dirname(__FILE__).'/defines.php')){
        require_once dirname(__FILE__).'/defines.php';
    }else{
        die('<strong>ERROR: </strong>El archivo <strong>"defines"</strong> faltante, revise.');
    }
    if(file_exists(SSADMIN.'ClsConexion.php')){
        require_once(SSADMIN.'ClsConexion.php');
        //require_once(SSADMIN.'PDO.php');
        require_once(SSDOMINIO.'inicializa.php');
    }else{
        die('<strong>ERROR: </strong>La clase <strong>"Conexion"</strong> faltante, revise.');
    }
?>