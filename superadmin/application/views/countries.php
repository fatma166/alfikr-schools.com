<?php $this->load->view('template/body'); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>
          

<h3>إضافة دولة جديدة</h3>
<form method="post" action="<?php echo base_url(); ?>countries/new_country">
		<input type="text" class="form-control" name="name" style="width: 300px; margin-bottom: 3px;" placeholder="اسم الدولة أو المدينة الجديدة" />
		<select name="parent_id" class="form-control" style="width: 300px; margin-bottom: 3px;">
			<?php 
				foreach($countries as $c){
						if($c->parent_id == 0){
							echo "<option value='$c->id'>$c->name</option>";
						}
				}
			?>
		</select>
		<input type="submit" value="إضافة" class="btn btn-success" /> 
</form>
           <hr />
		   <h3>الدول والمدن</h3>
<table class='table'>
			<tr>
				<th style="text-align: right">الرقم</th>
				<th style="text-align: right">اسم الدولة</th>
				<th style="text-align: right">الدولة الرئيسية</th>
				
				<th style="text-align: right">حذف</th>
			</tr>
	<?php 
		foreach($countries as $c){
	?>
			<tr>
				<td><?php echo $c->id; ?></td>
				<td><?php echo $c->name; ?></td>
				<td><?php echo $c->parent_name; ?></td>
			
				<td><a href='<?php echo base_url(); ?>countries/delete/<?php echo $c->id; ?>'>حذف</a></td>
			</tr>
	
	<?php
		}
	?>
</table>
           

          
 
 
 <?php $this->load->view('template/footer'); ?>