<!DOCTYPE html>
<html lang="ar">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="<?php echo base_url(); ?>../images/favicon.ico">

	<title>منصة الفكر العلمي</title>

	<!-- Style-->

	<link rel="stylesheet" href="<?php echo base_url();  ?>sass/main.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css_/bootstrap.rtl.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css_/datatable.css" />
	<title>مدارس الفكر العلمي - لوحة الوزارة</title>
	<link rel="icon" href="<?php echo base_url(); ?>../assets/images/logo.png" type="image/x-icon" />
</head>

	<div class="dashboard__layout d-flex justify-content-start align-items-start flex-row">
		<?php $this->load->view('template/right_menu')?>

		<div class="wrraper_page d-flex justify-content-start align-items-start flex-column w-100">
			<?php $this->load->view('template/header')?>
			<?php if (isset($com_content))  echo $com_content; ?>

		</div>
	</div>
<?php $this->load->view('template/footer')?>

	</body>
</html>
