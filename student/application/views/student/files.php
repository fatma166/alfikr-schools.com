


<h3>إضافة ملف جديد</h3>

<form method="post" action="<?php echo base_url(); ?>master/add_student_file" enctype="multipart/form-data">
	<table class="table">
		<tr>
			<td><input type="text" name="name" class="form-control" placeholder="اسم الملف" /></td>
			<td><input type="file" name="img" class="form-control" style="display: block" /></td>
			<td><input type="submit" class="btn btn-success" value="إضافة" /></td>
		</tr>
	</table>
	<input type="hidden" name="student_id" value="<?php echo $student_info->id; ?>" />
</form>
<hr />
<table class="table">
	<tr>
		<th style='text-align: right;'>اسم الملف</th>
		<th style='text-align: right;'>عرض</th>

		
	</tr>
	<?php foreach($files as $p){ ?>
	<tr>
		<td><?php echo $p->name; ?></td>
		<td><a href="<?php echo base_url(); ?>../<?php echo $p->file; ?>" target="_blank">عرض</a></td>
	</tr>
	<?php  } ?>
</table>