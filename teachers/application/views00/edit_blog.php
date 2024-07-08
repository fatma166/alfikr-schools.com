<?php $this->load->view('template/body'); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>

  <script src="<?php echo base_url(); ?>bootstrap.js"></script> 
  <link href="<?php echo base_url(); ?>summernote.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>summernote.js"></script>

<form method='post' action='<?php echo base_url(); ?>settings/edit_blog_done' id='form'  enctype="multipart/form-data">
<input type='hidden' name='selected_categories[]' id="final_categories" /> 
<table class='table'>
	<tr>
		<td>العنوان</td>
		<td><input type='text' name='title' autocomplete="off" value="<?php echo $article->title; ?>" /></td>
	</tr>
	
	<Tr>
		<td>التصنيفات</td>
		<td>
			<select name="category_id">
			<?php
				foreach($categories as $cat){
			?>
				<option value="<?php echo $cat->id; ?>"
				<?php if($cat->id == $article->category_id){ ?>selected<?php  } ?>
				><?php echo $cat->name; ?></option>
			
			<?php
				}
			?>
			</select>
		</td>
	</tr>
	<tr>
	    <td>نص قصير</td>
	    <td>
	        <textarea name="short_text" style="width: 100%; height: 75px;"><?php echo $article->short_text; ?></textarea>
	    </td>
	</tr>
	<tr>
		<td>الصورة</td>
		<td>	
			<img src="<?php echo base_url(); ?>../uploads/<?php echo $article->image; ?>" width="150" />
			<input type='file' name='img' />
		</td>
	</tr>
	<tr>
		<Td>المحتوى</td>
		<td>
			<textarea id="summernote" name='content'><?php echo $article->content; ?></textarea>
		
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
			<input type='submit' value='تعديل' class='btn btn-success' />
		</td>
	</tr>
</table>

<input type="hidden" name="id" value="<?php echo $article->id; ?>" />

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