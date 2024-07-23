<table class="table">


<?php foreach($attendes as $a){ ?>

	<tr>
		<td><?php echo $a->course_name; ?></td>
		<td><?php echo $a->start_time; ?></td>
		<td><?php echo $a->end_time; ?></td>

<?php } ?>


</table>