<?php
defined('SS_NYAA') or die;
session_start();
$detect = new Mobile_Detect;
$detectM = new Mobile_Detect;
$user_browser = $_SERVER['HTTP_USER_AGENT'];
$navegador_user = getBrowser($user_browser);
$URLBase = $CConexion->URLBase();
$URLBaseCDN = $CConexion->URLBaseCDN();
$URLBaseMedia = $URLBaseCDN.'/media';
$URLBaseFiles = $URLBaseCDN.'/files';
$ConfigNombre = $CConexion->ConfigNombre();
$ConfigEmail = $CConexion->ConfigEmail();
$c_URLBase = "<script> var URLBase = '".$URLBase."'; </script>";
$Modulo = isset($_GET['mod']) ? LimpiarXSS($_GET['mod']) : 'inicio';
$url = isset($_GET['url']) ? LimpiarXSS($_GET['url']) : '';
$GET_opc = isset($_GET['opc'])?LimpiarXSS($_GET['opc']):'';
$GET_option = isset($_GET['option'])?LimpiarXSS($_GET['option']):'';
$GET_id = isset($_GET['id'])?(int)$_GET['id']:'';
$GET_cat = isset($_GET['cat'])?(int)$_GET['cat']:'';
$GET_pag = isset($_GET['p'])?(int)$_GET['p']:'';
$GET_lim = isset($_GET['lim'])?(int)$_GET['lim']:'';
$GET_tit = isset($_GET['tit'])?LimpiarXSS($_GET['tit']):'';
$GET_npcat = isset($_GET['npcat'])?LimpiarXSS($_GET['npcat']):'';
$GET_nscat = isset($_GET['nscat'])?LimpiarXSS($_GET['nscat']):'';
$MSepara = " | ";
$ogimage = $URLBase."/images/b/ogimage.jpg";
$ssDir = "plantilla";
$ssType = ".php";
$ssTitle	= '';
$ssMetaDesc = '';
$ssFilename	= '';
$ssTitulo = '';
$ssResume = '';
$npcat = '';
$nscat = '';
$nid = '';
$ntit = '';
$Breadcrumb = '';
$H1Titulo = '';
$ssTitulo1 = '';
$ssTitulo2 = '';
$navTitulo = '';
$navTitulo1 = '';
$navTitulo2 = '';
$MainConteiner = 'col2-right-layout';
$PageFull = 0;
LoadClase('Config','ClsConfig');
LoadClase('Pagina','ClsPagina');
LoadClase('Pagina','ClsPaginaCategoria');
LoadClase('Publicidad','ClsPublicidad');
LoadClase('Servicio','ClsServicio');
LoadClase('Articulo','ClsArticulo');
LoadClase('ArticuloCategoria','ClsArticuloCategoria');
LoadClase('Articulo','ClsArticuloFoto');
LoadClase('Foto','ClsFoto');
LoadClase('FotoCategoria','ClsFotoCategoria');
LoadClase('Video','ClsVideo');
LoadClase('VideoCategoria','ClsVideoCategoria');
LoadClase('Producto','ClsProducto');
LoadClase('Producto','ClsProductoFoto');
LoadClase('ProductoCategoria','ClsProductoCategoria');
LoadClase('ProductoMarca','ClsProductoMarca');
LoadClase('Tour','ClsTour');
LoadClase('Tour','ClsTourFoto');
LoadClase('TourCategoria','ClsTourCategoria');
LoadClase('Habitacion','ClsHabitacion');
LoadClase('HabitacionCategoria','ClsHabitacionCategoria');
LoadClase('Habitacion','ClsHabitacionFoto');
file_exists(SSADMIN.'Config.php') ? require_once(SSADMIN.'Config.php') : die('<strong>ERROR: </strong>El archivo <strong>"Config"</strong> faltante, revise.');
		switch($Modulo){
		case 'inicio':
			switch($url){
				case "":
					$MainConteiner = 'col1-layout';
					$ssFilename = "Wrapper_Inicio";
					$ssTitle 	= $Config_NombreSitio;
					$ssMetaDesc = '';
				break;
				case "quark":
					header("Location: https://admin.tacnalodge.com");
					die();
				break;
				case "was":
					header("Location: https://admin.tacnalodge.com");
					die();
				break;
				case "mail":
					header("Location: https://server-lepton01.us/webmail");
					die();
				break;
				case "correo":
					header("Location: https://server-lepton01.us/webmail");
					die();
				break;
				case "webmail":
					header("Location: https://server-lepton01.us/webmail");
					die();
				break;
				case "contacto":
					$ssDir 		= "plantilla/contacto";
					$ssFilename = "contacto";
					$ssTitle 	= "Contáctanos";
					$ssMetaDesc	= "Ingresa tus datos y envianos un mensaje.";
					$ssTitulo  	= "Contáctanos";
				break;
				default:
					header("Location: https://tacnalodge.com");
					die();
				break;
			}
		break;
		case 'articulo':
			$ssDir 		= "plantilla/articulo";
			$ssFilename	= "index_articulo";

			$ssTitle	= "Noticias";
			$ssMetaDesc	= "Noticias";
			$ssTitulo	= "Noticias";

			$H1Titulo 	.='<h1></h1>';

			//almacenando variables GET
			$nid = $GET_id;
			$ntit = $GET_tit;

			$ntit = trim($ntit);
			$nred = $URLBase.'/noticias/';

			$cat_titulo = '';
			$catID = 1;

			if($nid!=NULL){
				$csArticulo = new ClsArticulo();
				$csArticulo->id = $nid;
				$Articulo = $csArticulo->ObtenerPermitidosPorId();

				if($Articulo!=NULL){
					$ssTitulo1 = iTexto($Articulo->titulo);
					$ssResume = iTexto(fijar_cadena($Articulo->resumen,125));

					//Redireccionar si el título de la noticia en la url ha sido modificado
					$ntit1 = trim($Articulo->alias);
					$nred  = $nred.$nid.'-'.$ntit1;
					if($ntit!=$ntit1){
						header('Location: '.$nred);
						exit();
					}

					$ogimage = $URLBaseMedia.'/articulo/image/'.$Articulo->id.'/'.$Articulo->thumb;

					$ssTitulo = $ssTitulo1==NULL?$ssTitulo:$ssTitulo1;
					$ssTitle = $ssTitulo;
					$ssMetaDesc = $ssResume;

					$Breadcrumb .= '<ol>';
					$Breadcrumb .= '<li><a href="'.$URLBase.'/">Inicio</a></li>';
					$Breadcrumb .= '<li><a href="'.$URLBase.'/noticias/">Noticias</a></li>';
					$Breadcrumb .= '<li class="active">'.fijar_cadena($ssTitulo1,30).'</li>';
					$Breadcrumb .= '</ol>';
				}
			}else{
				$Breadcrumb .= '<ol>';
				$Breadcrumb .= '<li><a href="'.$URLBase.'/">Inicio</a></li>';
				$Breadcrumb .= '<li class="active">Noticias</li>';
				$Breadcrumb .= '</ol>';
			}
		break;
		case 'tour':
			$ssDir 		= "plantilla/tour";
			$ssFilename	= "index_tour";

			$ssTitle	= "Tours";
			$ssMetaDesc	= "Tours";
			$ssTitulo	= "Tours";

			$H1Titulo 	.='<h1>Tour</h1>';

			//almacenando variables GET

			if ($GET_opc == 'cat') {
				$nred = $URLBase.'/tour/destino/';
				$nidcat = $GET_id;
				$ntitcat = $GET_tit;
				$ntitcat = trim($ntit);
			}else{
				$nred = $URLBase.'/tour/';
				$nid = $GET_id;
				$ntit = $GET_tit;
				$ntit = trim($ntit);
			}
			$cat_titulo = '';
			$catID = 1;

			if($nid!=NULL){
				$csTour = new ClsTour();
				$csTour->id = $nid;
				$Tour = $csTour->ObtenerPermitidosPorId();

				if($Tour!=NULL){
					$ssTitulo1 = iTexto($Tour->titulo);
					$ssResume = iTexto(fijar_cadena($Tour->resumen,125));

					//Redireccionar si el título de la noticia en la url ha sido modificado
					$ntit1 = urls_amigables($Tour->titulo);
					$nred  = $nred.$nid.'-'.$ntit1;
					if($ntit!=$ntit1){
						header('Location: '.$nred);
						exit();
					}

					$ogimage = $URLBaseMedia.'/tour/image/'.$Tour->id.'/'.$Tour->thumb;

					$ssTitulo = $ssTitulo1==NULL?$ssTitulo:$ssTitulo1;
					$ssTitle = $ssTitulo;
					$ssMetaDesc = $ssResume;

					$Breadcrumb .= '<ol>';
					$Breadcrumb .= '<li><a href="'.$URLBase.'/">Inicio</a></li>';
					$Breadcrumb .= '<li><a href="'.$URLBase.'/tour/">Tour</a></li>';
					$Breadcrumb .= '<li class="active">'.fijar_cadena($ssTitulo1,30).'</li>';
					$Breadcrumb .= '</ol>';
				}
			}else{
				$Breadcrumb .= '<ol>';
				$Breadcrumb .= '<li><a href="'.$URLBase.'/">Inicio</a></li>';
				$Breadcrumb .= '<li class="active">Tour</li>';
				$Breadcrumb .= '</ol>';
			}
		break;
		case 'tourold':
			header("Location: https://tacnalodge.com");
		break;
		case 'contactanos':
			header("Location: https://tacnalodge.com/contacto");
		break;
		case 'evento':
			$ssDir 		= "plantilla/evento";
			$ssFilename	= "Evento";

			$ssTitle	= "Eventos";
			$ssMetaDesc	= "Eventos";
			$ssTitulo	= "Eventos";

			//almacenando variables GET
			$nid = $GET_id;
			$ntit = $GET_tit;

			$ntit = trim($ntit);
			$nred = $URLBase.'/evento/';

			$cat_titulo = '';
			$catID = 1;

			if($nid!=NULL){
				$csEvento = new ClsEvento();
				$Evento = $csEvento->ObtenerPorId($nid);

				if($Evento!=NULL){
					$ssTitulo1 = iTexto($Evento->nombre);
					$ssResume = iTexto(fijar_cadena($Evento->nombre,125));

					$ntit1 = urls_amigables($Evento->nombre);
					$nred  = $nred.$nid.'-'.$ntit1;
					if($ntit!=$ntit1){
						header('Location: '.$nred);
						exit();
					}
					$ogimage = $URLBaseMedia.'/evento/image/'.$Evento->id.'/'.$Evento->imagen;
					$ssTitulo = $ssTitulo1==NULL?$ssTitulo:$ssTitulo1;
					$ssTitle = $ssTitulo;
					$ssMetaDesc = $ssResume;
				}
			}
		break;
		case 'producto':
			$breadcrumbs = '';
			$ssDir = "plantilla/producto";
			$ssDescription = "Catálogo";
			$ssDescripcion = "Catálogo";
			$ssTitle 	   = "Catálogo".$MSepara.$Config_NombreSitio;
			$ssFilename    = "producto";
			$ssTitulo      = "Catálogo";
			$noption = isset($_GET['option'])?trim($_GET['option']):'';
			$npcat = isset($_GET['npcat'])?trim($_GET['npcat']):'producto';
			$nid = isset($_GET['id'])?(int)trim($_GET['id']):'';
			$GET_qz = isset($_GET['q'])?LimpiarXSS($_GET['q']):'';
			$GET_qz = trim($GET_qz);
			$ID_cat = 1;
			if($nid!=NULL){
				$ssTitulo1 = '';
				$csProducto2 = new ClsProducto();
				$csProducto2->id = $nid;
				$lsProducto2 = $csProducto2->ObtenerPorId();
				if($lsProducto2!=NULL){
					$ID_cat = $lsProducto2->idproductocategoria;
					
					$ssTitulo1 .= iTexto($lsProducto2->titulo);
					$ssresume = iTexto(fijar_cadena($lsProducto2->resumen,125));
				}
				$ssTitulo = $ssTitulo1==NULL?$ssTitulo:$ssTitulo1;
				$ssTitle = $ssTitulo.$MSepara.$Config_NombreSitio;;
				$ssDescription = $ssresume;
				$ogimage = $URLBase.'/media/producto/image/'.$lsProducto2->id.'/'.$lsProducto2->thumb;
				$breadcrumbs .= '<div class="wrapper_breadcrumbs"><div class="container breadcrumbs-container"><div class="inner_breadcrumbs"><div class="row">';
				$breadcrumbs .= '<div class="col-sm-24 em_breadcrumbs"><div class="breadcrumbs"><ul>';
				$breadcrumbs .= '<li class="home"><a title="Home" href="">Inicio</a><span class="separator">/ </span></li>';
	            $breadcrumbs .= '<li class="product"><strong>'.$ssTitulo.'</strong></li>';
	            $breadcrumbs .= '</ul></div></div></div></div></div></div>';
			}else{
				//$npcat = "T";
			}
			if($noption=='buscar'){
				$ssTitulo = 'Resultados de la búsqueda para: \''.$_GET['quest'].'\'';
				$ssTitle = $ssTitulo.$MSepara.$Config_NombreSitio;
				$ssDescription = $ssDescripcion;
			}
			if ($noption == 'category') {
				$GET_catpt = isset($_GET['catp'])?LimpiarXSS($_GET['catp']):'';
				$GET_catst = isset($_GET['cats'])?LimpiarXSS($_GET['cats']):'';
					$titulosCategoria = new ClsProductoCategoria();
					$titulosCategoria->alias = $GET_catpt;
					$BuscarPorAlias = $titulosCategoria->ObtenerPermitidoPorAlias();
					$tituloCategoria = $BuscarPorAlias->titulo;
					if ($GET_catst != NULL && $GET_catst !='') {
						$titulosCategoria->alias = $GET_catst;
						$BuscarPorAlias = $titulosCategoria->ObtenerPermitidoPorAlias();
						$tituloCategoria = $BuscarPorAlias->titulo;
					}
				$ssTitulo = iTexto($tituloCategoria);
				$ssTitle = $ssTitulo.$MSepara.$Config_NombreSitio;
				$ssDescription = $ssDescripcion;
			}
		break;
		case 'servicio':
			$ssDir 		= "plantilla/servicio";
			$ssFilename	= "index_servicio";

			$ssTitle	= "Servicios";
			$ssMetaDesc	= "Servicios";
			$ssTitulo	= "Servicios";

			$H1Titulo 	.='<h1>Servicio</h1>';

			//almacenando variables GET
			$nid = $GET_id;
			$ntit = $GET_tit;

			$ntit = trim($ntit);
			$nred = $URLBase.'/';

			if($nid!=NULL){
				$csServicio = new ClsServicio();
				$csServicio->id = $nid;
				$Servicio = $csServicio->ObtenerPermitidosPorId();
				$Servicio = convertObj($Servicio);
				if($Servicio!=NULL){
					$ssTitulo1 = iTexto($Servicio->titulo);
					$ssResume = iTexto(fijar_cadena($Servicio->descripcion,100));

					//Redireccionar si el título de la noticia en la url ha sido modificado
					$ntit1 = trim($Servicio->alias);
					$nred  = $URLBase.trim($Servicio->interno);
					if($ntit!=$ntit1){
						header('Location: '.$nred);
						exit();
					}

					$ssTitulo = $ssTitulo1==NULL?$ssTitulo:$ssTitulo1;
					$ssTitle = $ssTitulo;
					$ssMetaDesc = $ssResume;

					$Breadcrumb .= '<ol>';
					$Breadcrumb .= '<li><a href="'.$URLBase.'/">Inicio</a></li>';
					$Breadcrumb .= '<li><a href="'.$URLBase.'/servicios/">servicios</a></li>';
					$Breadcrumb .= '<li class="active">'.fijar_cadena($ssTitulo1,30).'</li>';
					$Breadcrumb .= '</ol>';
				}
			}else{
				$Breadcrumb .= '<ol>';
				$Breadcrumb .= '<li><a href="'.$URLBase.'/">Inicio</a></li>';
				$Breadcrumb .= '<li class="active">Servicios</li>';
				$Breadcrumb .= '</ol>';
			}
		break;
		case 'ubicacion':
			$ssDir 		= "plantilla/ubicacion";
			$ssFilename	= "ubicacion";
			$ssTitle	= "Ubicación";
			$ssMetaDesc	= "Ubicación";
			$ssTitulo	= "Ubicación";
			$H1Titulo 	.='<h1>Ubicación</h1>';
		break;
		case 'informacion':
			$ssDir 		= "plantilla/informacion";
			$ssFilename	= "info";
			$ssTitle	= "Información";
			$ssMetaDesc	= "Lista de Secciones de Información";
			$ssTitulo	= "Consulta tu Reserva";
			$H1Titulo 	.='<h1>Información del Sítio</h1>';
		break;
		case 'habitacion':
			$ssDir 		= "plantilla/habitacion";
			$ssFilename	= "habitacion";
			$ssTitle	= "Habitación";
			$ssMetaDesc	= "Habitación";
			$ssTitulo	= "Habitación";
			$H1Titulo 	.='<h1>Habitación</h1>';
		break;
		case 'check':
			$ssDir 		= "plantilla/consulta";
			$ssFilename	= "consulta";
			$ssTitle	= "Consulta tu Reserva";
			$ssMetaDesc	= "";
			$ssTitulo	= "Consulta tu Reserva";
			$H1Titulo 	.='<h1>Consulta tu Reserva</h1>';
		break;
		case 'resultadopago':
			$ssDir 		= "plantilla/resultadopago";
			$ssFilename	= "resultadopago";
			$ssTitle	= "Resultado Transbank";
			$ssMetaDesc	= "Resultado Transbank";
			$ssTitulo	= "Resultado Transbank";
			$H1Titulo 	.='<h1>Resultado Transbank</h1>';
		break;
		case 'final':
			$ssDir 		= "plantilla/final";
			$ssFilename	= "final";
			$ssTitle	= "Final Transbank";
			$ssMetaDesc	= "Final Transbank";
			$ssTitulo	= "Final Transbank";
			$H1Titulo 	.='<h1>Final Transbank</h1>';
		break;
		case 'vacacionales':
			$ssDir 		= "plantilla/vacacionales";
			$ssFilename	= "vacacionales";
			$ssTitle	= "Programas Vacacionales";
			$ssMetaDesc	= "Programas Vacacionales";
			$ssTitulo	= "Programas Vacacionales";
			$H1Titulo 	.='<h1>Programas Vacacionales</h1>';
		break;
		case 'cruceros-skorpios':
			$ssDir 		= "plantilla/cruceros-skorpios";
			$ssFilename	= "cruceros-skorpios";
			$ssTitle	= "CRUCEROS SKORPIOS";
			$ssMetaDesc	= "CRUCEROS SKORPIOS";
			$ssTitulo	= "CRUCEROS SKORPIOS";
			$H1Titulo 	.='<h1>CRUCEROS SKORPIOS</h1>';
		break;
		case 'giras-estudio':
			$ssDir 		= "plantilla/giras-estudio";
			$ssFilename	= "giras-estudio";
			$ssTitle	= "Giras de Estudio";
			$ssMetaDesc	= "Giras de Estudio";
			$ssTitulo	= "Giras de Estudio";
			$H1Titulo 	.='<h1>Giras de Estudio</h1>';
		break;
		case 'empresa':
			$ssDir 		= "plantilla/empresa";
			$ssFilename	= "empresa";
			$ssTitle	= "Empresa";
			$ssMetaDesc	= "Empresa";
			$ssTitulo	= "Empresa";
			$H1Titulo 	.='<h1>Empresa</h1>';
		break;
		case 'pago':
			$ssDir 		= "plantilla/carrito";
			$ssFilename	= "lista_final";
			$ssTitle	= "Carro de compras";
			$ssMetaDesc	= "Lista de articulos del carrito de compras";
			$ssTitulo	= "Lista de articulos del carrito de compras";
			$H1Titulo 	.='<h1>Lista de articulos del carrito de compras</h1>';
		break;
		case 'checkmyorder':
			$ssDir 		= "plantilla/checkmyorder";
			$ssFilename	= "checkmyorder";
			$ssTitle	= "Proceso de Orden";
			$ssMetaDesc	= "Proceso de Orden de Compra";
			$ssTitulo	= "Proceso de Orden de Compra";
			$H1Titulo 	.='<h1>Proceso de Orden de Compra</h1>';
		break;
		case 'busqueda':
			$ssDir 		= "plantilla/checkmyorder";
			$ssFilename	= "busqueda";
			$ssTitle	= "Buscar Habitación";
			$ssMetaDesc	= "Buscar Habitación";
			$ssTitulo	= "Buscar Habitación";
			$H1Titulo 	.='<h1>Buscar Habitación</h1>';
		break;
		case 'destino':
			$ssDir 		= "plantilla/destino";
			$ssFilename	= "destino";
			$ssTitle	= "Destinos";
			$ssMetaDesc	= "Lista de Destinos";
			$ssTitulo	= "Destinos del Sitio";
			$H1Titulo 	.='<h1>Destinos</h1>';
		break;
		case 'paquetes':
			$ssDir 		= "plantilla/paquetes";
			$ssFilename	= "paquetes";
			$ssTitle	= "Paquetes";
			$ssMetaDesc	= "Lista de Paquetes";
			$ssTitulo	= "Paquetes del Sitio";
			$H1Titulo 	.='<h1>Paquetes</h1>';
		break;
		case 'traslados':
			$ssDir 		= "plantilla/traslados";
			$ssFilename	= "traslados";
			$ssTitle	= "Traslados";
			$ssMetaDesc	= "Traslados";
			$ssTitulo	= "Traslados";
			$H1Titulo 	.='<h1>Traslados</h1>';
		break;
		case 'renta':
			$ssDir 		= "plantilla/renta";
			$ssFilename	= "renta";
			$ssTitle	= "Renta";
			$ssMetaDesc	= "Renta";
			$ssTitulo	= "Renta";
			$H1Titulo 	.='<h1>Renta</h1>';
		break;
		case 'misionvision':
			$ssDir 		= "plantilla/mision-vision";
			$ssFilename	= "mision-vision";
			$ssTitle	= "Misión y Visión";
			$ssMetaDesc	= "Misión y Visión";
			$ssTitulo	= "Misión y Visión";
			$H1Titulo 	.='<h1>Misión y Visión</h1>';
		break;
		case 'basicos':
			$ssDir 		= "plantilla/faciales-basicos";
			$ssFilename	= "faciales-basicos";
			$ssTitle	= "Faciales Básicos o Esenciales";
			$ssMetaDesc	= "Faciales Básicos o Esenciales";
			$ssTitulo	= "Faciales Básicos o Esenciales";
			$H1Titulo 	.='<h1>Faciales Básicos o Esenciales</h1>';
		break;
		case 'tratamientos':
			$ssDir 		= "plantilla/tratamientos-faciales";
			$ssFilename	= "tratamientos-faciales";
			$ssTitle	= "Tratamientos Faciales";
			$ssMetaDesc	= "Tratamientos Faciales";
			$ssTitulo	= "Tratamientos Faciales";
			$H1Titulo 	.='<h1>Tratamientos Faciales</h1>';
		break;
		case 'corporales':
			$ssDir 		= "plantilla/tratamientos-corporales";
			$ssFilename	= "tratamientos-corporales";
			$ssTitle	= "Tratamientos Corporales";
			$ssMetaDesc	= "Tratamientos Corporales";
			$ssTitulo	= "Tratamientos Corporales";
			$H1Titulo 	.='<h1>Tratamientos Corporales</h1>';
		break;
		case 'masajes':
			$ssDir 		= "plantilla/masajes";
			$ssFilename	= "masajes";
			$ssTitle	= "Masajes";
			$ssMetaDesc	= "Masajes";
			$ssTitulo	= "Masajes";
			$H1Titulo 	.='<h1>Masajes</h1>';
		break;
		case 'ofertas':
			$ssDir 		= "plantilla/ofertas";
			$ssFilename	= "ofertas";
			$ssTitle	= "Ofertas";
			$ssMetaDesc	= "Ofertas";
			$ssTitulo	= "Ofertas";
			$H1Titulo 	.='<h1>Ofertas</h1>';
		break;
		case 'galeria':
			$ssDir 		= "plantilla/galeria";
			$ssFilename	= "galeria";
			$ssTitle	= "Galería";
			$ssMetaDesc	= "Galería";
			$ssTitulo	= "Galería";
			$H1Titulo 	.='<h1>Galería</h1>';
		break;
		case 'localizacion':
			$ssDir 		= "plantilla/localizacion";
			$ssFilename	= "localizacion";
			$ssTitle	= "Localización";
			$ssMetaDesc	= "Localización";
			$ssTitulo	= "Localización";
			$H1Titulo 	.='<h1>Localización</h1>';
		break;
		case 'habitaciones':
			$ssDir 		= "plantilla/habitaciones";
			$ssFilename	= "habitaciones";
			$ssTitle	= "Habitaciones";
			$ssMetaDesc	= "Habitaciones";
			$ssTitulo	= "Habitaciones";
			$H1Titulo 	.='<h1>Habitaciones</h1>';
		break;
		case 'post':
			$ssDir 		= "plantilla/post";
			$ssFilename	= "post";
			$ssTitle	= "Tratamiento Post Operatorio";
			$ssMetaDesc	= "Tratamiento Post Operatorio";
			$ssTitulo	= "Tratamiento Post Operatorio";
			$H1Titulo 	.='<h1>Tratamiento Post Operatorio</h1>';
		break;
		case 'pagina':
			$ssDir 		= "plantilla/pagina";
			$ssFilename	= "index_pagina";

			$ssTitle	= "Páginas";
			$ssMetaDesc	= "Páginas";
			$ssTitulo	= "Páginas";

			$H1Titulo 	.='<h1>Servicio</h1>';

			//almacenando variables GET
			$npcat = $GET_npcat;
			$ntit = $GET_tit;

			$npcat = trim($npcat);
			$ntit = trim($ntit);

			$nred = $URLBase.'/';

			if($npcat!=NULL && $ntit!=NULL){
				$csPagina = new ClsPagina();
				$csPagina->alias = $ntit;
				$Pagina = $csPagina->ObtenerPermitidosPorAlias();
				$Pagina = convertObj($Pagina);

				if($Pagina!=NULL){
					$ssTitulo1 = iTexto($Pagina->titulo);
					$ssResume = iTexto(fijar_cadena($Pagina->descripcion,100));

					//Redireccionar si el título de la noticia en la url ha sido modificado
					$ntit1 = trim($Pagina->alias);
					$nred  = $URLBase.'/'.$npcat.'/'.$ntit1;
					if($ntit!=$ntit1){
						header('Location: '.$nred);
						exit();
					}

					$H1Titulo = '<h1>'.fijar_cadena($ssTitulo1,30).'</h1>';

					$PageFull = $Pagina->opcion==1?1:0;

					$ssTitulo = $ssTitulo1==NULL?$ssTitulo:$ssTitulo1;
					$ssTitle = $ssTitulo;
					$ssMetaDesc = $ssResume;


					$Breadcrumb .= '<ol class="breadcrumb">';
					$Breadcrumb .= '<li><a href="'.$URLBase.'/">Inicio</a></li>';
					$Breadcrumb .= '<li><a href="'.$URLBase.'/">'.iTexto($Pagina->paginacategoria).'</a></li>';
					$Breadcrumb .= '<li class="active">'.fijar_cadena($ssTitulo1,30).'</li>';
					$Breadcrumb .= '</ol>';

				}
			}else{
				$Breadcrumb .= '<ol class="breadcrumb">';
				$Breadcrumb .= '<li><a href="'.$URLBase.'/">Inicio</a></li>';
				$Breadcrumb .= '<li class="active">'.$npcat.'</li>';
				$Breadcrumb .= '</ol>';
			}
		break;
		case 'foto':
			$ssDir 		= "plantilla/foto";
			$ssFilename	= "index_foto";

			$ssTitle	= "Galería de Fotos";
			$ssMetaDesc	= "Galería de Fotos";
			$ssTitulo	= "Galería de Fotos";

			$H1Titulo 	.='<h1>Galería de Fotos</h1>';
			$Breadcrumb .= '<ol>';
			$Breadcrumb .= '<li><a href="'.$URLBase.'/">Inicio</a></li>';
			$Breadcrumb .= '<li class="active">Fotos</li>';
			$Breadcrumb .= '</ol>';

			//almacenando variables GET
			$npcat = $GET_npcat;
			$nscat = $GET_nscat;
			$ncat = $GET_cat;

			$IDcat = 0;
			$ntit = trim($nscat);
			$nred = $URLBase.'/fotos/';

			$csFotoCategoria = new ClsFotoCategoria();

			if($npcat!=NULL && $nscat!=NULL){
				//subcategoría
				//$csFotoCategoria->alias = $nscat;
				//$zSubCat = $csFotoCategoria->ObtenerPermitidoPorAlias();
				$csFotoCategoria->id = $ncat;
				$zSubCat = $csFotoCategoria->ObtenerPermitidoPorId();
				if($zSubCat!=NULL){
					$ssTitulo1 .= iTexto($zSubCat->titulo).' - ';
					$navTitulo1 = iTexto($zSubCat->titulo);
					//$IDcat1 = $zSubCat->id;
				}

				//categoría
				$csFotoCategoria->alias = $npcat;
				$zCat = $csFotoCategoria->ObtenerPermitidoPorAlias();
				if($zCat!=NULL){
					$ssTitulo1 .= iTexto($zCat->titulo);
					$navTitulo2 = iTexto($zCat->titulo);
					$IDcat = $zCat->id;
				}

				//Redireccionar si el título de la noticia en la url ha sido modificado
				$ntit1 = trim($zSubCat->alias);
				$nred  = $nred.$npcat.'/'.$ncat.'-'.trim($zSubCat->alias).'/1';
				if($ntit!=$ntit1){
					header('Location: '.$nred);
					exit();
				}

				$H1Titulo = '<h1>'.fijar_cadena($ssTitulo,50).'</h1>';

				$ssDescripcion = $ssTitulo = $ssTitulo1==NULL?$ssTitulo:$ssTitulo2.$ssTitulo1;
				$ssTitle = $ssTitulo;
				$ssMetaDesc = "Categoría ".$ssDescripcion;


				//NAVEGACIÓN
				$Breadcrumb = '';
				if($navTitulo1!=NULL && $navTitulo2!=NULL){
					$Breadcrumb .= '<ol>';
					$Breadcrumb .= '<li><a href="'.$URLBase.'/">Inicio</a></li>';
					if($ncat==NULL){
						$Breadcrumb .= '<li><a href="'.$URLBase.'/fotos/">Fotos</a></li>';
						$Breadcrumb .= '<li class="active">'.fijar_cadena($navTitulo2,50).'</li>';
					}else{
						$Breadcrumb .= '<li><a href="'.$URLBase.'/fotos/">Fotos</a></li>';
						$Breadcrumb .= '<li><a href="'.$URLBase.'/fotos/'.$npcat.'/1">'.$navTitulo2.'</a></li>';
						$Breadcrumb .= '<li class="active">'.fijar_cadena($navTitulo1,50).'</li>';
					}
					$Breadcrumb .= '</ol>';
				}

			}else{
				if($npcat!=NULL){
					//categoría
					$csFotoCategoria->alias = $npcat;
					$zCat = $csFotoCategoria->ObtenerPermitidoPorAlias();
					if($zCat!=NULL){
						$ssTitulo1 .= iTexto($zCat->titulo);
						$navTitulo1 = iTexto($zCat->titulo);
						$IDcat = $zCat->id;
						$ssResume = "Categoría ".$ssTitulo1;
					}

					$ssTitulo = $ssTitulo1==NULL?$ssTitulo:$ssTitulo2.$ssTitulo1;
					$ssTitle = $ssTitulo;
					$ssMetaDesc = $ssResume;

					$H1Titulo = '<h1>'.fijar_cadena($ssTitulo,50).'</h1>';

					//NAVEGACIÓN
					$Breadcrumb = '';
					if($navTitulo1!=NULL){
						$Breadcrumb .= '<ol>';
						$Breadcrumb .= '<li><a href="'.$URLBase.'/">Inicio</a></li>';
						$Breadcrumb .= '<li><a href="'.$URLBase.'/fotos/">Fotos</a></li>';
						$Breadcrumb .= '<li class="active">'.fijar_cadena($navTitulo1,50).'</li>';
						$Breadcrumb .= '</ol>';
					}
				}
			}
		break;
		case 'video':
			$ssDir 		= "plantilla/video";
			$ssFilename	= "index_video";

			$ssTitle	= "Galería de videos";
			$ssMetaDesc	= "Galería de videos";
			$ssTitulo	= "Galería de videos";

			$H1Titulo 	.='<h1>Galería de videos</h1>';

			//almacenando variables GET
			$ncat = $GET_cat;
			$ntit = $GET_tit;

			$ntit = trim($ntit);
			$nred = $URLBase.'/videos/';

			if($ncat!=NULL){
				$csVideoCategoria = new ClsVideoCategoria();
				$csVideoCategoria->id = $ncat;
				$VideoCategoria = $csVideoCategoria->ObtenerPermitidoPorId();
				if($VideoCategoria!=NULL){
					$ssTitulo1 = iTexto($VideoCategoria->titulo);
					$ssResume = 'Galería de videos: '.iTexto(fijar_cadena($VideoCategoria->titulo,100));

					//Redireccionar si el título de la noticia en la url ha sido modificado
					$ntit1 = trim($VideoCategoria->alias);
					$nred  = $nred.$ncat.'-'.trim($VideoCategoria->alias).'/1';
					if($ntit!=$ntit1){
						header('Location: '.$nred);
						exit();
					}

					$H1Titulo .='<h1>'.fijar_cadena($ssTitulo1,50).'</h1>';

					$ssTitulo = $ssTitulo1==NULL?$ssTitulo:$ssTitulo1;
					$ssTitle = $ssTitulo;
					$ssMetaDesc = $ssResume;

					$Breadcrumb .= '<ol>';
					$Breadcrumb .= '<li><a href="'.$URLBase.'/">Inicio</a></li>';
					$Breadcrumb .= '<li><a href="'.$URLBase.'/videos/">Videos</a></li>';
					$Breadcrumb .= '<li class="active">'.fijar_cadena($ssTitulo1,50).'</li>';
					$Breadcrumb .= '</ol>';
				}
			}else{
	          	$Breadcrumb .= '<ol>';
	            $Breadcrumb .= '<li><a href="'.$URLBase.'/">Inicio</a></li>';
	            $Breadcrumb .= '<li><a href="'.$URLBase.'/videos/">Videos</a></li>';
	          	$Breadcrumb .= '</ol>';
	        }
		break;
		default:
			$optError = 1;
			header("Location: https://tacnalodge.com");
			die();
		break;
	}
	if($Modulo=='inicio' && $url==''){
		$ssTitle = $ssTitle;
	}else{
		$ssTitle = $ssTitle.$MSepara.$Config_NombreSitio;
	}
	$file1 =  SSDOMINIO.$ssDir.DS.$ssFilename.$ssType;
	ob_start();
	if(is_readable($file1)){
		include($file1);
	}else{
		$url = $url==NULL?$ssFilename:$url;
		echo "<h4>El archivo <strong>'".$url."'</strong> no existe.</h4>";
	}
	$contenido = ob_get_contents();
	ob_end_clean();
?>