<div class="col-md-12">
	<?php
	//tangkap request di url (dari klik menu)
	$hal = $_GET['hal'];
	if(!empty($hal)){
//arahkan sesuai halaman request
		include_once $hal.'.php';

	}else{
		include_once 'home.php';
		include_once 'about.php';
	}
			?>
		</div>
	</div>