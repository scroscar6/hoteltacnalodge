<?php
  $ClsHabitacion = new ClsHabitacion();
  $idhabitacion = $_GET['id'];
  $ClsHabitacion->id = $idhabitacion;
  $detalle = $ClsHabitacion->ObtenerPorId();
  $detalle = convertObj($detalle);
  setlocale(LC_ALL, 'es_ES');
?>
<?php if ( $detectM->isMobile() ||  $detectM->isTablet()): ?>
<div class="container-fluid" style="background-color: #571A28;padding-left: 0px;padding-right: 0px;">
  <section>
        <div class="col-md-12">
            <h3 style="text-align: center;
              font-family: var(--bs-body-font-family);
              font-size: 1em;
              font-weight: bold;
              text-transform: uppercase;
              margin-top: 15px;
              margin-bottom: 15px;
              color: #f0e0d3;">
              <?php echo $detalle->titulo;?></h3>
        </div>
  </section>
</div>
<?php else: ?>
<div class="container-fluid" style="background-color: #571A28;padding-left: 0px;padding-right: 0px;">
  <section>
        <div class="col-md-12">
            <h3 style="text-align: center;
              font-family: var(--bs-body-font-family);
              font-size: 2em;
              font-weight: bold;
              text-transform: uppercase;
              margin-top: 25px;
              margin-bottom: 10px;
              color: #f0e0d3;">
              <?php echo $detalle->titulo;?></h3>
            <br>
        </div>
  </section>
</div>
<?php endif; ?>

<div class="container" style="margin-top: 20px;">
  <div class="row">
      <div class="col-md-8">
        <?php if (true): ?>
          <div id="image-hotel">
              <div class="owl-carousel">
                <a class="">
                  <img src="<?php echo $URLBaseCDN;?>/media/habitacion/image/<?php echo $detalle->id;?>/<?php echo $detalle->imagen;?>" alt="<?php echo $detalle->titulo;?>">
                </a>
                <?php if ($detalle->habitacionfoto): ?>
                  <?php foreach ($detalle->habitacionfoto as $foto): ?>
                    <img src="<?php echo $URLBaseCDN;?>/media/habitacion/image/<?php echo $detalle->id;?>/<?php echo $foto->imagen;?>" alt="<?php echo $foto->titulo;?>">
                  <?php endforeach ?>
                <?php endif ?>
              </div>
          </div>
        <?php endif ?>
     
        <div class="col-md-12" style="text-align: justify;padding-top: 30px;"><?php echo $detalle->resumen;?></div>
        <div class="col-md-12" style="text-align: justify;padding-top: 20px;"><?php echo $detalle->descripcion;?></div>
      </div>
      
      <div class="col-md-4 ">
        <div class="box-titulo-premier2">
          <form action="<?php echo $URLBase;?>/miorden/" method="get">
            <div>
              <span class="titulo-reserva">
                <i class="far fa-calendar-alt"></i> Entrada
              </span>
            </div>
            <hr style="margin-left: 24px;margin-right: 24px;">
            <input type="hidden"  name="titulo" id="titulo" value="<?php echo $GET_tit;?>">
            <input type="hidden"  name="idhabitacion" id="idhabitacion" value="<?php echo $idhabitacion;?>">
            <div class="box-enlace">
                <span class="selector-fecha-entrada">
                  <input type="text" id="enlace-fecha-entrada" name="f_llegada" class="enlace-fecha-entrada" value="<?php echo date("d/m/Y"); ?>">
                </span>
            </div>
            <div>
              <span class="titulo-reserva">
                <i class="far fa-calendar-alt"></i> Salida
              </span>
            </div>
            <hr style="margin-left: 24px;margin-right: 24px;">
            <div class="box-enlace">
                <span class="selector-fecha-salida">
                    <input type="text" id="enlace-fecha-salida" name="f_salida" class="enlace-fecha-salida" value="<?php echo date("d/m/Y", strtotime("+1 day")); ?>">
                </span>
            </div>
            <hr style="margin-left: 24px;margin-right: 24px;">
            <button class="boton_personalizado" style="width: 89% !important;" type="submit">Reservar</button>
            <!--<div class="precio">
                <span class="oswald prec1">Precio<br><small>por noche</small></span>
                <span class="oswald prec">S/ <?php echo $detalle->precio;?></span>
            </div>-->
          </form>
        </div>
        <div class="box-titulo-premier2">
          <div class="fb-page" data-href="https://www.facebook.com/Hostal-CORAL-ILO-107123895050863" data-tabs="timeline" data-width="100%" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Hostal-CORAL-ILO-107123895050863" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Hostal-CORAL-ILO-107123895050863">Hostal CORAL ILO</a></blockquote></div>
        </div>
      </div>
  </div>
</div>
<!-- Modal -->
<style>
.box-titulo-premier{
  padding-top: 20px;
  padding-bottom: 20px;
  
}
.box-titulo-premier2{
  padding-top: 20px;
 padding-bottom: 20px;
  background-color: #f0e0d3;

  width: 100%;
  
}
.titulo-premier{
  color: #571A28;
  font-size: 2em;
  font-weight: bold;
}

.titulo-reserva{
  font-size: 24px;
  color: #571A28;
  margin-left: 26px;
}
.enlace-fecha-entrada{
    font-size: 35px;
    text-align: center;
    /*margin-bottom: 20px;*/
    text-decoration: none;
    color: #571A28;
    font-weight: bold;
    width: 100%;
    border-color: transparent;
    background-color: transparent;
    text-align: center;
}
.enlace-fecha-entrada:hover{
    color: #03214d;
    cursor: pointer;
}
.enlace-fecha-salida{
    font-size: 35px;
    text-align: center;
    /*margin-bottom: 20px;*/
    text-decoration: none;
    color: #571A28;
    font-weight: bold;
    width: 100%;
    border-color: transparent;
    background-color: transparent;
    text-align: center;
}
.enlace-fecha-salida:hover{
    color: #03214d;
    cursor: pointer;
}
.box-enlace{
  text-align: center;
  margin-bottom: 20px;
}
.precio {
  padding: 20px;
  margin-bottom: 10px;
  color: #f6ba92;
  border: 1px solid #E8C792;
  margin: 0 20px;
  border-radius: 8px;
  background-color: #571A28;
}
.prec1 {
  font-size: 20px;
  padding: 0;
  display: inline-block;
  line-height: 19px;
}
.prec {
  font-size: 35px;
  line-height: 35px;
  padding: 2px 10px;
  margin: 0;
  float: right;
  text-align: right;
  font-weight: bold;
}
.boton_personalizado{
    text-decoration: none;
    padding: 7px;
    font-weight: 600;
    font-size: 30px;
    color: #f8bb92;
    background-color: #571A28;
    border-radius: 6px;
    border: 2px solid #571A28;
    text-align: center;
    display: block;
    margin-left: 22px;
    margin-right: 22px;
    margin-right: 22px;
    margin-top: 22px;
  }
.boton_personalizado:hover{
    color: #f8bb92;
  }
</style>