<?php 
//notofokasi kalau input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');

echo form_open(base_url('admin/user/edit/'.$user->id_user));
?>

<div class="col-md-6">
	<div class="form-group">
		<label for="">Nama</label>
		<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $user->nama ?>" required="required">
	</div>

	<div class="form-group">
		<label for="">Email</label>
		<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email ?>" required="required">
	</div>

	<div class="form-group">
		<label for="">Username</label>
		<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username ?>" required="required" readonly disable >
	</div>

	<div class="form-group">
		<label for="">Password <span class="text-danger"><small>(Password minimal 6 karakter atau biarkan kosong)</small></span></label>
		<input type="password" name="password" class="form-control" placeholder="password" value="<?php echo set_value('password') ?>">
	</div>

</div>

<div class="col-md-6">
	<div class="form-group">
		<label>Level Hak Akses</label>
		<select name="akses_level" class="form-control">
			<option value="Admin">Admin</option>
			<option value="User" <?php if($user->akses_level=="User"){echo "selected";} ?>>User</option>
		</select>
	</div>

	<div class="form-group">
		<label>Keterangan Lain</label>
		<textarea name="Keterangan" class="form-control" placeholder="Keterangan"><?php echo $user->keterangan ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
		<input type="reset" name="submit" class="btn btn-default btn-lg" value="reset">
	</div>
</div>

<?php echo form_close(); ?>