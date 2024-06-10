<?php $this->load->view('template/body'); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>
          
<script>

var categories_array = [];
var products_connected_array = [];
var nof_images = 0;
function fetch_categories(text){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>categories/fetch_categories",
                data: {'text': text}

            }).done(function (msg) {
                    document.getElementById('categories_section').innerHTML = msg;
            });
}



function add_category(cat_id, cat_name){
	categories_array.push(cat_id);
	document.getElementById('selected_categories').innerHTML += '<input type="checkbox" checked value="cat_id" onchange="delete_category(' + cat_id + ')"  /> ' + cat_name + '<br />';
	document.getElementById('final_categories').value = categories_array;
	//console.log(categories_array);
	
}

function add_category_prev(cat_id, cat_name){
	categories_array.push(cat_id);
	//alert(document.getElementById('final_categories'));
	document.getElementById('final_categories').value = categories_array;
}

function delete_category(cat_id){
	//alert(cat_id);
	//var index = categories_array.indexOf(cat_id);
	//if (index > -1) {
		for( var i = 0; i < categories_array.length; i++){ 
		   if ( categories_array[i] == cat_id) {
			 categories_array.splice(i, 1); 
		   }
		}

		document.getElementById('final_categories').value= categories_array;
	  //console.log(categories_array);
	  
	//}
	
}

function fetch_products(text){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>products/fetch_products",
                data: {'text': text}

            }).done(function (msg) {
                    document.getElementById('products_connected_section').innerHTML = msg;
            });
}


function add_connected_product(product_id, product_name){
	products_connected_array.push(product_id);
	document.getElementById('selected_connected_products').innerHTML += '<input type="checkbox" checked onchange="delete_connected_product(' + product_id + ')"  /> ' + product_name + '<br />';
	document.getElementById('final_connected_products').value= products_connected_array;
	
}

function delete_connected_product(product_id){
		for( var i = 0; i < products_connected_array.length; i++){ 
		   if ( products_connected_array[i] == product_id) {
			 products_connected_array.splice(i, 1); 
		   }
		}

		document.getElementById('final_connected_products').value= products_connected_array;	
}


function add_image(){
	nof_images++;
	$( "#another_images" ).append( '<input type="file" name="img_' + nof_images + '" /><Br />' );
	//var div = document.getElementById('another_images').outerHTML;
	//document.getElementById('another_images').innerHTML = div + '';
	document.getElementById('nof_images').value = nof_images;
}

</script>


  <script src="<?php echo base_url(); ?>bootstrap.js"></script> 
  <link href="<?php echo base_url(); ?>summernote.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>summernote.js"></script>

<form method='post' action='<?php echo base_url(); ?>products/edit_product_done' id='form'  enctype="multipart/form-data">
<input type='hidden' name='selected_categories[]' id="final_categories" /> 
<table class='table'>
	<tr>
		<td>اسم المنتج</td>
		<td><input type='text' name='name' autocomplete="off" value="<?php echo $product_info->name; ?>" /></td>
	</tr>
	<tr>
		<td>السعر</td>
		<td><input type='text' name='price' autocomplete="off" value="<?php echo $product_info->price; ?>"  /></td>
	</tr>
	<tr>
		<td>سعر مخفّض (عرض)</td>
		<td>
			<input type='text' name='offer_price' autocomplete="off" value="<?php echo $product_info->offer_price; ?>"  />
			<br />
			<input type="radio" name="active_offer" value="1" <?php if($product_info->active_offer == 1){ ?> checked <?php } ?> /> تفعيل <input type="radio" name="active_offer" value="0" <?php if($product_info->active_offer == 0){ ?> checked <?php } ?> /> عدم تفعيل
		</td>
	<Tr>
		<td>التصنيفات</td>
		<td>
			<input type='text' name='category' autocomplete="off" onkeyup='fetch_categories(this.value)' /><br />
			<div id='categories_section'></div>
			<?php
				foreach($product_categories as $cat){
					echo "<input type='checkbox' checked value='$cat->id' onchange='delete_category(this.value, \"$cat->ar_name\")' /> $cat->ar_name<br />";
			?>
				<script>
					add_category_prev('<?php echo $cat->id; ?>', '<?php echo $cat->en_name; ?>');
					console.log(categories_array);
				</script>
			
			<?php
				}
			?>
		</td>
	</tr>
	<tr>
		<td colspan='2'>
			<div id='selected_categories'></div>
		</td>
	</tr>
	<tr>
		<td>صورة المنتج</td>
		<td>	
			<img src="<?php echo base_url(); ?>uploads/<?php echo $product_info->image; ?>" width="150" />
			<input type='file' name='img' />
		</td>
	</tr>
	<tr>
		<Td>التفاصيل</td>
		<td>
			<textarea id="summernote" name='details'><?php echo $product_info->details; ?></textarea>
		
		</td>
	</tr>
	<tr>
		<Td>الكلمات الدلالية</td>
		<td>
			<input type="text" name="keywords" value="<?php echo $product_info->keywords; ?>" style="width: 300px;" />
		
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

<input type="hidden" name="product_id" value="<?php echo $product_info->id; ?>" />

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