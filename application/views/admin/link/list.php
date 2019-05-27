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
        <th>Nama</th>
        <th>URL</th>
        <th>Target</th>
        <th width="15%">Action</th>
    </tr>
</thead>
<tbody>

	<?php $i = 1; foreach($link as $link) {?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $link->nama_link; ?></td>
        <td><?php echo $link->url; ?></td>
        <td><?php echo $link->target; ?></td>
        <td>
        	<a href="<?php echo base_url('admin/link/edit/'.$link->id_link) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>

        	<?php include('delete.php') ?>
        </td>
    </tr>

<?php } ?>
</tbody>
</table>