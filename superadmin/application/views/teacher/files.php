

<table class="table">
	<tr>
		<th style='text-align: right;'>اسم الملف</th>
		<th style='text-align: right;'>الشعبة</th>
		<th style='text-align: right;'>عرض</th>

		
	</tr>
	<?php foreach($files as $p){ ?>
	<tr>
		<td><?php echo $p->name; ?></td>
		<td><?php echo $p->course_name; ?></td>
		<td><a href="<?php echo base_url(); ?>../uploads/<?php echo $p->file; ?>" target="_blank">عرض</a></td>
	</tr>
	<?php  } ?>
</table>