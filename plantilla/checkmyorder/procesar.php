<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    date_default_timezone_set('America/Lima');
    setlocale(LC_TIME, 'es_ES.UTF-8');
    setlocale(LC_ALL,"es_ES");
    include('../../../../admin.hostalcoralilo.com/public_html/ClsConexion.php');
    include('../../../../admin.hostalcoralilo.com/public_html/includes/funciones.php');
    include('../../../../admin.hostalcoralilo.com/public_html/includes/XSS.php');
    include('../../../../admin.hostalcoralilo.com/public_html/Modulos/Habitacion/Clases/ClsHabitacion.php');
    include('../../../../admin.hostalcoralilo.com/public_html/Modulos/Venta/Clases/ClsVenta.php');
    include('../../../../admin.hostalcoralilo.com/public_html/Modulos/Habitacion/Clases/ClsHabitacionFoto.php');
    include('../../../../admin.hostalcoralilo.com/public_html/Modulos/HabitacionCategoria/Clases/ClsHabitacionCategoria.php');
    include('../../../../admin.hostalcoralilo.com/public_html/Modulos/Config/Clases/ClsConfig.php');
    require_once '../../sendgrid-php/sendgrid-php.php';
    $CConexion = new ClsConexion();
    $ObjHabitacion = new ClsHabitacion();
    $ClsVenta = new ClsVenta();
    $ObjFotoHabitacion = new ClsHabitacionFoto();
    $CConexion->Conectar();
    $URLBase = $CConexion->URLBase();
    $ConfigFrom = $CConexion->ConfigEmail();
    $ConfigFromName = $CConexion->ConfigNombre();

    $nombre = (string)LimpiarXSS($_POST["nombre"]);
    $apellido = (string)LimpiarXSS($_POST["apellido"]);
    $celular = (string)LimpiarXSS($_POST["celular"]);
    $email = (string)LimpiarXSS($_POST["email"]);
    $tipdocumento = (string)LimpiarXSS($_POST["tipdocumento"]);
    $documento = (string)LimpiarXSS($_POST["documento"]);
    $idhabitacion = strtoupper(LimpiarXSS($_POST["idhabitacion"]));
    $fecha_entrada = (string)($_POST["fecha_entrada"]);
    $fecha_salida = (string)($_POST["fecha_salida"]);
    $precio = (string)($_POST["precio"]);
    $wan_adultos = (string)($_POST["wan_adultos"]);
    $wan_ninios = (string)($_POST["wan_ninios"]);
    include('../../../../admin.hostalcoralilo.com/public_html/Config.php');
?>
<?php
    $email_route = new \SendGrid\Mail\Mail();
    
    $email_route->setFrom('reservas@hostalcoralilo.com', $ConfigFromName);

    $tos = [
        "reservas@hostalcoralilo.com" => "RESERVA DESDE LA WEB",
        $email => "RESERVA ENVIADA - HOSTAL CORAL ILO"
    ];
    $email_route->addTos($tos);

    $email_route->setSubject(utf8_decode('RESERVA HOSTAL CORAL ILO'));
     $email_route->addContent(
    "text/html", '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html data-editor-version="2" class="sg-campaigns" xmlns="http://www.w3.org/1999/xhtml">
          <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
            <!--[if !mso]>
                <!-->
            <meta http-equiv="X-UA-Compatible" content="IE=Edge">
            <!--
                  <![endif]-->
            <!--[if (gte mso 9)|(IE)]>
                  <xml>
                    <o:OfficeDocumentSettings>
                      <o:AllowPNG/>
                      <o:PixelsPerInch>96</o:PixelsPerInch>
                    </o:OfficeDocumentSettings>
                  </xml>
                  <![endif]-->
            <!--[if (gte mso 9)|(IE)]>
                  <style type="text/css">
            body {width: 600px;margin: 0 auto;}
            table {border-collapse: collapse;}
            table, td {mso-table-lspace: 0pt;mso-table-rspace: 0pt;}
            img {-ms-interpolation-mode: bicubic;}
          </style>
                  <![endif]-->
            <style type="text/css">
              body,
              p,
              div {
                font-family: inherit;
                font-size: 14px;
              }

              body {
                color: #000000;
              }

              body a {
                color: #1188E6;
                text-decoration: none;
              }

              p {
                margin: 0;
                padding: 0;
              }

              table.wrapper {
                width: 100% !important;
                table-layout: fixed;
                -webkit-font-smoothing: antialiased;
                -webkit-text-size-adjust: 100%;
                -moz-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
              }

              img.max-width {
                max-width: 100% !important;
              }

              .column.of-2 {
                width: 50%;
              }

              .column.of-3 {
                width: 33.333%;
              }

              .column.of-4 {
                width: 25%;
              }

              ul ul ul ul {
                list-style-type: disc !important;
              }

              ol ol {
                list-style-type: lower-roman !important;
              }

              ol ol ol {
                list-style-type: lower-latin !important;
              }

              ol ol ol ol {
                list-style-type: decimal !important;
              }

              @media screen and (max-width:480px) {

                .preheader .rightColumnContent,
                .footer .rightColumnContent {
                  text-align: left !important;
                }

                .preheader .rightColumnContent div,
                .preheader .rightColumnContent span,
                .footer .rightColumnContent div,
                .footer .rightColumnContent span {
                  text-align: left !important;
                }

                .preheader .rightColumnContent,
                .preheader .leftColumnContent {
                  font-size: 80% !important;
                  padding: 5px 0;
                }

                table.wrapper-mobile {
                  width: 100% !important;
                  table-layout: fixed;
                }

                img.max-width {
                  height: auto !important;
                  max-width: 100% !important;
                }

                a.bulletproof-button {
                  display: block !important;
                  width: auto !important;
                  font-size: 80%;
                  padding-left: 0 !important;
                  padding-right: 0 !important;
                }

                .columns {
                  width: 100% !important;
                }

                .column {
                  display: block !important;
                  width: 100% !important;
                  padding-left: 0 !important;
                  padding-right: 0 !important;
                  margin-left: 0 !important;
                  margin-right: 0 !important;
                }

                .social-icon-column {
                  display: inline-block !important;
                }
              }
            </style>
            <!--user entered Head Start-->
            <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
            <style>
              body {
                font-family: "Poppins", sans-serif;
              }
            </style>
            <!--End Head user entered-->
          </head>
          <body>
            <center class="wrapper" data-link-color="#1188E6" data-body-style="font-size:14px; font-family:inherit; color:#000000; background-color:#e5dcd2;">
              <div class="webkit">
                <table cellpadding="0" cellspacing="0" border="0" width="100%" class="wrapper" bgcolor="#e5dcd2">
                  <tr>
                    <td valign="top" bgcolor="#e5dcd2" width="100%">
                      <table width="100%" role="content-container" class="outer" align="center" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                          <td width="100%">
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                              <tr>
                                <td>
                                  <!--[if mso]>
                                          <center>
                                            <table>
                                              <tr>
                                                <td width="600">
                                                  <![endif]-->
                                  <table width="100%" cellpadding="0" cellspacing="0" border="0" style="width:100%; max-width:600px;" align="center">
                                    <tr>
                                      <td role="modules-container" style="padding:0px 0px 0px 0px; color:#000000; text-align:left;" bgcolor="#FFFFFF" width="100%" align="left">
                                        <table class="module preheader preheader-hide" role="module" data-type="preheader" border="0" cellpadding="0" cellspacing="0" width="100%" style="display: none !important; mso-hide: all; visibility: hidden; opacity: 0; color: transparent; height: 0; width: 0;">
                                          <tr>
                                            <td role="module-content">
                                              <p></p>
                                            </td>
                                          </tr>
                                        </table>
                                        <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="ecb815cc-87bc-4a3f-a334-040d110516dc" data-mc-module-version="2019-10-22">
                                          <tbody>
                                            <tr>
                                              <td style="padding:5px 5px 5px 0px; line-height:20px; text-align:inherit; background-color:#e5dcd2;" height="100%" valign="top" bgcolor="#e5dcd2" role="module-content">
                                                <div>
                                                  <div style="font-family: inherit; text-align: right">
                                                    <a href="https//hostalcoralilo.com">
                                                      <span style="font-size: 10px; color: #6f6860">
                                                        <u>Ver esta dirección de correo electrónico en su navegador.</u>
                                                      </span>
                                                    </a>
                                                  </div>
                                                  <div></div>
                                                </div>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" role="module" data-type="columns" style="padding:30px 0px 30px 0px;" bgcolor="#571a28" data-distribution="1">
                                          <tbody>
                                            <tr role="module-content">
                                              <td height="100%" valign="top">
                                                <table width="600" style="width:600px; border-spacing:0; border-collapse:collapse; margin:0px 0px 0px 0px;" cellpadding="0" cellspacing="0" align="left" border="0" bgcolor="" class="column column-0">
                                                  <tbody>
                                                    <tr>
                                                      <td style="padding:0px;margin:0px;border-spacing:0;">
                                                        <table class="wrapper" role="module" data-type="image" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="c7fa172a-cdbf-4e85-ac82-60844b32dd62">
                                                          <tbody>
                                                            <tr>
                                                              <td style="font-size:6px; line-height:10px; padding:0px 0px 0px 0px;" valign="top" align="center">
                                                                <div style="font-family: inherit; text-align: center">
                                                                    <span style="color: #80817f; font-size: 14px">WWW.HOSTALCORALILO.COM</span>
                                                                  </div>
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                        <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="594ac2bc-2bb0-4642-8002-a8c9b543d125" data-mc-module-version="2019-10-22">
                                                          <tbody>
                                                            <tr>
                                                              <td style="padding:10px 0px 0px 0px; line-height:16px; text-align:inherit;" height="100%" valign="top" bgcolor="" role="module-content">
                                                                <div>
                                                                  <div style="font-family: inherit; text-align: center">
                                                                    <span style="color: #80817f; font-size: 10px">'.$Config_DatoDireccion.'</span>
                                                                  </div>
                                                                  <div style="font-family: inherit; text-align: center">
                                                                    <span style="color: #80817f; font-size: 10px">'.$Config_DatoEmail.'</span>
                                                                  </div>
                                                                  <div style="font-family: inherit; text-align: center">
                                                                    <span style="color: #80817f; font-size: 10px">'.$Config_DatoTelefono.'</span>
                                                                  </div>
                                                                  <div></div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table class="wrapper" role="module" data-type="image" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="cb31e9b8-b045-4c38-a478-ed2a6e2dc166">
                                          <tbody>
                                            <tr>
                                              <td style="font-size:6px; line-height:10px; padding:0px 0px 0px 0px;" valign="top" align="center">
                                                <img class="max-width" border="0" style="display:block; color:#000000; text-decoration:none; font-family:Helvetica, arial, sans-serif; font-size:16px;" width="600" alt="" data-proportionally-constrained="true" data-responsive="false" src="https://hostalcoralilo.com/logomail.png" height="189">
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="8fd711e6-aecf-4663-bf53-6607f08b57e9" data-mc-module-version="2019-10-22">
                                          <tbody>
                                            <tr>
                                              <td style="padding:30px 0px 40px 0px; line-height:22px; text-align:inherit;" height="100%" valign="top" bgcolor="" role="module-content">
                                                <div>
                                                  <div style="font-family: inherit; text-align: center">
                                                    <span style="color: #80817f; font-size: 12px">
                                                      <strong>¡SU RESERVA HA SIDO ENVIADA!.</strong>
                                                    </span>
                                                  </div>
                                                  <div style="font-family: inherit; text-align: center">
                                                    <br>
                                                  </div>
                                                  <div style="font-family: inherit; text-align: center;">
                                                    <span style="color: #80817f; font-size: 12px">
                                                      <strong>RESERVA REALIZADA</strong>
                                                    </span>
                                                  </div>
                                                  <div style="font-family: inherit; text-align: center;">
                                                    <span style="color: #80817f; font-size: 12px">DEL '.$fecha_entrada.' AS '.$fecha_salida.'</span>
                                                  </div>
                                                  <div></div>
                                                </div>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="8fd711e6-aecf-4663-bf53-6607f08b57e9.1" data-mc-module-version="2019-10-22">
                                          <tbody>
                                            <tr>
                                              <td style="padding:0px 40px 40px 40px; line-height:22px; text-align:inherit;" height="100%" valign="top" bgcolor="" role="module-content">
                                                <div>
                                                  <div style="font-family: inherit; text-align: inherit">
                                                    <span style="color: #80817f; font-size: 12px">
                                                      <strong>NOMBRES:</strong>
                                                    </span>
                                                    <span style="color: #80817f; font-size: 12px"> '.$nombre.'</span>
                                                  </div>
                                                  <div style="font-family: inherit; text-align: inherit">
                                                    <span style="color: #80817f; font-size: 12px">
                                                      <strong>APELLIDO:</strong>
                                                    </span>
                                                    <span style="color: #80817f; font-size: 12px"> '.$apellido.'</span>
                                                  </div>
                                                  <div style="font-family: inherit; text-align: inherit">
                                                    <span style="color: #80817f; font-size: 12px">
                                                      <strong>CELULAR:</strong>
                                                    </span>
                                                    <span style="color: #80817f; font-size: 12px"> '.$celular.'</span>
                                                  </div>
                                                  <div style="font-family: inherit; text-align: inherit">
                                                    <span style="color: #80817f; font-size: 12px">
                                                      <strong>CORREO:</strong>
                                                    </span>
                                                    <span style="color: #80817f; font-size: 12px"> '.$email.'</span>
                                                  </div>
                                                  <div style="font-family: inherit; text-align: inherit">
                                                    <span style="color: #80817f; font-size: 12px">
                                                      <strong>'.$tipdocumento.':</strong>
                                                    </span>
                                                    <span style="color: #80817f; font-size: 12px"> '.$documento.'</span>
                                                  </div>
                                                  <div style="font-family: inherit; text-align: inherit">
                                                    <span style="color: #80817f; font-size: 12px">
                                                      <strong>FECHA ENTRADA: </strong>
                                                    </span>
                                                    <span style="color: #80817f; font-size: 12px"> '.$fecha_entrada.'</span>
                                                  </div>
                                                  <div style="font-family: inherit; text-align: inherit">
                                                    <span style="color: #80817f; font-size: 12px">
                                                      <strong>FECHA SALIDA: </strong>
                                                    </span>
                                                    <span style="color: #80817f; font-size: 12px"> '.$fecha_salida.'</span>
                                                  </div>
                                                  <div style="font-family: inherit; text-align: inherit">
                                                    <span style="color: #80817f; font-size: 12px">
                                                      <strong>PRECIO: </strong>
                                                    </span>
                                                    <span style="color: #80817f; font-size: 12px"> '.$precio.'</span>
                                                  </div>
                                                  <div style="font-family: inherit; text-align: inherit">
                                                    <span style="color: #80817f; font-size: 12px">
                                                      <strong>CANT. ADULTOS: </strong>
                                                    </span>
                                                    <span style="color: #80817f; font-size: 12px"> '.$wan_adultos.'</span>
                                                  </div>
                                                  <div style="font-family: inherit; text-align: inherit">
                                                    <span style="color: #80817f; font-size: 12px">
                                                      <strong>CANT. NIÑOS: </strong>
                                                    </span>
                                                    <span style="color: #80817f; font-size: 12px"> '.$wan_ninios.'</span>
                                                  </div>
                                                  <div></div>
                                                </div>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table class="module" role="module" data-type="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="c614d8b1-248a-48ea-a30a-8dd0b2c65e10">
                                          <tbody>
                                            <tr>
                                              <td style="padding:0px 40px 0px 40px;" role="module-content" height="100%" valign="top" bgcolor="">
                                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" height="2px" style="line-height:2px; font-size:2px;">
                                                  <tbody>
                                                    <tr>
                                                      <td style="padding:0px 0px 2px 0px;" bgcolor="#80817f"></td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" role="module" data-type="columns" style="display:none;padding:0px 40px 0px 40px;" bgcolor="#FFFFFF" data-distribution="1,1,1">
                                          <tbody>
                                            <tr role="module-content">
                                              <td height="100%" valign="top">
                                                <table width="173" style="width:173px; border-spacing:0; border-collapse:collapse; margin:0px 0px 0px 0px;" cellpadding="0" cellspacing="0" align="left" border="0" bgcolor="" class="column column-0">
                                                  <tbody>
                                                    <tr>
                                                      <td style="padding:0px;margin:0px;border-spacing:0;">
                                                        <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="64573b96-209a-4822-93ec-5c5c732af15c" data-mc-module-version="2019-10-22">
                                                          <tbody>
                                                            <tr>
                                                              <td style="padding:15px 0px 15px 0px; line-height:22px; text-align:inherit;" height="100%" valign="top" bgcolor="" role="module-content">
                                                                <div>
                                                                  <div style="font-family: inherit; text-align: center">
                                                                    <span style="color: #80817f; font-size: 12px">
                                                                      <strong>ITEM</strong>
                                                                    </span>
                                                                  </div>
                                                                  <div></div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                                <table width="173" style="width:173px; border-spacing:0; border-collapse:collapse; margin:0px 0px 0px 0px;" cellpadding="0" cellspacing="0" align="left" border="0" bgcolor="" class="column column-1">
                                                  <tbody>
                                                    <tr>
                                                      <td style="padding:0px;margin:0px;border-spacing:0;">
                                                        <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="64573b96-209a-4822-93ec-5c5c732af15c.1" data-mc-module-version="2019-10-22">
                                                          <tbody>
                                                            <tr>
                                                              <td style="padding:15px 0px 15px 0px; line-height:22px; text-align:inherit;" height="100%" valign="top" bgcolor="" role="module-content">
                                                                <div>
                                                                  <div style="font-family: inherit; text-align: center">
                                                                    <span style="color: #80817f; font-size: 12px">
                                                                      <strong>QTY</strong>
                                                                    </span>
                                                                  </div>
                                                                  <div></div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                                <table width="173" style="width:173px; border-spacing:0; border-collapse:collapse; margin:0px 0px 0px 0px;" cellpadding="0" cellspacing="0" align="left" border="0" bgcolor="" class="column column-2">
                                                  <tbody>
                                                    <tr>
                                                      <td style="padding:0px;margin:0px;border-spacing:0;">
                                                        <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="64573b96-209a-4822-93ec-5c5c732af15c.1.1" data-mc-module-version="2019-10-22">
                                                          <tbody>
                                                            <tr>
                                                              <td style="padding:15px 0px 15px 0px; line-height:22px; text-align:inherit;" height="100%" valign="top" bgcolor="" role="module-content">
                                                                <div>
                                                                  <div style="font-family: inherit; text-align: center">
                                                                    <span style="color: #80817f; font-size: 12px">
                                                                      <strong>PRECIO</strong>
                                                                    </span>
                                                                  </div>
                                                                  <div></div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table class="module" role="module" data-type="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="display:none;table-layout: fixed;" data-muid="c614d8b1-248a-48ea-a30a-8dd0b2c65e10.1">
                                          <tbody>
                                            <tr>
                                              <td style="padding:0px 40px 0px 40px;" role="module-content" height="100%" valign="top" bgcolor="">
                                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" height="2px" style="line-height:2px; font-size:2px;">
                                                  <tbody>
                                                    <tr>
                                                      <td style="padding:0px 0px 2px 0px;" bgcolor="#80817f"></td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" role="module" data-type="columns" style="display:none;padding:0px 40px 0px 40px;" bgcolor="#FFFFFF" data-distribution="1,1,1">
                                          <tbody>
                                            <tr role="module-content">
                                              <td height="100%" valign="top">
                                                <table width="173" style="width:173px; border-spacing:0; border-collapse:collapse; margin:0px 0px 0px 0px;" cellpadding="0" cellspacing="0" align="left" border="0" bgcolor="" class="column column-0">
                                                  <tbody>
                                                    <tr>
                                                      <td style="padding:0px;margin:0px;border-spacing:0;">
                                                        <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="64573b96-209a-4822-93ec-5c5c732af15c.2" data-mc-module-version="2019-10-22">
                                                          <tbody>
                                                            <tr>
                                                              <td style="padding:15px 0px 15px 0px; line-height:22px; text-align:inherit;" height="100%" valign="top" bgcolor="" role="module-content">
                                                                <div>
                                                                  <div style="font-family: inherit; text-align: center">
                                                                    <span style="color: #80817f; font-size: 12px">-------</span>
                                                                  </div>
                                                                  <div></div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                                <table width="173" style="width:173px; border-spacing:0; border-collapse:collapse; margin:0px 0px 0px 0px;" cellpadding="0" cellspacing="0" align="left" border="0" bgcolor="" class="column column-1">
                                                  <tbody>
                                                    <tr>
                                                      <td style="padding:0px;margin:0px;border-spacing:0;">
                                                        <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="64573b96-209a-4822-93ec-5c5c732af15c.1.2" data-mc-module-version="2019-10-22">
                                                          <tbody>
                                                            <tr>
                                                              <td style="padding:15px 0px 15px 0px; line-height:22px; text-align:inherit;" height="100%" valign="top" bgcolor="" role="module-content">
                                                                <div>
                                                                  <div style="font-family: inherit; text-align: center">
                                                                    <span style="color: #80817f; font-size: 12px">1</span>
                                                                  </div>
                                                                  <div></div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                                <table width="173" style="width:173px; border-spacing:0; border-collapse:collapse; margin:0px 0px 0px 0px;" cellpadding="0" cellspacing="0" align="left" border="0" bgcolor="" class="column column-2">
                                                  <tbody>
                                                    <tr>
                                                      <td style="padding:0px;margin:0px;border-spacing:0;">
                                                        <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="64573b96-209a-4822-93ec-5c5c732af15c.1.1.1" data-mc-module-version="2019-10-22">
                                                          <tbody>
                                                            <tr>
                                                              <td style="padding:15px 0px 15px 0px; line-height:22px; text-align:inherit;" height="100%" valign="top" bgcolor="" role="module-content">
                                                                <div>
                                                                  <div style="font-family: inherit; text-align: center">
                                                                    <span style="color: #80817f; font-size: 12px">s/ 00.00</span>
                                                                  </div>
                                                                  <div></div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table class="module" role="module" data-type="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="display:none;table-layout: fixed;" data-muid="c614d8b1-248a-48ea-a30a-8dd0b2c65e10.1.2">
                                          <tbody>
                                            <tr>
                                              <td style="padding:0px 40px 0px 40px;" role="module-content" height="100%" valign="top" bgcolor="">
                                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" height="1px" style="line-height:1px; font-size:1px;">
                                                  <tbody>
                                                    <tr>
                                                      <td style="padding:0px 0px 1px 0px;" bgcolor="#80817f"></td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table class="module" role="module" data-type="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="display:none;table-layout: fixed;" data-muid="c614d8b1-248a-48ea-a30a-8dd0b2c65e10.1.2.1">
                                          <tbody>
                                            <tr>
                                              <td style="padding:0px 40px 0px 40px;" role="module-content" height="100%" valign="top" bgcolor="">
                                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" height="1px" style="line-height:1px; font-size:1px;">
                                                  <tbody>
                                                    <tr>
                                                      <td style="padding:0px 0px 1px 0px;" bgcolor="#80817f"></td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table class="module" role="module" data-type="spacer" border="0" cellpadding="0" cellspacing="0" width="100%" style="display:none;table-layout: fixed;" data-muid="54da3428-feae-4c1a-a740-9c9fdb4e52d7">
                                          <tbody>
                                            <tr>
                                              <td style="padding:0px 0px 50px 0px;" role="module-content" bgcolor=""></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="8fd711e6-aecf-4663-bf53-6607f08b57e9.2" data-mc-module-version="2019-10-22">
                                          <tbody>
                                            <tr>
                                              <td style="padding:10px 0px 20px 0px; line-height:22px; text-align:inherit;" height="100%" valign="top" bgcolor="" role="module-content">
                                                <div>
                                                  <div style="font-family: inherit; text-align: center">
                                                    <span style="color: #80817f; font-size: 12px">
                                                      <strong>No te olvides de leer nuestro reglamento.</strong>
                                                    </span>
                                                  </div>
                                                  <div></div>
                                                </div>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table border="0" cellpadding="0" cellspacing="0" class="module" data-role="module-button" data-type="button" role="module" style="table-layout:fixed;" width="100%" data-muid="0f986857-87df-4c0e-934f-e77105f78192">
                                          <tbody>
                                            <tr>
                                              <td align="center" bgcolor="" class="outer-td" style="padding:0px 0px 0px 0px;">
                                                <table border="0" cellpadding="0" cellspacing="0" class="wrapper-mobile" style="text-align:center;">
                                                  <tbody>
                                                    <tr>
                                                      <td align="center" bgcolor="#571a28" class="inner-td" style="border-radius:6px; font-size:16px; text-align:center; background-color:inherit;">
                                                        <a href="" style="background-color:#571a28; border:1px solid #571a28; border-color:#571a28; border-radius:0px; border-width:1px; color:#FFFFFF; display:inline-block; font-size:12px; font-weight:700; letter-spacing:0px; line-height:normal; padding:12px 40px 12px 40px; text-align:center; text-decoration:none; border-style:solid; font-family:inherit;" target="_blank">NUESTRO REGLAMENTO</a>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table class="module" role="module" data-type="spacer" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="9bbc393c-c337-4d1a-b9f9-f20c740a0d44">
                                          <tbody>
                                            <tr>
                                              <td style="padding:0px 0px 30px 0px;" role="module-content" bgcolor=""></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="20d6cd7f-4fad-4e9c-8fba-f36dba3278fc" data-mc-module-version="2019-10-22">
                                          <tbody>
                                            <tr>
                                              <td style="padding:40px 30px 40px 30px; line-height:22px; text-align:inherit; background-color:#80817f;" height="100%" valign="top" bgcolor="#80817f" role="module-content">
                                                <div>
                                                  <div style="font-family: inherit; text-align: center">
                                                    <span style="color: #ffffff; font-size: 12px">
                                                      <strong>Gracias por consultar en Hostal Coral Ilo. Si necesita contáctarnos, debe comunicarse en los link de contácto de nuestro sitio web</strong>
                                                    </span>
                                                  </div>
                                                  <div style="font-family: inherit; text-align: center">
                                                    <br>
                                                  </div>
                                                  <div style="font-family: inherit; text-align: center">
                                                    <span style="color: #ffffff; font-size: 12px">
                                                      <strong>¡Esperamos que disfrute su estancia!</strong>
                                                    </span>
                                                  </div>
                                                  <div></div>
                                                </div>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <div data-role="module-unsubscribe" class="module" role="module" data-type="unsubscribe" style="background-color:#571a28; color:#444444; font-size:12px; line-height:20px; padding:16px 16px 16px 16px; text-align:Center;display:none;" data-muid="4e838cf3-9892-4a6d-94d6-170e474d21e5">
                                          <div class="Unsubscribe--addressLine">
                                            <p class="Unsubscribe--senderName" style="font-size:12px; line-height:20px;">{{Sender_Name}}</p>
                                            <p style="font-size:12px; line-height:20px;">
                                              <span class="Unsubscribe--senderAddress">{{Sender_Address}}</span>, <span class="Unsubscribe--senderCity">{{Sender_City}}</span>, <span class="Unsubscribe--senderState">{{Sender_State}}</span>
                                              <span class="Unsubscribe--senderZip">{{Sender_Zip}}</span>
                                            </p>
                                          </div>
                                          <p style="font-size:12px; line-height:20px;dis">
                                            <a class="Unsubscribe--unsubscribeLink" href="{{{unsubscribe}}}" target="_blank" style="color:#80817f;">Unsubscribe</a> - <a href="{{{unsubscribe_preferences}}}" target="_blank" class="Unsubscribe--unsubscribePreferences" style="color:#80817f;">Unsubscribe Preferences</a>
                                          </p>
                                        </div>
                                        <table border="0" cellpadding="0" cellspacing="0" class="module" data-role="module-button" data-type="button" role="module" style="table-layout:fixed;" width="100%" data-muid="04084f31-d714-4785-98c7-39de4df9fb7b">
                                          <tbody>
                                            <tr>
                                              <td align="center" bgcolor="#571a28" class="outer-td" style="padding:20px 0px 20px 0px; background-color:#571a28;">
                                                <table border="0" cellpadding="0" cellspacing="0" class="wrapper-mobile" style="text-align:center;">
                                                  <tbody>
                                                    <tr>
                                                      <td align="center" bgcolor="#f5f8fd" class="inner-td" style="border-radius:6px; font-size:16px; text-align:center; background-color:inherit;">
                                                        <a href="https://leptongroup.pe/" style="background-color:#000000; border:1px solid #f5f8fd; border-color:#f5f8fd; border-radius:25px; border-width:1px; color:#FFFFFF; display:inline-block; font-size:10px; font-weight:normal; letter-spacing:0px; line-height:normal; padding:5px 18px 5px 18px; text-align:center; text-decoration:none; border-style:solid; font-family:helvetica,sans-serif;" target="_blank">♥ POWERED BY LEPTON GROUP</a>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </table>
                                  <!--[if mso]>
                                                        </td>
                                                      </tr>
                                                    </table>
                                                  </center>
                                                  <![endif]-->
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </div>
            </center>
          </body>
        </html>'
    );
    $sendgrid = new \SendGrid('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');
    try {
        $response = $sendgrid->send($email_route);
        print $response->statusCode() . "\n";
        print $response->body() . "\n";
    } catch (Exception $e) {
        echo 'Caught exception: '. $e->getMessage() ."\n";
    }



?>