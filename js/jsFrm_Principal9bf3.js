$('#divMachupichu').click(function () {
    var valor = 'https://wa.me/51949247579?text=Me%20interesa%20el%20paquete%20a%20cusco%20que%20estás%20ofreciendo';
    window.location = valor;
});
$(function () {
   
});
function loadEvents() {
  
    //$('.input-group.date').datepicker({
    //    language: "es",
    //    autoclose: true,
    //    startView: 1
    //});
    //$(document).bind("mobileinit", function () {
    //    $.mobile.page.prototype.options.degradeInputs.date = true;
    //});
}
$(document).ready(function () {
    $(".rederict").on("click touchend", function (e) {
        var el = $(this);
        var link = el.attr("href");
        window.location = link;
    });
    if (iOS()) {
        document.addEventListener('touchmove', function (event) {
            if (event.scale !== 1) { event.preventDefault(); }
        }, { passive: false });
    }
    //$('.input-group.date').datepicker({
    //    language: "es",
    //    autoclose: true,
    //    startView: 1
    //});
    $('#divpaqcusco').on("click", function (e) {
        window.location = "paquete-cusco";
    });

    var urlCusco = 'https://wa.me/51932367139?text=Me%20interesa%20el%20paquete%20a%20cusco%20que%20estás%20ofreciendo';
    setEventpaquet(urlCusco, '#w_cusco');

    //$(document).bind("mobileinit", function () {
    //    $.mobile.page.prototype.options.degradeInputs.date = true;
    //});	
});

function setEventpaquet(url, idlink) {
    //$(idlink).attr("href", "");
    $(idlink).on("click", function (e) {
        e.stopPropagation();
        window.open(url, '_blank');
    });
}

function OpenModal() {
    //$('#modal1').modal();
    $('#modal1').modal({ backdrop: 'static', keyboard: false }) 
    //$('#exampleModalCenter').modal('hide');
}
function CloseModal() {
    
    var message = '';
    var result = true;
    if ($('#txtNombres').val().trim() === "") {
        if (message === "") {
            message += "Debe ingresar algunos datos a la solicitud : </br>";
        }
        message += "nombre,";
    }
    if ($('#txtApellidos').val().trim() === "") {
        if (message === "") {
            message += "Debe ingresar algunos datos a la solicitud : </br>";
        }
        message += "apellido,";
    }
    if ($('#txtFecha').val().trim() === "") {
        if (message === "") {
            message += "Debe ingresar algunos datos a la solicitud : </br>";
        }
        message += "fecha,";
    }
    if ($('#txtCorreo').val().trim() === "") {
        if (message === "") {
            message += "Debe ingresar algunos datos a la solicitud : </br>";
        }
        message += "correo,";
    }
    if (!validateEmail($('#txtCorreo').val().trim())) {
        if (message === "") {
            message += "Debe ingresar algunos datos a la solicitud : </br>";
        }
        message += "ingresar un correo válido,";
    }
    if ($('#txtTelefono').val().trim() === "") {
        if (message === "") {
            message += "Debe ingresar algunos datos a la solicitud : </br>";
        }
        message += "teléfono,";
    }

    if (message !== "") {
        result = false;
        Swal.fire(
            'Falta algunos datos',
            message,
            'info'
        )
        return result;
    }
    $('#modal1').modal('hide');
    return result;
}
function ShowMessage(correo) {
    clearControls();
    $('#modal1').modal('hide');
    Swal.fire(
        'Solicitud enviada!',
        'Uno de nuestros agentes te estará contactando para brindarte la información solicitada.</br> Correo de contacto : <label style="font-weight:700">' + correo + "</label>",
        'success'
    )
}

function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}
function clearControls() {
    $('#txtNombres').val("");
    $('#txtApellidos').val("");
    $('#txtFecha').val("");
    $('#txtCorreo').val("");
    $('#txtTelefono').val("");
    $('#txtDescripcion').val("");
}
function iOS() {
    return [
        'iPad Simulator',
        'iPhone Simulator',
        'iPod Simulator',
        'iPad',
        'iPhone',
        'iPod'
    ].includes(navigator.platform)
        // iPad on iOS 13 detection
        || (navigator.userAgent.includes("Mac") && "ontouchend" in document)
}