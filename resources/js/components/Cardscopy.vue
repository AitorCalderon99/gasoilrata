<template>
    <div class="card mb-3">
        <div id="cajaDTotal" class="row g-0 row justify-content-center align-items-center">
            <div id="imgContainer" class="col-2 ">
                <img id="imgLeftCard">
            </div>
            <div class="col-8">
                <div class="card-body">
                    <p class="card-tex">This is a wider card with supporting text below as a natural lead-in to
                    </p>
                </div>
            </div>
            <div class="col-2">
                <p class="precio">
                    1,333€
                </p>
            </div>
        </div>
    </div>

</template>

<script>

import {onMounted} from "vue";

export default {
    name: "Cardscopy",
    setup() {
        //methods
        const displayPics = () => {
            var imagesArray = new Array();

            for (let i = 1; i < 9; i++) {
                imagesArray.push("/images/gasPumps/gas" + i + ".svg")
            }

            var num = Math.floor(Math.random() * (8 - 1 + 1) + 1);
            var img = imagesArray[num - 1];
            //CREACION ELEMENTO CON JQUERY
            $('#imgContainer').prepend('<img src= "'+ img + '" class="rounded mx-auto d-block" style="width: 50px; height: auto;"/>');
        }

        onMounted(() => {
            displayPics();


        });

    }
}
</script>


<style lang="scss" scoped>

#cajaDTotal {
    background-color: #c5a880;
    border: 1px solid #532e1c;
    border-radius: 15px 0px 15px 0px;
    min-width: 35px;

}


</style>
