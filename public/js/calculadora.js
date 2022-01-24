$(function () {
    $('#calcular').on('click', function () {
        // No se puede declarar la variable fuera

        //Distancia que va a recorrer
        km = $('#km').val();
        //Lo que cuesta ese combustible en concreto
        //coste = $('#coste').val();
        coste = 23;
        //Lo que va a consumir
        consumo = $('#consumo').val();

        tiempo = 30;

        if (!km == "") {
            if (!consumo == "") {
                //Cuando se empieze a calcular todo, no se puede cambiar nada
                //Guardamos en variables cosas a las que luego le queremos dar clases
                inputs=document.body.getElementsByTagName("input");
                texto=document.body.getElementsByTagName("label");
                multiples=document.body.getElementsByTagName("select");
                guardar=$('#subir');

                //Les añadimos los atributos
                $(inputs).attr('disabled', true);
                $(multiples).attr('disabled', true);
                $('#calcular').attr('disabled', true);
                guardar.attr('disabled', true);

                //Les añadimos las clases
                $(inputs).addClass('desaparecer');
                $(texto).addClass('esperar');
                $(multiples).addClass('multiple');
                $('#calcular').addClass('calculo');
                guardar.addClass('subirHov');

                document.body.style.cursor="wait";

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
                    document.body.style.cursor="auto";
                    $(inputs).attr('disabled', false);
                    $('#calcular').attr('disabled', false);
                    guardar.attr('disabled', false);
                    $(multiples).attr('disabled', false);

                    //Eliminamos las clases
                    $(inputs).removeClass('desaparecer');
                    $(texto).removeClass('esperar');
                    $('#calcular').removeClass('calculo');
                    guardar.removeClass('subirHov');
                    $(multiples).removeClass('multiple');
                }, 5000);
            }
        }
    })
})

