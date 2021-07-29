<html>
 <head>
<title>registro</title>
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
    <script src="librerias/jquery-3.2.1.min.js"></script>
    <script src="js/funciones.js"></script> 
    </head>



<script>
  var dolares;
  var bolivar;
  var pregunta;
  var cambio;
  var consulta;

  alert("Buenas tardes.Bienvenido conversor");
 consulta= prompt("Desea realizar una consulta?(si/no)");

while(consulta =='si'){

  
pregunta =prompt("Desea calcular a dolares o bolivares?");

if (pregunta =='dolares'){
bolivar =prompt("Introduzca monto en bolivares");
cambio=prompt("Introduzca cambio del dia");
dolares = (bolivar/cambio);
alert("El monto es ($)"+dolares);

}

if (pregunta =='bolivares'){
dolares =prompt("Introduzca monto en dolares");
cambio=prompt("Introduzca cambio del dia");
bolivar = (dolares*cambio);
alert("El monto es (BS)"+bolivar);


}


consulta = prompt("Desea realizar otra consulta?");
}

alert("Adios");

</script>



 </body>
