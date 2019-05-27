<?php 
//notofokasi kalau input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');

echo form_open(base_url('admin/anggota/edit/'.$anggota->id_anggota));
?>

<div class="col-md-6">
	<div class="form-group">
		<label for="">Nama</label>
		<input type="text" name="nama_anggota" class="form-control" placeholder="Nama" value="<?php echo $anggota->nama_anggota ?>" required="required">
	</div>

	<div class="form-group">
		<label for="">Email</label>
		<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $anggota->email ?>" required="required">
	</div>

	<div class="form-group">
		<label for="">Username</label>
		<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $anggota->username ?>" required="required" readonly disable >
	</div>

	<div class="form-group">
		<label for="">Password <span class="text-danger"><small>(Password minimal 6 karakter atau biarkan kosong)</small></span></label>
		<input type="password" name="password" class="form-control" placeholder="password" value="<?php echo set_value('password') ?>">
	</div>

</div>

<div class="col-md-6">
	<div class="form-group">
		<label for="">Telepon</label>
		<input type="text" name="telepon" class="form-control" placeholder="Telepon/HP" value="<?php echo $anggota->telepon ?>" required="required">
	</div>

	<div class="form-group">
		<label>Status Anggota</label>
		<select name="status_anggota" class="form-control">
			<option value="Active">Active</option>
			<option value="No Active" <?php if($anggota->status_anggota=="Non Active"){echo "selected";} ?>>Non Active</option>
		</select>
	</div>

	<div class="form-group">
		<label>Instansi Lain</label>
		<textarea name="Instansi" class="form-control" placeholder="Instansi"><?php echo $anggota->instansi ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
		<input type="reset" name="submit" class="btn btn-default btn-lg" value="reset">
	</div>
</div>

<?php echo form_close(); ?>