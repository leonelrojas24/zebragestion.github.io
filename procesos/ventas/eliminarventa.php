<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/ventas.php";
	$id=$_POST['idventa'];

	$obj= new ventas();
	echo $obj->eliminaventa($id);

 ?>