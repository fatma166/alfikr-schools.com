<?php $this->load->view('template/body'); ?>


       

                   
<table class='table'>
	<tr>
		<td><?php echo $words["name"]; ?></td>
		<td>عربي</td>
		<td>انكليزي</td>
		<td>تركي</td>
		<td><?php echo $words["edit"]; ?></td>
	</tr>
	<?php foreach($all_words as $w){ ?>
	<form method="post" action="<?php echo base_url(); ?>settings/edit_language">
	
	<tr>
		<td><?php echo $w->title; ?></td>
		<td>
				<textarea name="ar" style="width: 150px;"><?php echo $w->ar; ?></textarea>
		</td>
		<td>
				<textarea name="en" style="width: 150px;"><?php echo $w->en; ?></textarea>
		</td>
		<td>
				<textarea name="tr" style="width: 150px;"><?php echo $w->tr; ?></textarea>
		</td>
		<td>
				<input type="submit" value="<?php echo $words['edit']; ?>" class="btn btn-success" />
				<input type="hidden" name="id" value="<?php echo $w->id; ?>" />
		
			
		</td>
	</tr>
	</form>
	<?php } ?>

</table>
           

          
 
 
 <?php $this->load->view('template/footer'); ?>