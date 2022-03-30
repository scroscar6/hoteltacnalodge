        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                loop:true,
                nav:false,
                items:1,
                autoplay:1,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            });
            $('#enlace-fecha-entrada').datepicker({
                language:'es',
                dateFormat:'dd/mm/yyyy',
                minDate: new Date(),
                todayButton: new Date(),
                autoClose:true
            });
            $('#enlace-fecha-salida').datepicker({
                language:'es',
                dateFormat:'dd/mm/yyyy',
                minDate: new Date(),
                todayButton: new Date(),
                autoClose:true
            });
        });
        var options = {
            maxValue: 10,
            minValue: 2,
            step: 1,
            inputWidth: 40,
            start: 0,
              plusClick: function(element, val) {
               
              },
              minusClick: function(element, val) {
                
              },
              exceptionFun: function(exp) {
                console.log('SIN ELEMENTOS');
              },
              valueChanged: function(element, val) {
              }
        };
        var options2 = {
            maxValue: 10,
            minValue: 0,
            step: 1,
            inputWidth: 40,
            start: 0,
              plusClick: function(element, val) {
               
              },
              minusClick: function(element, val) {
                
              },
              exceptionFun: function(exp) {
                console.log('SIN ELEMENTOS');
              },
              valueChanged: function(element, val) {
              }
        };
        $(".wan-spinner-2").WanSpinner(options).css("border-color", "#d4cfc8");
        $(".wan-spinner-3").WanSpinner(options2).css("border-color", "#d4cfc8");

        $('#birthday').datepicker({
            language:'es',
            dateFormat:'dd/mm/yyyy',
            minDate: new Date(),
            todayButton: new Date(),
            autoClose:true,
            onSelect: function(dateText) {
                /*mes dia año*/
                let datafecha_entrada = $('#birthday').val();
                let datafecha_salida = $('#birthday2').val();
                if(datafecha_salida > datafecha_entrada){
                    
                    let aFecha1 = datafecha_entrada.split('/');
                    let aFecha2 = datafecha_salida.split('/');
                    let fFecha1 = Date.UTC(aFecha1[2],aFecha1[1]-1,aFecha1[0]);
                    let fFecha2 = Date.UTC(aFecha2[2],aFecha2[1]-1,aFecha2[0]);
                    let dif = fFecha2 - fFecha1;
                    let dias = Math.floor(dif / (1000 * 60 * 60 * 24));
                    let preciorigen = $('#preorigen').val();
                    let monto = preciorigen * dias;
                    
                    $('#precioview').empty();
                    $('#precioview').html(monto.toFixed(2));

                    //Swal.fire("Correcto", "Todo bien", "success");
                }else{
                    Swal.fire("Atención", "Fecha de entrada debe ser menor a la de salida", "error");
                   // let datafecha_entrada = $('#birthday').datepicker("setDate", date);
                    //let datafecha_salida = $('#birthday2').datepicker("setDate", "1");


                }
                /*console.log("Selected date: " + dateText + ", Current Selected Value= " + this.value);
                $(this).change();*/
            }
        });
        $('#birthday2').datepicker({
            language:'es',
            dateFormat:'dd/mm/yyyy',
            minDate: new Date(),
            todayButton: new Date(),
            autoClose:true,
            onSelect: function(dateText) {
                /*mes dia año*/
                let datafecha_entrada = $('#birthday').val();
                let datafecha_salida = $('#birthday2').val();

                if(datafecha_salida > datafecha_entrada){
                    let aFecha1 = datafecha_entrada.split('/');
                    let aFecha2 = datafecha_salida.split('/');
                    let fFecha1 = Date.UTC(aFecha1[2],aFecha1[1]-1,aFecha1[0]);
                    let fFecha2 = Date.UTC(aFecha2[2],aFecha2[1]-1,aFecha2[0]);
                    let dif = fFecha2 - fFecha1;
                    let dias = Math.floor(dif / (1000 * 60 * 60 * 24));
                    let preciorigen = $('#preorigen').val();
                    let monto = preciorigen * dias;
                    
                    $('#precioview').empty();
                    $('#precioview').html(monto.toFixed(2));

                    //Swal.fire("Correcto", "Todo bien", "success");
                }else{
                    Swal.fire("Atención", "Fecha de entrada debe ser menor a la de salida", "error");
                    //let datafecha_entrada = $('#birthday').datepicker("setDate", date);
                    //let datafecha_salida = $('#birthday2').datepicker("setDate", "1");
                }
                /*console.log("Selected date: " + dateText + ", Current Selected Value= " + this.value);
                $(this).change();*/
            }
        });

    
        var validacion_errores = 1;
        $('#formulario_titula_check').formValidation({
            framework: 'bootstrap',
            button: {
                selector: '[id="submit"]:not([formnovalidate])',
                disabled: ''
            },
            icon: {
                valid: 'fas fa-check',
                invalid: 'fas fa-times',
                validating: 'fas fa-exclamation-triangle'
            },
            fields: {
                'nombre': {
                    row: '.col-sm-6',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese el nombre del titular.'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z\u00f1\u00d1\u0020\u00C1\u00C9\u00CD\u00D3\u00DA\u00E1\u00E9\u00ED\u00F3\u00FA]+$/i,
                            message: 'No se admiten números ni símbolos.'
                        }
                    }
                },
                'apellido': {
                    row: '.col-sm-6',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese el apellido del titular.'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z\u00f1\u00d1\u0020\u00C1\u00C9\u00CD\u00D3\u00DA\u00E1\u00E9\u00ED\u00F3\u00FA]+$/i,
                            message: 'No se admiten números ni símbolos.'
                        }
                    }
                },
                'celular': {
                    row: '.col-sm-6',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese un número de celular.'
                        }
                    }
                },
                'documento': {
                    row: '.col-sm-6',
                    validators: {
                        notEmpty: {
                            message: 'Ingrese un número de documento.'
                        }
                    }
                },
                'email': {
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
                }
            }
        }).on('success.validator.fv', function(e, data) {
            validacion_errores = data.fv.getInvalidFields().length;
        }).on('success.form.fv', function(e) {
            e.preventDefault();
            let $form    = $(e.target);
            let $button  = $form.data('formValidation').getSubmitButton();
            let formData = $("#formulario_titula_check").serialize();

            let titulo = $('#titulo').val();
            let idhabitacion = $('#idhabitacion').val();
            let idcliente = $('#idcliente').val();
            let tipdocumento = $('#tipdocumento').val();
            let documento = $('#documento').val();
            let nombre = $('#nombre').val();
            let apellido = $('#apellido').val();
            let email = $('#email').val();
            let celular = $('#telefono').val();
            let fecha_entrada = $('#birthday').val();
            let fecha_salida = $('#birthday2').val();
            let precio = $('#precioview').html();
            let wan_adultos = $('#wan_adultos').val();
            let wan_ninios = $('#wan_ninios').val();


   

            let fentrada = fecha_entrada.split('/');
            let fsalida = fecha_salida.split('/');
            fentrada = fentrada[2]+'-'+fentrada[1]+'-'+fentrada[0];
            fsalida = fsalida[2]+'-'+fsalida[1]+'-'+fsalida[0];
            $.ajax({
                url: URLBASE + '/plantilla/checkmyorder/procesar.php',
                method: "POST",
                data: formData+"&fecha_entrada="+fecha_entrada+"&fecha_salida="+fecha_salida+"&precio="+precio+"&wan_adultos="+wan_adultos+"&wan_ninios="+wan_ninios
            }).done(function(data) {
                Swal.fire({
                    title: 'SU RESERVA HA SIDO PROCESADA',
                    html:  'Comuniquese para mas información sobre su reserva',
                    type: 'success'
                });
                $('#titulo').val("");
                $('#idcliente').val("");
                $('#documento').val("");
                $('#nombre').val("");
                $('#apellido').val("");
                $('#email').val("");
                $('#telefono').val("");
                $('#formulario_titula_check').data('formValidation').resetForm($('#formulario_titula_check'));
            })
            .fail(function() {
            })
            .always(function() {
            });
        });



     




let API = function() {
    let Disponibilidad = function(f_llegada,f_salida,llegada,salida) {
        /*$.ajax({
            type: "POST",
            url: "https://apis.hoteleserp.com/api/habitaciones_disponibles",
            data: 'f_llegada=' + f_llegada + '&f_salida=' + f_salida,
            success: function(Info) {
                let habitaciones = Info.data;
                let contHabitaciones = '';
                habitaciones.forEach(function(habitacion) {
                    console.log(habitacion);
                    let htmlhab = '<li class="RoomsGridSectionRoomstyles__Wrapper-sc-1qrgj78-3 bRadcm"><button type="button" class="RoomsGridSectionRoomstyles__Button-sc-1qrgj78-0 jRceAf"><h3 class="RoomsGridSectionRoomstyles__Title-sc-1qrgj78-2 kQLteu">'+habitacion.nombre_tipo_habitacion+'</h3><picture><img alt="" style="width: 100%;" src="https://cdn.hotelpremier.com.pe/media/public/2/291636bf7a4f397623bd45c394ab3f06a_portada-principal-1920-x-800.webp" class="sc-gJWqzi caFUvj"></picture><a href="https://hotelpremier.com.pe/miorden/'+Math.trunc(habitacion.tarifa)+'-'+habitacion.nombre_tipo_habitacion.toLowerCase().split(' ').join('00')+'-'+llegada.split('/').join('m')+'-'+salida.split('/').join('m')+'-'+habitacion.id_habitacion+'"><span style="background-color: #5e7468;" class="RoomsGridSectionRoomstyles__CTA-sc-1qrgj78-1 jUwciz">Reservar s/.'+habitacion.tarifa+'</span></a></button></li>';
                    contHabitaciones = contHabitaciones + htmlhab;
                });
                $('#lista-habitaciones').empty();
                $('#lista-habitaciones').html(contHabitaciones);
            }
        });*/
    };
    let ConsultaUsuario = function() {
        /*$("#documento").on('input',function(){
            let documento = $('#documento').val();
            if (documento.length == 8){
                $.ajax({
                    type: "POST",
                    url: "https://apis.hoteleserp.com/api/cliente",
                    data: 'documento=' + $('#documento').val(),
                    success: function(Info) {
                        console.log(Info);
                        if (Info.statusMessage.toLowerCase() == 'error'){
                            Swal.fire("Aviso!",Info.Mensaje,Info.statusMessage.toLowerCase());
                            
                        };
                        if(Info.statusMessage.toLowerCase() == 'ok'){
                            Swal.fire("Aviso!","Usted ya es cliente registrado.",'success');
                            $('#nombre').val(Info.Cliente.nombre);
                            $('#apellido').val(Info.Cliente.apellidos);
                            $('#email').val(Info.Cliente.email);
                            $('#telefono').val(Info.Cliente.telefono);
                            $('#idcliente').val(Info.Cliente.id_cliente);
                        };
                    }
                });
            }
        }); */
    };
    let ObjBusquedaReserva = function() {
      /*  $("#consulta_reserva_codigo").on('click',function(){
            let codigo_reserva = $('.campo_codigo_check').val();
            console.log(codigo_reserva);
            if (codigo_reserva != "-"){
                $.ajax({
                    type: "POST",
                    url: "https://apis.hoteleserp.com/api/reserva_detalle",
                    data: 'codigo_reserva_web=' + $('.campo_codigo_check').val(),
                    success: function(Info) {
                        console.log(Info);
                        if (Info.statusMessage.toLowerCase() == 'error'){
                            Swal.fire("Aviso!",Info.Mensaje,Info.statusMessage.toLowerCase());
                            
                        };
                        if(Info.statusMessage.toLowerCase() == 'ok'){
                            Swal.fire("Aviso!","Se encontro los datos de su reserva.",'success');
                        };
                    }
                });
            }else{
                Swal.fire("Aviso!","Debe enviar un código de reserva válido.",'warning');
            }
        }); */
    };
    return {
        Habitaciones: function(f_llegada,f_salida,llegada,salida) {
            Disponibilidad(f_llegada,f_salida,llegada,salida);
        },
        ConsultaUsuarioApi: function() {
            ConsultaUsuario();
        },
        BusquedaReserva: function() {
            ObjBusquedaReserva();
        }
    }
}();

