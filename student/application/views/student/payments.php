


<table class="table">
	<tr>
		<th style='text-align: right;'>التاريخ</th>
		<th style='text-align: right;'>الدفعة</th>
		
	</tr>
	<?php foreach($payments as $p){ ?>
	<tr>
		<td><?php echo $p->date; ?></td>
		<td><?php echo $p->amount; ?></td>
	</tr>
	<?php  } ?>
</table>