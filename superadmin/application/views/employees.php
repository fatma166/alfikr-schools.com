<?php $this->load->view('template/body'); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>
          
<script>
function choose_category(cat_id){
	location.href = '<?php echo base_url(); ?>products/?category_id='+cat_id;
}
</script>
<a href="<?php echo base_url(); ?>users/new_employee" class="btn btn-success">موظف جديد</a>

<table class='table table-striped'>
			<tr>
				<th style="text-align: right">الرقم</th>
				
				<th style="text-align: right">اسم الموظف</th>
				
		
			
			
				<th style="text-align: right">تعديل</th>
				<th style="text-align: right">حذف</th>
			</tr>
	<?php 
		foreach($users as $u){
			//var_dump($p);
	?>
			<tr>
				<td><?php echo $u->id; ?></td>
				<td><?php echo $u->username; ?></td>
			
				
			
				
				<td><a href='<?php echo base_url(); ?>users/edit_employees/<?php echo $u->id; ?>'><img src="<?php echo base_url(); ?>images/icons/edit.png" alt="تعديل" /></a></td>
				<td><a href='<?php echo base_url(); ?>users/delete_employees/<?php echo $u->id; ?>'><img src="<?php echo base_url(); ?>images/icons/delete.png" alt="تعديل" /></a></td>
			</tr>
	
	<?php
		}
	?>
</table>
           

          
 
 
 <?php $this->load->view('template/footer'); ?>