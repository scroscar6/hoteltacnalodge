<?php
    if (!defined('SS_NYAA')) define('SS_NYAA',true);
    if (!defined('_ADM')) define('_ADM','../../admin.hostalcoralilo.com/public_html');        //RUTA DEL ADMINISTRADOR
    if (!defined('_WEB')) define('_WEB','');				// Nombre de directorio WEB
    defined('SS_NYAA') or die;
    define('DS', DIRECTORY_SEPARATOR);              // "\" <-- Separador de directorio
    define('SSPATH', dirname(__FILE__) .DS);      // "/" <--- Devuelve el directorio padre de la ruta
    define('SSDOMINIO', SSPATH);        	// "x:\wamp\www\xxx\" <--- Ruta del directorio WEB
    define('SSADMIN', SSPATH._ADM.DS);       		// "x:\wamp\www\xxx\" <--- Ruta del directorio ADMIN
    define('SSMODULO', SSADMIN.'Modulos'.DS);       // "/ss-admin/Modulos/" <--- Ruta del directorio modulos
    define('SSINCLUDES', SSADMIN.'includes'.DS);    // "/ss-admin/includes/" <--- Ruta del directorio includes
    define('SSFUNCIONES', SSADMIN.'funciones'.DS);  // "/ss-admin/funciones/" <--- Ruta del directorio funciones
    define('PLANTILLA', SSDOMINIO.'plantilla'.DS);	// "/plantilla/" <--- Ruta del directorio plantilla
    define('PORTADA', PLANTILLA.'portada'.DS);		// "/plantilla/portada/" <--- Ruta del directorio portada
?>