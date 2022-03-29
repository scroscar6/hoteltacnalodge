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
        'nombre': {
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
            if (result == true){
                Mensaje.init('success','EXITO!','MENSAJE ENVIADO CORRECTAMENTE');
                $('#enviar_mensaje_interno').data('formValidation').resetForm();
                limpiaForm("#enviar_mensaje_interno");
            }else{
                Mensaje.init('error','ERROR!','EL MENSAJE NO HA PODIDO SER ENVIADO');
            }
        }
    });
});


