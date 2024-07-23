<?php $this->load->view('template/body'); ?>

<form method="post" action="<?php echo base_url(); ?>master/new_region_done">

	<table class="table">
		<tr>
			<td width="200">اسم المنطقة</td>
			<td><input type="text"  style="width: 300px;" class="form-control" name="name" /></td>
		</tr>
		<tr>
			<td>
			اسم المدينة
			</td>
			<td>
				<select name="city_id" style="width: 300px;">
					<?php foreach($cities as $c){ ?>
					
					<option value="<?php echo $c->id; ?>"><?php echo $c->ar_name; ?></option>
					<?php } ?>
				
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" class="btn btn-success" value="إضافة" /></td>
		</tr>
	
	</table>


 
 <?php $this->load->view('template/footer'); ?>