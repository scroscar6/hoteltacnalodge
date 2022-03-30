<?php if ( $detectM->isMobile() ||  $detectM->isTablet()): ?>

        <header>
          <div class="container-fluid" id="property-header-login" style="background-color: #5e7468;">
            <div class="row">
              <div class="col-4" style="text-align: center;">
                <a aria-label="Hotel Coral Ilo"  href="<?php echo $URLBase;?>/" class="">
                  <img alt="Hotel Coral Ilo" role="presentation" src="<?php echo $URLBase;?>/logo5.png" class="" style="width: 120%;
                    margin-top: 20px;
                    margin-bottom: 10px;"/>
                </a>
              </div>
              <div class="col-8"  style="text-align: center;">
               <ul style="display: inline-flex;list-style: none;margin-top: 1rem;margin-bottom: 1rem;padding-left: 0rem;">
                 <li class="enlacemenu"><a style="text-decoration:none;color:#5e7468;FONT-SIZE: 12px;" href="#" onclick="doGTranslate('es|es')">Español</a></li>
                 <li class="enlacemenu"><a style="text-decoration:none;color:#5e7468;FONT-SIZE: 12px;" href="#" onclick="doGTranslate('es|en')">Inglés</a></li>
                 <li class="enlacemenu" style="width: 40px;text-align: center;"><a style="text-decoration:none;color:#5e7468;" href="<?php echo $Config_DatoFacebook;?>"><i class="fa-brands fa-facebook-f"></i></a></li>
                 <li class="enlacemenu" style="width: 40px;text-align: center;"><a style="text-decoration:none;color:#5e7468;" href="<?php echo $Config_DatoGoogle;?>"><i class="fa-brands fa-instagram"></i></a></li>
               </ul>
              </div>
            </div>
          </div>
        

          <div class="PageLayoutstyles__NavWrapper-sc-6z0rbm-4 dsxBrK page-layout-nav-wrapper">
            <nav data-testid="pageNavigation" data-e2e="pageNavigation" class="Navigationstyles__NavBar-i7oaj0-7 fgmjpb">
              <ul data-e2e="pageNavigationMenu" class="Navigationstyles__NavMenu-i7oaj0-6 bOarrY" style="background-color: #d4cfc8;overflow-x: auto;">
                <li data-e2e="pageNavigationMenuItemHome" class="Navigationstyles__NavMenuItem-i7oaj0-1 gZnmm">
                  <a class="Navigationstyles__NavMenuItemLink-i7oaj0-0 hoyFgi" href="<?php echo $URLBase;?>/"  style="color:#5e7468;">Inicio</a>
                </li>
                <li data-e2e="pageNavigationMenuItemRooms" class="Navigationstyles__NavMenuItem-i7oaj0-1 gZnmm">
                  <a class="Navigationstyles__NavMenuItemLink-i7oaj0-0 hoyFgi" href="<?php echo $URLBase;?>/paquetes/"  style="color:#5e7468;">Paquetes</a>
                </li>
                <li data-e2e="pageNavigationMenuItemRooms" class="Navigationstyles__NavMenuItem-i7oaj0-1 gZnmm">
                  <a class="Navigationstyles__NavMenuItemLink-i7oaj0-0 hoyFgi" href="<?php echo $URLBase;?>/habitaciones/"  style="color:#5e7468;">Habitaciones</a>
                </li>
                <li data-e2e="pageNavigationMenuItemOffers" class="Navigationstyles__NavMenuItem-i7oaj0-1 gZnmm">
                  <a class="Navigationstyles__NavMenuItemLink-i7oaj0-0 hoyFgi" href="<?php echo $URLBase;?>/galeria/"  style="color:#5e7468;">Galería</a>
                </li>
                <li data-e2e="pageNavigationMenuItemGallery" class="Navigationstyles__NavMenuItem-i7oaj0-1 gZnmm">
                  <a class="Navigationstyles__NavMenuItemLink-i7oaj0-0 hoyFgi" href="<?php echo $URLBase;?>/localizacion/"  style="color:#5e7468;">Localización</a>
                </li>
              </ul>
            </nav>
          </div>

          <?php if ($Modulo == 'inicio' && $ssFilename == "Wrapper_Inicio" ): ?>
         
                  <form action="<?php echo $URLBase;?>/busqueda/" method="get" style="display: none;">
                    <div class="container-fluid" style="margin-top: 12px;">
                      <div class="row align-items-start">
                        <div class="col-2">
                          <label for="" class="texto_portada_a">In</label>
                         
                        </div>
                         <div class="col-4">
                          <input type="text" name="fecha_entrada" placeholder="Entrada..." name="fecha_entrada" id="birthday"  value="<?php echo date('d/m/Y');?>" />
                        </div>
                      
                        <div class="col-2"><label for="" class="texto_portada_a">Out</label></div>
                        <div class="col-4"><input type="text" placeholder="Salida..."  name="fecha_salida" id="birthday2"  value="<?php echo date("d/m/Y", strtotime("+1 day")); ?>" /></div>
                      </div>
                    </div>
                    <br>
                      
                    
                     <div class="container">
                        <button data-e2e="findHotel" class="sc-htpNat sc-gqjmRU etECHr" style="background-color: #5e7468;" type="submit">Revisar Disponibilidad</button>
                     </div>
                     <br>
                     
                  </form>
                
          <?php endif ?>
        </header>
        <style>
          .enlacemenu{
            background-color: #d4cfc8;
            color: #5e7468;
            font-weight: bold;
            padding-top: 10px;
            padding-left: 5px;
            padding-right: 5px;
            padding-bottom: 10px;
            border-radius: 4px;
            margin-right: 10px;
          }

          .hoyFgi {
            color: black;
            display: inline-block;
            font-weight: bold;
            height: 100%;
            margin-left: 10px;
            margin-right: 10px;
            padding-top: 9px;
            -webkit-text-decoration: none;
            text-decoration: none;
            text-transform: capitalize;
          }

        </style>
        <style type="text/css">
            a.gflag {vertical-align:middle;font-size:16px;padding:1px 0;background-repeat:no-repeat;background-image:url(//gtranslate.net/flags/16.png);}
            a.gflag img {border:0;}
            a.gflag:hover {background-image:url(//gtranslate.net/flags/16a.png);}
            #goog-gt-tt {display:none !important;}
            .goog-te-banner-frame {display:none !important;}
            .goog-te-menu-value:hover {text-decoration:none !important;}
            body {top:0 !important;}
            #google_translate_element2 {display:none!important;}
        </style>

        <div id="google_translate_element2"></div>
        <script type="text/javascript">
        function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'es',autoDisplay: false}, 'google_translate_element2');}
        </script>
        <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
        <script type="text/javascript">
        /* <![CDATA[ */
        eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
        /* ]]> */
        </script>

<?php else: ?>


<header>
  <div class="container-fluid" id="property-header-login" style="background-color: #5e7468;">
    <div class="row">
      <div class="col-md-3" >
        <a aria-label="Hotel Coral Ilo"  href="<?php echo $URLBase;?>/" class="">
          <img alt="Hotel Coral Ilo" role="presentation" src="<?php echo $URLBase;?>/logo5.png" class="" style="width: 40%;margin-top: 10px;margin-bottom: 10px"/>
        </a>
      </div>
      <div class="col-md-6"></div>
      <div class="col-md-3" style="text-align: center;">
       <ul style="display: inline-flex;list-style: none;margin-top: 1rem;margin-bottom: 1rem;padding-left: 0rem;">
         <li class="enlacemenu"><a style="text-decoration:none;color:#5e7468;" href="#" onclick="doGTranslate('es|es')">Español</a></li>
         <li class="enlacemenu"><a style="text-decoration:none;color:#5e7468;" href="#" onclick="doGTranslate('es|en')">Inglés</a></li>
         <li class="enlacemenu" style="width: 40px;text-align: center;"><a style="text-decoration:none;color:#5e7468;" href="<?php echo $Config_DatoFacebook;?>"><i class="fa-brands fa-facebook-f"></i></a></li>
         <li class="enlacemenu" style="width: 40px;text-align: center;"><a style="text-decoration:none;color:#5e7468;" href="<?php echo $Config_DatoGoogle;?>"><i class="fa-brands fa-instagram"></i></a></li>
       </ul>
      </div>
    </div>
  </div>


  <div class="PageLayoutstyles__NavWrapper-sc-6z0rbm-4 dsxBrK page-layout-nav-wrapper">
    <nav data-testid="pageNavigation" data-e2e="pageNavigation" class="Navigationstyles__NavBar-i7oaj0-7 fgmjpb">
      <ul data-e2e="pageNavigationMenu" class="Navigationstyles__NavMenu-i7oaj0-6 bOarrY" style="background-color: #d4cfc8;">
        <li data-e2e="pageNavigationMenuItemHome" class="Navigationstyles__NavMenuItem-i7oaj0-1 gZnmm">
          <a class="Navigationstyles__NavMenuItemLink-i7oaj0-0 hoyFgi" href="<?php echo $URLBase;?>/"  style="color:#5e7468;">Inicio</a>
        </li>
        <li data-e2e="pageNavigationMenuItemRooms" class="Navigationstyles__NavMenuItem-i7oaj0-1 gZnmm">
          <a class="Navigationstyles__NavMenuItemLink-i7oaj0-0 hoyFgi" href="<?php echo $URLBase;?>/paquetes/"  style="color:#5e7468;">Paquetes</a>
        </li>
        <li data-e2e="pageNavigationMenuItemRooms" class="Navigationstyles__NavMenuItem-i7oaj0-1 gZnmm">
          <a class="Navigationstyles__NavMenuItemLink-i7oaj0-0 hoyFgi" href="<?php echo $URLBase;?>/habitaciones/"  style="color:#5e7468;">Habitaciones</a>
        </li>
        <li data-e2e="pageNavigationMenuItemOffers" class="Navigationstyles__NavMenuItem-i7oaj0-1 gZnmm">
          <a class="Navigationstyles__NavMenuItemLink-i7oaj0-0 hoyFgi" href="<?php echo $URLBase;?>/galeria/"  style="color:#5e7468;">Galería</a>
        </li>
        <li data-e2e="pageNavigationMenuItemGallery" class="Navigationstyles__NavMenuItem-i7oaj0-1 gZnmm">
          <a class="Navigationstyles__NavMenuItemLink-i7oaj0-0 hoyFgi" href="<?php echo $URLBase;?>/localizacion/"  style="color:#5e7468;">Localización</a>
        </li>
      </ul>
    </nav>
  </div>
<?php if (false): ?>
    <?php if ($Modulo == 'inicio' && $ssFilename == "Wrapper_Inicio" ): ?>
    <div data-e2e="brandWidgetWrapper" class="BrandWidgetstyles__Wrapper-sc-1oiu4se-0 jOyjle">
      <div class="sc-gZMcBi dCDVVO">
        <div class="sc-iwsKbI TDZVA">
          <form action="<?php echo $URLBase;?>/busqueda/" method="get">
            <div data-testid="date-picker" class="sc-uJMKN gSOxmy">
            <div data-testid="date-picker-buttons" class="sc-bbmXgH exaXnm">
              <label for="" class="texto_portada_a">Entrada</label>
              <input type="text" name="fecha_entrada" placeholder="Entrada..." name="fecha_entrada" id="birthday"  value="<?php echo date('d/m/Y');?>" />
              <div class="sc-gGBfsJ kOHfPD"></div>
              <label for="" class="texto_portada_a">Salida</label>
              <input type="text" placeholder="Salida..."  name="fecha_salida" id="birthday2"  value="<?php echo date("d/m/Y", strtotime("+1 day")); ?>" />
              <button data-e2e="findHotel" class="sc-htpNat sc-gqjmRU etECHr" style="background-color: #5e7468;margin-left: 8px;" type="submit">Revisar Disponibilidad</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endif ?>
<?php endif ?>

</header>

<style>
  .enlacemenu{
    background-color: #d4cfc8;
    color: #5e7468;
    font-weight: bold;
    padding-top: 10px;
    padding-left: 5px;
    padding-right: 5px;
    padding-bottom: 10px;
    border-radius: 4px;
    margin-right: 10px;
  }
</style>





<style type="text/css">
    a.gflag {vertical-align:middle;font-size:16px;padding:1px 0;background-repeat:no-repeat;background-image:url(//gtranslate.net/flags/16.png);}
    a.gflag img {border:0;}
    a.gflag:hover {background-image:url(//gtranslate.net/flags/16a.png);}
    #goog-gt-tt {display:none !important;}
    .goog-te-banner-frame {display:none !important;}
    .goog-te-menu-value:hover {text-decoration:none !important;}
    body {top:0 !important;}
    #google_translate_element2 {display:none!important;}
</style>

<div id="google_translate_element2"></div>
<script type="text/javascript">
function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'es',autoDisplay: false}, 'google_translate_element2');}
</script>
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
<script type="text/javascript">
/* <![CDATA[ */
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
/* ]]> */
</script>


<?php endif; ?> 