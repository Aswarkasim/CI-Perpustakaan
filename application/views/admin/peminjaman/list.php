<?php if($this->uri->segment(3) == ""){ ?>
    <p><a href="<?php echo base_url('admin/peminjaman/tambah') ?>" class="btn btn-success">
    <i class="fa fa-plus"> </i> Tambah</a></p>
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
        <th>Nama</th>
        <th>Judul Buku - Kode</th>
        <th>Tgl Pinjam</th>
        <th>Tgl Harus Kembali</th>
        <th>Status Kembali</th>
        <th width="25%">Action</th>
    </tr>
</thead>
<tbody>

	<?php $i = 1; foreach($peminjaman as $peminjaman) {?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td>
            <a href="<?php echo base_url('admin/peminjaman/add/'.$peminjaman->id_anggota) ?>">
            <?php echo $peminjaman->nama_anggota; ?> <i class="fa fa-link"></i>
            </a>
        </td>
        <td><?php echo $peminjaman->judul_buku; ?> - <?php echo $peminjaman->kode_buku; ?></td>
        <td><?php echo date('d-m-Y', strtotime($peminjaman->tanggal_pinjam)) ?></td>
        <td><?php echo date('d-m-Y', strtotime($peminjaman->tanggal_kembali)) ?></td>
        <td><?php echo $peminjaman->status_kembali ?></td>
        <td>
            <?php include('kembali.php') ?>
        	<a href="<?php echo base_url('admin/peminjaman/edit/'.$peminjaman->id_peminjaman) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>

        	<?php include('delete.php') ?>
        </td>
    </tr>

<?php } ?>
</tbody>
</table>