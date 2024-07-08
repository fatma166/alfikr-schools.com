<fieldset><legend>إضافة موضوع جديد</legend>
<form action="<?php echo base_url(); ?>master/add_subject" method="post">
				<input type="text" name="name" placeholder="اسم الموضوع" />
				<input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />
				<input type="submit" value="إضافة" class="btn btn-success" />
</form>



</fieldset>

<br /><Br />
<h3>جميع المواضيع</h3>
<table class="table">
	<tr>
		<td>الترتيب</td>
		<td>الموضوع</td>
		<td>حذف</td>
	</tr>
	<?php foreach($subjects as $s){ ?>
	
	<tr>
		<td><input type="text" style="width: 100px;" value="<?php echo $s->ordering; ?>" onblur="change_ordering('subjects', <?php echo $s->id; ?>, this.value)" /></td>
		<td>
			<form method="post" action="<?php echo base_url(); ?>master/edit_subject">
				<input type="text" name="name" value="<?php echo $s->name; ?>" />
				<input type="hidden" name="id" value="<?php echo $s->id; ?>" />
				<input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />
				<input type="submit" value="تعديل" class="btn btn-success" />
			</form>
		</td>
		<td><a href='<?php echo base_url(); ?>master/delete/subjects/<?php echo $s->id; ?>' onclick="return confirm('هل تريد حذف هذا العنصر');">حذف</a></td>
	</tr>
	<?php } ?>
</table>