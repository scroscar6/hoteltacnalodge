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
$('#subscribe').formValidation({
        icon: {
            valid: 'fa fa-check fa-lg',
            invalid: 'fa fa-times fa-lg',
            validating: 'fa fa-refresh fa-lg'
        },
    fields: {
        'correo_b': {
            validators: {
                emailAddress: {
                    message: ''
                },
                notEmpty: {
                    message: ''
                },
                regexp: {
                    regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                    message: ''
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
                Mensaje.init('success','Éxito!','Se a registrado al blog de la Web.');
                $('#subscribe').data('formValidation').resetForm();
                limpiaForm("#subscribe");
            }else{
                Mensaje.init('error','ERROR!','NO SE HA PODIDO REGISTRAR');
            }
        }
    });
}).on('err.field.fv', function(e, data) {
    // $(e.target)  --> The field element
    // data.fv      --> The FormValidation instance
    // data.field   --> The field name
    // data.element --> The field element

    // Hide the messages
    data.element
        .data('fv.messages')
        .find('.help-block[data-fv-for="' + data.field + '"]').hide();
});

$('#registro_form_p').formValidation({
        icon: {
            valid: 'fal fa-check fa-lg',
            invalid: 'fal fa-times fa-lg',
            validating: 'fal fa-refresh fa-lg'
        },
    fields: {
        'nombre': {
            row: '.col-sm-12',
            validators: {
                notEmpty: {
                    message: 'Ingresa tu nombre'
                },
                stringLength: {
                    min: 6,
                    max: 40,
                    message: 'El nombre debe tener mas de 6 caracteres.'
                }
            }
        },
        'password': {
            row: '.col-sm-12',
            validators: {
                notEmpty: {
                    message: 'Ingresa una contraseña'
                },
                stringLength: {
                    min:5,
                    max: 8,
                    message: 'Ingrese no mas de 8 caracteres'
                }
            }
        },
        'email': {
            row: '.col-sm-12',
            validators: {
                emailAddress: {
                    message: 'Ingrese un correo/email.'
                },
                notEmpty: {
                    message: 'No puede dejar el campo vacio.'
                },
                regexp: {
                    regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                    message: 'Ingrese un correo valido.'
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
                swal("Éxito!","Se a registrado correctamente en la web, ahora puede reservar.", "success");
                $('#registro_form_p').data('formValidation').resetForm();
                limpiaForm("#registro_form_p");
                $('.close-reg').trigger('click');
            }else{
                Mensaje.init('error','Error!','No se a podido completar el registro');
            }
        }
    });
});


$('#loginform').formValidation({
        icon: {
            valid: 'fal fa-check fa-lg',
            invalid: 'fal fa-times fa-lg',
            validating: 'fal fa-refresh fa-lg'
        },
    fields: {
        'password': {
            row: '.col-sm-12',
            validators: {
                notEmpty: {
                    message: 'Ingresa una contraseña'
                },
                stringLength: {
                    min:5,
                    max: 8,
                    message: 'Ingrese no mas de 8 caracteres'
                }
            }
        },
        'email': {
            row: '.col-sm-12',
            validators: {
                emailAddress: {
                    message: 'Ingrese un correo/email.'
                },
                notEmpty: {
                    message: 'No puede dejar el campo vacio.'
                },
                regexp: {
                    regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                    message: 'Ingrese un correo valido.'
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
                swal("Éxito!","Ha ingresado correctamente", "success");
                $('#loginform').data('formValidation').resetForm();
                limpiaForm("#loginform");
                $('.close-reg').trigger('click');
                sessionStorage.setItem('sessionActiva', '1');
                location.href = URLBASE;
            }else{
                swal("Error!", "No ha podido ingresar al Sitio, vuelva a ingresar sus credenciales.", "error");
            }
        }
    });
});

$('.salir_modal').on('click',function(){
    swal({
        title: "Salir?",
        text: "Click en Continuar para salir de la Sesión!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: 'btn-danger',
        confirmButtonText: 'Continuar',
        cancelButtonText: "Cancelar",
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function (isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: URLBASE + '/plantilla/login/cerraLogin.php',
                type: 'POST',
                data: 'true=true',
                success: function (result) {
                    sessionStorage.setItem('sessionActiva', '0');
                    location.href = URLBASE;
                }
            });
        } else {
            swal.close();
        }
    });
});

$('.agregar_carrito').on('click', function () {
    var tipo = $(this).data('tipo');
    var id = $(this).data('id');
    var cantidad = $('#cant_total').val();
    var fecha = $('#birthday').val();

    console.log(cantidad);
    console.log(fecha);
    if (IDCLIENTE == 'none'){
        swal("Aviso!", "Para poder calificar e interactuar con el sitio debes registrarte", "warning");
    }else{
        swal({
            title: "Agregar al Carrito?",
            text: "Click para agregar al carrito de compras!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Continuar',
            cancelButtonText: "Cancelar",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: URLBASE + '/plantilla/carrito/agregar.php',
                    type: 'POST',
                    data: 'tipo=' + tipo + '&id=' + id + '&cliente=' + IDCLIENTE + '&fecha=' + fecha + '&cantidad=' + cantidad,
                    success: function (result) {
                        cargarCarro(IDCLIENTE);
                        swal.close();
                    }
                });
            } else {
                swal.close();
            }
        });
    }
});

$('.eliminar_item').on('click', function () {
    var idcarrito = $(this).data('idcarrito');
    console.log('eliminar_item');
    swal({
        title: "Quitar del Carrito?",
        text: "Click para quitar del carrito de compras!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: 'btn-danger',
        confirmButtonText: 'Continuar',
        cancelButtonText: "Cancelar",
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function (isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: URLBASE + '/plantilla/carrito/eliminar.php',
                type: 'POST',
                data: 'idcarrito=' + idcarrito,
                success: function (result) {
                    cargarCarro(IDCLIENTE);
                    swal.close();
                }
            });
        } else {
            swal.close();
        }
    });
});

function cargarCarro(cliente) {
    if(IDCLIENTE == 'none'){

    }else{
        $.ajax({
            url: URLBASE + '/plantilla/carrito/lista.php',
            type: 'POST',
            data: 'cliente=' + cliente,
            success: function (html) {
                var item__ = $('.carrito_item').length;
                $('.wl_counter').text(item__);
                $('#listaclientecarro').empty();
                $('#listaclientecarro').html(html);
            }
        });
    }
}
cargarCarro(IDCLIENTE);
function cargarCarrofinal(cliente) {
    if (IDCLIENTE == 'none') {

    } else {
        $.ajax({
            url: URLBASE + '/plantilla/carrito/final.php',
            type: 'POST',
            data: 'cliente=' + cliente,
            success: function (html) {
                var item__ = $('.carrito_item').length;
                $('.wl_counter').text(item__);
                $('#lista_completa_carrito_final').empty();
                $('#lista_completa_carrito_final').html(html);
            }
        });
    }
}
cargarCarrofinal(IDCLIENTE);