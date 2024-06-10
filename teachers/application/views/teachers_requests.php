
<?php $this->load->view('template/body'); ?>

<style>
.not_seen{
		background: darkseagreen;
		color: #000;
		
	}
</style>
<table class='table'>
			
			<tr>
				<th style="text-align: right">الرقم</th>
				<th style="text-align: right">الاسم</th>
				<th style="text-align: right">البريد الالكتروني</th>
				<th style="text-align: right">عرض</th>
				
				
				<th style="text-align: right">حذف</th>
			</tr>
	<?php 
		foreach($requests as $o){
	?>
			<tr>
				<td><?php echo $o->id; ?></td>
				<td><?php echo $o->first_name .' ',$o->last_name; ?></td>
				<td><?php echo $o->email; ?></td>
				<td><a href="<?php echo base_url(); ?>master/view_teacher_request/<?php echo $o->id; ?>">عرض</a></td>
				
				<td><a href='<?php echo base_url(); ?>master/delete/teachers_requests/<?php echo $o->id; ?>'><img src="<?php echo base_url(); ?>images/icons/delete.png"  /></a></td>
		
			</tr>
	
	<?php
		}
	?>
</table>
        

          
 
 
 <?php $this->load->view('template/footer'); ?>