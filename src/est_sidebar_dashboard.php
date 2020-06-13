<section class="full-box cover dashboard-sideBar">
<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
<div class="full-box dashboard-sideBar-ct">
	<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
		MENÚ <i class="zmdi zmdi-close btn-menu-dashboard" title="Cerrar el Menú"></i>
	</div>
	<?php 
		if($_SESSION['rol'] > 1){
	?>
	<div class="full-box dashboard-sideBar-UserInfo">
		<figure class="full-box">
			<div class="form-group">
				<figcaption class="text-center text-titles mb-2">Rol de Usuario</figcaption>
				<select class="form-control" name="rol" id="rol" onchange="location = this.value">
					<option hidden value="" title="select" label="" selected disabled>Usuario</option>
					<?php
						include('est_select.php');
					?>
				</select>
			</div>
		</figure>
	</div>
	<?php
		}
	?>