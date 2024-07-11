

<table class="table">
	<tr>
		<th style="text-align: right">المدرس</td>
		<th style="text-align: right">التعليق</td>
		<th style="text-align: right">التاريخ</td>
<?php foreach($comments as $c){ ?>
	<tr>
		<td><?php echo $c->teacher_name; ?></td>
		<td><?php echo $c->comment; ?></td>
		<td><?php echo $c->date; ?></td>
	</tr>
<?php } ?>

</table>