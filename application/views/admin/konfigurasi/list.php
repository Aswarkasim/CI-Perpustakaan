<?php

if($this->session->flashdata('sukses')){
	echo '<div class="alert alert-success"> ';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}

//error form
echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i>' , '</div>');

echo form_open(base_url('admin/konfigurasi'));
?>

<div class="col-md-6">

	<div class="form-group">
		<label>Nama Perusahaan/organisasi</label>
		<input type="text" name="namaweb" class="form-control" placeholder="Nama Perusahaan/organisasi" value="<?php echo $konfigurasi->namaweb ?>" required>
	</div>

	<div class="form-group">
		<label>Tagline</label>
		<input type="text" name="tagline" class="form-control" placeholder="Tagline" value="<?php echo $konfigurasi->tagline ?>">
	</div>

	<div class="form-group">
		<label>Nomor Telepon resmi</label>
		<input type="text" name="telepon" class="form-control" placeholder="Nomor telepon resmi" value="<?php echo $konfigurasi->telepon ?>">
	</div>

	<div class="form-group">
		<label>Email resmi</label>
		<input type="text" name="email" class="form-control" placeholder="Email resmi" value="<?php echo $konfigurasi->email ?>">
	</div>

	<div class="form-group">
		<label>Website</label>
		<input type="url" name="website" class="form-control" placeholder="<?php echo base_url() ?>" value="<?php echo $konfigurasi->website ?>">
	</div>

	<div class="form-group">
		<label>Facebook account (URL)</label>
		<input type="url" name="facebook" class="form-control" placeholder="http://facebook.com/akun" value="<?php echo $konfigurasi->facebook ?>">
	</div>

	<div class="form-group">
		<label>Instagram account (URL)</label>
		<input type="url" name="instagram" class="form-control" placeholder="http://instagram.com/akun" value="<?php echo $konfigurasi->instagram ?>">
	</div>

	<div class="form-group">
		<label>Twitter account (URL)</label>
		<input type="url" name="twitter" class="form-control" placeholder="http://twitter.com/akun" value="<?php echo $konfigurasi->twitter ?>">
	</div>

	<div class="alert alert-success">
		<h2>Setting Peminjaman Buku</h2>
		<hr>
		<div class="form-group">
			<label>Durasi maksimal peminjaman (Hari)</label>
			<input type="number" name="max_hari_peminjaman" class="form-control" placeholder="Maksimal Hari peminjaman" value="<?php echo $konfigurasi->max_hari_peminjaman ?>">
		</div>

		<div class="form-group">
			<label>Jumlah maksimal peminjaman buku</label>
			<input type="number" name="max_jumlah_peminjaman" class="form-control" placeholder="Maksimal Jumlah peminjaman Buku" value="<?php echo $konfigurasi->max_jumlah_peminjaman ?>">
		</div>

		<div class="form-group">
			<label>Denda kerterlamatan perhari (Rp)</label>
			<input type="number" name="denda_perhari" class="form-control" placeholder="Denda Perhari" value="<?php echo $konfigurasi->denda_perhari ?>">
		</div>
	</div>


</div>



<div class="col-md-6">

	<div class="form-group">
		<label>Alamat Perusahaan/organisasi</label>
		<textarea name="alamat" placeholder="Alamat Perusahaan/organisasi" class="form-control"><?php echo $konfigurasi->alamat ?></textarea>
	</div>

	<div class="form-group">
		<label>Deskripsi Perusahaan/organisasi</label>
		<textarea name="deskripsi" placeholder="Deskripsi Perusahaan/organisasi" class="form-control"><?php echo $konfigurasi->deskripsi ?></textarea>
	</div>

	<div class="form-group">
		<label>Keywords Websites (Untuk SEO Google)</label>
		<textarea name="keywords" placeholder="Keyword Websites (Untuk SEO Google)" class="form-control"><?php echo $konfigurasi->keywords ?></textarea>
	</div>


	<div class="form-group">
		<label>Kode Google Map (pilih format iframe)</label>
		<textarea name="map" placeholder="Kode Google Map (pilih format iframe)" class="form-control"><?php echo $konfigurasi->map ?></textarea>
	</div>

	<div class="form-group">
		<label>Metatext (biasanya dari ggole untuk Analytic &amp; Webmaster)</label>
		<textarea name="metatext" placeholder="Metatext (biasanya dari ggole untuk Analytic &amp; Webmaster)" class="form-control"><?php echo $konfigurasi->metatext ?></textarea>
	</div>

	<h4>Google Maps</h4>
	<hr>
	<style type="text/css" media="screen">
		iframe{
			width: 100%;
			height: auto;
			min-height: 300px;
		}
	</style>
	<?php echo $konfigurasi->map ?>
	<hr>
	<div class="form-group">
		<button type="submit" name="submit" class="btn btn-success">
			<i class="fa fa-save"></i> Simpan Konfigurasi
		</button>

		<button type="reset" name="submit" class="btn btn-default">
			<i class="fa fa-refresh"></i> Reset
		</button>
	</div>

</div>



<?php echo form_close() ?>
