<!-- Example row of columns -->
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-body">
  <h2><?php echo $title; ?></h2>

	<p class="alert alert-success">Hasil Pencarian dengan kata kunci: <strong><?php echo $keywords; ?></strong></p>
    <form action="<?php echo base_url('katalog') ?>" method="post" class="form-inline text-center">
        <input type="text" name="cari" class="form-control" placeholder="Kata kuncibersarkan judul">
        <input type="submit" name="submit" class="btn btn-success">
    </form>
<hr>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
    <th>#</th>
    <th>Cover</th>
    <th>Judul Buku</th>
    <th>Penulis</th>
    <th width="20%">Action</th>
</tr>
</thead>
<tbody>

<?php $i = 1; foreach($buku as $buku) {
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
    <td>
        <a href="<?php echo base_url('katalog/read/'.$buku->id_buku) ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Lihat detail</a>
        
    </td>
</tr>

<?php } ?>
</tbody>
</table>


</div>
</div>

</div>
</div>