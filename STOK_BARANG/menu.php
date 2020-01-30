<?php
$sesi = $_SESSION['MEMBER'];


?>
<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">				 
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="navbar-toggler-icon"></span>
				</button> <a class="navbar-brand" href="index.php?hal=home">Stock Unlimited</a>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="navbar-nav">
						<li class="nav-item active">
							 <a class="nav-link" href="index.php?hal=home">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							 <a class="nav-link" href="index.php?hal=about">About Us</a>
						</li>
						<?php
						if(isset($sesi)){ 
						?>
						<li class="nav-item dropdown">
							 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">Master Data</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								 <a class="dropdown-item" href="index.php?hal=kategori">Kategori</a> 
								 <a class="dropdown-item" href="index.php?hal=barang">Barang</a> 
								 <?php
								 if($sesi['role'] == 'admin') {
								 ?>
								 <a class="dropdown-item" href="index.php?hal=supplier">Supplier</a> 
								<?php } ?>


							</div>

						</li>
					<?php }
					?>


					<li class="nav-item active">
							 <a class="nav-link" href="index.php?hal=pembelian">Pembelian</a>
						</li>
					</ul>
					<form class="form-inline">
						<input class="form-control mr-sm-2" type="text" name="keyword"> 
						<button class="btn btn-primary my-2 my-sm-0" type="submit">
							Search
						</button>
						<input type="hidden" name="hal" value="barang"/>
					</form>
					<ul class="navbar-nav ml-md-auto">
						<?php
						if(!isset($sesi)){
							//--------belum login-----------
						?>		
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;				
						<li class="nav-item active">
							 <a class="nav-link" href="index.php?hal=login">Login <span class="sr-only">(current)</span></a>
						</li>
						<?php }
							//-----------sudah berhasil login--------------
						else { ?>
						<li class="nav-item dropdown">
							 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
							 		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							 	<img src="image/<?= $sesi['foto'] ?>" width="10%" /> 

							 	<?=$sesi['fullname'] ?></a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
								 <a class="dropdown-item" href="index.php?hal=view_user&iduser=<?= $sesi['id'] ?>">My Profile</a> 
								 <?php
								 if($sesi['role'] == 'admin') {
								 ?>
								 <a class="dropdown-item" href="index.php?hal=user">Kelola Akun</a> 	
								 <?php } ?>
								<div class="dropdown-divider"></div>
								 <a class="dropdown-item" href="logout.php">Log Out</a>
							</div>
						</li>
						<?php } ?>
					</ul>
				</div>
			</nav>
		</div>
	</div>