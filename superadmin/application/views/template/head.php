<!DOCTYPE html>
<html lang="ar">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Soumtech" />
    <meta name="keywords" content="Soumtech" />
    <meta name="author" content="Soumtech" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sass/main.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.rtl.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datatable.css" />
    <title>مدارس الفكر العلمي - لوحة الوزارة</title>
    <link rel="icon" href="<?php echo base_url(); ?>../assets/images/logo.png" type="image/x-icon" />
    <style>
        input[type=text]{
            text-transform: lowercase !important;
        }
        input[type=email]{
            text-transform: lowercase !important;
            text-align: right;
        }
    </style>
  </head>
  <body>
    <div
      class="dashboard__layout d-flex justify-content-start align-items-start flex-row"
    >
	
	
	
	<?php $this->load->view('template/right_menu'); ?>
	<?php $this->load->view('template/header'); ?>
	
	
	