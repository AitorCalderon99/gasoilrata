<template>

    <div class="row">
        <div id="cajaDTotal" class="containerSpacing">

            <div class="col bg-black">
                <img src="/images/gasPumps/gas2.svg">
            </div>
            <div class="col-9 bg-white">
                <div id="textoTotal" class="d-flex align-items-center justify-content-center">
                    aaaaaaaaaaaaaaaaaaa
                </div>
            </div>
            <div class="col bg-gray-100">
                <div class="precio">
                    111
                </div>
            </div>
        </div>
    </div>
</template>

<script>

function displayPics() {

    var imagesArray = new Array();


    imagesArray = [
        "CM.jpg", "DC.jpg", "MG.jpg", "SW.jpg"
    ]

    var num = Math.floor(Math.random() * (imagesArray.length + 1));
    var img = imagesArray[num];

    $("#picture").html("<img src='" + img + "' />")
}

export default {
    name: "Cards"
}
</script>

<style scoped>

.precio {
    background-color: gray;
    border: 5px none #1C6EA4;
    border-radius: 12px;

}

.containerSpacing {
    display: flex;
    align-content: center;
}

#cajaDTotal {
    background-color: #c5a880;
    border: 1px solid #532e1c;
    border-radius: 15px 0px 15px 0px;
}

#textoTotal {
    font-size: large;
    font-weight: bolder;
}

img {
    height: 2.7em;
}

</style>
