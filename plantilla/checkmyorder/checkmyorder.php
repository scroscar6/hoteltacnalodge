<?php 
    defined('SS_NYAA') or die; 
    $csHabitacion = new ClsHabitacion();
    $csHabitacionCategoria = new ClsHabitacionCategoria();
    $ObjFotoHabitacion = new ClsHabitacionFoto();
  

    $idhabitacion = isset($_GET['idhabitacion'])?(int)$_GET['idhabitacion']:'';
    $idhabitacion = empty($idhabitacion) ? '0' : (int) $idhabitacion;


    $GET_f_llegada = $_GET['f_llegada'];
    $GET_f_salida= $_GET['f_salida'];

    $csHabitacion->id = $idhabitacion;
    $detalle = $csHabitacion->ObtenerPorId();
    $detalle = convertObj($detalle);
    
    $GET_tarifa =  $detalle->precio;

?>
<div class="container-fluid" style="background-color: #5e7468;padding-left: 0px;padding-right: 0px;">
  <section>
        <div class="col-md-12">
            <h3 style="text-align: center;
font-family: var(--bs-body-font-family);
font-size: 2em;
font-weight: bold;
text-transform: uppercase;
margin-top: 25px;
margin-bottom: 10px;
color: #f0e0d3;">Reserva</h3>
            <br>
        </div>
  </section>
</div>
<div class="container">
<br>
<br>
    <div class="row">
        <div class="col-md-8">
            <div class="bookiing-form-wrap">
                <div class="list-single-main-item fl-wrap hidden-section tr-sec">
                    <div class="profile-edit-container">
                        <div class="custom-form">
                            <form id="formulario_titula_check">
                                <input type="hidden"  name="titulo" id="titulo" value="<?php echo $detalle->titulo;?>">
                                <input type="hidden"  name="idhabitacion" id="idhabitacion" value="<?php echo $idhabitacion;?>">
                                <input type="hidden"  name="idcliente" id="idcliente" value="">
                                <fieldset class="fl-wrap">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3 style="color:#5e7468 !important;">Información del Titular: <b><?php echo $detalle->titulo;?></b></h3>
                                    </div>
                                      <div class="row">
                                        <div class="col-sm-6">
                                            <label>Tip. Documento</label>
                                            <select name="tipdocumento" id="tipdocumento"  class="form-select-a">
                                                <option value="DNI">DNI</option>
                                                <option value="RUC">RUC</option>
                                            </select>                                                 
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Documento</label>
                                            <input type="text" placeholder="00000000" name="documento" id="documento" value=""/>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 20px;">
                                        <div class="col-sm-6">
                                            <label>Nombre <i class="far fa-user"></i></label>
                                            <input type="text" placeholder="Nombre" name="nombre" id="nombre" value=""/>                                                  
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Apellido <i class="far fa-user"></i></label>
                                            <input type="text" placeholder="Apellido" name="apellido" id="apellido" value=""/> 
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 20px;">
                                        <div class="col-sm-6">
                                            <label>Dirección Email<i class="far fa-envelope"></i>  </label>
                                            <input type="text" placeholder="micorreo@miweb.com" name="email" id="email" value=""/>                                                  
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Celular<i class="far fa-phone"></i>  </label>
                                            <input type="text" placeholder="0000000" name="celular" id="telefono" value=""/>
                                        </div>
                                    </div>

                                    <div style="margin-top: 20px;display: flex;">
                                        <input type="checkbox" name="terminos" id="terminos" style="margin-right: 10px;">
                                        <label for="check-a">Para continuar, debes aceptar los <a href="https://hostalcoralilo.com/servicios/7-reglamento-interno" target="_blank">Términos y Condiciones</a>.</label>
                                    </div>
                                    <span class="fw-separator"></span><br><br><br>
                                    <button class="action-button btn no-shdow-btn color-bg " id="datos_comprobacion" class="sc-htpNat sc-gqjmRU etECHr" style="background-color: #5e7468;color:#ffffff;"><i class="fal fa-angle-right"></i>Confirmar Reserva</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box-widget-item-header">
                <h3 style="color:#5e7468 !important;"> Tu Reserva</h3>
            </div>
            <div class="cart-details fl-wrap">
                <div class="cart-details_header">
                    <a href="#"  class="widget-posts-img"><img src="<?php echo $URLBaseCDN;?>/media/habitacion/image/<?php echo $detalle->id;?>/<?php echo $detalle->imagen;?>" class="respimg" style="width: 100%;"></a>
                </div>         
                <div class="cart-details_text">
                    <ul class="cart_list" style="padding-left: 0rem;margin-bottom: 0rem;">
                        <li style="color:#5e7468;">Entrada 
                            <span>
                                <input type="text" placeholder="Entrada..." name="fecha_entrada" id="birthday"  value="<?php echo str_replace("m", "/",$GET_f_llegada);?>" />
                            </span>
                        </li>
                        <li style="color:#5e7468;">Salida 
                            <span>
                            <input type="text" placeholder="Salida..." name="fecha_salida" id="birthday2"  value="<?php echo str_replace("m", "/",$GET_f_salida);?>" />
                            </span>
                        </li>
                        <li style="color:#5e7468;">Adultos 
                            <span>
                                <div class="wan-spinner wan-spinner-2">
                                    <a href="javascript:void(0)" class="minus" style="margin-right: 5px !important;">-</a>
                                    <input type="text" value="2" class="wan_adultos" id="wan_adultos" style="border-radius: 5px !important;font-family: 'Nunito', sans-serif;font-size: 15px;color:#5e7468 !important;font-weight: bold;">
                                    <a href="javascript:void(0)" class="plus">+</a>
                                </div>
                            </span>
                        </li>
                        <li style="color:#5e7468;">Niños
                            <span>
                                <div class="wan-spinner wan-spinner-3">
                                    <a href="javascript:void(0)" class="minus" style="margin-right: 5px !important;">-</a>
                                    <input type="text" value="0" class="wan_ninios" id="wan_ninios" style="border-radius: 5px !important;font-family: 'Nunito', sans-serif;font-size: 15px;color:#5e7468 !important;font-weight: bold;">
                                    <a href="javascript:void(0)" class="plus">+</a>
                                </div>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="cart-total" style="background-color: #5e7468 !important;">
                <span class="cart-total_item_title" style="color: #f0e0d3 !important;">Costo <br>por noche</span>
                <strong>
                    <b>
                        <div style="font-weight: bold;color:#f0e0d3 !important;font-size: 27px;display: inline-flex;"> 
                        
                        <input type="hidden" name="preorigen" id="preorigen" value="<?php echo $GET_tarifa; ?>">
                        S/ <div id="precioview"><?php echo number_format($GET_tarifa,2,'.','.');?></div>
                          
                        </div>
                    </b>
                    <?php if (false): ?>
                        <?php if($habitacion->descuento == 0): ?>
                            <input type="hidden" name="precio_envio" id="precio_envio" value="<?php echo $habitacion->precio; ?>">
                        <?php else: ?>
                            <input type="hidden" name="precio_envio" id="precio_envio" value="<?php echo $habitacion->nprecio; ?>">
                        <?php endif ?>
                    <?php endif ?>
                </strong>                                
            </div>                          
        </div>
    </div>
</div>
<style>
    .form-select-a{
        float: left;
        border: 1px solid #eee;
        background: #F7F9FB;
        width: 100%;
        padding: 14px 20px 14px 45px;
        border-radius: 6px;
        color: #666;
        font-size: 13px;
        -webkit-appearance: none;
    }
    .cart_list li::marker{
        color: transparent;
    }
    .fv-form-bootstrap .help-block {
      margin-bottom: 0;
      color: #5e7468;
    }
    .custom-form input {
      margin-bottom: 0px;
    }
    .custom-form label i {
        padding-right: 12px;
        font-size: 14px;
        position: absolute;
        top: 38px;
        left: 16px;
    }
    #formulario_titula_check .form-control-feedback{
        position: absolute;
        margin-top: 36px;
        margin-left: -27px;
    }
    #birthday{
        float: left;
        border: 1px solid #f0e0d3;
        background:#f0e0d3;
        text-align: right;
        border-radius: 6px;
        color: #666;
        font-size: 15px;
        -webkit-appearance: none;
        font-weight: bold;
        color:#5e7468;
        font-family: 'Nunito', sans-serif;
    }
    #birthday2{
        float: left;
        border: 1px solid #f0e0d3;
        background:#f0e0d3;
        text-align: right;
        border-radius: 6px;
        color: #666;
        font-size: 15px;
        -webkit-appearance: none;
        font-weight: bold;
        color:#5e7468;
        font-family: 'Nunito', sans-serif;
    }

    .list-single-main-item {
        padding: 30px 30px;
        background:  #fff;
        margin-bottom: 20px;
        border-radius: 4px;
        border: 1px solid transparent;
    }
    .list-main-wrap-title.single-main-wrap-title {
        margin-top: 0;
        padding-top: 0;
        margin-bottom: 40px;
        border-bottom: 1px solid #5e7468;
    }
    .box-widget-item-header {
        padding: 0 0 20px;
        margin: 0 0 25px;
        float: left;
        width: 100%;
        border-bottom: 1px solid #5e7468;
        position: relative;
    }
    .cart_list li {
        text-align: left;
        padding: 13px 18px;
        color: #fff;
        font-size: 16px;
        border-bottom: 1px solid #f0e0d3;
        background-color:#f0e0d3;
    }
    .cart-details_header {
        display: inline-table;
        padding: 15px 20px;
        background-color:#5e7468;
        color:#fff;
    }
    .box-widget-content .widget-posts-descr a, .cart-details_header .widget-posts-descr a {
        color: #fff;
    }
    .box-widget-content .widget-posts-descr .geodir-category-location a, .cart-details_header .widget-posts-descr .geodir-category-location a {
        font-size: 10px;
        color: #fff;
    }
    .main-search-input-item {
        float: left;
        width: 100%;
        box-sizing: border-box;
        border-left: 1px solid #eee;
        height:27px;
        position: relative;
        background#fff;
    }
    .main-search-input-item input {
        float: left;
        border: none;
        width: 100%;
        height: 27px;
        padding: 0 10px 0 34px;
    }
    .inpt_dec {
        position: absolute;
        left: 12px;
        top: 5px;
        z-index: 20;
    }
    .cart-total {
      padding: 15px 20px;
      background: #F7F9FB;
        background-color: rgb(247, 249, 251);
      float: left;
      width: 100%;
      border: 1px solid #eee;
      border-radius: 6px;
      margin-bottom: 13px;
    }
</style>