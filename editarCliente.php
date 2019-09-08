<?php 
	session_start();

	$sesion= $_SESSION["usuario"];

	if ($sesion== null || $sesion== "") 
	{
	  header("location: index.php");
	}
?>
<!DOCTYPE HTML>
<html>
	<?php include 'layouts/head.php'; ?>
<body >	

<?php 
	$error= '';
	if(isset($_POST['submit']))
	{

		include 'Conexion.php';
		//RECIBE LOS VALORES DE USUARIO Y CONTRASEÑA
		$id_cliente=$_POST['id'];
		$telefono=$_POST['telefono'];
		$nombre = $_POST['nombre'];

		$consulta= $misqli->query("UPDATE cliente SET nombre_cliente='$nombre', telefono='$telefono' WHERE id_cliente='$id_cliente' ");

		//VALIDACION
		if ($consulta) 
		{
			header("location: listProduct.php");
		}
		else 
		{
			$error ='<center><br>
						<div class="alert alert-danger" role="alert">
					 		No se pudo Editar 
						</div>
					</center>
						<br>
					';
		}
	}
?>
<div class="page-container">	
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<div class="header-main">
					<div class="header-left">
							<div class="logo-name">
									 <a href="Dashboard.php"> <h1>Licoreria &emsp;</h1> 
									<!--<img id="logo" src="" alt="Logo"/>--> 
								  </a> 								
							</div>
						 </div>
						 <div class="header-right">
							<!--notification menu end -->
							<div class="profile_details">		
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<span class="prfil-img"><img src="images/p1.png" alt=""> </span> 
												<div class="user-name">
													<p><?php echo $sesion; ?></p>
													<span>Administrador</span>
												</div>
												<i class="fa fa-angle-down lnr"></i>
												<i class="fa fa-angle-up lnr"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="logout.php"><i class="fa fa-sign-out"></i> Salir</a> </li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="clearfix"> </div>				
						</div>
				     <div class="clearfix"> </div>	
				</div>
				<script>
				$(document).ready(function() {
					 var navoffeset=$(".header-main").offset().top;
					 $(window).scroll(function(){
						var scrollpos=$(window).scrollTop(); 
						if(scrollpos >=navoffeset){
							$(".header-main").addClass("fixed");
						}else{
							$(".header-main").removeClass("fixed");
						}
					 });
					 
				});
				</script>
	<div class="inner-block">
		<?php 
			include 'Conexion.php';
			$id=$_GET['id'];
			$sql = $misqli->query("SELECT * FROM cliente WHERE id_cliente='$id' ");
			$resultado=$sql->fetch_assoc();
		?>
		<form method="POST">
			<div class="form-group">
				<input type="text" disabled class="form-control" value="<?php echo $resultado['id_cliente'] ?>">
				<input type="hidden" name="id" value="<?php echo $resultado['id_cliente'] ?>">
			</div>
			<div class="form-group">
				<label>Nombre </label>
				<input type="text" name="nombre" class="form-control" value="<?php echo $resultado['nombre_cliente'] ?>" maxlength="100">
			</div>
			<div class="form-group">
				<label><i class="fa fa-mobile"></i> Telefono</label>
				<input type="text" maxlength="10" name="telefono" class="form-control" value="<?php echo $resultado['telefono_cliente'] ?>">
			</div>
			


			<button class="btn btn-success" type="submit" name="submit">Actualizar</button>
			<br>
			<?php echo $error; ?>
			<br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br>
		</form>
	</div>
</div>

</div>
<!--slider menu-->
    <?php include 'layouts/menu.php'; ?>
	<div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>                     