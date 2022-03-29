
$(document).ready(function () {

});


function ValidarCampos() {
    var message = '';
    var result = true;
    if ($('#txtNombre').val().trim() === "") {
        if (message === "") {
            message += "Debe ingresar algunos datos a la solicitud : </br>";
        }
        message += "nombre,";
    }
    if ($('#txtCorreo').val().trim() === "") {
        if (message === "") {
            message += "Debe ingresar algunos datos a la solicitud : </br>";
        }
        message += "correo,";
    }
    if ($('#txtAsunto').val().trim() === "") {
        if (message === "") {
            message += "Debe ingresar algunos datos a la solicitud : </br>";
        }
        message += "asunto,";
    }
    if ($('#txtMensaje').val().trim() === "") {
        if (message === "") {
            message += "Debe ingresar algunos datos a la solicitud : </br>";
        }
        message += "mensaje,";
    }
    if (!validateEmail($('#txtCorreo').val().trim())) {
        if (message === "") {
            message += "Debe ingresar algunos datos a la solicitud : </br>";
        }
        message += "ingresar un correo válido,";
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
    return result;
}
function ShowMessage(correo) {
    clearControls();
    Swal.fire(
        'Mensaje enviado!',
        'Gracias por contactarnos. Un agente esta atendiendo tu mensaje y te notificará al </br> Correo de contacto : <label style="font-weight:700">' + correo + "</label>",
        'success'
    )
}

function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}
function clearControls() {
    $('#txtNombre').val("");
    $('#txtCorreo').val("");
    $('#txtAsunto').val("");
    $('#txtMensaje').val("");
}