<?php $this->load->view('template/body'); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>

<form method="post" action="<?php echo base_url(); ?>settings/edit_admin_done">
<table class="table">
	<tr>
		<td>اسم المستخدم</td>
		<td><input type="text" class="form-control" name="username" value="<?php echo $users->username; ?>" />
	</tr>
	<tr>
		<td>كلمة المرور</td>
		<td><input type="password" class="form-control" name="password"  value="<?php echo $users->password; ?>" />
	</tr>
	<tr>
		<td>الصلاحيات</td>
		<td>
			<?php foreach($menu as $m){ ?>
				<input type="checkbox" name="menu[]" value="<?php echo $m->id; ?>" <?php if($m->type==1){ ?>checked<?php } ?> /> <?php echo $m->ar_title; ?><br />
			<?php } ?>
		<td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" value="<?php echo $words["edit"]; ?>" class="btn btn-success" />
		</td>
		
	</tr>
</table>
<input type="hidden" name="user_id" value="<?php echo $users->id; ?>" />
</form>








 
 <?php $this->load->view('template/footer'); ?>