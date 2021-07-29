<html>
 <head>
<title>registro</title>
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
    <script src="librerias/jquery-3.2.1.min.js"></script>
    <script src="js/funciones.js"></script> 
    </head>



<script>

  var pregunta;
  var consulta;
  var iva;
  var precio;
  var total;
  var cantidad;
  var cambio;


  alert("Buenas tardes.Bienvenido calculadora de iva");
 consulta= prompt("Desea realizar una consulta?(si/no)");

while(consulta =='si'){
precio =parseFloat (prompt("Introduzca precio del articulo($)"));
cantidad = parseFloat (prompt("Introduzca cuantos articulos desea calcular"));
iva = parseFloat (prompt("Introduzca porcentaje iva a calcular"));
cambio = parseFloat (prompt("Introduzca cambio del dia"));

var totalu =((precio*cantidad*iva/100)+(precio*cantidad));
var ivau =(precio*cantidad*iva/100);
var totalb =((precio*cantidad*cambio*iva/100)+(precio*cantidad*cambio));
var ivab =(precio*cantidad*cambio*iva/100);

alert("El iva es($):"+ivau);
alert("El Monto total es($):"+totalu);
alert("El Monto total es(BS):"+totalb);
alert("El iva es(bs):"+ivab);

alert("Resumen:"+"\n"+ "Precio en ($) ="+precio+"\n"+"Cantidad de  articulos="+cantidad+"\n"+"Monto total($)="+totalu+"\n"+"iva ($)"+ivau+"\n"+"Monto total(BS)="+totalb+"\n"+"iva(BS)="+ivab+"\n"+"Tasa del dia="+cambio);


consulta = prompt("Desea realizar otra consulta?");
}

alert("Resumen:"+"\n"+ "Precio en ($) ="+precio+"\n"+"Cantidad de  articulos="+cantidad+"\n"+"Monto total($)="+totalu+"\n"+"iva ($)"+ivau+"\n"+"Monto total(BS)="+totalb+"\n"+"iva(BS)="+ivab+"\n"+"Tasa del dia="+cambio);

</script>


 <script type="text/javascript">
    function popUp(URL) {
        window.open(URL, 'Nombre de la ventana', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width=450,height=300,left = 390,top = 50');
      </script>
 </body>
