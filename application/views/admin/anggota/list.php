<p><a href="<?php echo base_url('admin/anggota/tambah') ?>" class="btn btn-success">
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
        <th>Nama</th>
        <th>Email - Telepon</th>
        <th>Username - Status</th>
        <th>Instansi</th>
        <th width="15%">Action</th>
    </tr>
</thead>
<tbody>

	<?php $i = 1; foreach($anggota as $anggota) {?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $anggota->nama_anggota; ?></td>
        <td><?php echo $anggota->email; ?>
            <br><i class="fa fa-phone"></i> Telp: <?php echo $anggota->telepon; ?>
        </td>
        <td><?php echo $anggota->username; ?> - <?php echo $anggota->status_anggota; ?></td>
        <td><?php echo $anggota->instansi; ?></td>
        <td>
        	<a href="<?php echo base_url('admin/anggota/edit/'.$anggota->id_anggota) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>

        	<?php include('delete.php') ?>
        </td>
    </tr>

<?php } ?>
</tbody>
</table>