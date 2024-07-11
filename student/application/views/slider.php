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
				<td><img src="<?php echo base_url(); ?>../uploads/<?php echo $c->image; ?>" width="200" /></td>
				<td><a href='<?php echo base_url(); ?>settings/delete_slider/<?php echo $c->id; ?>'>حذف</a></td>
				
			</tr>
	
	<?php
		}
	?>
</table>
           

          
 
 
 <?php $this->load->view('template/footer'); ?>