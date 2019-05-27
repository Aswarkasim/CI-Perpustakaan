<?php 

    $konfigurasi = $this->konfigurasi_model->listing();

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="<?php echo $title.' - '.$konfigurasi->deskripsi; ?>">
    <meta name="author" content="<?php echo $konfigurasi->namaweb.' - '.$konfigurasi->tagline ?>">
    <!-- keyword -->
    <meta name="keywords" content="<?php echo $title.' - '.$konfigurasi->deskripsi; ?>">
    <link rel="icon" href="<?php echo base_url('assets/upload/image/thumbs/'.$konfigurasi->icon) ?>">

    <title><?php echo $title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/perpus/css/bootstrap.min.css" rel="stylesheet">
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url() ?>assets/admin/assets/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/perpus/css/style.css" rel="stylesheet">
    
    <link href="<?php echo base_url() ?>assets/perpus/css/carousel.css" rel="stylesheet">

    <!-- TABLE STYLES-->
    <link href="<?php echo base_url() ?>assets/admin/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />



    <!-- javascript jquery -->
    <script src="<?php echo base_url() ?>assets/jquery-ui/external/jquery/jquery.js"></script>

    <!-- viewer js -->

    <script src="<?php echo base_url('assets/viewerjs/ViewerJS/pdf.js') ?>" type="text/javascript"></script>

  
  </head>

  <body>

    <div class="container">

