<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>


	<!DOCTYPE html>
	<html>
	<head

				
	
		<?php require_once "menu.php"; ?>
		<?php require_once "../clases/Conexion.php"; 
		$c= new conectar();
		$conexion=$c->conexion();
		$sql="SELECT id_categoria,nombreCategoria
		from categorias";
		$result=mysqli_query($conexion,$sql);
		?>
	</head>
	<body>
		<div class="container">
			<center><h1>Articulos</h1></center>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmArticulos" enctype="multipart/form-data">
						<label>Categoria</label>
						<select class="form-control input-sm" id="categoriaSelect" name="categoriaSelect">
							<option value="A">Selecciona Categoria</option>
							<?php while($ver=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
							<?php endwhile; ?>
						</select>
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre">
						<label>Descripcion</label>
						<input type="text" class="form-control input-sm" id="descripcion" name="descripcion">
						<label>Stock</label>
						<input type="text" class="form-control input-sm" id="cantidad" name="cantidad">
						<label>Precio</label>
						<input type="text" class="form-control input-sm" id="precio" name="precio">
	
					
							<label>IVA(USD)</label>
							<input type="text" class="form-control input-sm" id="ivau" name="ivau">
							<label>Tasa del cambio</label>
							<input type="text" class="form-control input-sm" id="cambio" name="cambio">
							<label>Precio(BS)</label>
							<input type="text" class="form-control input-sm" id="preciob" name="preciob">
							<label>IVA(BS)</label>
							<input type="text" class="form-control input-sm" id="ivab" name="ivab">
							
						<input type="file" id="imagen" name="imagen">
						<p></p>
						<span id="btnAgregaArticulo" class="btn btn-primary">Agregar</span>

		            <button class="btn btn-dark center-block btn-sm"><a href="javascript:popUp ('../iva.php')"><span class="glyphicon glyphicon-usd"></span>Calcular Datos</a></button></p>
		
					</form>

					
				</div>
				<div class="col-sm-8">
					<div id="tablaArticulosLoad"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->
		
		<!-- Modal -->
		<div class="modal fade" id="abremodalUpdateArticulo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza Articulo</h4>
					</div>
					<div class="modal-body">
						<form id="frmArticulosU" enctype="multipart/form-data">
							<input type="text" id="idArticulo" hidden="" name="idArticulo">
							<label>Categoria</label>
							<select class="form-control input-sm" id="categoriaSelectU" name="categoriaSelectU">
								<option value="A">Selecciona Categoria</option>
								<?php 
								$sql="SELECT id_categoria,nombreCategoria
								from categorias";
								$result=mysqli_query($conexion,$sql);
								?>
								<?php while($ver=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
								<?php endwhile; ?>
							</select>
							<label>Nombre</label>
							<input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
							<label>Descripcion</label>
							<input type="text" class="form-control input-sm" id="descripcionU" name="descripcionU">
							<label>Stock</label>
							<input type="text" class="form-control input-sm" id="cantidadU" name="cantidadU">
							<label>Precio(USD)</label>
							<input type="text" class="form-control input-sm" id="precioU" name="precioU">
							<label>IVA(USD)</label>
							<input type="text" class="form-control input-sm" id="ivauU" name="ivauU">
							<label>Tasa del cambio</label>
							<input type="text" class="form-control input-sm" id="cambioU" name="cambioU">
							<label>Precio(BS)</label>
							<input type="text" class="form-control input-sm" id="preciobU" name="preciobU">
							<label>IVA(BS)</label>
							<input type="text" class="form-control input-sm" id="ivabU" name="ivabU">
						</form>
					</div>
					<div class="modal-footer">
						<button id="btnActualizaarticulo" type="button" class="btn btn-warning" data-dismiss="modal">Actualizar</button>

					</div>
						
				</div>
			</div>
		</div>

	</body>
	</html>

	<script type="text/javascript">
		function agregaDatosArticulo(idarticulo){
			$.ajax({
				type:"POST",
				data:"idart=" + idarticulo,
				url:"../procesos/articulos/obtenDatosArticulo.php",
				success:function(r){
					
					dato=jQuery.parseJSON(r);
					$('#idArticulo').val(dato['id_producto']);
					$('#categoriaSelectU').val(dato['id_categoria']);
					$('#nombreU').val(dato['nombre']);
					$('#descripcionU').val(dato['descripcion']);
					$('#cantidadU').val(dato['cantidad']);
					$('#precioU').val(dato['precio']);
					$('#ivauU').val(dato['ivau']);
					$('#cambioU').val(dato['cambio']);
					$('#preciobU').val(dato['preciob']);
					$('#ivabU').val(dato['ivab']);

				}
			});
		}

		function eliminaArticulo(idArticulo){
			alertify.confirm('¿Desea eliminar este articulo?', function(){ 
				$.ajax({
					type:"POST",
					data:"idarticulo=" + idArticulo,
					url:"../procesos/articulos/eliminarArticulo.php",
					success:function(r){
						if(r==1){
							$('#tablaArticulosLoad').load("articulos/tablaArticulos.php");
							alertify.success("Eliminado exitosamente");
						}else{
							alertify.error("Error al eliminar");
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelo !')
			});
		}
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnActualizaarticulo').click(function(){

				datos=$('#frmArticulosU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/articulos/actualizaArticulos.php",
					success:function(r){
						if(r==1){
							$('#tablaArticulosLoad').load("articulos/tablaArticulos.php");
							alertify.success("Actualizado exitosamente");
						}else{
							alertify.error("Error al actualizar ");
						}
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaArticulosLoad').load("articulos/tablaArticulos.php");

			$('#btnAgregaArticulo').click(function(){

				vacios=validarFormVacio('frmArticulos');

				if(vacios > 0){
					alertify.alert("Complete la informacion");
					return false;
				}

				var formData = new FormData(document.getElementById("frmArticulos"));

				$.ajax({
					url: "../procesos/articulos/insertaArticulos.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

					success:function(r){
						
						if(r == 1){
							$('#frmArticulos')[0].reset();
							$('#tablaArticulosLoad').load("articulos/tablaArticulos.php");
							alertify.success("Agregado exitosamente");
						}else{
							alertify.error("Error al actualizar");
						}
					}
				});
				
			});
		});
	</script>
    <script type="text/javascript">
    function popUp(URL) {
        window.open(URL, 'Nombre de la ventana', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width=450,height=300,left = 390,top = 50');
    }
    </script>

	<?php 
}else{
	header("location:../index.php");
}



?>