<p><button class="btn btn-success" data-toggle="modal" data-target="#Tambah">
<i class="fa fa-plus"></i> Tambah
</button></p>

<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Tambah Jenis Data Baru</h4>
    </div>
    <div class="modal-body">

<?php 
//notofokasi kalau input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');

echo form_open(base_url('admin/jenis'));
?>

<div class="col-md-6">
	<div class="form-group">
		<label for="">Nama Jenis Buku</label>
		<input type="text" name="nama_jenis" class="form-control" placeholder="Nama jenis buku" value="<?php echo set_value('nama_jenis') ?>" required="required">
	</div>

	<div class="form-group">
		<label for="">Kode Jenis</label>
		<input type="kode_jenis" name="kode_jenis" class="form-control" placeholder="Kode Jenis Buku" value="<?php echo set_value('kode_jenis') ?>" required="required">
	</div>

	<div class="form-group">
		<label>Urutan Tampil</label>
		<input class="form-control" type="number" name="urutan" placeholder="Nomor urut tampil" value="<?php echo set_value('urutan') ?>">
	</div>

</div>

<div class="col-md-6">
	

	<div class="form-group">
		<label>Keterangan Lain</label>
		<textarea name="keterangan" class="form-control" placeholder="Keterangan"><?php echo set_value('keterangan'); ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
		<input type="reset" name="submit" class="btn btn-default btn-lg" value="reset">
	</div>
</div>

<?php echo form_close(); ?>

<div class="clearfix"></div>
</div>
    <div class="modal-footer">

        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
    </div>
</div>
</div>
</div>
