<?php $this->load->view('template/body'); ?>

<form method="post" action="<?php echo base_url(); ?>master/edit_city_done">

	<table class="table">
		<tr>
			<td width="200">الاسم العربي</td>
			<td><input type="text" class="form-control" name="ar_name" value="<?php echo $city->ar_name; ?>" /></td>
		</tr>
		
		<tr>
			<td colspan="2"><input type="submit" class="btn btn-success" value="إضافة" /></td>
		</tr>
	
	</table>
<input type="hidden" name="id" value="<?php echo $city->id; ?>"

 
 <?php $this->load->view('template/footer'); ?>