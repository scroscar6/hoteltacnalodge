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