<?php 
//Loading konfigurasi website
$site   = $this->konfigurasi_model->listing();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $title ?> </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?php echo base_url() ?>assets/template/https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Icon diambil dari konfigurasi website --> 
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/open-iconic-bootstrap.min.css">
    <!-- SEO Google -->
    <meta name="keywords" content="<?php echo $site->keywords ?>">
    <meta name="description" content="<?php echo $title ?>,<?php $site->deskripsi ?>">


    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/animate.css">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/upload/image/'.$site->icon) ?>"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/aos.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/icomoon.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/style.css">

    <style type="text/css">
        .pagination a, .pagination b
        {
            padding: 10px 20px;
            text-decoration: none;
            float: left;
        }
        .pagination a{
            background-color: gray;
            color: white;
        }
        .pagination b{
            background-color: orange;
            color: white;
        }
        .pagination a:hover {
            background-color: orange;

        }
    </style>
  </head>
  <body class="goto-here">