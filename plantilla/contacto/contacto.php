


    <section class="contact-area pt-120 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="contacts-wrapper text-center mb-30">
                        <div class="contactss-icon">
                            <i class="far fa-map-marker-alt"></i>
                        </div>
                        <div class="contacts-text">
                            <h4>Dirección</h4>
                            <p><?php echo $Config_DatoDireccion;?></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="contacts-wrapper text-center mb-30">
                        <div class="contactss-icon">
                            <i class="far fa-phone-volume"></i>
                        </div>
                        <div class="contacts-text">
                            <h4>Celulares</h4>
                            <p>Contact: <?php echo $Config_DatoTelefono;?></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="contacts-wrapper text-center mb-30">
                        <div class="contactss-icon">
                            <i class="far fa-at"></i>
                        </div>
                        <div class="contacts-text">
                            <h4>Escríbenos!</h4>
                            <p><a href="" class="__cf_email__" data-cfemail="74171b1a0015170034171506180d5a171b19"><?php echo $emailp[0];?></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="contact-us-area pt-115 pb-120" style="background-color:#000;">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">
                    <div class="section-title white-title text-center mb-90">
                        <h5><span></span> Quieres saber más</h5>
                        <h2>Escríbenos</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <form id="enviar_mensaje_interno2" class="contacts-us-form" action="<?php echo $URLBase;?>/plantilla/contacto/EnviarCorreo.php">
                        <div class="row">
                            <div class="col-md-6" style="margin-bottom: 20px;">
                                <div class="contacts-icon contactss-name">
                                    <input type="text" name="nombre" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="col-md-6" style="margin-bottom: 20px;">
                                <div class="contacts-icon contactss-email">
                                    <input type="email" name="correo" placeholder="Correo">
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom: 20px;">
                                <div class="contacts-icon contactss-message">
                                    <textarea name="mensaje" id="comments" cols="30" rows="10" placeholder="Mensaje"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="contacts-us-button text-center">
                                    <button class="c-btn">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="map-area">
        <div class="map-wrapper">
            <div id="contact-map" class="contact-map"></div>
        </div>
    </div>
    <style>
    .fv-form-bootstrap .fv-icon-no-label {
        top: 27px !important;
        position: absolute;
        right: 57px;
        color: #fff;
    }
    .contacts-us-form input {
        border: 2px solid #ff4013;
        height: 70px;
        margin-bottom: 5px;
        padding: 0 28px;
        width: 100%;
        font-size: 16px;
        color: #ffffff;
        font-weight: 400;
        border-radius: 5px;
        background: none;
    }
    .fv-form-bootstrap .help-block {
        margin-bottom: 0;
        color: #fff;
    }
    .contacts-us-form textarea {
        border: 2px solid #ff4013;
        height: 200px;
        margin-bottom: 5px;
        padding: 28px;
        width: 100%;
        font-size: 16px;
        color: #ffffff;
        font-weight: 400;
        border-radius: 5px;
        background: none;
    }
    .pt-150 {
        padding-top: 75px !important;
    }
    </style>
<?php endif;?>



