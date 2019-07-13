// setTimeout(function() {

//     google.charts.load('current', { 'packages': ['corechart'] });
//     google.charts.setOnLoadCallback(drawChart);

//     function drawChart() {

//         var chart = new google.visualization.PieChart(document.getElementById('sacremento'));

//         var data = google.visualization.arrayToDataTable(
//             [
//                 ['Sacramentos', 'Cantidad'],
//                 ['Bautismo', bautismo],
//                 ['Comunion', pcomunion],
//                 ['Confirmacion', confirmacion]
//             ]
//         );
//         //bautismo, pcomunion, confirmacion
//         var options = {
//             title: ''
//         };

//         chart.draw(data, options);
//     }


// }, 500);



// function name(params) {

// }
// // function to get get form values
// function getinputval(id) {
//     return document.getElementById(id).value;
// }



// var dbreporte = db.collection('ficha');
// dbreporte.get().then(function(querySnapshot) {

//     var content = '';
//     //console.log(doc.doc);
//     querySnapshot.forEach(function(data) {
//         console.log(data.data());


//         content += '<tr>';
//         content += '<td>' + data.data().nombre + '</td>';
//         content += '<td>' + data.data().apellido + '</td>';
//         content += '<td>' + data.data().identidad + '</td>';
//         content += '<td>' + data.data().bautismo + '</td>';
//         content += '<td>' + data.data().pcomunion + '</td>';
//         content += '<td>' + data.data().confirmacion + '</td>';
//         content += '</tr>';

//         if (querySnapshot.empty) {
//             // do something with the data
//         } else {
//             console.log('document not found');
//         }

//     });


//     $('#dataTable').append(content);


// });

// Pie Chart Example
setTimeout(function() {

    var ctx = document.getElementById("sacramento");
    var sacramento = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Bautismo", "pcomunion", "confirmacion"],
            datasets: [{
                data: [bautismo, pcomunion, confirmacion],
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

// conexion a Firebase y Configuracion
var firebaseConfig = {
    apiKey: "AIzaSyD0mkwckSn7XLkSjUWIjyxa25OeQQMmhCA",
    authDomain: "escogerd01.firebaseapp.com",
    databaseURL: "https://escogerd01.firebaseio.com",
    projectId: "escogerd01",
    storageBucket: "escogerd01.appspot.com",
    messagingSenderId: "1054260091136"
};

// Inicializando Firebase
var app = firebase.initializeApp(firebaseConfig);
var db = firebase.firestore(app);


var dbreporte = db.collection('ficha');
dbreporte.get().then(function(querySnapshot) {

    var content = '';
    //console.log(doc.doc);
    querySnapshot.forEach(function(data) {
        console.log(data.data());

        content += '<tr>';
        content += '<td>' + data.data().nombre + '</td>';
        content += '<td>' + data.data().apellido + '</td>';
        content += '<td>' + data.data().identidad + '</td>';
        content += '<td>' + data.data().bautismo + '</td>';
        content += '<td>' + data.data().pcomunion + '</td>';
        content += '<td>' + data.data().Confirmacion + '</td>';

        content += '</tr>';

        if (querySnapshot.empty) {
            // do something with the data
        } else {
            console.log('document not found');
        }

    });


    $('#dataTable').append("<tbody>" + content + "</tbody>");

    $('#dataTable').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

});