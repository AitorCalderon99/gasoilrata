/**
 * 
 * IMPORTANTE
 * 
 * Tenemos que poner esto para que el js se cargue al final
 * 
 * Si hemos cambiado el "app.js", aqui en vez de ponerlo como
 * esta ahora, tendremos que ponerlo asi:
 * '$(function (){})'
 * 
 * Esta en resources/app.js la linea 27
 * 
 */
$(window).on('load', function() {
    $('#calcular').on('click', function () {
        //Distancia que va a recorrer
        km = $('#km').val();
        //Lo que cuesta ese combustible en concreto
        coste = $('#coste').val();
        //Lo que va a consumir
        consumo = $('#consumo').val();

        tiempo = 30;

        //Para saber si los campos necesarios estan rellenos o no
        comprobacion = true;

        if (!km == "" && !consumo == "" && !coste == "") {
            //Cuando se empieze a calcular todo, no se puede cambiar nada
            //Guardamos en variables cosas a las que luego le queremos dar clases
            inputs = $("input");
            texto = $("label");
            multiples = $("select");
            guardar = $('#subir');
            vehi = $('#masVehiculo');

            //Les añadimos los atributos
            $(inputs).attr('disabled', true);
            $(multiples).attr('disabled', true);
            $('#calcular').attr('disabled', true);
            guardar.attr('disabled', true);
            vehi.attr('disabled', true);

            //Les añadimos las clases
            $(inputs).addClass('desaparecer');
            $(texto).addClass('esperar');
            $(multiples).addClass('multiple');
            $('#calcular').addClass('calculo');
            guardar.addClass('subirHov');

            document.body.style.cursor = "wait";

            //Generador de numeros aleatorios para el dinero
            function randomDinero() {
                random = (Math.random() * (101 - 10) + 10);
                //Esta es una manera de hacer que solo te aparezcan dos decimales despues de la coma
                //decimales = (Math.round(random * 10 ** 2) / (10 ** 2));
                //Esta es la otra manera para hacerlo, mucho más facil
                decimales = random.toFixed(2);
                $("#textoTotal").html(decimales + " €");
            };

            //Metemos la variable dentro de un interval, y este dentro de una variable para poder detenerlo
            interDinero = setInterval(randomDinero, tiempo);

            //Generador de numeros aleatorios para el consumo
            function randomConsumo() {
                random = (Math.random() * (101 - 10) + 10);
                //Esta es una manera de hacer que solo te aparezcan dos decimales despues de la coma
                //decimales = (Math.round(random * 10 ** 2) / (10 ** 2));
                //Esta es la otra manera para hacerlo, mucho más facil
                decimales = random.toFixed(2);
                $("#cajaLTotal").html(decimales + " L");
            };

            //Metemos la variable dentro de un interval, y este dentro de una variable para poder detenerlo
            interConsumo = setInterval(randomConsumo, tiempo);

            //Funcion para detener el generador
            setTimeout(function () {
                clearInterval(interConsumo);
                clearInterval(interDinero);
                //El precio total del viaje
                totalPrecio = ((km * consumo) / 100) * coste;
                //El consumo total del viaje
                totalConsumo = (km * consumo) / 100;

                //Cargamos el precio correcto en los campos finales
                console.log("precio = " + totalPrecio);
                $("#textoTotal").html(totalPrecio.toFixed(2) + " €");
                console.log("consumo = " + totalConsumo);
                $("#cajaLTotal").html(totalConsumo.toFixed(2) + " L");

                //Despues de que se termine de cargar todo los campos vuelven a como estaban
                document.body.style.cursor = "auto";
                $(inputs).attr('disabled', false);
                $('#calcular').attr('disabled', false);
                guardar.attr('disabled', false);
                $(multiples).attr('disabled', false);
                vehi.attr('disabled', false);

                //Eliminamos las clases
                $(inputs).removeClass('desaparecer');
                $(texto).removeClass('esperar');
                $('#calcular').removeClass('calculo');
                guardar.removeClass('subirHov');
                $(multiples).removeClass('multiple');
            }, 1500);
        }else{
            comprobacion=false;
        }

        //Comprueba si NO es true
        if (!comprobacion){
            //Llamamos al swal para crear el sweet alert
            Swal.fire({
                icon: 'warning',
                iconColor: 'red',
                title: 'Cuidado',
                html: 'Necesitas de los kilómetros a recorrer, el consumo de tu vehículo y su tipo de combustible para calcular los totales',
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> ok',
            });
        }
    })

    //Creamos el array fuera, para que no se este creando cada vez que cambiemos el valor
    var precios = [
        ["Biodiesel", 1.3],
        ["Bioetanol", 1.17],
        ["GasNaturalComprimido", 1.3],
        ["GasNaturalLicuado", 1.68],
        ["Gaseslicuadosdelpetroleo", 0.86],
        ["GasoleoA", 1.42],
        ["GasoleoB", 0.97],
        ["GasoleoPremium", 1.51],
        ["Gasolina95E10", 1.52],
        ["Gasolina95E5", 1.49],
        ["Gasolina95E5Premium", 1.62],
        ["Gasolina98E10", 1,52],
        ["Gasolina98E5", 1,65],
        ["Hidrogeno", 6.6],
    ];
    
    $('#carburante').on('change', function () {
        //Conseguimos el value del tipo de carburante que es
        seleccion = $('#carburante');
        valor = seleccion.val();
        //Conseguimos el tamaño del array
        tamanio = precios.length;
        console.log("ssa");

        //Recorremos el array de los precios de los carburantes
        for (let i = 0; i < tamanio; i++) {
            //Miramos en que momento el que hayamos seleccionado concuerda con alguno de la lista
            if (valor == precios[i][0]) {
                //El momento en el que concuerda cambiamos el valor del campo de texto
                txtCoste = $("#coste").val(precios[i][1]);
            }
        }
    })

           
        
})

