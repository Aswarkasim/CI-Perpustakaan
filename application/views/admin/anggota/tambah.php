<?php 
//notofokasi kalau input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');

echo form_open(base_url('admin/anggota/tambah'));
?>

<div class="col-md-6">
	<div class="form-group">
		<label for="">Nama Anggota</label>
		<input type="text" name="nama_anggota" class="form-control" placeholder="Nama" value="<?php echo set_value('nama_anggota') ?>" required="required">
	</div>

	<div class="form-group">
		<label for="">Email</label>
		<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required="required">
	</div>


	<div class="form-group">
		<label for="">Username</label>
		<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username') ?>" required="required">
	</div>

	<div class="form-group">
		<label for="">Password</label>
		<input type="password" name="password" class="form-control" placeholder="password" value="<?php echo set_value('password') ?>" required="required">
	</div>

</div>

<div class="col-md-6">
	<div class="form-group">
		<label for="">Telepon/Hp</label>
		<input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo set_value('telepon') ?>" required="required">
	</div>

	<div class="form-group">
		<label>Status Anggota</label>
		<select name="status_anggota" class="form-control">
			<option value="Active">Aktif</option>
			<option value="Non Active">Non Aktif</option>
		</select>
	</div>

	<div class="form-group">
		<label>Instansi</label>
		<textarea name="instansi" class="form-control" placeholder="instansi"><?php echo set_value('instansi'); ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
		<input type="reset" name="submit" class="btn btn-default btn-lg" value="reset">
	</div>
</div>

<?php echo form_close(); ?>