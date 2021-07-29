<?php require_once "dependencias.php";


  ?>

    <br><center><p><h1 style ="color:yellow"  font-size= "40px">Bienvenido Sistema de gestion de Ventas </h1></p> </br></center>  

<br>
    <br><center><p><h2 style ="color:yellow"  font-size= "40px">Herramientas </h2></p> </br></center>  


<body background="../img/market2.jpg" height="150" >
<div class ="row">
<br>
<br>
<br>

  <div class="col-md-4">
<button class="btn btn-light center-block btn-lg"><a href="javascript:popUp ('../conversor.php')"><span class="glyphicon glyphicon-usd"></span>Conversor de divisas</a></button></p>
</div>


<div class="col-md-4">

 <button class="btn btn-light  center-block btn-lg"><a href="javascript:popUp ('../iva.php')"><span class="glyphicon glyphicon-usd"></span>Calculadora de IVA</a></button></p>

 </div>



<div class="col-md-4">
  <button class="btn btn-light center-block  btn-lg"></span><a href="../manual.html"><span class="glyphicon glyphicon-book">Manual</a></button></p>
</div>

 </body>

    <script type="text/javascript">
    function popUp(URL) {
        window.open(URL, 'Nombre de la ventana', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width=450,height=300,left = 390,top = 50');
    }
    </script>
