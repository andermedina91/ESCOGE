function name(params) {

}
// function to get get form values
function getinputval(id) {
    return document.getElementById(id).value;
}

// var config = {
//     apiKey: "AIzaSyD0mkwckSn7XLkSjUWIjyxa25OeQQMmhCA",
//     authDomain: "escogerd01.firebaseapp.com",
//     databaseURL: "https://escogerd01.firebaseio.com/",
//     projectId: "escogerd01",
//     storageBucket: "escogerd01.appspot.com",
//     messagingSenderId: "1054260091136"
// };

// var db = firebase.firestore(app);

var dbreporte = db.collection('ficha');
dbreporte.get().then(function(querySnapshot) {

    var content = '';
    //console.log(doc.doc);
    querySnapshot.forEach(function(data) {
        console.log(data.data());

        // console.log(data);

        //var val = data.val();
        content += '<tr>';
        content += '<td>' + data.data().nombre + '</td>';
        content += '<td>' + data.data().apellido + '</td>';
        content += '<td>' + data.data().identidad + '</td>';
        content += '<td>' + data.data().phone + '</td>';
        content += '<td>' + data.data().edad + '</td>';
        content += '<td>' + data.data().diocesis + '</td>';
        content += '</tr>';

        if (querySnapshot.empty) {
            // do something with the data
        } else {
            console.log('document not found');
        }

    });


    $('#dataTable').append(content);
    // var data = querySnapshot.data();

    // if (querySnapshot.exists) {
    //     // do something with the data
    // } else {
    //     console.log('document not found');
    // }

});