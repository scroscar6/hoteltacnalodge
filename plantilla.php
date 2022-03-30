<!DOCTYPE html>
<html lang="es">
<?php include_once(PORTADA.'Head.php');?>

  <?php echo $Config_Burbuja; ?>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v13.0" nonce="VKCNZzba"></script>
  <div id="__next">
    <div class="PageLayoutstyles__PageWrapper-sc-6z0rbm-0 cRBUzI page-layout ">
      <?php include_once(PORTADA.'Header.php');?>
      <main class="PageLayoutstyles__PageItemOuterWrapper-sc-6z0rbm-2 kpKfWj page-layout-item-outer-wrapper">
        <div class="PageLayoutstyles__PageItemInnerWrapper-sc-6z0rbm-3 kxaPkO page-layout-item-inner-wrapper">
          <?php echo $contenido;?>
          <div class="PageLayoutstyles__FooterWrapper-sc-6z0rbm-5 dtzKfV page-layout-nav-wrapper" id="page-layout-footer">
 
            <div data-e2e="footerWrapper" class="Footerstyles__FooterWrapper-x1spqp-0 hNZovk">
              <footer aria-label="Footer" role="contentinfo" class="sc-eerKOB hNSmhF" style="background-color: #5e7468 !important;">
                <div class="sc-chPdSV sc-kGXeez gIrtCK" style="padding-top: 0px;padding-bottom: 0px;">
                    <div class="sc-eHgmQL sc-cvbbAY sc-emmjRN cZdKSi">
                      <p class="sc-jzgbtB bbmVPl" style="margin-top: 1rem;margin-bottom: 1rem;">© <?php echo date('Y')?> Derechos Reservados HOTEL TACNA LODGE
                      </p>
                    </div>
                  </div>
              </footer>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  <a href="https://api.whatsapp.com/send?phone=51977212027&text=Hola%2C%20quiero%20mas%20informaci%C3%B3n" class="btn-wsp" target="_blank">
      <i class="fa-brands fa-whatsapp"></i>
  </a>

    <script src="<?php echo $URLBase; ?>/funciones4.js" type="text/javascript" charset="utf-8" ></script>
    <?php if ($Modulo == 'busqueda'): ?>
        <script>
          //API.Habitaciones('<?php echo $GET_fecha_entrada;?>','<?php echo $GET_fecha_salida;?>','<?php echo $entrada;?>','<?php echo $salida;?>');
        </script>
    <?php endif ?>
    <?php if ($Modulo == 'checkmyorder'): ?>
        <script>
          //API.ConsultaUsuarioApi();
        </script>
    <?php endif ?>
    <?php if ($Modulo == 'check'): ?>
        <script>
         //API.BusquedaReserva();
        </script>
    <?php endif ?>
    
    <style type="text/css">
      <style>
        .wan-spinner {
          border: 0px solid #dddddd;
          display: inline-block;
        }
        .wan-spinner .minus,
        .wan-spinner .plus,
        .wan-spinner input {
          height: 22px;
          float: left;
          line-height: 1em;
          padding: 5px;
          text-align: center;
        }
        .wan-spinner input {
          border: none;
          border-left: 1px solid #dddddd;
          border-right: 1px solid #dddddd;
          margin: 0;
          width: 40px;
        }
        .wan-spinner .minus, .wan-spinner .plus {
          color: #5e7468;
          cursor: pointer;
          text-decoration: none;
          width: 15px;
          font-weight: bold;
          font-size: 22px;
          bottom: 6px;
        }
        .btn-wsp{
            position:fixed;
            width:60px;
            height:60px;
            line-height: 56px;
            bottom:25px;
            right:25px;
            background:#25d366;
            color:#FFF;
            border-radius:50px;
            text-align:center;
            font-size:35px;
            box-shadow: 0px 1px 10px rgba(0,0,0,0.3);
            z-index:100;
            transition: all 300ms ease;
        }
        .btn-wsp:hover{
            background: #20ba5a;
        }
        @media only screen and (min-width:320px) and (max-width:768px){
            .btn-wsp{
                width:63px;
                height:63px;
                line-height: 66px;
          }
        }
    </style>
    </style>
  </body>
</html>

