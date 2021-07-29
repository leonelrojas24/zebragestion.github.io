<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		
 ?>


<!DOCTYPE html>
<body background="../img/market2.jpg" height="150" >
<html>
<head>
	<title>inicio</title>
	<?php require_once "menu.php"; ?>
		<?php require_once "../index2.php"; ?>
</head>
<body>


</body>
</html>
<?php 
	}else{
		header("location:../index.php");
	}
 ?>