function name(params) {

}

// function to get get form values
function getinputval(id) {
    return document.getElementById(id).value;
}

var config = {
    apiKey: "AIzaSyD0mkwckSn7XLkSjUWIjyxa25OeQQMmhCA",
    authDomain: "escogerd01.firebaseapp.com",
    databaseURL: "https://escogerd01.firebaseio.com/",
    projectId: "escogerd01",
    storageBucket: "escogerd01.appspot.com",
    messagingSenderId: "1054260091136"
};
var app = firebase.initializeApp(config);
db = firebase.database();//firebase.database(app);
//firebase.firestore();
var database = firebase.database(app);



function CreateFicha(identidad,nombre, apellido,edad,genero,ecivil,fecha,estudios,direccion,
    arquidiocesis,diocesis,ciudad,phone,dtrabajo,ttrabajo,religion,bautismo,pcomunion,confirmacion,size,
    tutores,ntutores,npadre,telpadre,nmadre,telmadre,retiro,nretiro,experiencia,esperas) 
    {
    firebase.database().ref('identidad/' + id_identidad).set({

      identidad: identidad,
      nombre: nombre,
      apellido: apellido,
      edad:edad,
      genero:genero,
      ecivil:ecivil,
      fecha:fecha,
      estudios:estudios,
      direccion:direccion,
      arquidiocesis: arquidiocesis,
      diocesis:diocesis,
      ciudad:ciudad,
      phone: phone,
      dtrabajo:dtrabajo,
      ttrabajo:ttrabajo,
      religion:religion,
      bautismo:bautismo,
      pcomunion:pcomunion,
      confirmacion:confirmacion,
      size:size,
      tutores:tutores,
      ntutores:ntutores,
      npadre:npadre,
      telpadre:telpadre,
      nmadre:nmadre,
      telmadre:telmadre,
      retiro:retiro,
      nretiro:nretiro,
      experiencia:experiencia,
      esperas:esperas
    });
  }