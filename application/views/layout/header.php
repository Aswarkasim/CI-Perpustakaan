<?php 

    $konfigurasi = $this->konfigurasi_model->listing();

 ?>
<!-- The justified navigation menu is meant for single line per list item.
   Multiple lines will require custom code not provided by Bootstrap. -->
<div class="masthead">
<div class="header">
	<div class="col-md-2">
		<a href="<?php echo base_url() ?>" title="<?php echo $konfigurasi->namaweb ?>">
			<img src="<?php echo base_url('assets/upload/image/'.$konfigurasi->logo) ?>" alt="<?php echo $konfigurasi->namaweb ?>" class="img img-responsive img-thumbnail">
		</a>
	</div>

	<div class="col-md-6">
	   <h1 class="text-muted"><?php echo $konfigurasi->namaweb ?></h1>
	   <h3 class="text-muted"><?php echo $konfigurasi->tagline ?></h3>
	</div>

	<div class="col-md-4 text-right">
		<p>
			<a href="<?php echo $konfigurasi->facebook ?>" target="_blank" class="btn">
				<i class="fa fa-facebook fa-2x"></i>
			</a>
			<a href="<?php echo $konfigurasi->twitter ?>" target="_blank" class="btn">
				<i class="fa fa-twitter fa-2x"></i>
			</a>
			<a href="<?php echo $konfigurasi->instagram ?>" target="_blank" class="btn">
				<i class="fa fa-instagram fa-2x"></i>
			</a>
		</p>
	</div>
	<div class="clearfix"></div>
</div>
