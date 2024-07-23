<?php $this->load->view('template/body'); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>
          



<form method='post' action='<?php echo base_url(); ?>categories/edit_category_done' enctype="multipart/form-data">
<table class='table'>
	<tr>
		<td><?php echo $words["arabic_name"]; ?></td>
		<td><input type='text' name='name' value="<?php echo $category->name; ?>" /></td>
	</tr>
	
	<tr>
		<td colspan='2'>
			<input type='submit' value='<?php echo $words["edit"]; ?>' class='btn btn-success' />
		</td>
	</tr>
	
</table>

<input type="hidden" name="id" value="<?php echo $category->id; ?>" />
</form>








 <?php $this->load->view('template/footer'); ?>