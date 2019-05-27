<!-- Example row of columns -->
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-body">
  <h2><?php echo $title; ?></h2>

<div class="row">

    <p class="text-right">
        <a href="<?php echo base_url('katalog') ?>" class="btn btn-success">
            <i class="fa fa-backward"></i> Kembali dan cari buku lain
        </a>
    </p>
    <hr>
    <div class="col-md-4">
        
        <?php if($buku->cover_buku !=""){ ?>
            <img src="<?php echo base_url('assets/upload/image/'.$buku->cover_buku) ?>" class="img img-thumbnail img-responsive">
        <?php }else{ echo "Tidak ada cover";} ?>

    </div>

    <div class="col-md-8 ">
        
        <?php if(count($file_buku) < 1) {?>
            <p class="alert alert-success text-center">
                <i class="glyphicon glyphicon-warning-sign"></i> File buku tidak tersedia
            </p>
        <?php }else{ ?>
<table class="table table-striped table-bordered table-hover">
<thead>
    <tr>
        <th width="5%">#</th>
        <th>Nama File</th>
       <!--  <th>Keterangan</th> -->
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
        <td><?php echo $file_buku->judul_file; ?></td>
        <!-- <td><?php echo $file_buku->keterangan; ?></td> -->
        <td>
            <a href="<?php echo base_url('katalog/baca/'.$file_buku->id_file_buku) ?>" class="btn btn-success btn-xs"><i class="fa fa-eye" ></i> Baca</a>
        </td>
    </tr>

<?php } ?>
</tbody>
</table>
        <?php } ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="25%">Judul</th>
                    <th>: <?php echo $buku->judul_buku; ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Penulis</td>
                    <td>: <?php echo $buku->penulis_buku; ?></td>
                </tr>
                <tr>
                    <td>Bahasa</td>
                    <td>: <?php echo $buku->nama_bahasa; ?></td>
                </tr>
                <tr>
                    <td>Jenis buku</td>
                    <td>: <?php echo $buku->nama_jenis; ?></td>
                </tr>
                <tr>
                    <td>Subjek</td>
                    <td>: <?php echo $buku->subjek_buku; ?></td>
                </tr>
                <tr>
                    <td>Kolasi</td>
                    <td>: <?php echo $buku->kolasi; ?></td>
                </tr>
                <tr>
                    <td>Letak Buku</td>
                    <td>: <?php echo $buku->letak_buku; ?></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td>: <?php echo $buku->penerbit; ?></td>
                </tr>
                <tr>
                    <td>Tahun terbit</td>
                    <td>: <?php echo $buku->tahun_terbit; ?></td>
                </tr>
                <tr>
                    <td>Nomor Seri</td>
                    <td>: <?php echo $buku->nomor_seri; ?></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td>: <?php echo $buku->ringkasan; ?></td>
                </tr>
            </tbody>
        </table>
        <tbody>
            
        </tbody>
    </div>

</div>
</div>
</div>

</div>
</div>