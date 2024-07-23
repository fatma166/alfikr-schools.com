<?php $this->load->view('template/body'); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>
  


  <script src="<?php echo base_url(); ?>bootstrap.js"></script> 
  <link href="<?php echo base_url(); ?>summernote.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>summernote.js"></script>

<form method='post' action='<?php echo base_url(); ?>settings/new_blog_done' id='form'  enctype="multipart/form-data">
<table class='table'>
	<tr>
		<td><?php echo $words["title"]; ?></td>
		<td><input type='text' name='title' autocomplete="off" class="form-control" /></td>
	</tr>
	
			
	<Tr>
		<td><?php echo $words["category"]; ?></td>
		<td>
		<select name="category_id">
			<?php 
				foreach($categories as $c){
			?>
			<option value="<?php echo $c->id; ?>"><?php echo $c->name; ?></option>
			<?php
				}
			?>
		
		</td>
	</tr>
	<tr>
	    <td>نص قصير</td>
	    <td>
	        <textarea name="short_text" style="width: 100%; height: 75px;"></textarea>
	    </td>
	</tr>
	<tr>
		<td><?php echo $words["image"]; ?></td>
		<td><input type='file' name='img' /></td>
	</tr>
	<tr>
		<Td>المحتوى</td>
		<td>
			<textarea id="summernote" name='content'><p></p></textarea>
		
		</td>
	</tr>
	
	<?php /* 
	<tr>
		<Td>منتجات ذات صلة</td>
		<td>
		<input type='text' name='products_connected' autocomplete="off" onkeyup='fetch_products(this.value)' /><Br />
			<div id='products_connected_section'></div>
		</td>
	</tr>
	<tr>
		<td colspan='2'>
		
			<div id="selected_connected_products"></div>
			<input type='hidden' id='final_connected_products' name='selected_connected_products[]' />
		</td>
	</tr>
	
	<tr>
		<td>صور أخرى للمنتج</td>
		<td>
			<input type='button' value='صورة جديدة' onclick='add_image();' class='btn btn-danger'>
			<span id="another_images">
			
			</span>
			<input type='hidden' id='nof_images' name='nof_images' />
		</td>
	</tr>
	*/ ?>
	<tr>
		<td colspan='2'>
			<input type='submit' value='<?php echo $words['add']; ?>' class='btn btn-success' />
		</td>
	</tr>
</table>

</form>


  <script>
    $(document).ready(function() {
        $('#summernote').summernote({
        placeholder: '',
        tabsize: 2,
        height: 200
      });
    });
  </script>





 <?php $this->load->view('template/footer'); ?>