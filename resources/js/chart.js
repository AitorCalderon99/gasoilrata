const labels = Utils.days({
    count: 30
});

const cfg = {
    type: 'line',
    data: {
        labels: ['a', 'b'],
        datasets: [{
            data: [{
                x: '2016-12-25',
                y: 20
            }, {
                x: '2016-12-26',
                y: 10
            }]
        }]
    },
    options : ''
}

var ctx = document.getElementById("grafico").getContext("2d");
var myChart = new Chart(ctx, cfg);