<style type="text/css" media="screen">
	iframe{
		width: 100%;
		height: auto;
		max-height: 400px;
	}
</style>
<!-- Example row of columns -->
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-body">
  <h2><?php echo $title; ?></h2>

	<div class="row">
		<div class="col-md-6">
			<p>
				<strong><?php echo $konfigurasi->namaweb ?></strong>
				<br><?php echo  $konfigurasi->alamat ?>
				<br><i class="fa fa-phone"></i> <?php echo $konfigurasi->telepon ?>
				<br><i class="fa fa-envelope"></i> <?php echo $konfigurasi->email ?>
				<br><i class="fa fa-globe"></i> <?php echo str_replace('http://','www.',$konfigurasi->website) ?>
			</p>
		</div>
		<div class="col-md-6">
			<?php echo $konfigurasi->map ?>
		</div>
	</div>

</div>
</div>

</div>
</div>