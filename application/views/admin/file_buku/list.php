<?php 
    //deteksi uri segmen
//localhost/project_ci/perpustakaan-0-/admin-1-/file_buku-2-/kelola-3-/2-4-
if($this->uri->segment(3) != ""){
    include('tambah.php');
}else{

 ?>


<p><a href="<?php echo base_url('admin/buku/') ?>" class="btn btn-success">
<i class="fa fa-plus"> </i> Tambah File Buku</a></p>

<?php } ?>

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
        <th>Judul Buku</th>
        <th>Nama File</th>
        <th>Keterangan</th>
        <th>Urutan</th>
        <th width="20%">Action</th>
    </tr>
</thead>
<tbody>

	<?php 
        $i = 1;
        foreach ($file_buku as $file_buku) { 
    ?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $file_buku->judul_buku; ?></td>
        <td><?php echo $file_buku->nama_file; ?></td>
        <td><?php echo $file_buku->keterangan; ?></td>
        <td><?php echo $file_buku->urutan; ?></td>
        <td>
            <a href="<?php echo base_url('admin/file_buku/unduh/'.$file_buku->id_file_buku) ?>" class="btn btn-success btn-xs" target="blank"><i class="fa fa-download" ></i> Unduh</a>

        	<a href="<?php echo base_url('admin/file_buku/edit/'.$file_buku->id_file_buku) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>

        	<?php include('delete.php') ?>
        </td>
    </tr>

<?php } ?>
</tbody>
</table>