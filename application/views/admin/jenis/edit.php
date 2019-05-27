<?php 
//notofokasi kalau input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');

echo form_open(base_url('admin/jenis/edit/'.$jenis->id_jenis));
?>

<div class="col-md-6">
	<div class="form-group">
		<label for="">Nama</label>
		<input type="text" name="nama_jenis" class="form-control" placeholder="Nama Jenis Buku" value="<?php echo $jenis->nama_jenis ?>" required="required">
	</div>

	<div class="form-group">
		<label for="">Kode Jenis Buku</label>
		<input type="text" name="kode_jenis" class="form-control" placeholder="Kode Jenis Buku" value="<?php echo $jenis->kode_jenis ?>" required="required">
	</div>

	<div class="form-group">
		<label for="">Urutan</label>
		<input type="number" name="urutan" class="form-control" placeholder="Urutan Tampil" value="<?php echo $jenis->urutan ?>">
	</div>

</div>

<div class="col-md-6">
	<div class="form-group">
		<label>Keterangan Lain</label>
		<textarea name="keterangan" class="form-control" placeholder="Keterangan"><?php echo $jenis->keterangan ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn" value="Simpan Data">
		<input type="reset" name="submit" class="btn btn-default btn" value="reset">
	</div>
</div>

<?php echo form_close(); ?>