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
	document.getElementById('final_categories').value= categories_array;
	
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

<form method='post' action='<?php echo base_url(); ?>master/new_university_done' id='form'  enctype="multipart/form-data">
<table class='table'>
	<tr>
		<td>الاسم العربي</td>
		<td><input type='text' name='ar_name' autocomplete="off" class="form-control" /></td>
	</tr>
	<tr>
		<td>الاسم التركي</td>
		<td><input type='text' name='tr_name' autocomplete="off" class="form-control" /></td>
	</tr>
	<tr>
		<td>المدينة</td>
		<td>
			<select name="city_id" class="form-control">
				<option value="0">الرجاء اختيار المدينة</option>
				<?php foreach($cities as $c){ ?>
					<option value="<?php echo $c->city_id; ?>"><?php echo $c->ar_name; ?></option>
						
				<?php } ?>
			</select>
		
		</td>
	</tr>
	<tr>
		<Td>الموقع الالكتروني</td>
		<td><input type="text" name="website" class="form-control" /></td>
	
	<tr>
		<td>لوغو الجامعة</td>
		<td><input type='file' name='img' /></td>
	</tr>
	<tr>
		<Td>التفاصيل بالعربي</td>
		<td>
			<textarea id="summernote" name='ar_details'><p></p></textarea>
		
		</td>
	</tr>
	
	<tr>
		<Td>التفاصيل بالتركي</td>
		<td>
			<textarea id="summernote2" name='tr_details'><p></p></textarea>
		
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
			<input type='submit' value='جديد' class='btn btn-success' />
		</td>
	</tr>
</table>
<input type='hidden' name='selected_categories[]' id='final_categories' /> 
</form>


  <script>
    $(document).ready(function() {
       $('#summernote').summernote({
        placeholder: '',
        tabsize: 2,
        height: 200
      });
	  
	  
	  $('#summernote2').summernote({
        placeholder: '',
        tabsize: 2,
        height: 200
      });
    });
  </script>





 <?php $this->load->view('template/footer'); ?>