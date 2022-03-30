<?php $ObjTour = new ClsTour();?>
<?php $ObjTourFoto = new ClsTourFoto();?>
<?php $ObjTour->id = $GET_id;?>
<?php $ListaTour = $ObjTour->ObtenerPorId();?>
<?php $ListaTour = convertObj($ListaTour);?>
<?php if ($ListaTour): ?>
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
                  <?php echo $ListaTour->titulo;?></h3>
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
                  <?php echo $ListaTour->titulo;?></h3>
                <br>
            </div>
      </section>
    </div>
<?php endif; ?>

<div class="container" style="margin-top: 20px;">
  <div class="row">
      <div class="col-md-8">
      
                    <?php if($navegador_user == 'Safari'): ?>
                        <img src="<?php echo $URLBaseCDN; ?>/media/tour/image/<?php echo $ListaTour->id;?>/<?php echo $ListaTour->imagen;?>" alt="<?php echo $ListaTour->titulo;?>" style="width: 100% !important;">
                    <?php else:?>
                        <img src="<?php echo $URLBaseCDN; ?>/media/tour/image/<?php echo $ListaTour->id;?>/<?php echo getWebp($ListaTour->imagen);?>" alt="<?php echo $ListaTour->titulo;?>" style="width: 100% !important;">
                    <?php endif;?>
                
                
            
        <div class="col-md-12" style="text-align: justify;padding-top: 20px;"><?php echo $ListaTour->descripcion;?></div>
      </div>
      
      <div class="col-md-4 ">

        <div class="fb-page" data-href="https://www.facebook.com/salondeeventostacnalodge" data-tabs="timeline" data-width="" data-height="600" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/salondeeventostacnalodge" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/salondeeventostacnalodge">HOTEL TACNA LODGE</a></blockquote></div>
      </div>
  </div>
</div>

<?php else: ?>
   
<?php endif ?>