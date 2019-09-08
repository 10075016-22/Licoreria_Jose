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
	$error = '';
	if(isset($_POST['submit']) )
	{
		include 'Conexion.php';
		$datos = $_POST['eliminar'];

		if(!isset($datos))
		{
			$error ='<center><br>
						<div class="alert alert-danger" role="alert">
					 		No hay datos para eliminar 
						</div>
					</center>
					<br>
					';	
			header("location: listClient.php");
		}
		else
		{
			foreach ($datos as $value) 
		{
			$sql=$misqli->query("DELETE FROM cliente WHERE id_cliente = ".$value."");
			if($sql)
			{
				$error ='<center><br>
						<div class="alert alert-success" role="alert">
					 		Cliente eliminado
						</div>
					</center>
					<br>
					';
			}else
			{
				$error ='<center><br>
						<div class="alert alert-danger" role="alert">
					 		Ha ocurrido un error 
						</div>
					</center>
					<br>
					';	
			}
		}
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
					<input type="search" id="busqueda" placeholder="Filtrar" class="form-control">
					<br>
					<?php 
						include 'Conexion.php';
						$sql=$misqli->query("SELECT * FROM cliente");
					?>
					<table class="table table-hover">
					  <thead>
					    <tr>
					    	<th><input type="checkbox" id="seleccionado"></th>
						    <th scope="col">Codigo</th>
						    <th scope="col">Nombre</th>
						    <th scope="col">Télefono</th>
					    </tr>
					  </thead>
					  <tbody id="resultado">
					  	<form method="POST">
						  	<?php
						  	while($row = $sql->fetch_assoc())
						  	{
						  	?>
							    <tr>
							    	<th><input type="checkbox" id="seleccionado" name="eliminar[]" value="<?php echo $row['id_cliente'] ?>"></th>
							      	<th scope="row"><?php echo $row['id_cliente'] ?></th>
							      	<td><?php echo $row['nombre_cliente']; ?></td>
							      	<td><?php echo "+57 ". $row['telefono_cliente']; ?></td>
							    </tr>
							<?php
							}
							?>
							<button type="submit" name="submit" class="btn btn-danger">Eliminar</button>
							<br>
						</form>
						<?php echo $error; ?>
					  </tbody>
					</table>
					<br><br><br>
					<br><br><br>
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