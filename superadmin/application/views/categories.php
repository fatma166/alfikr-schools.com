<?php $this->load->view('template/body'); ?>


    
<script>
function change_ordering(ordering, category_id){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>categories/change_ordering",
                data: {'ordering': ordering, 'category_id': category_id}

            }).done(function (msg) {
                   alert("<?php echo $words['changes_done']; ?>");
            });
}
</script>
  
<a href='<?php echo base_url(); ?>categories/new_category' class='btn btn-success'><?php echo $words["new"]; ?></a>
 

</script>         
<table class='table'>
			<tr>
				<th style="text-align: right"><?php echo $words["id"]; ?></th>
				<th style="text-align: right">الاسم</th>
		
	
			
				<th style="text-align: right"><?php echo $words["edit"]; ?></th>
				<th style="text-align: right"><?php echo $words["delete"]; ?></th>
			</tr>
	<?php 
		foreach($categories as $c){
	?>
			<tr>
				<td><?php echo $c->id; ?></td>
				<td><?php echo $c->name; ?></td>
			
				
				
				
				<td><a href='<?php echo base_url(); ?>categories/edit/<?php echo $c->id; ?>'><?php echo $words["edit"]; ?></a></td>
				<td><a href='<?php echo base_url(); ?>categories/delete/<?php echo $c->id; ?>'><?php echo $words["delete"]; ?></a></td>
			</tr>
	
	<?php
		}
	?>
</table>
           

          
 
 
 <?php $this->load->view('template/footer'); ?>