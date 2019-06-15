setTimeout(function() {
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable(
            [
                ['Genero', 'Cantidad'],
                ['genero_masculino', genero_masculino],
                ['genero_femenino', genero_femenino],
                ['genero_otro', genero_otro]
            ]
        );
        //bautismo, pcomunion, confirmacion
        var options = {
            title: ''
        };

        var chart = new google.visualization.PieChart(document.getElementById('myPieChart'));

        chart.draw(data, options);
    }
}, 500);