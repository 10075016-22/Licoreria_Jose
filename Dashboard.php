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
<body>	
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

	<?php 
		include 'Conexion.php';
		$v = $misqli->query("SELECT * FROM venta");
		$ventas = mysqli_num_rows($v);


		$p = $misqli->query("SELECT * FROM producto");
		$productos = mysqli_num_rows($p);

		$pv = $misqli->query("SELECT * FROM proveedor");
		$proveedor = mysqli_num_rows($pv);
	?>
	<div class="inner-block">
	<!--market updates updates-->
		<div class="market-updates">
				<div class="col-md-4 market-update-gd">
					<div class="market-update-block clr-block-1">
						<div class="col-md-8 market-update-left">
							<h3><?php echo $ventas; ?></h3>
							<h4>Reportes</h4>
							<p>ventas de Licoreria L</p>
						</div>
						<div class="col-md-4 market-update-right">
							<a href="ventas.php"><i class="fa fa-file-text-o"> </i></a>
						</div>
					  <div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-4 market-update-gd">
					<div class="market-update-block clr-block-2">
					 <div class="col-md-8 market-update-left">
						<h3><?php echo $productos; ?></h3>
						<h4>Productos</h4>
						<p>Inventario de productos</p>
					  </div>
						<div class="col-md-4 market-update-right">
							<a href="listProduct.php"><i class="fa fa-eye"> </i></a>
						</div>
					  <div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-4 market-update-gd">
					<div class="market-update-block clr-block-3">
						<div class="col-md-8 market-update-left">
							<h3><?php echo $proveedor ?></h3>
							<h4>Proveedores</h4>
							<p>Listado de proveedores</p>
						</div>
						<div class="col-md-4 market-update-right">
							<a href="listProveedor.php"><i class="fa fa-file-text-o"> </i></a>
						</div>
					  <div class="clearfix"> </div>
					</div>
				</div>
			   <div class="clearfix"> </div>
		</div>
		<br><br><br><br><br><br><br>
		<br><br><br><br><br><br><br>
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