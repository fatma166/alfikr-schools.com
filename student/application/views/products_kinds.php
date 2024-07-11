<?php $this->load->view('template/body'); ?>


          
<script>
 function view_img_input(v){
	 if(v == 0){
		document.getElementById("img_input").style.display = 'none';
	 }
	 else{
		 document.getElementById("img_input").style.display = 'block';
		 
		 
	 }
 }
</script>
<script>
function change_quantity(quantity, product_id){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>products/change_kinds_quantity",
                data: {'quantity': quantity, 'product_id': product_id}

            }).done(function (msg) {
                   alert("تم تغيير الكمية");
            });
}
</script>
<h1><?php echo $product_name; ?><h1> <hr />

<h3>إضافة صنف فرعي جديد</h3>
<form method="post" action="<?php echo base_url(); ?>products/new_product_kind" enctype="multipart/form-data">
	<table class="table">
	<tr>
		<td>اسم الصنف</td>
		<td><input type="text" name="name" placeholder="اسم الصنف الفرعي الجديد" class="form-control" style="width: 300px;" /></td>
	</tr>
	<tr>
		<td>الصورة</td>
		<td>
			<input type="radio" value="0" name="pic" checked onchange="view_img_input(0)"  /> الصورة الافتراضية      <input type="radio" value="1" name="pic" onchange="view_img_input(1)" /> صورة جديدة
			<span id="img_input" style="display: none;"><input type="file" name="img" /></span></td>
	</tr>
	<tr>
		<td>السعر الجديد</td>
		<td><input type="text" name="price" class="form-control" style="width: 300px;" value="<?php echo $product_price; ?>" /></td>
	</tr>
	<tr>
		<td>تاريخ البداية</td>
		<td><input type="text" name="start_date" /></td>
	</tr>
	<tr>
		<td>تاريخ النهاية</td>
		<td><input type="text" name="end_date" /></td>
	</tr>
	
	<tr>
		<td>المدينة</td>
		<td>
			<select name="city_id">
			<?php foreach($cities as $c){ ?>
			<option value="<?php echo $c->city_id; ?>"><?php echo $c->ar_name; ?></option>
			<?php } ?>
			</select>
		</td>
	</tr>
	<tr><td colspan="2">
	
		<input type="submit" value="إضافة" class="btn btn-success" />
		<input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
	</td></tr>
</table>
</form>
<hr />
<h3>التصنيفات الفرعية المضافة لهذا المنتج</h3>
<table class='table'>
			<tr>
				<th style="text-align: right">الرقم</th>
				<th style="text-align: right">اسم الصنف الفرعي</th>
				<th style="text-align: right">السعر</th>
				<th style="text-align: right">الصورة</th>
				<th style="text-align: right">المدينة</th>
				<th style="text-align: right">تاريخ البداية</th>
				<th style="text-align: right">تاريخ النهاية</th>
				<th style="text-align: right">حذف</th>
			</tr>
	<?php 
		foreach($kinds as $c){
	?>
			<tr>
				<td><?php echo $c->id; ?></td>
				<td><?php echo $c->name; ?></td>
				<td><?php echo $c->price; ?></td>
				<td><img src="<?php echo base_url(); ?>/uploads/<?php echo $c->image; ?>" width="50" /></td>
				<td><?php echo $c->city_name; ?></td>
				<td><?php echo $c->start_date; ?></td>
				<td><?php echo $c->end_date; ?></td>
				
				
				<td><a href='<?php echo base_url(); ?>products/delete_products_kinds/<?php echo $c->id; ?>'>حذف</a></td>
			</tr>
	
	<?php
		}
	?>
</table>
           

          
 
 
 <?php $this->load->view('template/footer'); ?>