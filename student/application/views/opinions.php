<?php $this->load->view('template/body'); ?>

       

                   
<table class='table'>
			<tr>
				<th style="text-align: right">الرقم</th>
				<th style="text-align: right">الاسم</th>
				<th style="text-align: right">رقم الجوال</th>
				<th style="text-align: right">التعليق</th>
				<th style="text-align: right">التاريخ</th>
		
				
			</tr>
	<?php 
		foreach($opinions as $o){
	?>
			<tr>
				<td><?php echo $o->id; ?></td>
				<td><?php echo $o->name; ?></td>
				<td><?php echo $o->mobile; ?></td>
				<td><?php echo $o->content; ?></td>
				
				<td>
					<?php echo $o->date; ?>
				</td>
				
			</tr>
	
	<?php
		}
	?>
</table>
           

          
 
 
 <?php $this->load->view('template/footer'); ?>