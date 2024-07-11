
<?php if($this->input->get('msg') == "email_exist"){ ?>
<script>
   alert('عذرا .. البريد الالكتروني موجود مسبقاً') ;
</script>
<?php } ?>


    <form method="post" action="<?php echo base_url(); ?>master/edit_teacher_done" enctype="multipart/form-data">
      <table class="table">
		<tr>
		<td>الاسم الكامل</td>
		<td>
			<input type="text" name="full_name" value="<?php echo $teacher->full_name; ?>" />
		</td>
		</tr>
		<tr>
			<td>الاختصاص</td>
			<td>
				<input type="text" name="details" value="<?php echo $teacher->details; ?>" />
			</td>
		</tr>
		<tr>
		<td>الصورة</td>
		<td>
			
			<img src="<?php echo base_url(); ?>../uploads/<?php echo $teacher->image; ?>" width="200" />
			<input type="file" name="img" />
				
			
		
		</td>
		
	</tr>
	<tr>
		<td>لينكد إن</td>
		<td>
			<input type="text" name="linkedin" value="<?php echo $teacher->linkedin; ?>" />
		</td>
	</tr>
	<tr>
		<td>فيسبوك</td>
		<td>
			<input type="text" name="facebook" value="<?php echo $teacher->facebook; ?>" />
		</td>
	</tr>
	<tr>
		<td>انستغرام</td>
		<td>
			<input type="text" name="instagram" value="<?php echo $teacher->instagram; ?>" />
		</td>
	</tr>
	<tr>
		<td>البريد الالكتروني</td>
		<td>
			<input type="text" name="email" value="<?php echo $teacher->email; ?>" />
		</td>
	</tr>
	<tr>
		<td>كلمة السر</td>
		<td>
			<input type="password" name="password" value="<?php echo $teacher->password; ?>" />
		</td>
	</tr>
	<tr>
	    <td colspan="2"><input type="submit" class="btn btn-success" value="تعديل" /></td>
	</tr>


</table>
<input type="hidden" name="id" value="<?php echo $teacher->id; ?>">
</form>

