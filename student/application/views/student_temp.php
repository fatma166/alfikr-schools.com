<!DOCTYPE html>
<html lang="ar">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="eduStudent" />
	<meta name="keywords" content="eduStudent" />
	<meta name="author" content="eduStudent" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>../assets/sass/main.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/bootstrap.rtl.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/datatable.css" />
	<title>EDU STUDENT</title>
	<link rel="icon" href="../../assets/images/logo.png" type="image/x-icon" />
</head>
<body <?php if(!isset($right_menu)) {?> class="exam__layout" <?php }?>>
<?php if(isset($right_menu)) {?>
<div
	class="dashboard__layout d-flex justify-content-start align-items-start flex-row"
>

	<?php $this->load->view('template/right_menu')?>

	<div
		class="wrraper_page d-flex justify-content-start align-items-start flex-column w-100"
	>
		<?php }?>
		<?php // $this->load->view('template/header')?>
		<?php if (isset($com_content))  echo $com_content; ?>
		<?php if(isset($right_menu)) {?>
	</div>
	<?php }?>

<?php $this->load->view('template/footer1')?>

	<?php if(isset($right_menu)) {?>
</div>
<?php } ?>
</body>
</html>
