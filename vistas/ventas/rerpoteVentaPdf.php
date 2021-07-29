
<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">

<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Ventas.php";


	$objv= new ventas();


	$c=new conectar();
	$conexion= $c->conexion();	
	$idventa=$_GET['idventa'];

 $sql="SELECT ve.id_venta,
		ve.fechaCompra,
		ve.id_cliente,
		art.nombre,
        art.precio,
        art.descripcion
	from ventas  as ve 
	inner join articulos as art
	on ve.id_producto=art.id_producto
	and ve.id_venta='$idventa'";

$result=mysqli_query($conexion,$sql);

	$ver=mysqli_fetch_row($result);

	$folio=$ver[0];
	$fecha=$ver[1];
	$idcliente=$ver[2];

 ?>	

 <!DOCTYPE html>
 <html>
 <head>
 		<link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap.css">
 	<style type="text/css">

		

        }
    body{
    	font-size: medium;
    }
	</style>
 
 <center><h3>Reporte de venta</h3></center>
 </head>
 <body>
 		
 		<br>
 	<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
 			<tr>
 				<td>Fecha: <?php echo $fecha; ?></td>
 			</tr>

 		<br>

 		<br>
 			<tr>
 				<td>Codigo: <?php echo $folio ?></td>
 			</tr>

 		<br>

 		<br>
 			<tr>
 				<td>Cliente: <?php echo $objv->nombreCliente($idcliente); ?></td>
 			</tr>

 		<br>

 		<br>

<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
 			<tr>
 				<td>Nombre producto</td>
 				<td>Precio</td>
 				<td>Cantidad</td>
 				<td>Descripcion</td>
 			</tr>

 			<?php 
 			$sql="SELECT ve.id_venta,
						ve.fechaCompra,
						ve.id_cliente,
						art.nombre,
				        art.precio,
				        art.descripcion
					from ventas  as ve 
					inner join articulos as art
					on ve.id_producto=art.id_producto
					and ve.id_venta='$idventa'";

			$result=mysqli_query($conexion,$sql);
			$total=0;
			while($mostrar=mysqli_fetch_row($result)):
 			 ?>

 			<tr>
 				<td><?php echo $ver[3]; ?></td>
 				<td><?php echo $ver[4]; ?></td>
 				<td>1</td>
 				<td><?php echo $ver[5]; ?></td>
 			</tr>
 			<?php 
 				$total=$total + $ver[4];
 			endwhile;
 			 ?>
 			 <tr>
 			 	<td>Total=  <?php echo "$".$total; ?></td>
 			 </tr>
 		</table>
 		 		<br>
 			<br>
 				<br>
 				
 	</table>

<center><h3>Gracias por su compra</h3></center>
 </body>
 </html>