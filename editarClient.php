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
						    <th scope="col">Codigo</th>
						    <th scope="col">Nombre</th>
						    <th scope="col">Télefono</th>
						    <th scope="col">Accion</th>
					    </tr>
					  </thead>
					  <tbody id="resultado">
						  	<?php
						  	while($row = $sql->fetch_assoc())
						  	{
						  	?>
							    <tr>
							      	<th scope="row"><?php echo $row['id_cliente'] ?></th>
							      	<td><?php echo $row['nombre_cliente']; ?></td>
							      	<td><?php echo $row['telefono_cliente']; ?></td>
							      	<td>
							      		<form method="GET" action="editarCliente.php">
							      			<input type="hidden" name="id" value="<?php echo $row['id_cliente']; ?>">
							      			<button class="btn btn-success" type="submit">Editar</button>
							      		</form>
							      	</td>
							    </tr>
							<?php
							}
							?>
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