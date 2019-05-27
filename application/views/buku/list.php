<!-- Example row of columns -->
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-body">
  <h2><?php echo $title; ?></h2>
	<p class="text-right">
		<a href="<?php echo base_url('katalog') ?>" class="btn btn-success">
			<i class="glyphicon glyphicon-search"></i> Pencarian Buku
		</a>
	</p>
	

	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
	    <tr>
	        <th>#</th>
	        <th>Cover</th>
	        <th>Judul Buku</th>
	        <th>Penulis</th>
	        <th>Penerbit</th>
	        <!-- <th>Jenis - Bahasa</th>
	        <th>File</th> -->
	        <th width="20%">Action</th>
	    </tr>
	</thead>
	<tbody>

		<?php $i = 1; foreach($buku as $buku) {
	        $id_buku = $buku->id_buku;
	        $file_buku = $this->file_buku_model->buku($id_buku);
	        ?>
	    <tr>
	        <td><?php echo $i++; ?></td>
	        <td>
	            <?php if($buku->cover_buku != ""){ ?>
	                <img src="<?php echo base_url('assets/upload/image/thumbs/'.$buku->cover_buku) ?>" class="img img-thumbnail" width="60">
	            <?php }else{ 
	                echo "Tidak ada";
	            } ?>
	        </td>
	        <td><?php echo $buku->judul_buku; ?></td>
	        <td><?php echo $buku->penulis_buku; ?></td>
	        <td><?php echo $buku->penerbit; ?></td>
	        <!-- <td><?php echo $buku->kode_jenis; ?> - <?php echo $buku->kode_bahasa; ?></td>
	        <td><?php echo @count($file_buku); ?> File</td> -->
	        <td>
	            <a href="<?php echo base_url('katalog/read/'.$buku->id_buku) ?>" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Kelola File</a>
	          
	        </td>
	    </tr>

	<?php } ?>
	</tbody>
	</table>

</div>
</div>

</div>
</div>