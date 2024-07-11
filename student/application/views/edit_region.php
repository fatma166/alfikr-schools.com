<?php $this->load->view('template/body'); ?>

<form method="post" action="<?php echo base_url(); ?>master/edit_region_done">

	<table class="table">
		<tr>
			<td width="200">الاسم</td>
			<td><input type="text" class="form-control" name="name" value="<?php echo $region->name; ?>" /></td>
		</tr>
		<tr>
			<td>
			اسم المدينة
			</td>
			<td>
				<select name="city_id" style="width: 300px;">
					<?php foreach($cities as $c){ ?>
					
					<option <?php if($region->city_id == $c->id){ ?>selected<?php } ?> value="<?php echo $c->id; ?>"><?php echo $c->ar_name; ?></option>
					<?php } ?>
				
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" class="btn btn-success" value="تعديل" /></td>
		</tr>
	
	</table>
<input type="hidden" name="id" value="<?php echo $region->id; ?>"

 
 <?php $this->load->view('template/footer'); ?>