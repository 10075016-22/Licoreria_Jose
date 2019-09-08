
<!DOCTYPE HTML>
<html>
<head>
	<title>Licoreria - Login</title>
	<link rel="shorcut icon" type="text/css" href="images/icono.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
	<!-- Custom Theme files -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<!--js-->
	<script src="js/jquery-2.1.1.min.js"></script> 
	<!--icons-css-->
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!--Google Fonts-->
	<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
	<!--static chart-->
</head>

<?php 
	$error= '';
	if(isset($_POST['submit']))
	{

		include 'Conexion.php';
		//RECIBE LOS VALORES DE USUARIO Y CONTRASEÑA
		$user=$_POST['username'];
		$pass=$_POST['password'];

		$consulta= $misqli->query("SELECT * FROM administrador WHERE usuario='$user' AND password='$pass' ");
		//NUMERO DE FILAS DONDE SE ENCUENTRAN LOS DATOS
		$filas=mysqli_num_rows($consulta);

		//VALIDACION
		if ($filas>0) 
		{
			$error ='<center>
						<div class="alert alert-success" role="alert" style="width: 90%; " align="center">
					 		Login Exitoso 
						</div>
					</center>
					<br>
					';

			header("location: Dashboard.php");

			session_start();
			$_SESSION["usuario"]=$user;
		}
		else 
		{
			$error ='<center>
						<div class="alert alert-danger" role="alert" style="width: 90%; " align="center">
					 		Error en las credenciales 
						</div>
					</center>
						<br>
					';
		}
	}
?>
<body>	
<div class="login-page">
    <div class="login-main">  	
    	 <div class="login-head">
				<h1>Licoreria L</h1>
			</div>
			<div class="login-block">
				<form method="POST">
					<input type="text" name="username" placeholder="Nombre de usuario" required>
					<input type="password" name="password" class="lock" placeholder="Contraseña">
					<div class="forgot-top-grids">
						<div class="clearfix"> </div>
					</div>
					<input type="submit" name="submit" value="Ingresar">
				</form>
			</div>
			<?php echo $error; ?>
      </div>
</div>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
	<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>


                      
						
