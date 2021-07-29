
<?php 
	require_once "../../clases/Conexion.php";
	$c= new conectar();
	$conexion=$c->conexion();
	$sql="SELECT art.nombre,
					art.descripcion,
					art.cantidad,
					art.precio,
					art.ivau,
					art.cambio,
					art.preciob,
					art.ivab,
					img.ruta,
					cat.nombreCategoria,
					art.id_producto
		  from articulos as art 
		  inner join imagenes as img
		  on art.id_imagen=img.id_imagen
		  inner join categorias as cat
		  on art.id_categoria=cat.id_categoria";
	$result=mysqli_query($conexion,$sql);

 ?>

<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label> Listado de  articulos</label></caption>
	<tr>
		<td>Nombre</td>
		<td>Descripcion</td>
		<td>Stock</td>
		<td>Precio(USD)</td>
		<td>IVA(USD)</td>
		<td>Tasa del dia</td>
		<td>Precio(BS)</td>
		<td>IVA (BS)</td>
		<td>Imagen</td>
		<td>Categoria</td>
		<td>Editar</td>
		<td>Eliminar</td>
	</tr>

	<?php while($ver=mysqli_fetch_row($result)): ?>

	<tr>
		<td><?php echo $ver[0]; ?></td>
		<td><?php echo $ver[1]; ?></td>
		<td><?php echo $ver[2]; ?></td>
		<td><?php echo $ver[3]; ?></td>
		<td><?php echo $ver[4]; ?></td>
		<td><?php echo $ver[5]; ?></td>
		<td><?php echo $ver[6]; ?></td>
		<td><?php echo $ver[7]; ?></td>
		<td>
			<?php 
			$imgVer=explode("/", $ver[8]) ; 
			$imgruta=$imgVer[1]."/".$imgVer[2]."/".$imgVer[3];
			?>
			<img width="80" height="80" src="<?php echo $imgruta ?>">
		</td>
		<td><?php echo $ver[9]; ?></td>
		<td>
			<span  data-toggle="modal" data-target="#abremodalUpdateArticulo" class="btn btn-warning btn-xs" onclick="agregaDatosArticulo('<?php echo $ver[10] ?>')">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
		<td>
			<span class="btn btn-danger btn-xs" onclick="eliminaArticulo('<?php echo $ver[10] ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
	</tr>
<?php endwhile; ?>
</table>