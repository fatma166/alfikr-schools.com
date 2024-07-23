<?php $this->load->view('template/body'); ?>


<h3>صورة جديدة</h3>
<form method='post' action='<?php echo base_url(); ?>products/new_product_img' id='form'  enctype="multipart/form-data">
الرجاء اختيار الصورة <input type="file" name="images[]" multiple="multiple" />
<input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
<input type='submit' value='إضافة' class='btn btn-success' />
</form>

<hr />

<h3>صور هذا المنتج</h3>
<table class='table'>
	<?php 
		foreach($images as $i){
	?>
		<tr>
			<td><img src="<?php echo base_url(); ?>/uploads/<?php echo $i->image; ?>" width="100" /></td>
			<td><a href="<?php echo base_url(); ?>products/delete_product_img/<?php echo $i->id; ?>/<?php echo $product_id; ?>">حذف</a></td>
		</tr>
	<?php
		}
	?>
</table>






<?php $this->load->view('template/footer'); ?>