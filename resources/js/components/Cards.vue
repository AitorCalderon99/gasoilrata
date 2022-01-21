<template>

    <div class="row">
        <div id="cajaDTotal" class="containerSpacing">

            <div id="imageContainer" class="col-auto">
                <img src="/images/gasPumps/gas4.svg">
            </div>
            <div class="col-8 bg-white flexLeft">
                <div id="textoTotal" class="d-flex align-items-center justify-content-center">
                    aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                </div>
            </div>
            <div id="priceContainer" class="col-3 bg-gray-100 flexContainer">
                <div class="precio">
                    1,333€
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


<style lang="scss" scoped>
* {
    box-sizing: border-box;

    #cajaDTotal {
        background-color: #c5a880;
        border: 1px solid #532e1c;
        border-radius: 15px 0px 15px 0px;
        min-width: 35px;

        #imageContainer {
            min-width: 20px;
            padding: 2px;

            img {
                width: 25px;
                height: auto;
            }
        }

        > #priceContainer {
            width: fit-content;
        }
    }

    .flexLeft {
        display: flex;
        align-items: center;
        justify-content: flex-start;

        #textoTotal {
            font-size: 11px;
            font-weight: bolder;
            @media (min-width: 600px) {
                font-size: 14px;
            }
        }
    }

    .flexContainer {
        display: flex;
        align-items: center;
        justify-content: center;

        .precio {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: gray;
            border: 5px none #1C6EA4;
            border-radius: 12px;
            height: 70%;
            margin-right: 3px;
            padding: 5px;
            font-size: 11px;
            @media (min-width: 600px) {
                font-size: 17px;
            }
            /*padding-right: 2em;*/
        }
    }

}

.containerSpacing {
    display: flex;
    align-content: center;
}


</style>
