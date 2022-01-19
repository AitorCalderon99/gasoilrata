window.addEventListener('load', function () {
    $(document).ready(
        function (){

            $("#calcular").click(function(){
                // Nota: no se puede declarar la variable fuera
                km = $("#km").val();
                coste = $("#coste").val();
                consumo = $("#consumo").val();
                totalPrecio = ((km*consumo)/100)*coste;
                totalConsumo = (km*consumo)/100;

                $("#textoTotal").html(totalPrecio.toFixed(2) + " €");
                $("#cajaLTotal").html(totalConsumo.toFixed(2) + " L");
            })

        }
    );
});