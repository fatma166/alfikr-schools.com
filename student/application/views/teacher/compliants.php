

<table class="table" id="datatable">
	<thead>
		<th style="text-align: right">الطالب</th>
		<th style="text-align: right">الشكوى</th>
		<th style="text-align: right">التاريخ</th>
	</thead>
	<tbody>
		<?php foreach($compliants as $c){ ?>
		<tr>
			<td><?php echo $c->student_name; ?></td>
			<td><?php echo $c->compliant; ?></td>
			<td><?php echo $c->date; ?></td>
		</tr>
		<?php } ?>
	
	</tbody>

</table>