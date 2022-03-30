<?php if ( $detectM->isMobile() ||  $detectM->isTablet()): ?>
<div class="container-fluid" style="background-color: #5e7468;padding-left: 0px;padding-right: 0px;">
  <section>
        <div class="col-md-12">
            <h3 style="text-align: center;
              font-family: var(--bs-body-font-family);
              font-size: 1em;
              font-weight: bold;
              text-transform: uppercase;
              margin-top: 15px;
              margin-bottom: 15px;
              color: #d4cfc8;">
              Paquetes</h3>
        </div>
  </section>
</div>
<?php else: ?>
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
              color: #d4cfc8;">
              Paquetes</h3>
            <br>
        </div>
  </section>
</div>
<?php endif; ?>
<section  class="RoomsGridstyles__Wrapper-sc-16s5weo-2 ksBqRC">
  <h2  class="RoomsGridstyles__Header-sc-16s5weo-0 fLDQuZ"></h2>
  <section  class="RoomsGridSectionstyles__Wrapper-jsch8l-1 eSyfOd">
    <p class="Noticestyles__Wrapper-sc-1l2bpf5-1 fCISXO"  type="0">
      <svg x="0px" y="0px" viewBox="0 0 18 18" width="18px" height="18px"  class="Iconstyles__Icon-sc-14p5f4o-0 fnRFfc">
        <circle cx="9" cy="9" r="9" fill="#1F6231"></circle>
        <polyline points="5,10.2 7.7,12.5 13,6.6 " fill="none" stroke="#DFEECE" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polyline>
      </svg>
      <span  class="Noticestyles__Text-sc-1l2bpf5-0 bTPjbh">Mostramos la disponibilidad de <b>ofertas</b>. Seleccione sus fechas para obtener resultados actualizados.</span>
    </p>
    <ul class="RoomsGridSectionstyles__List-jsch8l-0 cmgAyV">
      <?php
        $ClsTour = new ClsTour();
        $ListaTour = $ClsTour->ObtenerTodos();
      ?>
      <?php foreach ($ListaTour as $datos): ?>
        <?php $datos = convertObj($datos); ?>
        <li class="RoomsGridSectionRoomstyles__Wrapper-sc-1qrgj78-3 bRadcm">
          <button type="button" class="RoomsGridSectionRoomstyles__Button-sc-1qrgj78-0 jRceAf" style="background-color: #5e7468;border-radius: 10px;">
            <h3 class="RoomsGridSectionRoomstyles__Title-sc-1qrgj78-2 kQLteu" style="font-size: 25px;font-weight: bold;color: #d4cfc8;margin:0px;margin-top: 20px;"><?php echo $datos->titulo;?></h3>
              <picture>
                <img alt="" style="width: 100%;border-top-left-radius: 10px;border-top-right-radius: 10px;" src="<?php echo $URLBaseCDN;?>/media/tour/image/<?php echo $datos->id;?>/<?php echo $datos->imagen;?>" class="sc-gJWqzi caFUvj">
              </picture>
              <a style="text-decoration: navajowhite;text-transform: uppercase;" href="<?php echo $URLBase;?>/paquetes/<?php echo $datos->id;?>-<?php echo urls_amigables($datos->titulo);?>">
                <span style="font-size: 18px;background-color: #d4cfc8;color: #5e7468;border-radius: 5px;" class="RoomsGridSectionRoomstyles__CTA-sc-1qrgj78-1 jUwciz">Más Información</span>
              </a>
          </button>
        </li>
       
      <?php endforeach ?>
    </ul>
  </section>
</section>