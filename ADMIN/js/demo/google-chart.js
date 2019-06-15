setTimeout(function() {
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable(
            [
                ['Sacramentos', 'Cantidad'],
                ['Bautismo', bautismo],
                ['Comunion', pcomunion],
                ['Confirmacion', confirmacion]
            ]
        );
        //bautismo, pcomunion, confirmacion
        var options = {
            title: ''
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart7'));

        chart.draw(data, options);
    }

    console.log("primera ", pcomunion);
}, 500);