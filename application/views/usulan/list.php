<!-- Example row of columns -->
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-body">
  <h2><?php echo $title; ?></h2>

  <?php if($this->session->flashdata('sukses')){ ?>

    <div class="alert alert-success text-center">
        <?php echo $this->session->flashdata('sukses'); ?>
    </div>

<?php }else{ ?>
    <p class="alert alert-success"> Anda dapat mengusulkan judul koleksi buku terbaru melalui formulir ini. silakan memasukkan data-data anda dengan lengkap</p>

    <?php 

        echo validation_errors('<div class="alert alert-warning">','</div>');

        echo form_open(base_url('usulan'));

     ?>

    <div class="form-group">
        <div class="col-md-3 text-right">Judul buku baru<span class="text-danger">*</span></div>
        <div class="col-md-9 text-left">
            <input type="text" name="judul" class="form-control" placeholder="Judul Buku Baru" value="<?php echo set_value('judul') ?>">
        </div>
    </div> 

    <div class="col-md-12"><hr></div>
     <div class="form-group">
        <div class="col-md-3 text-right">Nama Penulis/pengarang<span class="text-danger">*</span></div>
        <div class="col-md-9 text-left">
            <input type="text" name="penulis" class="form-control" placeholder="Nama Penulis" value="<?php echo set_value('penulis') ?>">
        </div>
    </div> 

    <div class="col-md-12"><hr></div>
     <div class="form-group">
        <div class="col-md-3 text-right">Nama Penerbit<span class="text-danger">*</span></div>
        <div class="col-md-9 text-left">
            <input type="text" name="penerbit" class="form-control" placeholder="Nama Penerbit" value="<?php echo set_value('penerbit') ?>">
        </div>
    </div> 

    <div class="col-md-12"><hr></div>
     <div class="form-group">
        <div class="col-md-3 text-right">Keterangan Lain<span class="text-danger">*</span></div>
        <div class="col-md-9 text-left">
           <textarea name="keterangan" class="form-control"><?php echo set_value('keterangan') ?></textarea>
        </div>
    </div> 

    <div class="col-md-12"><hr></div>
     <div class="form-group">
        <div class="col-md-3 text-right">Nama Pengusul<span class="text-danger">*</span></div>
        <div class="col-md-9 text-left">
            <input type="text" name="nama_pengusul" class="form-control" placeholder="Nama Pengusul" value="<?php echo set_value('nama_pengusul') ?>">
        </div>
    </div> 

    <div class="col-md-12"><hr></div>
     <div class="form-group">
        <div class="col-md-3 text-right">Email Pengusul<span class="text-danger">*</span></div>
        <div class="col-md-9 text-left">
            <input type="email" name="email_pengusul" class="form-control" placeholder="Email Pengusul" value="<?php echo set_value('email_pengusul') ?>">
        </div>
    </div> 

    <div class="col-md-12"><hr></div>
     <div class="form-group">
        <div class="col-md-3 text-right"></span></div>
        <div class="col-md-9 text-left">
            <input type="submit" name="submit" class="btn btn-primary" value="Kirim Usulan">
            <input type="reset" name="reset" class="btn" value="Reset">
        </div>
    </div> 

     <?php echo form_close(); 
        } //end flash data
     ?>

</div>
</div>

</div>
</div>

