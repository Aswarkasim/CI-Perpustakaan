<p><button class="btn btn-success" data-toggle="modal" data-target="#Tambah">
<i class="fa fa-plus"></i> Tambah
</button></p>

<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Tambah Link Baru</h4>
    </div>
    <div class="modal-body">

<?php 
//notofokasi kalau input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');

echo form_open(base_url('admin/link'));
?>

<div class="col-md-12">
	<div class="form-group">
		<label for="">Nama Link</label>
		<input type="text" name="nama_link" class="form-control" placeholder="Nama link" value="<?php echo set_value('nama_link') ?>" required="required">
	</div>

	<div class="form-group">
		<label for="">Website</label>
		<input type="url" name="url" class="form-control" placeholder="<?php echo base_url() ?>" value="<?php echo set_value('url') ?>" required="required">
	</div>

	<div class="form-group">
		<label>Target</label>
		<select name="target" class="form-control">
			<option value="_blank">_blank</option>
			<option value="_self">_self</option>
			<option value="_parent">_parent</option>
			<option value="_top">_top</option>
		</select>
	</div>

</div>




<div class="clearfix"></div>
</div>
    <div class="modal-footer">
		<button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Simpan</button>
        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
    </div>
</div>
</div>
</div>
<?php echo form_close(); ?>
