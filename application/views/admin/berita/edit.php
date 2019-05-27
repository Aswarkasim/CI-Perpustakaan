<?php 
//notofokasi kalau input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');

//kalau terjadi error upload tampilkan
if(isset($error)){
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '</div>';
}

echo form_open_multipart(base_url('admin/berita/edit/'.$berita->id_berita));
?>

<div class="col-md-12">
	<div class="form-group form-group-lg">
		<label for="">Judul Berita</label>
		<input type="text" name="judul_berita" class="form-control" placeholder="Judul Berita" value="<?php echo $berita->judul_berita ?>" required="required">
	</div>
</div>

<div class="col-md-4">
	<div class="form-group form-group">
		<label for="">Status Berita</label>
		<select name="status_berita" class="form-control">
			<option value="Publish">Publikasikan</option>
			<option value="Draft" <?php if($berita->status="Draft"){echo "Selected";} ?>>Simpan Sebagai Draft</option>
		</select>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group form-group">
		<label for="">Jenis Berita</label>
		<select name="jenis_berita" class="form-control">
			<option value="Berita">Berita</option>
			<option value="Slider" <?php if($berita->jenis_berita="Slider"){echo "Selected";} ?>>Homepage Slider</option>
		</select>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<label for="">Upload Gambar</label>
		<input type="file" class="form-control" name="gambar" class="gambar" placeholder="Gambar">	
	</div>
</div>

<div class="col-md-12">
	<div class="form-group form-group-lg">
		<label for="">Isi Berita</label>
		<textarea class="editor" name="isi" class="form-control" placeholder="Isi"><?php echo $berita->isi; ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn" value="Simpan Data">
		<input type="reset" name="submit" class="btn btn-default btn" value="reset">
	</div>
</div>

<?php echo form_close(); ?>