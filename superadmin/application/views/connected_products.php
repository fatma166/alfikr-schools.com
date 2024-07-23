<?php $this->load->view('template/body'); ?>
<script>
function fetch_connected_products(text){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>products/fetch_connected_products",
                data: {'text': text}

            }).done(function (msg) {
                    document.getElementById('product_id_forign').innerHTML = msg;
            });
}
</script>

<h3>ربط منتج جديد</h3>
<form method='post' action='<?php echo base_url(); ?>products/new_connected_products' id='form'  enctype="multipart/form-data">
<input type="text" placeholder="أدخل اسم المنتج للبحث عنه" onblur="fetch_connected_products(this.value);" class="form-control" style="width:500px;">
<br />
<select name="product_id_forign" class="form-control" style="width:500px;" id="product_id_forign">

</select>


<input type="hidden" name="product_id_primary" value="<?php echo $product_id; ?>" />
<input type='submit' value='إضافة' class='btn btn-success' />
</form>

<hr />

<h3>المنتجات ذات الصلة</h3>
<table class='table'>
	<?php 
		foreach($products as $p){
	?>
		<tr>
			<td><img src="<?php echo base_url(); ?>../image/<?php echo $p->image; ?>" width="100" /></td>
			<td><?php echo $p->name; ?></td>
			<td><a href="<?php echo base_url(); ?>products/delete_connected_products/<?php echo $p->id; ?>/<?php echo $product_id; ?>">حذف</a></td>
		</tr>
	<?php
		}
	?>
</table>






<?php $this->load->view('template/footer'); ?>