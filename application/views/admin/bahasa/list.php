<?php include('tambah.php') ?>

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
        <th>Kode</th>
        <th>Nama</th>
        <th>Urutan</th>
        <th>Keterangan</th>
        <th width="15%">Action</th>
    </tr>
</thead>
<tbody>

	<?php $i = 1; foreach($bahasa as $bahasa) {?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $bahasa->kode_bahasa; ?></td>
        <td><?php echo $bahasa->nama_bahasa; ?></td>
        <td><?php echo $bahasa->urutan; ?></td>
        <td><?php echo $bahasa->keterangan; ?></td>
        <td>
        	<a href="<?php echo base_url('admin/bahasa/edit/'.$bahasa->id_bahasa) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>

        	<?php include('delete.php') ?>
        </td>
    </tr>

<?php } ?>
</tbody>
</table>