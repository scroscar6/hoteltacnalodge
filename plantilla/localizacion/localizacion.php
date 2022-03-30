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
							Localización</h3>
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
							Localización</h3>
            <br>
        </div>
  </section>
</div>
<?php endif; ?>



<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6204.649146224424!2d-70.12893199712698!3d-17.866208619557856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915add42677d9457%3A0x2f0f4a0df30ccd9d!2sTACNA%20LODGE%20HOTEL%20BOUTIQUE!5e0!3m2!1ses!2spe!4v1648604877458!5m2!1ses!2spe" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

<section class="contactenos padding_top_80 padding_bottom_80" style="padding-bottom: 80px;padding-top: 80px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2><strong style="color: #5e7468;">PONERSE EN</strong> contácto</h2>
				<p>Ingrese sus datos y escríbanos. Estaremos gustosos de reponder todas sus inquietudes y consultas.</p>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<form id="enviar_mensaje_interno" action="<?php echo $URLBase;?>/plantilla/contacto/EnviarCorreo.php">
					<div class="form_ltbox">
						<div class="form-group col-md-12" style="margin-bottom: 15px;">
							<input type="text" name="nombres" placeholder="Nombre y apellidos" id="nombres" class="form-control">
						</div>

						<div class="form-group col-md-12" style="margin-bottom: 15px;">
							<input type="email" name="correo" placeholder="Correo" id="correo" class="form-control">
						</div>

						<div class="form-group col-md-12" style="margin-bottom: 15px;">
							<input type="text" name="telefono" placeholder="Teléfono" id="telefono" class="form-control">
						</div>

						<div class="form-group col-md-12" style="margin-bottom: 15px;">
							<input type="text" name="asunto" placeholder="Asunto" id="asunto" class="form-control">
						</div>

						<!--form_ltbox-->
						<div class="form-group col-md-12">
							<textarea name="mensaje" placeholder="Mensaje" id="mensaje" class="form-control contact_comment"></textarea>
						</div>
						<input class="btn btn-default contact-usbtn" type="submit" name="submit" id="submit" value="Enviar información" style="background-color: #5e7468;margin-top: 22px;color: #fff;">
						<!--form_ltbox-->
					</div>
				</form>
			</div>

			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 padding_tb_15 padding_left_40 contact_infO_details">
				<h4>Datos de contácto</h4>
				<p>¿Tiene alguna consulta? Haznos saber. Lo aclararemos para usted.</p>
				<ul class="contact_details">
					<li><h5>Dirección</h5> <span><?php echo $Config_DatoDireccion; ?></span><br></li><br>
					<li><h5>Teléfono</h5> <span><?php echo $Config_DatoTelefono; ?></span><br></li><br>
					<li><h5>Correo</h5> <span><?php echo $Config_DatoEmail; ?></span><br></li><br>
				</ul>
			</div>
		</div>
	</div>
</section>

<script>
	   function limpiaForm(miForm) {
            // recorremos todos los campos que tiene el formulario
            $(':input', miForm).each(function() {
            var type = this.type;
            var tag = this.tagName.toLowerCase();
            //limpiamos los valores de los campos…
            if (type == 'text'  || type == 'password'  || tag == 'textarea' )
            this.value = '';
            // excepto de los checkboxes y radios, le quitamos el checked
            // pero su valor no debe ser cambiado
            else if (type == 'checkbox'  || type == 'radio' )
            this.checked = false;
            // los selects le ponesmos el indice a -
            else if (tag == ' select' )
            this.selectedIndex = -1;
            });
        };
        $('#enviar_mensaje_interno').formValidation({
            framework: 'bootstrap',
            excluded: [':disabled'],
                button: {
                    selector: '[type="submit"]:not([formnovalidate])',
                    disabled: ''
                },
                icon: {
                    valid: 'fa fa-check fa-lg',
                    invalid: 'fa fa-times fa-lg',
                    validating: 'fa fa-refresh fa-lg'
                },
            fields: {
                'nombres': {
                    row: '.col-md-5',
                    validators: {
                        notEmpty: {
                            message: 'Ingresa tu nombre o el de tu organización.'
                        },
                        stringLength: {
                            min: 6,
                            max: 300,
                            message: 'El nombre debe tener mas de 6 caracteres.'
                        }
                    }
                },
                'correo': {
                    row: '.col-sm-6',
                    validators: {
                        emailAddress: {
                            message: 'El correo electrónico es necesario.'
                        },
                        notEmpty: {
                            message: 'El correo electrónico es necesario.'
                        },
                        regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'Este no es un correo válido.'
                        }
                    }
                },
                'telefono': {
                    row: '.col-sm-12',
                    validators: {
                        notEmpty: {
                            message: 'Ingresa teléfono o celular.'
                        }
                    }
                },
                'asunto': {
                    row: '.col-sm-12',
                    validators: {
                        notEmpty: {
                            message: 'Ingresa el asunto de su consulta.'
                        },
                        stringLength: {
                            min: 6,
                            max: 300,
                            message: 'El nombre debe tener mas de 6 caracteres.'
                        }
                    }
                },
                'mensaje': {
                    row: '.col-sm-12',
                    validators: {
                        notEmpty: {
                            message: 'Ingresa el mensaje de su consulta.'
                        },
                        stringLength: {
                            min: 6,
                            max: 300,
                            message: 'El nombre debe tener mas de 6 caracteres.'
                        }
                    }
                }
            }
        }).on('success.form.fv', function(e) {
            e.preventDefault();
            var $form = $(e.target),fv    = $form.data('formValidation');
            $.ajax({
                url: $form.attr('action'),
                type: 'POST',
                data: $form.serialize(),
                success: function(result) {
                   
                        Mensaje.init('success','EXITO!','MENSAJE ENVIADO CORRECTAMENTE');
                        $('#enviar_mensaje_interno').data('formValidation').resetForm();
                        limpiaForm("#enviar_mensaje_interno");
                   
                }
            });
        });


var Mensaje = function (){
    var GeneradorError = function(tipo,titulo,mensaje){
        var tipo = tipo;
        var titulo = titulo;
        var mensaje = mensaje;
        toastr.options.positionClass = 'toast-bottom-right';
        toastr.options.extendedTimeOut = 5000; //1000;
        toastr.options.timeOut = 5000;
        toastr.options.fadeOut = 5000;
        toastr.options.fadeIn = 5000;
        toastr.options.closeButton = true;
        toastr.options.closeHtml = '<button><i class="icon-off"></i></button>';
        switch(tipo){
            case 'error':
                toastr.error(mensaje,titulo);
            break;
            case 'info':
                toastr.info(mensaje,titulo);
            break;
            case 'warning':
                toastr.warning(mensaje,titulo);
            break;
            case 'success':
                toastr.success(mensaje,titulo);
            break;
            default:
                toastr.success(mensaje,titulo);
            break;
        };
    };
    return{
        init: function(tipo,titulo,mensaje){
            GeneradorError(tipo,titulo,mensaje);
        }
    };
}();

</script>
<style>
	.fv-form-bootstrap .fv-icon-no-label {
  top: -19px;
  left: -16px;
  position: relative;
  float: inline-end;
}
</style>