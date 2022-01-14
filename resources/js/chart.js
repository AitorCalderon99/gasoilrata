const labels = Utils.days({
    count: 30
});

const cfg = {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
            data: [0, 0],
            data: [2, 1],
            data: [3, 5],
            data: [4, 4],
            data: [5, 1],
        }]
    },
    options : ''
}

var ctx = document.getElementById("grafico").getContext("2d");
var myChart = new Chart(ctx, cfg);