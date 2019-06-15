//  Establecer una nueva familia de fuentes predeterminada y color de fuente para imitar el estilo predeterminado de Bootstrap
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
setTimeout(function() {

    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Masculino", "Femenino", "Otro"],
            datasets: [{
                data: [genero_masculino, genero_femenino],
                //, genero_otro
                backgroundColor: ['#2710f2', '#cc1807', '#acaeb1'],
                hoverBackgroundColor: ['#2710f2', '#cc1807', '#acaeb1'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });

}, 1000);