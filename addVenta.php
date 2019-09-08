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

		$id_cliente	=$_POST['id_cliente'];
		$cantidad=$_POST['total_venta'];
		$fecha_compras=$_POST['fecha_compras'];

		$consulta= $misqli->query("INSERT INTO venta VALUES ( '','$id_cliente', '$fecha_compras', '$cantidad', '0' ) ");

		//VALIDACION
		if ($consulta) 
		{
			$error ='<center><br>
						<div class="alert alert-success" role="alert">
					 		Registro Exitoso 
						</div>
					</center>
					<br>
					';
		}
		else 
		{
			$error ='<center><br>
						<div class="alert alert-danger" role="alert">
					 		No se pudo registrar 
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
			$clientes=$misqli->query("SELECT * FROM cliente");
		?>
		<form method="POST">

			<div class="form-group">
				<label>Seleccione Cliente</label>
				<select name="id_cliente" class="form-control" required>
					<option value="">Seleccione</option>
					<?php 
						while($row = $clientes->fetch_assoc())
						{
							?>
							<option value="<?php echo $row['id_cliente'] ?>"><?php echo $row['nombre_cliente'];?></option>
							<?php
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<input type="number" min="1" name="total_venta" class="form-control" placeholder="Total venta">
			</div>

			<div class="form-group">
				<label>Fecha de compra</label>
				<input type="date" name="fecha_compras" class="form-control">
			</div>

			<button class="btn btn-success" type="submit" name="submit">Registrar</button>
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