<?php 
//notofokasi kalau input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');

echo form_open(base_url('admin/link/edit/'.$link->id_link));
?>

<div class="form-group">
		<label for="">Nama Link</label>
		<input type="text" name="nama_link" class="form-control" placeholder="Nama link" value="<?php echo $link->nama_link ?>" required="required">
	</div>

	<div class="form-group">
		<label for="">Website</label>
		<input type="url" name="url" class="form-control" placeholder="<?php echo base_url() ?>" value="<?php echo $link->url ?>" required="required">
	</div>

	<div class="form-group">
		<label>Target</label>
		<select name="target" class="form-control">
			<option value="_blank">_blank</option>
			<option value="_self" <?php if($link->target=="_self"){echo "selected";} ?>>_self</option>
			<option value="_parent" <?php if($link->target=="_parent"){echo "selected";} ?>>_parent</option>
			<option value="_top" <?php if($link->target=="_top"){echo "selected";} ?>>_top</option>
		</select>
	</div>

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn" value="Simpan Data">
		<input type="reset" name="submit" class="btn btn-default btn" value="reset">
	</div>

<?php echo form_close(); ?>