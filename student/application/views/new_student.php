<?php $this->load->view('template/body'); ?>
<?php if($this->input->get('msg') == "email_exist"){ ?>
<script>
   alert('عذرا .. البريد الالكتروني موجود مسبقاً') ;
</script>
<?php } ?>
<form method="post" action="<?php echo base_url(); ?>master/new_student_done">

	<table class="table">
		<tr>
			<td width="200">الاسم الأول</td>
			<td><input type="text" class="form-control" name="first_name" /></td>
		</tr>
		<tr>
			<td>الاسم الثاني</td>
			<td><input type="text" class="form-control" name="last_name" /></td>
		</tr>
		<tr>
			<td>الموبايل</td>
			<td><input type="text" class="form-control" name="mobile" /></td>
		</tr>
		<tr>
			<td>البريد الالكتروني</td>
			<td><input type="text" class="form-control" name="email" /></td>
		</tr>
		<tr>
			<td>كلمة السر</td>
			<td><input type="text" class="form-control" name="password" /></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" class="btn btn-success" value="إضافة" /></td>
		</tr>
	
	</table>


 
 <?php $this->load->view('template/footer'); ?>