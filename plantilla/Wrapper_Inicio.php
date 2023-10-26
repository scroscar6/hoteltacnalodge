<?php if ( $detectM->isMobile() ||  $detectM->isTablet()): ?>
  <div class="container-fluid" style="padding-right: 0;padding-left: 0;">
    <div class="owl-carousel">
      <?php $ObjPublicidadPortada = new ClsPublicidad();?>
      <?php $ObjPublicidadPortada->idpublicidadcategoria = 2; ?>
      <?php $ListaPortada = $ObjPublicidadPortada->ObtenerPermitidosPorCategoria(); ?>
      <?php $cont = count($ListaPortada);?>
      <?php $ListaPortada = convertObj($ListaPortada); ?>
      <?php if ($cont > 0): ?>
        <?php foreach ($ListaPortada as $dataList): ?>
          <?php if($navegador_user == 'Safari'): ?>
            <div class="">
              <img src="<?php echo $URLBaseCDN;?>/media/public/<?php echo $dataList->id;?>/<?php echo $dataList->imagen;?>" alt="<?php echo $dataList->titulo;?>">
            </div>
          <?php else:?>
            <div class="">
              <img src="<?php echo $URLBaseCDN;?>/media/public/<?php echo $dataList->id;?>/<?php echo getWebp($dataList->imagen);?>" alt="<?php echo $dataList->titulo;?>">
            </div>
          <?php endif;?>
        <?php endforeach ?>
      <?php endif ?>
    </div>
  </div>
<?php else: ?>
  <div class="container-fluid" style="padding-right: 0;padding-left: 0;">
    <div id="image-slider" class="splide">
      <div class="splide__track">
        <div class="owl-carousel">
          <?php $ObjPublicidadPortada = new ClsPublicidad();?>
          <?php $ObjPublicidadPortada->idpublicidadcategoria = 1; ?>
          <?php $ListaPortada = $ObjPublicidadPortada->ObtenerPermitidosPorCategoria(); ?>
          <?php $cont = count($ListaPortada);?>
          <?php $ListaPortada = convertObj($ListaPortada); ?>
          <?php if ($cont > 0): ?>
            <?php foreach ($ListaPortada as $dataList): ?>
              <?php if($navegador_user == 'Safari'): ?>
                <div class="">
                  <img src="<?php echo $URLBaseCDN;?>/media/public/<?php echo $dataList->id;?>/<?php echo $dataList->imagen;?>" alt="<?php echo $dataList->titulo;?>">
                </div>
              <?php else:?>
                <div class="">
                  <img src="<?php echo $URLBaseCDN;?>/media/public/<?php echo $dataList->id;?>/<?php echo getWebp($dataList->imagen);?>" alt="<?php echo $dataList->titulo;?>">
                </div>
              <?php endif;?>
            <?php endforeach ?>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>



<?php endif; ?>




<section  class="RoomsGridstyles__Wrapper-sc-16s5weo-2 ksBqRC">
  <section>
    <div class="col-md-12">
        <h3 style="text-align: center;
        font-family: var(--bs-body-font-family);
        font-size: 2em;
        font-weight: bold;
        text-transform: uppercase;
        margin-top: 60px;
        margin-bottom: 10px;
        color: #5e7468;">Nuestras Habitaciones</h3>
        <h5 style="text-align: center;color: #5e7468;">Habitaciones Disponibles para su reserva</h5>
        <br>
    </div>
  </section>
    <section  class="RoomsGridSectionstyles__Wrapper-jsch8l-1 eSyfOd">
   
    <?php if ( $detectM->isMobile() ||  $detectM->isTablet()): ?>
    <style>
      .ksBqRC {
        width: 100%;
        padding-bottom: 24px;
        padding-left: 15px;
        padding-right: 15px;
        background-color: #fbfaf8;
        box-sizing: border-box;
        padding-top: 10px;
    }
    </style>
    <?php else: ?>
    <?php endif; ?>




  
    <ul class="RoomsGridSectionstyles__List-jsch8l-0 cmgAyV">
      <?php
        $ClsHabitacion = new ClsHabitacion();
        $ListaHabitaciones = $ClsHabitacion->ObtenerTodos();
      ?>
      <?php foreach ($ListaHabitaciones as $datos): ?>
        <?php $datos = convertObj($datos); ?>
        <li class="RoomsGridSectionRoomstyles__Wrapper-sc-1qrgj78-3 bRadcm">
          <button type="button" class="RoomsGridSectionRoomstyles__Button-sc-1qrgj78-0 jRceAf" style="background-color: #5e7468;border-radius: 10px;">
            <h3 class="RoomsGridSectionRoomstyles__Title-sc-1qrgj78-2 kQLteu" style="font-size: 25px;font-weight: bold;color: #d4cfc8;margin:0px;margin-top: 20px;"><?php echo $datos->titulo;?></h3>
              <picture>
                <img alt="" style="width: 100%;border-top-left-radius: 10px;border-top-right-radius: 10px;" src="<?php echo $URLBaseCDN;?>/media/habitacion/image/<?php echo $datos->id;?>/<?php echo $datos->imagen;?>" class="sc-gJWqzi caFUvj">
              </picture>
              <a style="text-decoration: navajowhite;text-transform: uppercase;" href="<?php echo $URLBase;?>/habitacion/<?php echo $datos->id;?>-<?php echo urls_amigables($datos->titulo);?>">
                <span style="font-size: 18px;background-color: #d4cfc8;color: #5e7468;border-radius: 5px;" class="RoomsGridSectionRoomstyles__CTA-sc-1qrgj78-1 jUwciz">Reservar</span>
              </a>
          </button>
        </li>
      <?php endforeach ?>
    </ul>
  </section>
</section>
<div class="container-fluid" style="background-color: #d4cfc8;padding-left: 0px;padding-right: 0px;">
  <section>
        <div class="col-md-12">
            <h3 style="text-align: center;
            font-family: var(--bs-body-font-family);
            font-size: 2em;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 60px;
            margin-bottom: 10px;
            color: #5e7468;">Nuestros Servicios</h3>
            <h5 style="text-align: center;color: #5e7468;">Atención de primera para nuestros clientes</h5>
            <br>
        </div>
        <div class="container">
          <?php
            $csServicio0 = new ClsServicio();
            $lsServicio0 = $csServicio0->ObtenerPermitidosPorCategoria(1, 'ASC');
        ?>
          <ul class="RoomsGridSectionstyles__List-jsch8l-0 cmgAyV">
        <?php if(rsCheka($lsServicio0)):?>
            <?php foreach($lsServicio0 as $ls0):?>
            <?php 
            $ls0 = convertObj($ls0);
            $xopcion = (int)$ls0->opcion;
            switch ($xopcion) {
                case 0:
                $xenlace = $URLBase.'/servicios/'.$ls0->id.'-'.trim($ls0->alias);
                $xpropiedad = '';
                break;
                case 1:
                $xenlace = $ls0->externo;
                $xpropiedad = 'target="_blank"';
                break;
                case 2:
                $xenlace = $URLBase.'/media/servicio/file/'.$ls0->id.'/'.$ls0->archivo;
                $xpropiedad = 'target="_blank"';
                break;
              }
            ?>

          
             <li class="RoomsGridSectionRoomstyles__Wrapper-sc-1qrgj78-3 bRadcm">
                  <button type="button" class="RoomsGridSectionRoomstyles__Button-sc-1qrgj78-0 jRceAf" style="background-color: transparent;border: 0 #c9c9c9 solid;">
                    <h3 class="RoomsGridSectionRoomstyles__Title-sc-1qrgj78-2 kQLteu"><a style="text-decoration: none;
font-size: 18px;
color: #d4cfc8;
background-color: #5e7468;
padding-top: 10px;
padding-bottom: 10px;
padding-right: 13px;
padding-left: 13px;
border-radius: 8px;" href="<?php echo $xenlace; ?>"><?php echo $ls0->titulo;?></a></h3>
                      <picture>
                        <img alt="" style="width: 100%;" src="<?php echo  $URLBaseCDN.'/media/servicio/image/'.$ls0->id.'/'.$ls0->thumb;?>" class="sc-gJWqzi caFUvj">
                      </picture>
                  </button>
                </li>
           
         
           <?php endforeach;?>
        <?php endif;?>
         </ul>
        </div>
        

  </section>

</div>


<div class="container-fluid" style="background-color: #d4cfc8;padding-left: 0px;padding-right: 0px;">
  <section>
        <div class="col-md-12">
            <h3 style="text-align: center;
font-family: var(--bs-body-font-family);
font-size: 2em;
font-weight: bold;
text-transform: uppercase;
margin-top: 25px;
margin-bottom: 10px;
color: #5e7468;">Ubicación</h3>
            <h5 style="text-align: center;color: #5e7468;">Estamos en una zona exclusiva de la cuidad Tacna</h5>
            <br>
        </div>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6204.649146224424!2d-70.12893199712698!3d-17.866208619557856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915add42677d9457%3A0x2f0f4a0df30ccd9d!2sTACNA%20LODGE%20HOTEL%20BOUTIQUE!5e0!3m2!1ses!2spe!4v1648604877458!5m2!1ses!2spe" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

  </section>

</div>





<style>
  #birthday{
    float: left;
    border: 1px solid #d4cfc8;
    background:#d4cfc8;
    text-align: center;
    border-radius: 6px;
    color: #666;
    font-size: 17px;
    -webkit-appearance: none;
    font-weight: bold;
    color:#5e7468;
    font-family: 'Nunito', sans-serif;
    width: 110px;
    height: 45px;
}
#birthday2{
    float: left;
    border: 1px solid #d4cfc8;
    background:#d4cfc8;
    text-align: center;
    border-radius: 6px;
    color: #666;
    font-size: 17px;
    -webkit-appearance: none;
    font-weight: bold;
    color:#5e7468;
    font-family: 'Nunito', sans-serif;
    width: 110px;
    height: 45px;
}
.texto_portada_a{
  margin-top: 6px;
  margin-right: 14px;
  font-weight: bold;
  text-transform: capitalize;
  color: #5e7468;
  font-size: 24px;
  font-family: var(--bs-body-font-family);
}

</style>  