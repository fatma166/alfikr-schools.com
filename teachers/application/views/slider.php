<?php $this->load->view('template/body'); ?>


<h3>سلايد جديد</h3>
<hr />

<script>
	function display_item(type){
		if(type == 1){
			document.getElementById("cat_id_title").style.display="block";
			document.getElementById("cat_id_content").style.display="block";
		}
	}
</script>
<form method="post" action="<?php echo base_url(); ?>settings/new_slider"   enctype="multipart/form-data">
<table class="table">
	<tr>
		<td>الاسم</td>
		<td><input type="text" name="name" /></td>
	</tr>
	<tr>
		<td>النوع</td>
		<td>
			<select name="type" onchange="display_item(this.value)">
				<option value="0">الأحداث القادمة</option>
				<option value="1">عناوين مفضلة لتصنيف</option>
				<option value="2">عناوين مفضلة لتصنيف</option>
			</select>
		</td>
	</tr>
	<tr >
		<td  id="cat_id_title" style="display: none;">التصنيف</td>
		<td  id="cat_id_content" style="display: none;">
			<select name="item_id">
			<?php foreach($categories as $c){ ?>
			<option value="<?php echo $c->id ;?>"><?php echo $c->ar_name; ?></option>
			<?php } ?>
			</select>
		</td>
	</tr>
	<tr>
		<td>الستايل</td>
		<td>
			<select name="style">
				<option value="item-one">Orange</option>
				<option value="item-two">Black</option>
				<option value="item-three">White</option>
				<option value="item-four">Dotted White</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>عدد العناصر</td>
		<td><input type="text"  name="nof_of_programs" />
		</td>
	</tr>
	<tr>
		<td>الصورة</td>
		<td><input type="file" name="img" /></td>
	</tr>
	
	
</table>
<input type="submit" value="إضافة" class="btn btn-success" />
</form>
<hr />
       

                   
<table class='table'>
			<tr>
				<th style="text-align: right">الرقم</th>
				<th style="text-align: right">السلايد</th>
		
				<th style="text-align: right">حذف</th>
				
			</tr>
	<?php 
		foreach($slider as $c){
	?>
			<tr>
				<td><?php echo $c->id; ?></td>
				<td><?php echo $c->name; ?></td>
				<td><a href='<?php echo base_url(); ?>settings/delete_slider/<?php echo $c->id; ?>'>حذف</a></td>
				
			</tr>
	
	<?php
		}
	?>
</table>
           

          
 
 
 <?php $this->load->view('template/footer'); ?>