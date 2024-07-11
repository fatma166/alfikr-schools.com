<?php $this->load->view('template/body'); ?>


<a href="<?php echo base_url(); ?>master/new_event" class="btn btn-success">جديد</a>

                   
<table class='table'>
			<tr>
				<th style="text-align: right">الرقم</th>
				<th style="text-align: right">الصورة</th>
				<th style="text-align: right">الاسم</th>
				<th style="text-align: right">التاريخ</th>
				<th style="text-align: right; width: 300px;">الوقت</th>
				
		
				<th style="text-align: right">حذف</th>
				
			</tr>
	<?php 
		foreach($events as $c){
	?>
			<tr>
				<td><?php echo $c->id; ?></td>
				<td><img src="<?php echo base_url(); ?>../uploads/<?php echo $c->image; ?>" width="25" /></td>
				<td><?php echo $c->name; ?></td>
				<td><?php echo $c->day .' ' .$c->month; ?></td>
				<td><?php echo $c->time; ?></td>
				
				<td><a href='<?php echo base_url(); ?>master/delete/events/<?php echo $c->id; ?>' onclick="return confirm('هل تريد حذف هذا العنصر');">حذف</a></td>
	
				
			</tr>
	
	<?php
		}
	?>
</table>
           

          
 
 
 <?php $this->load->view('template/footer'); ?>