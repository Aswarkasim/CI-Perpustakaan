<p><a href="<?php echo base_url('admin/buku/tambah') ?>" class="btn btn-success">
<i class="fa fa-plus"> </i> Tambah</a></p>

<?php 
//notifikassi
if($this->session->flashdata('sukses')){
	echo '<div class="alert alert-success"><i class="fa fa-check"></i>'; 
	echo $this->session->flashdata('sukses');
	echo '</div>';
}
?>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>#</th>
        <th>Cover</th>
        <th>Judul Buku</th>
        <th>Penulis</th>
        <th>Letak Buku</th>
        <th>Jenis - Bahasa</th>
        <th>File</th>
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
        <td><?php echo $buku->letak_buku; ?></td>
        <td><?php echo $buku->kode_jenis; ?> - <?php echo $buku->kode_bahasa; ?></td>
        <td><?php echo @count($file_buku); ?> File</td>
        <td>
            <a href="<?php echo base_url('admin/file_buku/kelola/'.$buku->id_buku) ?>" class="btn btn-info btn-xs"><i class="fa fa-book"></i> Kelola File</a>
            <?php include('detail.php') ?>
        	<a href="<?php echo base_url('admin/buku/edit/'.$buku->id_buku) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

        	<?php include('delete.php') ?>
        </td>
    </tr>

<?php } ?>
</tbody>
</table>