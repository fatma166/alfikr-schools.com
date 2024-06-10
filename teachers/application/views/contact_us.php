
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
		foreach($contact_us as $o){
	?>
			<tr <?php if($o->seen == 0 ){ ?>class="not_seen"<?php } ?>>
				<td><?php echo $o->id; ?></td>
				<td><?php echo $o->name; ?></td>
				<td><?php echo $o->email; ?></td>
				<td><a href="<?php echo base_url(); ?>home/view_contact_us/<?php echo $o->id; ?>">عرض</a></td>
				
				<td><a href='<?php echo base_url(); ?>home/delete_contact_us/<?php echo $o->id; ?>'><img src="<?php echo base_url(); ?>images/icons/delete.png"  /></a></td>
		
			</tr>
	
	<?php
		}
	?>
</table>
        

          
 
 
 <?php $this->load->view('template/footer'); ?>