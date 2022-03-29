var isloaded = false;
$(function () {
});
function GetAvailableDestination() {
    var tipo = $('#ddlCategoria').val();
    $('#ddlDestino').find('option').remove().end().append('<option value="0">(Seleccionar)</option>').val('');
    $("#ddlDestino").prop("selectedIndex", 0).val();
    $('#ddlMesSalida').find('option').remove().end().append('<option value="0">(Seleccionar)</option>').val('');
    $("#ddlMesSalida").prop("selectedIndex", 0).val();
    $('#ddlDuracion').find('option').remove().end().append('<option value="0">(Seleccionar)</option>').val('');
    $("#ddlDuracion").prop("selectedIndex", 0).val();
    $.ajax({
        type: "POST",
        url: "Frm_principal.aspx/GetAvailableDestination",
        data: '{"tipo" : "' + tipo + '"}',
        contentType: "application/json; charset=utf-8",
        dataTpe: 'json',
        success: function (respose) {
            respose = JSON.parse(respose.d);
            for (item of respose) {
                $('#ddlDestino').append($('<option>', {
                    value: item.destino,
                    text: item.destino
                }));
            }
            if ($('#hdnLoadSelected').length) {
                if (!isloaded) {
                    $('#ddlDestino').val($('#hdnDestino').val());
                    GetAvailableMonths();
                }
            }
        }
    });
}
function GetAvailableMonths() {
    var destino = $('#ddlDestino').val();
    $('#hdnDestino').val(destino);
    $('#ddlMesSalida').find('option').remove().end().append('<option value="0">(Seleccionar)</option>').val('');
    $('#ddlDuracion').find('option').remove().end().append('<option value="0">(Seleccionar)</option>').val('');
    $("#ddlMesSalida").prop("selectedIndex", 0).val(); 
    $("#ddlDuracion").prop("selectedIndex", 0).val(); 
    $.ajax({
        type: "POST",
        url: "Frm_principal.aspx/GetAvailableMonths",
        data: '{"destino" : "' + destino  +'"}',
        contentType: "application/json; charset=utf-8",
        dataTpe: 'json',
        success: function (respose) {
            respose = JSON.parse(respose.d);
            for (item of respose) {
                $('#ddlMesSalida').append($('<option>', {
                    value: item.mes,
                    text: item.mesDesc
                }));
            }
            if ($('#hdnLoadSelected').length) {
                if (!isloaded) {
                    $('#ddlMesSalida').val($('#hdnSalida').val());
                    GetAvailableDuration();
                }
            }
        }
    });
}
function GetAvailableDuration() {
    var destino = $('#ddlDestino').val();
    var mes = $('#ddlMesSalida').val();
    $('#hdnMesSalida').val(mes);
    $('#ddlDuracion').find('option').remove().end().append('<option value="0">(Seleccionar)</option>').val('');
    $.ajax({
        type: "POST",
        url: "Frm_principal.aspx/GetAvailableDuration",
        data: '{"destino" : "' + destino + '","mes" : "' + mes  + '"}',
        contentType: "application/json; charset=utf-8",
        dataTpe: 'json',
        success: function (respose) {
            respose = JSON.parse(respose.d);
            for (item of respose) {
                $('#ddlDuracion').append($('<option>', {
                    value: item.duracion,
                    text: item.duracionDesc
                }));
            }
            if ($('#hdnLoadSelected').length) {
                if (!isloaded) {
                    $('#ddlDuracion').val($('#hdnDuracion').val());
                    isloaded = true;
                }
            }
        }
    });
}
function SetDuration() {
    var duration = $('#ddlDuracion').val();
    $('#hdnDuracion').val(duration);
}
function Validate() {
    var result = true;
    var categoria = $('#ddlCategoria').val();
    var destino = $('#ddlDestino').val();
    var messalida = $('#ddlMesSalida').val();
    var duracion = $('#ddlDuracion').val();

    if (categoria === "0") {
        Swal.fire("Antes de continuar", "Debe seleccionar una categoría.", "info");
        return false;
    }
    else if (destino === "0") {
        Swal.fire("Antes de continuar", "Debe seleccionar un destino.", "info");
        return false;
    }
    else if (messalida === "0") {
        Swal.fire("Antes de continuar", "Debe seleccionar un mes de viaje.", "info");
        return false;
    }
    else if (duracion === "0") {
        Swal.fire("Antes de continuar", "Debe seleccionar una duración del viaje.", "info");
        return false;
    }
    return result;
}