<?php 

  $konfigurasi = $this->konfigurasi_model->listing();

 ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php echo $title; ?></title>
<link rel=" shortcut icon" href="<?php echo base_url('assets/upload/image/thumbs/'.$konfigurasi->icon) ?>">
<!-- BOOTSTRAP STYLES-->
<link href="<?php echo base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME STYLES-->
<link href="<?php echo base_url() ?>assets/admin/assets/css/font-awesome.css" rel="stylesheet" />
<!-- CUSTOM STYLES-->
<link href="<?php echo base_url() ?>assets/admin/assets/css/custom.css" rel="stylesheet" />
<!-- GOOGLE FONTS-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
<div class="container">
<div class="row text-center ">
<div class="col-md-12">
<br  /><br />
<h2> 
  <img src="<?php echo base_url('assets/upload/image/'.$konfigurasi->logo) ?>" alt="" class="img img-responsive img-thumbnail" width="100">
</h2>

<br />
</div>
</div>
<div class="row ">

<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
<div class="panel panel-default">
<div class="panel-heading">
<strong>   Masukkan Username dan Password </strong>  
</div>
<div class="panel-body">

<?php 

  //Notifikasi Kalau ada input error
  echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ',' </div>');

  //Notifikasi
  if($this->session->flashdata('sukses')){
    echo '<div class="alert alert-success"><i class="fa fa-check"></i> ';
    echo $this->session->flashdata('sukses');
    echo '</div>';
  }

?>

<form role="form" method="post" action="<?php echo base_url('login') ?>">
       <br />
     <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
            <input type="text" class="form-control" placeholder="Your Username" name="username" />
        </div>
            <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
            <input type="password" name="password" class="form-control"  placeholder="Your Password" />
        </div>
     
     <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Login Now">
    <hr />
    Home Page ? <a href="<?php echo base_url() ?>" >Klik di sini </a> 
    </form>
</div>

</div>
</div>


</div>
</div>


       <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
      <!-- JQUERY SCRIPTS -->
      <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
      <script src="<?php echo base_url() ?>assets/admin/assets/js/bootstrap.min.js"></script>
      <!-- METISMENU SCRIPTS -->
      <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery.metisMenu.js"></script>
        <!-- CUSTOM SCRIPTS -->
      <script src="<?php echo base_url() ?>assets/admin/assets/js/custom.js"></script>
     
  </body>
  </html>
