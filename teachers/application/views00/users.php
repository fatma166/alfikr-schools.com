<?php $this->load->view('template/body'); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>
          
<script>
function choose_category(cat_id){
	location.href = '<?php echo base_url(); ?>products/?category_id='+cat_id;
}
</script>
  

<table class='table table-striped'>
			<tr>
				<th style="text-align: right"><?php echo $words['id']; ?></th>
				<th style="text-align: right"><?php echo $words['first_name']; ?></th>
				<th style="text-align: right"><?php echo $words['last_name']; ?></th>
				<th style="text-align: right"><?php echo $words['email']; ?></th>
				<th style="text-align: right"><?php echo $words['phone']; ?></th>
				<th style="text-align: right"><?php echo $words['address']; ?></th>
			
				<th style="text-align: right"><?php echo $words['edit']; ?></th>
				<th style="text-align: right"><?php echo $words['delete']; ?></th>
			</tr>
	<?php 
		foreach($users as $u){
			//var_dump($p);
	?>
			<tr>
				<td><?php echo $u->id; ?></td>
				<td><?php echo $u->firstname; ?></td>
				<td><?php echo $u->lastname; ?></td>
				
				<td><?php echo $u->email; ?></td>
				<td><?php echo $u->telephone; ?></td>
				<td><?php echo $u->address_1; ?></td>
				
				<td><a href='<?php echo base_url(); ?>users/edit/<?php echo $u->id; ?>'><img src="<?php echo base_url(); ?>images/icons/edit.png" alt="تعديل" /></a></td>
				<td><a href='<?php echo base_url(); ?>users/delete/<?php echo $u->id; ?>'><img src="<?php echo base_url(); ?>images/icons/delete.png" alt="تعديل" /></a></td>
			</tr>
	
	<?php
		}
	?>
</table>
           

          
 
 
 <?php $this->load->view('template/footer'); ?>