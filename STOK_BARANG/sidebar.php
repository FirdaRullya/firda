<div class="row" align="center">
		<div class="col-md-12">
			<div class="btn-group" role="group">
				<?php
				$model = new KategoriModel();
				$rs = $model->getAll();
				foreach ($rs as $kate) {
				?>
				<div class="list-group-item justify-content-between">
				<a href="index.php?hal=barang&idkate=<?= $kate['id'] ?>"><?= $kate['nama'] ?></a>
				</div> 
				<?php } ?>
				
			</div>
			<br/>
			<br/>
	</div>
</div>
