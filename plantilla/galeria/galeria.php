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
              Galería</h3>
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
              Galería</h3>
            <br>
        </div>
  </section>
</div>
<?php endif; ?>