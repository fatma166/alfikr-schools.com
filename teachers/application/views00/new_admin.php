<?php $this->load->view('template/body'); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>

<form method="post" action="<?php echo base_url(); ?>settings/new_admin_done">
<table class="table">
	<tr>
		<td>اسم المستخدم</td>
		<td><input type="text" class="form-control" name="username"  />
	</tr>
	<tr>
		<td>كلمة المرور</td>
		<td><input type="password" class="form-control" name="password" />
	</tr>
	<tr>
		<td>الصلاحيات</td>
		<td>
			<?php foreach($menu as $m){ ?>
				<input type="checkbox" name="menu[]" value="<?php echo $m->id; ?>"  /> <?php echo $m->ar_title; ?><br />
			<?php } ?>
		<td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" value="<?php echo $words["add"]; ?>" class="btn btn-success" />
		</td>
		
	</tr>
</table>

</form>








 
 <?php $this->load->view('template/footer'); ?>