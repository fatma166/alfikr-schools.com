
<?php $this->load->view('template/body'); ?>

<a href="<?php echo base_url(); ?>settings/new_admin" class="btn btn-success"><?php echo $words["new"]; ?></a>
<table class='table'>
			
			<tr>
				<th style="text-align: right">الرقم</th>
				<th style="text-align: right">اسم المستخدم</th>
				
				<th style="text-align: right">تعديل</th>
				
				<th style="text-align: right">حذف</th>
			</tr>
	<?php 
		foreach($users as $o){
	?>
			<tr>
				<td><?php echo $o->id; ?></td>
				<td><?php echo $o->username; ?></td>
				<td><a href='<?php echo base_url(); ?>settings/edit_admin/<?php echo $o->id; ?>'><img src="<?php echo base_url(); ?>images/icons/edit.png"  /></a></td>

				<td><a href='<?php echo base_url(); ?>settings/delete_admin/<?php echo $o->id; ?>'><img src="<?php echo base_url(); ?>images/icons/delete.png"  /></a></td>
		
			</tr>
	
	<?php
		}
	?>
</table>
        

          
 
 
 <?php $this->load->view('template/footer'); ?>