<?php $this->load->view('template/body'); ?>

<form method="post" action="<?php echo base_url(); ?>master/edit_student_done">

	<table class="table">
		<tr>
			<td width="200">الاسم الأول</td>
			<td><input type="text" class="form-control" name="first_name" value="<?php echo $student->first_name; ?>" /></td>
		</tr>
		<tr>
			<td>الاسم الثاني</td>
			<td><input type="text" class="form-control" name="last_name" value="<?php echo $student->last_name; ?>" /></td>
		</tr>
		<tr>
			<td>الموبايل</td>
			<td><input type="text" class="form-control" name="mobile" value="<?php echo $student->mobile; ?>" /></td>
		</tr>
		<tr>
			<td>البريد الالكتروني</td>
			<td><input type="text" class="form-control" name="email" value="<?php echo $student->email; ?>" /></td>
		</tr>
		<tr>
			<td>كلمة السر</td>
			<td><input type="password" class="form-control" name="password" value="<?php echo $student->password; ?>" /></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" class="btn btn-success" value="تعديل" /></td>
		</tr>
	
	</table>
	<input type="hidden" name="id" value="<?php echo $student->id; ?>" />


 
 <?php $this->load->view('template/footer'); ?>