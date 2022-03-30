<?php defined('SS_NYAA') or die;?>
<section class="inner-banner">
    <div class="container">
        <ul class="list-unstyled thm-breadcrumb">
            <li><a href="<?php $URLBase;?>/">Inicio</a></li>
            <li class="active"><a href="#">Servicios</a></li>
        </ul>
        <h2 class="inner-banner__title">Servicios</h2>
    </div>
</section>
<section class="course-one course-page">
    <div class="container">
        <div class="row">
			<?php if(BK($Servicios)):?>
				<?php foreach ($Servicios as $ss0):?>
					<div class="col-lg-4">
						<div class="course-one__single">
							<div class="course-one__image">
								<img src="<?php echo $URLBaseMedia;?>/servicio/image/<?php echo $ss0->id;?>/<?php echo $ss0->imagen;?>" alt="<?php echo ($ss0->titulo);?>">
							</div>
							<div class="course-one__content">
								<h2 class="course-one__title" style="font-size: 21px !important;"><a href="<?php echo $URLBase;?>/<?php echo trim($ss0->servicioalias);?>/<?php echo $ss0->id;?>-<?php echo trim($ss0->alias);?>"><?php echo ($ss0->titulo);?></a></h2>
								<a href="<?php echo $URLBase;?>/<?php echo trim($ss0->servicioalias);?>/<?php echo $ss0->id;?>-<?php echo trim($ss0->alias);?>" class="course-one__link">Ver más</a>
							</div>
						</div>
					</div>
				<?php endforeach; ?> 
			<?php endif; ?> 
        </div>
    </div>
</section>